<?php
namespace Geovanefss\LaravelApiMoloni\Http\AccountAndProfile;

use Geovanefss\LaravelApiMoloni\Http\ApiAbstract;

class MyProfile extends ApiAbstract
{
    /**
     * Get URL
     *
     * @param string $endpoint
     * @return string
     */
    public function getUrl(string $endpoint = '')
    {
        return parent::getBaseUrl('users/' . $endpoint);
    }

    /**
     * Sign Up
     *
     * @return mixed
     */
    public function signUp()
    {
        $url = $this->getUrl('signUp');

        // TODO
    }

    /**
     * Recover Password
     *
     * @return mixed
     */
    public function recoverPassword()
    {
        $url = $this->getUrl('recoverPassword');
        // TODO
    }

    /**
     * Update Me
     *
     * @return mixed
     */
    public function updateMe()
    {
        $url = $this->getUrl('updateMe');
        // TODO
    }

    /**
     * Get Me
     *
     * @return mixed
     */
    public function getMe()
    {
        $url = $this->getUrl('getMe');
        // TODO
    }
}