<?php
namespace Geovanefss\LaravelApiMoloni\Http\GlobalData;

use Geovanefss\LaravelApiMoloni\Http\ApiAbstract;

class TaxExemptions extends ApiAbstract
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
     * @param array $data
     * @return mixed
     */
    public function getAll(array $data)
    {
        $endpoint = $this->getEndpoint('getAll/');

        $rules = [
            'with_invisible' => ['boolean']
        ];

        $this->apiClient->validate($rules, $data);
        
        return $this->apiClient->postWithRetry($endpoint);
    }

    /**
     * Count Modified Since
     *
     * @param array $data
     * @return mixed
     */
    public function countModifiedSince(array $data)
    {
        $endpoint = $this->getEndpoint('countModifiedSince/');
        
        $rules = [
            'lastmodified' => ['required', 'date'],
            'with_invisible' => ['boolean']
        ];

        $this->apiClient->validate($rules, $data);
        
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
            'lastmodified' => ['required', 'date'],
            'with_invisible' => ['boolean']
        ];

        $this->apiClient->validate($rules, $data);
        
        return $this->apiClient->postWithRetry($endpoint);
    }
}