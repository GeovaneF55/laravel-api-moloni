<?php
namespace Geovanefss\LaravelApiMoloni\Http\Settings;

use Geovanefss\LaravelApiMoloni\Http\Abstracts\ApiAbstract;

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
            'company_id' => ['required', 'numeric']
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
            'company_id' => ['required', 'numeric'],
            'title' => ['required', 'string'],
            'default' => ['numeric']
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
            'company_id' => ['required', 'numeric'],
            'property_id' => ['required', 'numeric'],
            'title' => ['required', 'string'],
            'default' => ['numeric']
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
            'company_id' => ['required', 'numeric'],
            'property_id' => ['required', 'numeric']
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
            'company_id' => ['required', 'numeric'],
            'lastmodified' => ['required', 'date']
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
            'company_id' => ['required', 'numeric'],
            'lastmodified' => ['required', 'date']
        ];

        $this->apiClient->validate($rules, $data);
        
        return $this->apiClient->postWithRetry($endpoint, $data);
    }
}