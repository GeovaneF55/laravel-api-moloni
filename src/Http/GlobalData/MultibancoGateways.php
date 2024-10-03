<?php
namespace Geovanefss\LaravelApiMoloni\Http\GlobalData;

use Geovanefss\LaravelApiMoloni\Http\ApiAbstract;

class MultibancoGateways extends ApiAbstract
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
     *@param array $data
     * @return mixed
     * @throws ValidationException|Exception
     */
    public function getAll(array $data = [])
    {
        $endpoint = $this->getEndpoint('getAll/');

        $rules = [];

        $this->apiClient->validate($rules, $data);
        
        return $this->apiClient->postWithRetry($endpoint, $data);
    }

    /**
     * Get Modified Since
     *
     * @param array $data
     * @return mixed
     * @throws ValidationException|Exception
     */
    public function getModifiedSince(array $data = [])
    {
        $endpoint = $this->getEndpoint('getModifiedSince/');

        $rules = [];

        $this->apiClient->validate($rules, $data);
        
        return $this->apiClient->postWithRetry($endpoint, $data);
    }
}