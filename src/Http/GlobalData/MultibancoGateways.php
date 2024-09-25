<?php
namespace Geovanefss\LaravelApiMoloni\Http\GlobalData;

use Geovanefss\LaravelApiMoloni\Http\ApiInterface;

class MultibancoGateways implements ApiInterface
{
    /**
     * Get Endpoint
     *
     * @param string $endpoint
     * @return string
     */
    public function getEndpoint(string $endpoint = ''): string
    {
        return 'multibancoGateways/' . $endpoint;
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
     * Get Modified Since
     *
     * @return mixed
     */
    public function getModifiedSince()
    {
        $endpoint = $this->getEndpoint('getModifiedSince');
        // TODO
    }
}