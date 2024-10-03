<?php
namespace Geovanefss\LaravelApiMoloni\Http\Settings;

use Geovanefss\LaravelApiMoloni\Http\ApiAbstract;

class DocumentSets extends ApiAbstract
{
    /**
     * Get Endpoint
     *
     * @param string $endpoint
     * @return string
     */
    public function getEndpoint(string $endpoint = ''): string
    {
        return 'documentSets/' . $endpoint;
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
     * countModifiedSince
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
     * getModifiedSince
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

    /**
     * aT Insert Code
     *
     * @param array $data
     * @return mixed
     * @throws ValidationException|Exception
     */
    public function aTInsertCode(array $data = [])
    {
        $endpoint = $this->getEndpoint('aTInsertCode/');
        
        $rules = [
            // TODO
        ];

        $this->apiClient->validate($rules, $data);
        
        return $this->apiClient->postWithRetry($endpoint, $data);
    }

    /**
     * aT Insert Code Bulk
     *
     * @param array $data
     * @return mixed
     * @throws ValidationException|Exception
     */
    public function aTInsertCodeBulk(array $data = [])
    {
        $endpoint = $this->getEndpoint('aTInsertCodeBulk/');
        
        $rules = [
            // TODO
        ];

        $this->apiClient->validate($rules, $data);
        
        return $this->apiClient->postWithRetry($endpoint, $data);
    }
}