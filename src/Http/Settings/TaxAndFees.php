<?php
namespace Geovanefss\LaravelApiMoloni\Http\Settings;

use Geovanefss\LaravelApiMoloni\Http\ApiAbstract;

class TaxAndFees extends ApiAbstract
{
    /**
     * Get Endpoint
     *
     * @param string $endpoint
     * @return string
     */
    public function getEndpoint(string $endpoint = ''): string
    {
        return 'taxAndFees/' . $endpoint;
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
            'country_id' => ['numeric'],
            'fiscal_zone' => ['string'],
            'value' => ['float'],
            'type' => ['numeric'],
            'active_by_default' => ['boolean'],
            'with_invisible' => ['boolean']
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
            'value' => ['required', 'float'],
            'type' => ['required', 'numeric'],
            'saft_type' => ['required', 'numeric'],
            'vat_type' => ['required', 'string'],
            'stamp_tax' => ['required', 'string'],
            'exemption_reason' => ['required', 'string'],
            'fiscal_zone' => ['required', 'string'],
            'active_by_default' => ['required', 'boolean']
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
            'tax_id' => ['required', 'numeric'],
            'name' => ['required', 'string'],
            'value' => ['required', 'float'],
            'type' => ['required', 'numeric'],
            'saft_type' => ['required', 'numeric'],
            'vat_type' => ['required', 'string'],
            'stamp_tax' => ['required', 'string'],
            'exemption_reason' => ['required', 'string'],
            'fiscal_zone' => ['required', 'string'],
            'active_by_default' => ['required', 'boolean']
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
            'tax_id' => ['required', 'numeric']
        ];

        $this->apiClient->validate($rules, $data);
        
        return $this->apiClient->postWithRetry($endpoint, $data);
    }
}