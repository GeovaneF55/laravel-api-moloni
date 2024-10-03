<?php
namespace Geovanefss\LaravelApiMoloni\Http\Products;

use Geovanefss\LaravelApiMoloni\Http\ApiAbstract;

class ProductStocks extends ApiAbstract
{
    /**
     * Get Endpoint
     *
     * @param string $endpoint
     * @return string
     */
    public function getEndpoint(string $endpoint = ''): string
    {
        return 'productStocks/' . $endpoint;
    }

    /**
     * Get All
     *
     * @return mixed
     * @throws ValidationException|Exception
     */
    public function getAll(array $data = [])
    {
        $endpoint = $this->getEndpoint('getAll/');
        
        $rules = [
            'company_id' => ['required', 'numeric'],
            'product_id' => ['numeric'],
            'movement_date' => ['date'],
            'warehouse_id' => ['numeric'],
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
            'product_id' => ['required', 'numeric'],
            'movement_date' => ['required', 'date'],
            'qty' => ['required', 'numeric'],
            'warehouse_id' => ['numeric'],
            'notes' => ['string']
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
            'product_stock_id' => ['required', 'numeric'],
            'product_id' => ['required', 'numeric'],
            'movement_date' => ['required', 'date'],
            'qty' => ['required', 'numeric'],
            'warehouse_id' => ['numeric'],
            'notes' => ['string']
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
            'product_stock_id' => ['required', 'numeric']
        ];

        $this->apiClient->validate($rules, $data);
        
        return $this->apiClient->postWithRetry($endpoint, $data);
    }

    /**
     * Move To Warehouse
     *
     * @param array $data
     * @return mixed
     * @throws ValidationException|Exception
     */
    public function moveToWarehouse(array $data = [])
    {
        $endpoint = $this->getEndpoint('moveToWarehouse/');
        
        $rules = [
            'company_id' => ['required', 'numeric'],
            'product_stock_id' => ['required', 'numeric'],
            'product_id' => ['required', 'numeric'],
            'movement_date' => ['required', 'date'],
            'qty' => ['required', 'numeric'],
            'from_warehouse_id' => ['required', 'numeric'],
            'to_warehouse_id' => ['required', 'numeric'],
            'notes' => ['string']
        ];

        $this->apiClient->validate($rules, $data);
        
        return $this->apiClient->postWithRetry($endpoint, $data);
    }
}