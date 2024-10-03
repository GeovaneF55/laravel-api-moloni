<?php
namespace Geovanefss\LaravelApiMoloni\Http\Settings;

use Geovanefss\LaravelApiMoloni\Http\ApiAbstract;

class ProductProperties extends ApiAbstract
{
    /**
     * Get Endpoint
     *
     * @param string $endpoint
     * @return string
     */
    public function getEndpoint(string $endpoint = ''): string
    {
        return 'productProperties/' . $endpoint;
    }

    /**
     * Get All
     *
     * @param array $data
     * @return mixed
     * @throws ValidationException|Exception
     */
    public function getAll(array $data = [])
    {
        $endpoint = $this->getEndpoint('getAll/');
        
        $rules = [
            // TODO
        ];

        $this->apiClient->validate($rules, $data);
        
        return $this->apiClient->postWithRetry($endpoint, $data);
    }

    /**
     * Insert
     *
     * @param array $data
     * @return mixed
     * @throws ValidationException|Exception
     */
    public function insert(array $data = [])
    {
        $endpoint = $this->getEndpoint('insert/');
        
        $rules = [
            // TODO
        ];

        $this->apiClient->validate($rules, $data);
        
        return $this->apiClient->postWithRetry($endpoint, $data);
    }

    /**
     * Update
     *
     * @param array $data
     * @return mixed
     * @throws ValidationException|Exception
     */
    public function update(array $data = [])
    {
        $endpoint = $this->getEndpoint('update/');
        
        $rules = [
            // TODO
        ];

        $this->apiClient->validate($rules, $data);
        
        return $this->apiClient->postWithRetry($endpoint, $data);
    }

    /**
     * Delete
     *
     * @param array $data
     * @return mixed
     * @throws ValidationException|Exception
     */
    public function delete(array $data = [])
    {
        $endpoint = $this->getEndpoint('delete/');
        
        $rules = [
            // TODO
        ];

        $this->apiClient->validate($rules, $data);
        
        return $this->apiClient->postWithRetry($endpoint, $data);
    }

    /**
     * Count Modified Since
     *
     * @param array $data
     * @return mixed
     * @throws ValidationException|Exception
     */
    public function countModifiedSince(array $data = [])
    {
        $endpoint = $this->getEndpoint('countModifiedSince/');
        
        $rules = [
            // TODO
        ];

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
        
        $rules = [
            // TODO
        ];

        $this->apiClient->validate($rules, $data);
        
        return $this->apiClient->postWithRetry($endpoint, $data);
    }
}