<?php
namespace Geovanefss\LaravelApiMoloni\Http\Company;

use Geovanefss\LaravelApiMoloni\Http\ApiInterface;

class Subscription implements ApiInterface
{
    /**
     * Get Endpoint
     *
     * @param string $endpoint
     * @return string
     */
    public function getEndpoint(string $endpoint = ''): string
    {
        return 'subscription/' . $endpoint;
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