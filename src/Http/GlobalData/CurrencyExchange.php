<?php
namespace Geovanefss\LaravelApiMoloni\Http\GlobalData;

use Geovanefss\LaravelApiMoloni\Http\ApiAbstract;

class CurrencyExchange extends ApiAbstract
{
    /**
     * Get Endpoint
     *
     * @param string $endpoint
     * @return string
     */
    public function getEndpoint(string $endpoint = ''): string
    {
        return 'currencyExchange/' . $endpoint;
    }

    /**
     * Get All
     *
     * @return mixed
     */
    public function getAll()
    {
        $endpoint = $this->getEndpoint('getAll/');
        
        return $this->apiClient->postWithRetry($endpoint);
    }

    /**
     * Get Modified Since
     *
     * @param array $data
     * @return mixed
     */
    public function getModifiedSince(array $data)
    {
        $endpoint = $this->getEndpoint('getModifiedSince/');

        $rules = [
            'lastmodified' => ['required', 'date']
        ];

        $this->apiClient->validate($rules, $data);
        
        return $this->apiClient->postWithRetry($endpoint, $data);
    }
}