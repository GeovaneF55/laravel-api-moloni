<?php
namespace Geovanefss\LaravelApiMoloni\Http\Entities;

use Geovanefss\LaravelApiMoloni\Http\ApiAbstract;

class Salesman extends ApiAbstract
{
    /**
     * Get Endpoint
     *
     * @param string $endpoint
     * @return string
     */
    public function getEndpoint(string $endpoint = ''): string
    {
        return 'salesman/' . $endpoint;
    }

    /**
     * Count
     *
     * @param array $data
     * @return mixed
     */
    public function count(array $data)
    {
        $endpoint = $this->getEndpoint('count/');
        
        $rules = [
            'company_id' => ['required', 'numeric']
        ];

        $this->apiClient->validate($rules, $data);

        return $this->apiClient->postWithRetry($endpoint, $data);
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
            'company_id' => ['required', 'numeric']
        ];

        $this->apiClient->validate($rules, $data);

        return $this->apiClient->postWithRetry($endpoint, $data);
    }

    /**
     * Get One
     *
     * @param array $data
     * @return mixed
     */
    public function getOne(array $data)
    {
        $endpoint = $this->getEndpoint('getOne/');
        
        $rules = [
            'company_id' => ['required', 'numeric'],
            'salesman_id' => ['required', 'numeric']
        ];

        $this->apiClient->validate($rules, $data);

        return $this->apiClient->postWithRetry($endpoint, $data);
    }

    /**
     * Count By Search
     *
     * @param array $data
     * @return mixed
     */
    public function countBySearch(array $data)
    {
        $endpoint = $this->getEndpoint('countBySearch/');
        
        $rules = [
            'company_id' => ['required', 'numeric'],
            'search' => ['required', 'string'],
            'exact' => ['boolean']
        ];

        $this->apiClient->validate($rules, $data);

        return $this->apiClient->postWithRetry($endpoint, $data);
    }

    /**
     * Get By Search
     *
     * @param array $data
     * @return mixed
     */
    public function getBySearch(array $data)
    {
        $endpoint = $this->getEndpoint('getBySearch/');
        
        $rules = [
            'company_id' => ['required', 'numeric'],
            'search' => ['required', 'string'],
            'exact' => ['boolean'],
            'qty' => ['numeric'],
            'offset' => ['numeric']
        ];

        $this->apiClient->validate($rules, $data);

        return $this->apiClient->postWithRetry($endpoint, $data);
    }

    /**
     * Count By Vat
     *
     * @param array $data
     * @return mixed
     */
    public function countByVat(array $data)
    {
        $endpoint = $this->getEndpoint('countByVat/');
        
        $rules = [
            'company_id' => ['required', 'numeric'],
            'vat' => ['required', 'string'],
            'exact' => ['boolean']
        ];

        $this->apiClient->validate($rules, $data);

        return $this->apiClient->postWithRetry($endpoint, $data);
    }

    /**
     * Get By Vat
     *
     * @param array $data
     * @return mixed
     */
    public function getByVat(array $data)
    {
        $endpoint = $this->getEndpoint('getByVat/');
        
        $rules = [
            'company_id' => ['required', 'numeric'],
            'vat' => ['required', 'string'],
            'exact' => ['boolean'],
            'qty' => ['numeric'],
            'offset' => ['numeric']
        ];

        $this->apiClient->validate($rules, $data);

        return $this->apiClient->postWithRetry($endpoint, $data);
    }

    /**
     * Count By Number
     *
     * @param array $data
     * @return mixed
     */
    public function countByNumber(array $data)
    {
        $endpoint = $this->getEndpoint('countByNumber/');
        
        $rules = [
            'company_id' => ['required', 'numeric'],
            'number' => ['required', 'string'],
            'exact' => ['boolean']
        ];

        $this->apiClient->validate($rules, $data);

        return $this->apiClient->postWithRetry($endpoint, $data);
    }

    /**
     * Get By Number
     *
     * @param array $data
     * @return mixed
     */
    public function getByNumber(array $data)
    {
        $endpoint = $this->getEndpoint('getByNumber/');
        
        $rules = [
            'company_id' => ['required', 'numeric'],
            'number' => ['required', 'string'],
            'exact' => ['boolean'],
            'qty' => ['numeric'],
            'offset' => ['numeric']
        ];

        $this->apiClient->validate($rules, $data);

        return $this->apiClient->postWithRetry($endpoint, $data);
    }

    /**
     * Count By Name
     *
     * @param array $data
     * @return mixed
     */
    public function countByName(array $data)
    {
        $endpoint = $this->getEndpoint('countByName/');
        
        $rules = [
            'company_id' => ['required', 'numeric'],
            'name' => ['required', 'string'],
            'exact' => ['boolean']
        ];

        $this->apiClient->validate($rules, $data);

        return $this->apiClient->postWithRetry($endpoint, $data);
    }

    /**
     * Get By Name
     *
     * @param array $data
     * @return mixed
     */
    public function getByName(array $data)
    {
        $endpoint = $this->getEndpoint('getByName/');
        
        $rules = [
            'company_id' => ['required', 'numeric'],
            'name' => ['required', 'string'],
            'exact' => ['boolean'],
            'qty' => ['numeric'],
            'offset' => ['numeric']
        ];

        $this->apiClient->validate($rules, $data);

        return $this->apiClient->postWithRetry($endpoint, $data);
    }

    /**
     * Count By Email
     *
     * @param array $data
     * @return mixed
     */
    public function countByEmail(array $data)
    {
        $endpoint = $this->getEndpoint('countByName/');
        
        $rules = [
            'company_id' => ['required', 'numeric'],
            'email' => ['required', 'string', 'email'],
            'exact' => ['boolean']
        ];

        $this->apiClient->validate($rules, $data);

        return $this->apiClient->postWithRetry($endpoint, $data);
    }

    /**
     * Get By Email
     *
     * @param array $data
     * @return mixed
     */
    public function getByEmail(array $data)
    {
        $endpoint = $this->getEndpoint('getByEmail/');
        
        $rules = [
            'company_id' => ['required', 'numeric'],
            'email' => ['required', 'string', 'email'],
            'exact' => ['boolean'],
            'qty' => ['numeric'],
            'offset' => ['numeric']
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
            'vat' => ['required', 'string'],
            'number' => ['required', 'string'],
            'name' => ['required', 'string'],
            'base_commission' => ['required', 'float'],
            'language_id' => ['required', 'numeric'],
            'qty_copies_document' => ['required', 'numeric'],
            'notes' => ['string'],
            'address' => ['string'],
            'zip_code' => ['string'],
            'city' => ['required', 'string'],
            'country_id' => ['required', 'numeric'],
            'email' => ['string', 'email'],
            'website' => ['string', 'url'],
            'phone' => ['string'],
            'fax' => ['string']
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
            'salesman_id' => ['required', 'numeric'],
            'vat' => ['required', 'string'],
            'number' => ['required', 'string'],
            'name' => ['required', 'string'],
            'base_commission' => ['required', 'float'],
            'language_id' => ['required', 'numeric'],
            'qty_copies_document' => ['required', 'numeric'],
            'notes' => ['string'],
            'address' => ['string'],
            'zip_code' => ['string'],
            'city' => ['required', 'string'],
            'country_id' => ['required', 'numeric'],
            'email' => ['string', 'email'],
            'website' => ['string', 'url'],
            'phone' => ['string'],
            'fax' => ['string']
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
            'salesman_id' => ['required', 'numeric']
        ];

        $this->apiClient->validate($rules, $data);

        return $this->apiClient->postWithRetry($endpoint, $data);
    }
}