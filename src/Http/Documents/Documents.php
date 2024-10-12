<?php
namespace Geovanefss\LaravelApiMoloni\Http\Documents;

use Geovanefss\LaravelApiMoloni\Http\Abstracts\ApiAbstract;

class Documents extends ApiAbstract
{
    /**
     * Get Endpoint
     *
     * @param string $endpoint
     * @return string
     */
    public function getEndpoint(string $endpoint = ''): string
    {
        return 'documents/' . $endpoint;
    }

    /**
     * Get All Document Types
     *
     * @param array $data
     * @return mixed
     * @throws ValidationException|Exception
     */
    public function getAllDocumentTypes(array $data = [])
    {
        $endpoint = $this->getEndpoint('getAllDocumentTypes/');
        
        $rules = [
            'language_id' => ['required', 'numeric']
        ];

        $this->apiClient->validate($rules, $data);
        
        return $this->apiClient->postWithRetry($endpoint, $data);
    }

    /**
     * Get By MB Reference
     *
     * @param array $data
     * @return mixed
     * @throws ValidationException|Exception
     */
    public function getByMBReference(array $data = [])
    {
        $endpoint = $this->getEndpoint('getByMBReference/');
        
        $rules = [
            'company_id' => ['required', 'numeric'],
            'entity' => ['required', 'numeric'],
            'reference' => ['required', 'numeric']
        ];

        $this->apiClient->validate($rules, $data);
        
        return $this->apiClient->postWithRetry($endpoint, $data);
    }

    /**
     * Set MB Reference As Paid
     *
     * @param array $data
     * @return mixed
     * @throws ValidationException|Exception
     */
    public function setMBReferenceAsPaid(array $data = [])
    {
        $endpoint = $this->getEndpoint('setMBReferenceAsPaid/');
        
        $rules = [
            'document_id' => ['required', 'numeric'],
            'reference_id' => ['required', 'numeric'],
            'entity' => ['required', 'numeric'],
            'reference' => ['required', 'numeric']
        ];

        $this->apiClient->validate($rules, $data);
        
        return $this->apiClient->postWithRetry($endpoint, $data);
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
            'customer_id' => ['numeric'],
            'qty' => ['numeric'],
            'offset' => ['numeric'],
            'supplier_id' => ['numeric'],
            'salesman_id' => ['numeric'],
            'document_set_id' => ['numeric'],
            'number' => ['numeric'],
            'date' => ['date'],
            'expiration_date' => ['date'],
            'year' => ['numeric'],
            'your_reference' => ['string'],
            'our_reference' => ['string'],
            'status' => ['string']
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
     * Get PDF Link
     *
     * @param array $data
     * @return mixed
     * @throws ValidationException|Exception
     */
    public function getPDFLink(array $data = [])
    {
        $endpoint = $this->getEndpoint('getPDFLink/');
        
        $rules = [
            'company_id' => ['required', 'numeric'],
            'document_id' => ['required', 'numeric']
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
            'lastmodified' => ['required', 'date'],
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
            'lastmodified' => ['required', 'date'],
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
     * Delete MB Reference
     *
     * @param array $data
     * @return mixed
     * @throws ValidationException|Exception
     */
    public function deleteMBReference(array $data = [])
    {
        $endpoint = $this->getEndpoint('deleteMBReference/');
        
        $rules = [
            'company_id' => ['required', 'numeric'],
            'document_id' => ['required', 'numeric'],
            'reference_id' => ['required', 'numeric']
        ];

        $this->apiClient->validate($rules, $data);
        
        return $this->apiClient->postWithRetry($endpoint, $data);
    }

    /**
     * Document Cancel
     *
     * @param array $data
     * @return mixed
     * @throws ValidationException|Exception
     */
    public function documentCancel(array $data = [])
    {
        $endpoint = $this->getEndpoint('documentCancel/');
        
        $rules = [
            'company_id' => ['required', 'numeric'],
            'document_id' => ['required', 'numeric'],
            'observation' => ['string']
        ];

        $this->apiClient->validate($rules, $data);
        
        return $this->apiClient->postWithRetry($endpoint, $data);
    }

    /**
     * Document Draft
     *
     * @param array $data
     * @return mixed
     * @throws ValidationException|Exception
     */
    public function documentDraft(array $data = [])
    {
        $endpoint = $this->getEndpoint('documentDraft/');
        
        $rules = [
            'company_id' => ['required', 'numeric'],
            'document_id' => ['required', 'numeric'],
            'keep_conciliations' => ['numeric']
        ];

        $this->apiClient->validate($rules, $data);
        
        return $this->apiClient->postWithRetry($endpoint, $data);
    }
}