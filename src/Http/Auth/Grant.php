<?php
namespace Geovanefss\LaravelApiMoloni\Http\Auth;

use Geovanefss\LaravelApiMoloni\Http\Abstracts\AuthApiAbstract;

class Grant extends AuthApiAbstract
{
    /**
     * Get Endpoint
     *
     * @return string
     */
    public function getEndpoint(): string
    {
        return 'grant';
    }

    /**
     * Grant
     *
     * @param array $options
     * @return mixed
     * @throws ApiException|ValidationException|TokenException
     */
    protected function grant(array $query)
    {
        $endpoint = $this->getEndpoint();

        $rules = [
            'grant_type' => ['required', 'string', 'enum:password,authorization_code,refresh_token'],
            'client_id' => ['required', 'numeric'],
            'client_secret' => ['required', 'string']
        ];

        $this->httpClient->validate($rules, $query);

        return $this->httpClient->post($endpoint, [], $query);
    }

    /**
     * Grant By Password
     *
     * @param array $query
     * @return mixed
     * @throws ApiException|ValidationException|TokenException
     */
    public function grantByPassword(array $query)
    {
        $rules = [
            'grant_type' => ['required', 'string', 'enum:password'],
            'username' => ['required', 'string', 'min:3', 'max:255'],
            'password' => ['required', 'string', 'min:3', 'max:255']
        ];

        $this->httpClient->validate($rules, $query);

        return $this->grant($query);
    }

    /**
     * Grant By Authorization Code
     *
     * @param array $query
     * @return mixed
     * @throws ApiException|ValidationException|TokenException
     */
    public function grantByAuthCode(array $query)
    {
        $rules = [
            'grant_type' => ['required', 'string', 'enum:authorization_code'],
            'redirect_uri' => ['required', 'string', 'url'],
            'code' => ['required', 'string', 'min:3', 'max:255']
        ];

        $this->httpClient->validate($rules, $query);

        return $this->grant($query);
    }

    /**
     * Grant By Refresh Token
     *
     * @param array $query
     * @return mixed
     * @throws ApiException|ValidationException|TokenException
     */
    public function grantByRefreshToken(array $query)
    {
        $rules = [
            'grant_type' => ['required', 'string', 'enum:refresh_token'],
            'refresh_token' => ['required', 'string']
        ];

        $this->httpClient->validate($rules, $query);

        return $this->grant($query);
    }
}