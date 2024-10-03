<?php
namespace Geovanefss\LaravelApiMoloni\Http\Settings;

use Geovanefss\LaravelApiMoloni\Http\ApiAbstract;

class IdentificationTemplates extends ApiAbstract
{
    /**
     * Get Endpoint
     *
     * @param string $endpoint
     * @return string
     */
    public function getEndpoint(string $endpoint = ''): string
    {
        return 'identificationTemplates/' . $endpoint;
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
            'business_name' => ['required', 'string'],
            'email' => ['required', 'string', 'email'],
            'address' => ['required', 'string'],
            'city' => ['required', 'string'],
            'zip_code' => ['required', 'string'],
            'country_id' => ['required', 'numeric'],
            'phone' => ['string'],
            'fax' => ['string'],
            'website' => ['string', 'url'],
            'notes' => ['string'],
            'documents_footnote' => ['string'],
            'email_sender_name' => ['required', 'string'],
            'email_sender_address' => ['required', 'string']
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
            'template_id' => ['required', 'numeric'],
            'name' => ['required', 'string'],
            'business_name' => ['required', 'string'],
            'email' => ['required', 'string', 'email'],
            'address' => ['required', 'string'],
            'city' => ['required', 'string'],
            'zip_code' => ['required', 'string'],
            'country_id' => ['required', 'numeric'],
            'phone' => ['string'],
            'fax' => ['string'],
            'website' => ['string', 'url'],
            'notes' => ['string'],
            'documents_footnote' => ['string'],
            'email_sender_name' => ['required', 'string'],
            'email_sender_address' => ['required', 'string']
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
            'template_id' => ['required', 'numeric']
        ];

        $this->apiClient->validate($rules, $data);
        
        return $this->apiClient->postWithRetry($endpoint, $data);
    }
}