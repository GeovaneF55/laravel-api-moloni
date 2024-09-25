<?php
namespace Geovanefss\LaravelApiMoloni\Http\GlobalData;

use Geovanefss\LaravelApiMoloni\Http\ApiInterface;

class TaxExemptions implements ApiInterface
{
    /**
     * Get Endpoint
     *
     * @param string $endpoint
     * @return string
     */
    public function getEndpoint(string $endpoint = ''): string
    {
        return 'taxExemptions/' . $endpoint;
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
     * Count Modified Since
     *
     * @return mixed
     */
    public function countModifiedSince()
    {
        $endpoint = $this->getEndpoint('countModifiedSince');
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