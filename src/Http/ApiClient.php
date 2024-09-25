<?php
namespace Geovanefss\LaravelApiMoloni\Http;

use Exception;
use GuzzleHttp\Client;
use Geovanefss\LaravelApiMoloni\Exceptions\ApiException;

class ApiClient
{
    const API_VERSION = 'v1';

    /**
     * Base Url
     *
     * @var string
     */
    protected $baseUrl;

    /**
     * Client
     *
     * @var Client
     */
    protected $client;

    /**
     * Access Token
     *
     * @var string
     */
    protected $accessToken;

    /**
     * Refresh Token
     *
     * @var string
     */
    protected $refreshToken;

    /**
     * Constructor
     *
     * @param array $config
     * @param ?string $accessToken
     * @param ?string $refreshToken
     */
    public function __construct(array $config = [], ?string $accessToken = null, ?string $refreshToken = null)
    {
        $this->baseUrl = 'https://api.moloni.pt/' . self::API_VERSION . '/';
        $this->client = new Client($config);
        $this->accessToken = $accessToken;
        $this->refreshToken = $refreshToken;
    }

    /**
     * Add Access Token to URL as query parameter
     *
     * @param string $url
     * @return string
     */
    private function addAccessTokenToUrl(string $url): string
    {
        $parsedUrl = parse_url($url);
        $query = isset($parsedUrl['query']) ? $parsedUrl['query'] : '';
        $query .= ($query ? '&' : '') . 'access_token=' . $this->accessToken;

        return $parsedUrl['scheme'] . '://' . $parsedUrl['host'] . $parsedUrl['path'] . '?' . $query;
    }

    /**
     * Request
     *
     * @param string $method
     * @param string $endpoint
     * @param array $options
     * @return mixed
     */
    private function request(string $method, string $endpoint, array $options = [])
    {
        try {
            $url = $this->baseUrl . $endpoint;
            // Add access token to headers if available
            if ($this->accessToken) {
                $url = $this->addAccessTokenToUrl($url);
                $options['headers']['Authorization'] = 'Bearer ' . $this->accessToken;
            }

            $response = $this->client->request($method, $url, $options);
            return json_decode($response->getBody()->getContents(), true);
        } catch (Exception $e) {
            throw new ApiException($e->getMessage(), $e->getCode(), $e);
        }
    }

    /**
     * GET
     *
     * @param string $endpoint
     * @param array $query
     * @return mixed
     */
    private function get(string $endpoint, array $query = [])
    {
        return $this->request('GET', $endpoint, ['query' => $query]);
    }

    /**
     * POST
     *
     * @param string $endpoint
     * @param array $data
     * @return mixed
     */
    private function post(string $endpoint, array $data = [])
    {
        return $this->request('POST', $endpoint, ['json' => $data]);
    }

    /**
     * Request with Retry and Token Refresh
     *
     * @param string $method
     * @param string $endpoint
     * @param array $options
     * @param int $retry
     * @return mixed
     */
    private function requestWithRetry(string $method, string $endpoint, array $options = [], int $retry = 3)
    {
        try {
            if (empty($this->accessToken)) {
                // Try to refresh the access token if unauthorized
                $this->authorize();
            }

            return $this->request($method, $endpoint, $options);
        } catch (Exception $e) {
            if ($e->getCode() === 401 && !empty($this->refreshToken)) {
                // Try to refresh the access token if unauthorized
                $this->grantByRefreshToken();

                // Retry the request after refreshing the token
                return $this->requestWithRetry($method, $endpoint, $options, $retry - 1);
            }

            if ($retry > 0 && $this->isRetryable($e)) {
                return $this->requestWithRetry($method, $endpoint, $options, $retry - 1);
            }

            throw new ApiException($e->getMessage(), $e->getCode(), $e);
        }
    }

    /**
     * GET with Retry and Token Refresh
     *
     * @param string $url
     * @param array $query
     * @param int $retry
     * @return mixed
     */
    public function getWithRetry(string $url, array $query = [], int $retry = 3)
    {
        return $this->requestWithRetry('GET', $url, ['query' => $query], $retry - 1);
    }

    /**
     * POST with Retry and Token Refresh
     *
     * @param string $url
     * @param array $data
     * @param int $retry
     * @return mixed
     */
    public function postWithRetry(string $url, array $data = [], int $retry = 3)
    {
        return $this->requestWithRetry('POST', $url, ['json' => $data], $retry - 1);
    }

    /**
     * Is Retryable
     *
     * @param Exception $exception
     * @return boolean
     */
    private function isRetryable(Exception $exception)
    {
        // Logic for determining if the request should be retried
        return in_array($exception->getCode(), [401, 404, 429, 503]);
    }

    /**
     * Authorize
     *
     * @return mixed
     */
    private function authorize()
    {
        $rules = [
            'response_type' => ['required', 'string'],
            'client_id' => ['required', 'string'],
            'redirect_uri' => ['required', 'string', 'url']
        ];

        $options = [
            'response_type' => 'code',
            'client_id' => getenv('MOLONI_CLIENT_ID'),
            'redirect_uri' => getenv('MOLONI_REDIRECT_URI')
        ];

        $validator = new Validator($rules);
        $validator->validate($options);

        $response = $this->post('authorize', $options);

        if (isset($response['refresh_token'])) {
            $this->refreshToken = $response['refresh_token'];
        }

        if (isset($response['access_token'])) {
            $this->accessToken = $response['access_token'];
        } else {
            throw new ApiException('Failed to get access token.');
        }

        return $response;
    }

    /**
     * Grant
     *
     * @param array $options
     * @return mixed
     */
    private function grant(array $options)
    {
        $rules = [
            'grant_type' => ['required', 'string'],
            'client_id' => ['required', 'numeric'],
            'client_secret' => ['required', 'string']
        ];

        $options = array_merge([
            'client_id' => getenv('MOLONI_CLIENT_ID'),
            'client_secret' => getenv('MOLONI_CLIENT_SECRET')
        ], $options);

        $validator = new Validator($rules);
        $validator->validate($options);

        $response = $this->post('grant', $options);

        if (isset($response['refresh_token'])) {
            $this->refreshToken = $response['refresh_token'];
        }

        if (isset($response['access_token'])) {
            $this->accessToken = $response['access_token'];
        } else {
            throw new ApiException('Failed to refresh access token.');
        }

        return $response;
    }

    /**
     * Grant By Auth Code
     *
     * @return mixed
     */
    private function grantByAuthCode()
    {
        $rules = [
            'redirect_uri' => ['required', 'string', 'url'],
            'code' => ['required', 'string', 'min:3', 'max:255']
        ];

        $options = [
            'grant_type' => 'authorization_code',
            'redirect_uri' => getenv('MOLONI_REDIRECT_URI'),
            'code' => getenv('MOLONI_AUTHORIZATION_CODE'),
        ];

        $validator = new Validator($rules);
        $validator->validate($options);

        return $this->grant($options);
    }

    /**
     * Grant By Password
     *
     * @return mixed
     */
    private function grantByPassword()
    {
        $rules = [
            'username' => ['required', 'string', 'min:3', 'max:255'],
            'password' => ['required', 'string', 'min:3', 'max:255']
        ];

        $options = [
            'grant_type' => 'password',
            'username' => getenv('MOLONI_USERNAME'),
            'password' => getenv('MOLONI_PASSWORD')
        ];

        $validator = new Validator($rules);
        $validator->validate($options);

        return $this->grant($options);
    }

    /**
     * Grant By Refresh Token
     *
     * @return mixed
     */
    private function grantByRefreshToken()
    {
        $rules = [
            'refresh_token' => ['required', 'string']
        ];

        $options = [
            'grant_type' => 'refresh_token',
            'refresh_token' => $this->refreshToken
        ];

        $validator = new Validator($rules);
        $validator->validate($options);

        return $this->grant($options);
    }
}
