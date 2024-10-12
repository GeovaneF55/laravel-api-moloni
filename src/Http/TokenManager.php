<?php
namespace Geovanefss\LaravelApiMoloni\Http;

use Geovanefss\LaravelApiMoloni\Exceptions\TokenException;

class TokenManager
{
    /**
     * Access Token
     *
     * @var string $accessToken
     */
    protected $accessToken;

    /**
     * Refresh Token
     *
     * @var string $refreshToken
     */
    protected $refreshToken;

    /**
     * Constructor
     *
     * @param string $accessToken
     * @param string $refreshToken
     */
    public function __construct(string $accessToken = '', string $refreshToken = '')
    {
        $this->accessToken = $accessToken;
        $this->refreshToken = $refreshToken;
    }

    /**
     * Set Tokens
     *
     * @param array $response
     * @return void
     * @throws TokenException
     */
    public function setTokens($response = [])
    {
        if (isset($response['refresh_token'])) {
            $this->refreshToken = $response['refresh_token'];
        } else {
            throw new TokenException('Failed to get refresh token.');
        }

        if (isset($response['access_token'])) {
            $this->accessToken = $response['access_token'];
        } else {
            throw new TokenException('Failed to get access token.');
        }
    }

    /**
     * Get Access Token
     *
     * @return string
     */
    public function getAccessToken()
    {
        return $this->accessToken;
    }

    /**
     * Get Refresh Token
     *
     * @return string
     */
    public function getRefreshToken()
    {
        return $this->refreshToken;
    }
}
