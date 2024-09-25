<?php
namespace Geovanefss\LaravelApiMoloni\Http\AccountAndProfile;

use Geovanefss\LaravelApiMoloni\Http\ApiInterface;

class MyProfile implements ApiInterface
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
     * @return mixed
     */
    public function signUp()
    {
        $endpoint = $this->getEndpoint('signUp');

        // TODO
    }

    /**
     * Recover Password
     *
     * @return mixed
     */
    public function recoverPassword()
    {
        $endpoint = $this->getEndpoint('recoverPassword');
        // TODO
    }

    /**
     * Update Me
     *
     * @return mixed
     */
    public function updateMe()
    {
        $endpoint = $this->getEndpoint('updateMe');
        // TODO
    }

    /**
     * Get Me
     *
     * @return mixed
     */
    public function getMe()
    {
        $endpoint = $this->getEndpoint('getMe');
        // TODO
    }
}