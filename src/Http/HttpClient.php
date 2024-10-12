<?php
namespace Geovanefss\LaravelApiMoloni\Http;

use GuzzleHttp\Client;
use Geovanefss\LaravelApiMoloni\Exceptions\ApiException;

class HttpClient
{
    /**
     * Base URL
     *
     * @var string
     */
    protected $baseUrl;

    /**
     * Client
     *
     * @var Client $client
     */
    protected $client;

    /**
     * Access Token
     *
     * @var string $accessToken
     */
    protected $accessToken;

    /**
     * Debug
     *
     * @var bool $debug
     */
    protected $debug;

    /**
     * Http Client
     *
     * @param string $baseUrl
     * @param bool $debug
     */
    public function __construct(string $baseUrl, bool $debug = false)
    {
        $this->baseUrl = $baseUrl;
        $this->debug = $debug;

        $this->startClient();
    }

    /**
     * Start Client
     *
     * @return void
     */
    protected function startClient()
    {
        $this->client = new Client([
            'base_uri' => $this->baseUrl,
            'http_errors' => $this->debug
        ]);
    }

    /**
     * Restart Client
     *
     * @param string $baseUrl
     * @param bool $debug
     * @return void
     */
    public function restartClient(string $baseUrl, bool $debug = false)
    {
        $this->baseUrl = $baseUrl;
        $this->debug = $debug;
        
        $this->startClient();
    }

    /**
     * Set Access Token
     *
     * @param string $accessToken
     * @return void
     */
    public function setAccessToken(string $accessToken)
    {
        $this->accessToken = $accessToken;
    }

    /**
     * Get Processed Options
     *
     * @param array $options
     * @return array
     */
    public function getProcessedOptions(array $options): array
    {
        if ($this->accessToken) {
            $options = array_merge_recursive($options, [
                'query' => [
                    'access_token' => $this->accessToken
                ]
            ]);
        }

        $options = array_merge_recursive($options, [
            'query' => [
                'json' => true
            ],
            'debug' => $this->debug
        ]);

        return $options;
    }

    /**
     * Request
     *
     * @param string $method
     * @param string $endpoint
     * @param array $options
     * @return mixed
     * @throws ApiException
     */
    public function request(string $method, string $endpoint, array $options = [])
    {
        $url = $this->baseUrl . $endpoint;
        $options = $this->getProcessedOptions($options);
        
        $response = $this->client->request($method, $url, $options);

        $responseCode = $response->getStatusCode();
        $responseContents = $response->getBody()->getContents();

        if ($responseCode != 200) {
            throw new ApiException($response, $responseCode);
        }

        return json_decode($responseContents, true);
    }

    /**
     * Get
     *
     * @param string $endpoint
     * @param array $query
     * @return mixed
     * @throws ApiException
     */
    public function get(string $endpoint, array $query = [])
    {
        return $this->request('GET', $endpoint, ['query' => $query]);
    }

    /**
     * Post
     *
     * @param string $endpoint
     * @param array $data
     * @param array $query
     * @return mixed
     * @throws ApiException
     */
    public function post(string $endpoint, array $data = [], array $query = [])
    {
        return $this->request('POST', $endpoint, [
            'json' => $data,
            'query' => $query
        ]);
    }
}
