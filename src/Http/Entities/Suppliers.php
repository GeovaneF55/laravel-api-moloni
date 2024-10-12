<?php
namespace Geovanefss\LaravelApiMoloni\Http\Entities;

use Geovanefss\LaravelApiMoloni\Http\Abstracts\ApiAbstract;

class Suppliers extends ApiAbstract
{
    /**
     * Get Endpoint
     *
     * @param string $endpoint
     * @return string
     */
    public function getEndpoint(string $endpoint = ''): string
    {
        return 'suppliers/' . $endpoint;
    }

    /**
     * Count
     *
     * @param array $data
     * @return mixed
     * @throws ValidationException|Exception
     */
    public function count(array $data = [])
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
     * @throws ValidationException|Exception
     */
    public function getAll(array $data = [])
    {
        $endpoint = $this->getEndpoint('getAll/');
        
        $rules = [
            'company_id' => ['required', 'numeric'],
            'qty' => ['numeric'],
            'offset' => ['numeric']
        ];

        $this->apiClient->validate($rules, $data);

        return $this->apiClient->postWithRetry($endpoint, $data);
    }

    /**
     * Get One
     *
     * @param array $data
     * @return mixed
     * @throws ValidationException|Exception
     */
    public function getOne(array $data = [])
    {
        $endpoint = $this->getEndpoint('getOne/');
        
        $rules = [
            'company_id' => ['required', 'numeric'],
            'supplier_id' => ['required', 'numeric']
        ];

        $this->apiClient->validate($rules, $data);

        return $this->apiClient->postWithRetry($endpoint, $data);
    }

    /**
     * Count By Search
     *
     * @param array $data
     * @return mixed
     * @throws ValidationException|Exception
     */
    public function countBySearch(array $data = [])
    {
        $endpoint = $this->getEndpoint('countBySearch/');
        
        $rules = [
            'company_id' => ['required', 'numeric'],
            'search' => ['required', 'string']
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
            'search' => ['required', 'string'],
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
     * @throws ValidationException|Exception
     */
    public function countByVat(array $data = [])
    {
        $endpoint = $this->getEndpoint('countByVat/');
        
        $rules = [
            'company_id' => ['required', 'numeric'],
            'vat' => ['required', 'string']
        ];

        $this->apiClient->validate($rules, $data);

        return $this->apiClient->postWithRetry($endpoint, $data);
    }

    /**
     * Get By Vat
     *
     * @param array $data
     * @return mixed
     * @throws ValidationException|Exception
     */
    public function getByVat(array $data = [])
    {
        $endpoint = $this->getEndpoint('getByVat/');
        
        $rules = [
            'company_id' => ['required', 'numeric'],
            'vat' => ['required', 'string'],
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
     * @throws ValidationException|Exception
     */
    public function countByNumber(array $data = [])
    {
        $endpoint = $this->getEndpoint('countByNumber/');
        
        $rules = [
            'company_id' => ['required', 'numeric'],
            'number' => ['required', 'string']
        ];

        $this->apiClient->validate($rules, $data);

        return $this->apiClient->postWithRetry($endpoint, $data);
    }

    /**
     * Get By Number
     *
     * @param array $data
     * @return mixed
     * @throws ValidationException|Exception
     */
    public function getByNumber(array $data = [])
    {
        $endpoint = $this->getEndpoint('getByNumber/');
        
        $rules = [
            'company_id' => ['required', 'numeric'],
            'number' => ['required', 'string'],
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
     * @throws ValidationException|Exception
     */
    public function countByName(array $data = [])
    {
        $endpoint = $this->getEndpoint('countByName/');
        
        $rules = [
            'company_id' => ['required', 'numeric'],
            'name' => ['required', 'string']
        ];

        $this->apiClient->validate($rules, $data);

        return $this->apiClient->postWithRetry($endpoint, $data);
    }

    /**
     * Get By Name
     *
     * @param array $data
     * @return mixed
     * @throws ValidationException|Exception
     */
    public function getByName(array $data = [])
    {
        $endpoint = $this->getEndpoint('getByName/');
        
        $rules = [
            'company_id' => ['required', 'numeric'],
            'name' => ['required', 'string'],
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
     * @throws ValidationException|Exception
     */
    public function insert(array $data = [])
    {
        $endpoint = $this->getEndpoint('insert/');
        
        $rules = [
            'company_id' => ['required', 'numeric'],
            'vat' => ['required', 'string'],
            'number' => ['required', 'string'],
            'name' => ['required', 'string'],
            'language_id' => ['required', 'numeric'],
            'address' => ['required', 'string'],
            'zip_code' => ['string'],
            'city' => ['required', 'string'],
            'country_id' => ['required', 'numeric'],
            'email' => ['string', 'email'],
            'website' => ['string', 'url'],
            'phone' => ['string'],
            'fax' => ['string'],
            'contact_name' => ['string'],
            'contact_email' => ['string'],
            'contact_phone' => ['string'],
            'notes' => ['string'],
            'maturity_date_id' => ['required', 'numeric'],
            'discount' => ['float', 'min:0', 'max:100'],
            'credit_limit' => ['float'],
            'qty_copies_document' => ['required', 'numeric'],
            'payment_method_id' => ['required', 'numeric'],
            'delivery_method_id' => ['numeric'],
            'field_notes' => ['string']
        ];

        $this->apiClient->validate($rules, $data);

        return $this->apiClient->postWithRetry($endpoint, $data);
    }

    /**
     * update
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
            'supplier_id' => ['required', 'numeric'],
            'vat' => ['required', 'string'],
            'number' => ['required', 'string'],
            'name' => ['required', 'string'],
            'language_id' => ['required', 'numeric'],
            'address' => ['required', 'string'],
            'zip_code' => ['string'],
            'city' => ['required', 'string'],
            'country_id' => ['required', 'numeric'],
            'email' => ['string', 'email'],
            'website' => ['string', 'url'],
            'phone' => ['string'],
            'fax' => ['string'],
            'contact_name' => ['string'],
            'contact_email' => ['string'],
            'contact_phone' => ['string'],
            'notes' => ['string'],
            'maturity_date_id' => ['required', 'numeric'],
            'discount' => ['float', 'min:0', 'max:100'],
            'credit_limit' => ['float'],
            'qty_copies_document' => ['required', 'numeric'],
            'payment_method_id' => ['required', 'numeric'],
            'delivery_method_id' => ['numeric'],
            'field_notes' => ['string']
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
            'supplier_id' => ['required', 'numeric']
        ];

        $this->apiClient->validate($rules, $data);

        return $this->apiClient->postWithRetry($endpoint, $data);
    }
}