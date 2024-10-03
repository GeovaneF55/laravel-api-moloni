<?php
namespace Geovanefss\LaravelApiMoloni\Http\Documents;

use Geovanefss\LaravelApiMoloni\Http\ApiAbstract;

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
            // TODO
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
            // TODO
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
            // TODO
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
            // TODO
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
            // TODO
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
            // TODO
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
            // TODO
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
            // TODO
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
            // TODO
        ];

        $this->apiClient->validate($rules, $data);
        
        return $this->apiClient->postWithRetry($endpoint, $data);
    }
}