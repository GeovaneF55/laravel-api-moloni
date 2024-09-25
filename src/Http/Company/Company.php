<?php
namespace Geovanefss\LaravelApiMoloni\Http\Company;

use Geovanefss\LaravelApiMoloni\Http\ApiInterface;

class Company implements ApiInterface
{
    /**
     * Get Endpoint
     *
     * @param string $endpoint
     * @return string
     */
    public function getEndpoint(string $endpoint = ''): string
    {
        return 'companies/' . $endpoint;
    }

    /**
     * Free Slug
     *
     * @return mixed
     */
    public function freeSlug()
    {
        $endpoint = $this->getEndpoint('freeSlug');
        // TODO
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

    /**
     * Get One
     *
     * @return mixed
     */
    public function getOne()
    {
        $endpoint = $this->getEndpoint('getOne');
        // TODO
    }
}