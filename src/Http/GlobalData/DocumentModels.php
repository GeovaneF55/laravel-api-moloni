<?php
namespace Geovanefss\LaravelApiMoloni\Http\GlobalData;

use Geovanefss\LaravelApiMoloni\Http\ApiInterface;

class DocumentModels implements ApiInterface
{
    /**
     * Get Endpoint
     *
     * @param string $endpoint
     * @return string
     */
    public function getEndpoint(string $endpoint = ''): string
    {
        return 'documentModels/' . $endpoint;
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