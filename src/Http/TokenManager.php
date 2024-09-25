<?php
namespace Geovanefss\LaravelApiMoloni\Http;

use Geovanefss\LaravelApiMoloni\Exceptions\TokenException;

class TokenManager
{
    protected $accessToken;
    protected $refreshToken;

    /**
     * Set Tokens
     *
     * @param array $response
     * @return void
     */
    public function setTokens(array $response)
    {
        if (isset($response['refresh_token'])) {
            $this->refreshToken = $response['refresh_token'];
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
