<?php
namespace Geovanefss\LaravelApiMoloni\Http\Company;

use Geovanefss\LaravelApiMoloni\Http\ApiAbstract;

class Users extends ApiAbstract
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
     * Get All
     *
     * @return mixed
     */
    public function getAll()
    {
        $endpoint = $this->getEndpoint('getAll');
        // TODO
    }
}