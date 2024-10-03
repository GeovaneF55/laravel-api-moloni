<?php
namespace Geovanefss\LaravelApiMoloni\Http\AccountAndProfile;

use Geovanefss\LaravelApiMoloni\Http\ApiAbstract;

class MyProfile extends ApiAbstract
{
    /**
     * Get Endpoint
     *
     * @param string $endpoint
     * @return string
     */
    public function getEndpoint(string $endpoint = ''): string
    {
        return 'users/' . $endpoint;
    }

    /**
     * Sign Up
     *
     * @param array $data
     * @return mixed
     * @throws ValidationException|Exception
     */
    public function signUp(array $data = [])
    {
        $endpoint = $this->getEndpoint('signUp/');

        $rules = [
            'name' => ['required', 'string'],
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
            'language_id' => ['required', 'numeric'],
            'company' => ['required', 'string'],
            'vat' => ['required', 'string'],
            'slug' => ['required', 'string'],
            'country_id' => ['required', 'numeric']
        ];

        $this->apiClient->validate($rules, $data);

        return $this->apiClient->postWithRetry($endpoint, $data);
    }

    /**
     * Recover Password
     *
     * @param array $data
     * @return mixed
     * @throws ValidationException|Exception
     */
    public function recoverPassword(array $data = [])
    {
        $endpoint = $this->getEndpoint('recoverPassword/');

        $rules = [
            'email' => ['required', 'string', 'email']
        ];

        $this->apiClient->validate($rules, $data);

        return $this->apiClient->postWithRetry($endpoint, $data);

    }

    /**
     * Update Me
     *
     * @param array $data
     * @return mixed
     * @throws ValidationException|Exception
     */
    public function updateMe(array $data = [])
    {
        $endpoint = $this->getEndpoint('updateMe/');
        
        $rules = [
            'name' => ['required', 'string'],
            'email' => ['required', 'string', 'email'],
            'cellphone' => ['required', 'string'],
            'language_id' => ['required', 'int', 'enum:1,2,3']
        ];

        $this->apiClient->validate($rules, $data);

        return $this->apiClient->postWithRetry($endpoint, $data);
    }

    /**
     * Get Me
     *
     * @param array $data
     * @return mixed
     * @throws ValidationException|Exception
     */
    public function getMe(array $data = [])
    {
        $endpoint = $this->getEndpoint('getMe/');

        $rules = [];

        $this->apiClient->validate($rules, $data);

        return $this->apiClient->postWithRetry($endpoint, $data);
    }
}