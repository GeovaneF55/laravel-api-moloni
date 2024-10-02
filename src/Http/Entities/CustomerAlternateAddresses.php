<?php
namespace Geovanefss\LaravelApiMoloni\Http\Entities;

use Geovanefss\LaravelApiMoloni\Http\ApiAbstract;

class CustomerAlternateAddresses extends ApiAbstract
{
    /**
     * Get Endpoint
     *
     * @param string $endpoint
     * @return string
     */
    public function getEndpoint(string $endpoint = ''): string
    {
        return 'customerAlternateAddresses/' . $endpoint;
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
            'company_id' => ['required', 'numeric'],
            'customer_id' => ['required', 'numeric']
        ];

        $this->apiClient->validate($rules, $data);

        return $this->apiClient->postWithRetry($endpoint, $data);
    }

    /**
     * Insert
     *
     * @param array $data
     * @return mixed
     */
    public function insert(array $data)
    {
        $endpoint = $this->getEndpoint('insert/');
        
        $rules = [
            'company_id' => ['required', 'numeric'],
            'customer_id' => ['required', 'numeric'],
            'designation' => ['required', 'string'],
            'code' => ['required', 'string'],
            'address' => ['required', 'string'],
            'city' => ['required', 'string'],
            'zip_code' => ['string'],
            'country_id' => ['required', 'numeric'],
            'email' => ['string'],
            'phone' => ['string'],
            'fax' => ['string'],
            'contact_name' => ['string']
        ];

        $this->apiClient->validate($rules, $data);

        return $this->apiClient->postWithRetry($endpoint, $data);
    }

    /**
     * update
     *
     * @param array $data
     * @return mixed
     */
    public function update(array $data)
    {
        $endpoint = $this->getEndpoint('update/');
        
        $rules = [
            'company_id' => ['required', 'numeric'],
            'address_id' => ['required', 'numeric'],
            'customer_id' => ['required', 'numeric'],
            'designation' => ['required', 'string'],
            'code' => ['required', 'string'],
            'address' => ['required', 'string'],
            'city' => ['required', 'string'],
            'zip_code' => ['string'],
            'country_id' => ['required', 'numeric'],
            'email' => ['string'],
            'phone' => ['string'],
            'fax' => ['string'],
            'contact_name' => ['string']
        ];

        $this->apiClient->validate($rules, $data);

        return $this->apiClient->postWithRetry($endpoint, $data);
    }

    /**
     * Delete
     *
     * @param array $data
     * @return mixed
     */
    public function delete(array $data)
    {
        $endpoint = $this->getEndpoint('delete/');
        
        $rules = [
            'company_id' => ['required', 'numeric'],
            'customer_id' => ['required', 'numeric'],
            'address_id' => ['required', 'numeric']
        ];

        $this->apiClient->validate($rules, $data);

        return $this->apiClient->postWithRetry($endpoint, $data);
    }
}