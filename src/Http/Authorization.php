<?php
namespace Geovanefss\LaravelApiMoloni\Http;

class Authorization extends ApiAbstract
{
    /**
     * Get URL
     *
     * @param string $endpoint
     * @return string
     */
    public function getUrl(string $endpoint = '')
    {
        return parent::getBaseUrl($endpoint);
    }

    /**
     * Authorize
     *
     * @param array $options
     * @return mixed
     */
    public function authorize(array $options)
    {
        $url = $this->getUrl('authorize');

        $rules = [
            'response_type' => ['required', 'string'],
            'client_id' => ['required', 'numeric'],
            'redirect_uri' => ['required', 'string'],
        ];

        $validator = new Validator($rules);
        $validator->validate($options);

        // TODO
    }

    /**
     * Grant
     *
     * @param array $options
     * @return mixed
     */
    public function grant(array $options)
    {
        $url = $this->getUrl('grant');

        $rules = [
            'grant_type' => ['required', 'string'],
            'client_id' => ['required', 'numeric'],
            'client_secret' => ['required', 'string']
        ];

        $validator = new Validator($rules);
        $validator->validate($options);

        // TODO
    }

    /**
     * Grant By Auth Code
     *
     * @param array $options
     * @return mixed
     */
    public function grantByAuthCode(array $options)
    {
        $rules = [
            'redirect_uri' => ['required', 'string'],
            'code' => ['required', 'string']
        ];

        $validator = new Validator($rules);
        $validator->validate($options);

        $this->grant($options);
        // TODO
    }

    /**
     * Grant By Password
     *
     * @param array $options
     * @return mixed
     */
    public function grantByPassword(array $options)
    {
        $rules = [
            'username' => ['required', 'string'],
            'password' => ['required', 'string']
        ];

        $validator = new Validator($rules);
        $validator->validate($options);

        $this->grant($options);
        // TODO
    }

    /**
     * Grant By Refresh Token
     *
     * @param array $options
     * @return mixed
     */
    public function grantByRefreshToken(array $options)
    {
        $rules = [
            'refresh_token' => ['required', 'string']
        ];

        $validator = new Validator($rules);
        $validator->validate($options);

        $this->grant($options);
        // TODO
    }
}