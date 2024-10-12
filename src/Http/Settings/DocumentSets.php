<?php
namespace Geovanefss\LaravelApiMoloni\Http\Settings;

use Geovanefss\LaravelApiMoloni\Http\Abstracts\ApiAbstract;

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
            'name' => ['required', 'string'],
            'cash_vat_scheme_indicator' => ['numeric'],
            'active_by_default' => ['boolean'],
            'template_id' => ['numeric']
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
            'document_set_id' => ['required', 'numeric'],
            'name' => ['required', 'string'],
            'cash_vat_scheme_indicator' => ['numeric'],
            'active_by_default' => ['boolean'],
            'template_id' => ['numeric']
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
            'document_set_id' => ['required', 'numeric']
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
            'company_id' => ['required', 'numeric'],
            'lastmodified' => ['required', 'date']
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
            'company_id' => ['required', 'numeric'],
            'lastmodified' => ['required', 'date']
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
            'company_id' => ['required', 'numeric'],
            'document_set_id' => ['required', 'numeric'],
            'document_type_id' => ['required', 'numeric'],
            'document_set_at_code' => ['numeric'],
            'initial_num' => ['numeric'],
            'initial_date' => ['date']
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
            'company_id' => ['required', 'numeric'],
            'document_set_id' => ['required', 'array'],
            'document_set_id.*' => ['required', 'int']
        ];

        $this->apiClient->validate($rules, $data);
        
        return $this->apiClient->postWithRetry($endpoint, $data);
    }
}