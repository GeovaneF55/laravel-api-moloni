<?php
namespace Geovanefss\LaravelApiMoloni\Http\Settings;

use Geovanefss\LaravelApiMoloni\Http\ApiAbstract;

class Vehicles extends ApiAbstract
{
    /**
     * Get Endpoint
     *
     * @param string $endpoint
     * @return string
     */
    public function getEndpoint(string $endpoint = ''): string
    {
        return 'vehicles/' . $endpoint;
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
            'description' => ['required', 'string'],
            'number_plate' => ['required', 'string']
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
            'vehicle_id' => ['required', 'numeric'],
            'description' => ['required', 'string'],
            'number_plate' => ['required', 'string']
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
            'vehicle_id' => ['required', 'numeric']
        ];

        $this->apiClient->validate($rules, $data);
        
        return $this->apiClient->postWithRetry($endpoint, $data);
    }

    /**
     * Get By Search
     *
     * @param array $data
     * @return mixed
     * @throws ValidationException|Exception
     */
    public function getBySearch(array $data = [])
    {
        $endpoint = $this->getEndpoint('getBySearch/');
        
        $rules = [
            'company_id' => ['required', 'numeric'],
            'search' => ['required', 'string']
        ];

        $this->apiClient->validate($rules, $data);
        
        return $this->apiClient->postWithRetry($endpoint, $data);
    }
}