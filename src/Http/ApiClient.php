<?php
namespace Geovanefss\LaravelApiMoloni\Http;

use Exception;
use GuzzleHttp\Client;
use Geovanefss\LaravelApiMoloni\Exceptions\ApiException;

class ApiClient
{
    /**
     * Client
     *
     * @var Client
     */
    protected $client;

    /**
     * Base URL
     *
     * @var string
     */
    protected $baseUrl;

    /**
     * Access Token
     *
     * @var string
     */
    protected $accessToken;

    /**
     * Constructor
     *
     * @param string $baseUrl
     * @param array $config
     */
    public function __construct(string $baseUrl, ?string $accessToken = null, array $config = [])
    {
        $this->client = new Client($config);
        $this->baseUrl = $baseUrl;
        $this->accessToken = $accessToken;
    }

    /**
     * Request
     *
     * @param string $method
     * @param string $endpoint
     * @param array $options
     * @param bool $useToken
     * @return mixed
     */
    private function request(string $method, string $endpoint, array $options = [])
    {
        try {
            $response = $this->client->request($method, $this->baseUrl . $endpoint, $options);
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
     * @param bool $useToken
     * @return mixed
     */
    public function get($endpoint, array $query = [], bool $useToken = false)
    {
        if ($useToken && $this->accessToken) {
            $query['access_token'] = $this->accessToken;
        }

        return $this->request('GET', $endpoint, ['query' => $query]);
    }

    /**
     * POST
     *
     * @param string $endpoint
     * @param array $data
     * @param bool $useToken
     * @return mixed
     */
    public function post($endpoint, array $data = [], bool $useToken = false)
    {
        if ($useToken && $this->accessToken) {
            $data['access_token'] = $this->accessToken;
        }

        return $this->request('POST', $endpoint, ['json' => $data]);
    }

    /**
     * Request with Retry
     *
     * @param string $method
     * @param string $endpoint
     * @param array $options
     * @param integer $retry
     * @return mixed
     */
    private function requestWithRetry($method, $endpoint, $options = [], $retry = 3)
    {
        try {
            $response = $this->client->request($method, $this->baseUrl . $endpoint, $options);
            return json_decode($response->getBody()->getContents(), true);
        } catch (Exception $e) {
            if ($retry > 0 && $this->isRetryable($e)) {
                return $this->request($method, $endpoint, $options, --$retry);
            }
            throw new ApiException($e->getMessage(), $e->getCode(), $e);
        }
    }

    /**
     * Is Retryable
     *
     * @param Exception $exception
     * @return boolean
     */
    private function isRetryable($exception)
    {
        // Logic for determining if the request should be retried
        return in_array($exception->getCode(), [401, 404, 429, 503]);
    }

    /**
     * GET with Retry
     *
     * @param string $endpoint
     * @param array $query
     * @param bool $useToken
     * @param int $retry
     * @return mixed
     */
    public function getWithRetry($endpoint, array $query = [], bool $useToken = false, $retry = 3)
    {
        if ($useToken && $this->accessToken) {
            $query['access_token'] = $this->accessToken;
        }

        return $this->requestWithRetry('GET', $endpoint, ['query' => $query], $retry);
    }

    /**
     * POST with Retry
     *
     * @param string $endpoint
     * @param array $data
     * @param bool $useToken
     * @param int $retry
     * @return mixed
     */
    public function postWithRetry($endpoint, array $data = [], bool $useToken = false, $retry = 3)
    {
        if ($useToken && $this->accessToken) {
            $data['access_token'] = $this->accessToken;
        }

        return $this->requestWithRetry('POST', $endpoint, ['json' => $data], $retry);
    }
}
