<?php
namespace Geovanefss\LaravelApiMoloni\Http;

use Exception;
use Geovanefss\LaravelApiMoloni\Exceptions\ApiException;
use Geovanefss\LaravelApiMoloni\Exceptions\TokenException;
use Geovanefss\LaravelApiMoloni\Exceptions\ValidationException;
use Geovanefss\LaravelApiMoloni\Http\Auth\Authorize;
use Geovanefss\LaravelApiMoloni\Http\Auth\Grant;
use Geovanefss\LaravelApiMoloni\Http\HttpClient;
use Geovanefss\LaravelApiMoloni\Http\TokenManager;
use GuzzleHttp\RequestOptions;

class ApiClient
{
    /**
     * HTTP Client
     *
     * @var HTTPClient $httpClient
     */
    protected $httpClient;

    /**
     * Token Manager
     *
     * @var TokenManager $tokenManager
     */
    protected $tokenManager;

    /**
     * Base URL
     *
     * @var string $baseUrl
     */
    protected $baseUrl;

    /**
     * Configs
     *
     * @var array $configs
     */
    protected $configs;

    /**
     * Debug
     *
     * @var string $debug
     */
    protected $debug;

    /**
     * Constructor
     *
     * @param array $configs
     */
    public function __construct(array $configs, $apiVersion = 'v1')
    {
        $this->baseUrl = 'https://api.moloni.pt/' . $apiVersion . '/';
        $this->debug = false;

        $this->httpClient = new HttpClient($this->baseUrl, $this->debug);
        $this->configs = $configs;

        $this->setTokenManager();
    }

    /**
     * Set Guzzle Debug
     *
     * @param bool $debug
     * @return void
     */
    public function setDebug(bool $debug): void
    {
        $this->debug = $debug;
        $this->httpClient->restartClient($this->baseUrl, $this->debug);
    }

    /**
     * Set Token Manager
     *
     * @param string $accessToken
     * @param string $refreshToken
     * @return void
     */
    public function setTokenManager(string $accessToken = '', string $refreshToken = '')
    {
        $this->tokenManager = new TokenManager($accessToken, $refreshToken);
        $this->httpClient->setTokenManager($this->tokenManager);
    }

    /**
     * Validate
     *
     * @param array $rules
     * @param array $data
     * @return boolean
     * @throws ValidationException
     */
    public function validate(array $rules, array $data): bool
    {
        return $this->httpClient->validate($rules, $data);
    }

    /**
     * Authorize
     *
     * @return mixed
     * @throws ApiException|ValidationException|TokenException
     */
    public function authorize(): Authorize
    {
        return (new Authorize($this->httpClient))->authorize($this->configs);
    }

    /**
     * Grant By Password
     *
     * @return mixed
     * @throws ApiException|ValidationException|TokenException
     */
    private function grantByPassword()
    {
        $response = (new Grant($this->httpClient))->grantByPassword($this->configs);

        $this->tokenManager->setTokens($response);
        $this->httpClient->setTokenManager($this->tokenManager);

        return $response;
    }

    /**
     * Grant By Authorization Code
     *
     * @return mixed
     * @throws ApiException|ValidationException|TokenException
     */
    private function grantByAuthCode()
    {
        return (new Grant($this->httpClient))->grantByAuthCode($this->configs);
    }

    /**
     * Grant By Refresh Token
     *
     * @return mixed
     * @throws ApiException|ValidationException|TokenException
     */
    private function grantByRefreshToken()
    {
        return (new Grant($this->httpClient))->grantByRefreshToken($this->configs);
    }

    /**
     * Handle Authorization or Grant
     *
     * @return mixed
     * @throws ApiException|ValidationException|TokenException
     */
    private function authOrGrant()
    {
        $rules = [
            'grant_type' => ['required', 'string', 'enum:authorize,password,authorization_code,refresh_token'],
        ];

        $this->validate($rules, $this->configs);

        switch ($this->configs['grant_type']) {
            case 'password':
                return $this->grantByPassword();
            case 'authorization_code':
                return $this->grantByAuthCode();
            case 'refresh_token':
                return $this->grantByRefreshToken();
            case 'authorize':
            default:
                return $this->authorize();
        }
    }

    /**
     * GET with Retry and Token Refresh
     *
     * @param string $endpoint
     * @param array $query
     * @param int $retry
     * @return mixed
     * @throws Exception
     */
    public function getWithRetry(string $endpoint, array $query = [], int $retry = 3)
    {
        return $this->requestWithRetry('GET', $endpoint, [
            RequestOptions::QUERY => $query
        ], $retry - 1);
    }

    /**
     * POST with Retry and Token Refresh
     *
     * @param string $endpoint
     * @param array $data
     * @param array $query
     * @param int $retry
     * @return mixed
     * @throws Exception
     */
    public function postWithRetry(string $endpoint, array $data = [], array $query = [], int $retry = 3)
    {
        return $this->requestWithRetry('POST', $endpoint, [
            RequestOptions::JSON => $data,
            RequestOptions::QUERY => $query
        ], $retry - 1);
    }

    /**
     * Handle Request with Retry Logic
     *
     * @param string $method
     * @param string $endpoint
     * @param array $options
     * @param int $retry
     * @return mixed
     * @throws Exception
     */
    private function requestWithRetry(string $method, string $endpoint, array $options = [], int $retry = 3)
    {
        try {
            if (empty($this->tokenManager->getAccessToken())) {
                $this->authOrGrant();
            }

            return $this->httpClient->request($method, $endpoint, $options);
        } catch (ApiException | ValidationException | TokenException $e) {
            if ($retry > 0 && in_array($e->getCode(), [401, 404, 429, 503])) {
                // Retry on certain status codes
                $this->authOrGrant();
                return $this->requestWithRetry($method, $endpoint, $options, $retry - 1);
            }

            throw new Exception($e->toString(), $e->getCode(), $e);
        }
    }
}
