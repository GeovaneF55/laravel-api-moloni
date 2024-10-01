<?php
namespace Geovanefss\LaravelApiMoloni\Http\GlobalData;

use Geovanefss\LaravelApiMoloni\Http\ApiAbstract;

class FiscalZones extends ApiAbstract
{
    /**
     * Get Endpoint
     *
     * @param string $endpoint
     * @return string
     */
    public function getEndpoint(string $endpoint = ''): string
    {
        return 'fiscalZones/' . $endpoint;
    }

    /**
     * Get All
     *
     * @param array $data
     * @return mixed
     */
    public function getAll(array $data)
    {
        $endpoint = $this->getEndpoint('getAll/');
        
        $rules = [
            'country_id' => ['required', 'numeric']
        ];

        $this->apiClient->validate($rules, $data);

        return $this->apiClient->postWithRetry($endpoint, $data);
    }
}