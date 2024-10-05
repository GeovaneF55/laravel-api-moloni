<?php
namespace Geovanefss\LaravelApiMoloni\Http\Documents;

use Geovanefss\LaravelApiMoloni\Http\ApiAbstract;

class Receipts extends ApiAbstract
{
    /**
     * Get Endpoint
     *
     * @param string $endpoint
     * @return string
     */
    public function getEndpoint(string $endpoint = ''): string
    {
        return 'receipts/' . $endpoint;
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
            'company_id' => ['required', 'numeric'],
            'customer_id' => ['numeric'],
            'supplier_id' => ['numeric'],
            'salesman_id' => ['numeric'],
            'document_set_id' => ['numeric'],
            'number' => ['numeric'],
            'date' => ['date'],
            'expiration_date' => ['date'],
            'year' => ['numeric'],
            'your_reference' => ['string'],
            'our_reference' => ['string']
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
            'offset' => ['numeric'],
            'customer_id' => ['numeric'],
            'supplier_id' => ['numeric'],
            'salesman_id' => ['numeric'],
            'document_set_id' => ['numeric'],
            'number' => ['numeric'],
            'date' => ['date'],
            'expiration_date' => ['date'],
            'year' => ['numeric'],
            'your_reference' => ['string'],
            'our_reference' => ['string']
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
            'document_id' => ['numeric'],
            'customer_id' => ['numeric'],
            'supplier_id' => ['numeric'],
            'salesman_id' => ['numeric'],
            'document_set_id' => ['numeric'],
            'number' => ['numeric'],
            'date' => ['date'],
            'expiration_date' => ['date'],
            'year' => ['numeric'],
            'your_reference' => ['string'],
            'our_reference' => ['string']
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
            'date' => ['required', 'date'],
            'document_set_id' => ['required', 'numeric'],
            'customer_id' => ['required', 'numeric'],
            'alternate_address_id' => ['required', 'numeric'],
            'net_value' => ['required', 'float'],
            'associated_documents' => ['required', 'numeric'],
            'associated_documents.associated_id' => ['required', 'numeric'],
            'associated_documents.value' => ['required', 'float'],
            'related_documents_notes' => ['string'],
            'payments' => ['array'],
            'payments.payment_method_id' => ['required', 'numeric'],
            'payments.date' => ['required', 'date'],
            'payments.value' => ['required', 'float'],
            'payments.notes' => ['string'],
            'exchange_currency_id' => ['numeric'],
            'exchange_rate' => ['float'],
            'notes' => ['string'],
            'status' => ['numeric']
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
            'document_id' => ['required', 'numeric'],
            'date' => ['required', 'date'],
            'document_set_id' => ['required', 'numeric'],
            'customer_id' => ['required', 'numeric'],
            'alternate_address_id' => ['required', 'numeric'],
            'net_value' => ['required', 'float'],
            'associated_documents' => ['required', 'numeric'],
            'associated_documents.associated_id' => ['required', 'numeric'],
            'associated_documents.value' => ['required', 'float'],
            'related_documents_notes' => ['string'],
            'payments' => ['array'],
            'payments.payment_method_id' => ['required', 'numeric'],
            'payments.date' => ['required', 'date'],
            'payments.value' => ['required', 'float'],
            'payments.notes' => ['string'],
            'exchange_currency_id' => ['numeric'],
            'exchange_rate' => ['float'],
            'notes' => ['string'],
            'status' => ['numeric']
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
            'document_id' => ['required', 'numeric']
        ];

        $this->apiClient->validate($rules, $data);
        
        return $this->apiClient->postWithRetry($endpoint, $data);
    }
}