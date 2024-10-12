<?php
namespace Geovanefss\LaravelApiMoloni\Http;

use Exception;
use Geovanefss\LaravelApiMoloni\Exceptions\ApiException;
use Geovanefss\LaravelApiMoloni\Exceptions\TokenException;
use Geovanefss\LaravelApiMoloni\Exceptions\ValidationException;
use Geovanefss\LaravelApiMoloni\Http\HttpClient;
use Geovanefss\LaravelApiMoloni\Http\TokenManager;
use Geovanefss\LaravelApiMoloni\Validators\Validator;
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
     * Validator
     *
     * @var Validator $validator
     */
    protected $validator;

    /**
     * Base URL
     *
     * @var string $baseUrl
     */
    protected $baseUrl;

    /**
     * Grant type
     *
     * @var string $grantType
     */
    protected $grantType;

    /**
     * Grant type
     *
     * @var string $grantType
     */
    protected $clientId;

    /**
     * Client Secret
     *
     * @var string $clientSecret
     */
    protected $clientSecret;

    /**
     * Response Type
     *
     * @var string $responseType
     */
    protected $responseType;

    /**
     * Redirect URI
     *
     * @var string $redirectUri
     */
    protected $redirectUri;

    /**
     * Authorization Code
     *
     * @var string $authorizationCode
     */
    protected $authorizationCode;

    /**
     * Username
     *
     * @var string $username
     */
    protected $username;

    /**
     * Password
     *
     * @var string $password
     */
    protected $password;

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
        $this->tokenManager = new TokenManager();
        $this->validator = new Validator();

        $this->setConfigs($configs);
    }

    /**
     * Set Moloni Configurations
     *
     * @param array $configs
     * @return void
     */
    private function setConfigs(array $configs): void
    {
        $this->grantType = $configs['grant_type'] ?? null; 
        $this->clientId = $configs['client_id'] ?? null;
        $this->clientSecret = $configs['client_secret'] ?? null;
        $this->responseType = $configs['response_type'] ?? null;
        $this->redirectUri = $configs['redirect_uri'] ?? null;
        $this->authorizationCode = $configs['authorization_code'] ?? null;
        $this->username = $configs['username'] ?? null;
        $this->password = $configs['password'] ?? null;
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
     * Authorize
     *
     * @return mixed
     * @throws ApiException|ValidationException|TokenException
     */
    private function authorize()
    {
        $rules = [
            'response_type' => ['required', 'string', 'enum:code'],
            'client_id' => ['required', 'string'],
            'redirect_uri' => ['required', 'string', 'url']
        ];

        $query = [
            'response_type' => $this->responseType,
            'client_id' => $this->clientId,
            'redirect_uri' => $this->redirectUri
        ];

        $this->validate($rules, $query);
        $response = $this->httpClient->post('authorize', [], $query);

        $this->tokenManager->setTokens($response);
        $this->httpClient->setAccessToken($this->tokenManager->getAccessToken());

        return $response;
    }

    /**
     * Grant
     *
     * @param array $options
     * @return mixed
     * @throws ApiException|ValidationException|TokenException
     */
    private function grant(array $query)
    {
        $rules = [
            'grant_type' => ['required', 'string', 'enum:password,authorization_code,refresh_token'],
            'client_id' => ['required', 'numeric'],
            'client_secret' => ['required', 'string']
        ];

        $query = array_merge([
            'client_id' => $this->clientId,
            'client_secret' => $this->clientSecret
        ], $query);

        $this->validate($rules, $query);

        $response = $this->httpClient->post('grant', [], $query);

        $this->tokenManager->setTokens($response);
        $this->httpClient->setAccessToken($this->tokenManager->getAccessToken());

        return $response;
    }

    /**
     * Grant By Password
     *
     * @return mixed
     * @throws ApiException|ValidationException|TokenException
     */
    private function grantByPassword()
    {
        $rules = [
            'grant_type' => ['required', 'string', 'enum:password'],
            'username' => ['required', 'string', 'min:3', 'max:255'],
            'password' => ['required', 'string', 'min:3', 'max:255']
        ];

        $query = [
            'grant_type' => 'password',
            'username' => $this->username,
            'password' => $this->password
        ];

        $this->validate($rules, $query);
        return $this->grant($query);
    }

    /**
     * Grant By Authorization Code
     *
     * @return mixed
     * @throws ApiException|ValidationException|TokenException
     */
    private function grantByAuthCode()
    {
        $rules = [
            'grant_type' => ['required', 'string', 'enum:authorization_code'],
            'redirect_uri' => ['required', 'string', 'url'],
            'code' => ['required', 'string', 'min:3', 'max:255']
        ];

        $query = [
            'grant_type' => 'authorization_code',
            'redirect_uri' => $this->redirectUri,
            'code' => $this->authorizationCode
        ];

        $this->validate($rules, $query);
        return $this->grant($query);
    }

    /**
     * Grant By Refresh Token
     *
     * @return mixed
     * @throws ApiException|ValidationException|TokenException
     */
    private function grantByRefreshToken()
    {
        $rules = [
            'grant_type' => ['required', 'string', 'enum:refresh_token'],
            'refresh_token' => ['required', 'string']
        ];

        $query = [
            'grant_type' => 'refresh_token',
            'refresh_token' => $this->tokenManager->getRefreshToken()
        ];

        $this->validate($rules, $query);
        return $this->grant($query);
    }

    /**
     * Handle Authorization or Grant
     *
     * @return mixed
     * @throws ApiException|ValidationException|TokenException
     */
    private function authOrGrant()
    {
        switch($this->grantType) {
            case 'password':
                return $this->grantByPassword();
            case 'authorization_code':
                // TODO: return $this->grantByAuthCode();
                throw new TokenException('Grant by Auth Code is not implemented yet');
            case 'refresh_token':
                return $this->grantByRefreshToken();
            default:
                // TODO: return $this->authorize();
                throw new TokenException('authorize is not implemented yet');
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
