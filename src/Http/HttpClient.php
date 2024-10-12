<?php
namespace Geovanefss\LaravelApiMoloni\Http;

use GuzzleHttp\Client;
use Geovanefss\LaravelApiMoloni\Exceptions\ApiException;
use Geovanefss\LaravelApiMoloni\Exceptions\ValidationException;
use Geovanefss\LaravelApiMoloni\Validators\Validator;
use GuzzleHttp\RequestOptions;

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
     * Validator
     *
     * @var Validator $validator
     */
    protected $validator;

    /**
     * Token Manager
     *
     * @var TokenManager $tokenManager
     */
    protected $tokenManager;

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
        $this->validator = new Validator();

        $this->startClient();
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
        return $this->validator->validate($rules, $data);
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
     * Set Token Manager
     *
     * @param TokenManager $tokenManager
     * @return void
     */
    public function setTokenManager(TokenManager $tokenManager)
    {
        $this->tokenManager = $tokenManager;
    }

    /**
     * Get Processed Options
     *
     * @param array $options
     * @return array
     */
    public function getProcessedOptions(array $options): array
    {
        if ($this->tokenManager->getAccessToken()) {
            $options = array_merge_recursive($options, [
                RequestOptions::QUERY => [
                    'access_token' => $this->tokenManager->getAccessToken()
                ]
            ]);
        }

        $options = array_merge_recursive($options, [
            RequestOptions::QUERY => [
                RequestOptions::JSON => true
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
        return $this->request('GET', $endpoint, [
            RequestOptions::QUERY => $query
        ]);
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
            RequestOptions::JSON => $data,
            RequestOptions::QUERY => $query
        ]);
    }
}
