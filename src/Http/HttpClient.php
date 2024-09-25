<?php
namespace Geovanefss\LaravelApiMoloni\Http;

use GuzzleHttp\Client;
use Geovanefss\LaravelApiMoloni\Exceptions\ApiException;

class HttpClient
{
    protected $baseUrl;
    protected $client;
    protected $accessToken;

    /**
     * Http Client
     *
     * @param string $baseUrl
     */
    public function __construct(string $baseUrl)
    {
        $this->baseUrl = $baseUrl;
        $this->client = new Client([
            'base_uri' => $baseUrl,
            'http_errors' => false
        ]);
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
        $options = array_merge_recursive($options, [
            'query' => [
                'json' => true
            ]
        ]);

        if ($this->accessToken) {
            $options = array_merge_recursive($options, [
                'query' => [
                    'access_token' => $this->accessToken
                ]
            ]);
        }

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

        if ($response->getStatusCode() != 200) {
            throw new ApiException($response, $response->getStatusCode());
        }

        return json_decode($response->getBody()->getContents(), true);
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
