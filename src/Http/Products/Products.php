<?php
namespace Geovanefss\LaravelApiMoloni\Http\Products;

use Geovanefss\LaravelApiMoloni\Http\ApiAbstract;

class Products extends ApiAbstract
{
    /**
     * Get Endpoint
     *
     * @param string $endpoint
     * @return string
     */
    public function getEndpoint(string $endpoint = ''): string
    {
        return 'products/' . $endpoint;
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
            'company_id' => ['required', 'numeric'],
            'category_id' => ['required', 'numeric']
        ];

        $this->apiClient->validate($rules, $data);
        
        return $this->apiClient->postWithRetry($endpoint);
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
            'category_id' => ['required', 'numeric'],
            'qty' => ['numeric'],
            'offset' => ['numeric'],
            'with_invisible' => ['numeric']
        ];

        $this->apiClient->validate($rules, $data);
        
        return $this->apiClient->postWithRetry($endpoint);
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
            'category_id' => ['required', 'numeric'],
            'with_invisible' => ['numeric']
        ];

        $this->apiClient->validate($rules, $data);
        
        return $this->apiClient->postWithRetry($endpoint);
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
            'search' => ['required', 'string']
        ];

        $this->apiClient->validate($rules, $data);
        
        return $this->apiClient->postWithRetry($endpoint);
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
            'qty' => ['numeric'],
            'offset' => ['numeric']
        ];

        $this->apiClient->validate($rules, $data);
        
        return $this->apiClient->postWithRetry($endpoint);
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
            'name' => ['required', 'string']
        ];

        $this->apiClient->validate($rules, $data);
        
        return $this->apiClient->postWithRetry($endpoint);
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
            'qty' => ['numeric'],
            'offset' => ['numeric']
        ];

        $this->apiClient->validate($rules, $data);
        
        return $this->apiClient->postWithRetry($endpoint);
    }

    /**
     * Count By Reference
     *
     * @param array $data
     * @return mixed
     */
    public function countByReference(array $data)
    {
        $endpoint = $this->getEndpoint('countByReference/');
        
        $rules = [
            'company_id' => ['required', 'numeric'],
            'reference' => ['required', 'string']
        ];

        $this->apiClient->validate($rules, $data);
        
        return $this->apiClient->postWithRetry($endpoint);
    }

    /**
     * Get By Reference
     *
     * @param array $data
     * @return mixed
     */
    public function getByReference(array $data)
    {
        $endpoint = $this->getEndpoint('getByReference/');
        
        $rules = [
            'company_id' => ['required', 'numeric'],
            'reference' => ['required', 'string'],
            'qty' => ['numeric'],
            'offset' => ['numeric']
        ];

        $this->apiClient->validate($rules, $data);
        
        return $this->apiClient->postWithRetry($endpoint);
    }

    /**
     * Count By EAN
     *
     * @param array $data
     * @return mixed
     */
    public function countByEAN(array $data)
    {
        $endpoint = $this->getEndpoint('countByEAN/');
        
        $rules = [
            'company_id' => ['required', 'numeric'],
            'ean' => ['required', 'string']
        ];

        $this->apiClient->validate($rules, $data);
        
        return $this->apiClient->postWithRetry($endpoint);
    }

    /**
     * Get By EAN
     *
     * @param array $data
     * @return mixed
     */
    public function getByEAN(array $data)
    {
        $endpoint = $this->getEndpoint('getByEAN/');
        
        $rules = [
            'company_id' => ['required', 'numeric'],
            'ean' => ['required', 'string'],
            'qty' => ['numeric'],
            'offset' => ['numeric']
        ];

        $this->apiClient->validate($rules, $data);
        
        return $this->apiClient->postWithRetry($endpoint);
    }

    /**
     * Count Modified Since
     *
     * @param array $data
     * @return mixed
     */
    public function countModifiedSince(array $data)
    {
        $endpoint = $this->getEndpoint('countModifiedSince/');
        
        $rules = [
            'company_id' => ['required', 'numeric'],
            'lastmodified' => ['required', 'date']
        ];

        $this->apiClient->validate($rules, $data);
        
        return $this->apiClient->postWithRetry($endpoint);
    }

    /**
     * Get Modified Since
     *
     * @param array $data
     * @return mixed
     */
    public function getModifiedSince(array $data)
    {
        $endpoint = $this->getEndpoint('getModifiedSince/');
        
        $rules = [
            'company_id' => ['required', 'numeric'],
            'lastmodified' => ['required', 'date'],
            'qty' => ['numeric'],
            'offset' => ['numeric']
        ];

        $this->apiClient->validate($rules, $data);
        
        return $this->apiClient->postWithRetry($endpoint);
    }

    /**
     * Get Last Cost Price
     *
     * @param array $data
     * @return mixed
     */
    public function getLastCostPrice(array $data)
    {
        $endpoint = $this->getEndpoint('getLastCostPrice/');
        
        $rules = [
            'company_id' => ['required', 'numeric'],
            'product_id' => ['required', 'numeric'],
            'supplier_id' => ['numeric']
        ];

        $this->apiClient->validate($rules, $data);
        
        return $this->apiClient->postWithRetry($endpoint);
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
            'category_id' => ['required', 'numeric'],
            'type' => ['required', 'numeric'],
            'name' => ['required', 'string'],
            'summary' => ['string'],
            'reference' => ['string'],
            'ean' => ['string'],
            'price' => ['required', 'float'],
            'unit_id' => ['required', 'numeric'],
            'has_stock' => ['required', 'boolean'],
            'stock' => ['required', 'float'],
            'minimum_stock' => ['float'],
            'pos_favorite' => ['numeric'],
            'at_product_category' => ['string'],
            'exemption_reason' => ['string'],
            'taxes' => ['array'],
            'taxes.tax_id' => ['required', 'numeric'],
            'taxes.value' => ['required', 'float'],
            'taxes.order' => ['required', 'numeric'],
            'taxes.cumulative' => ['required', 'numeric'],
            'suppliers' => ['array'],
            'suppliers.supplier_id' => ['required', 'numeric'],
            'suppliers.cost_price' => ['required', 'float'],
            'suppliers.reference' => ['numeric'],
            'properties' => ['array'],
            'properties.property_id' => ['required', 'numeric'],
            'properties.value' => ['required', 'string'],
            'warehouses' => ['array'],
            'warehouses.warehouse_id' => ['required', 'numeric'],
            'warehouses.stock' => ['required', 'float']
        ];

        $this->apiClient->validate($rules, $data);
        
        return $this->apiClient->postWithRetry($endpoint);
    }

    /**
     * Update
     *
     * @param array $data
     * @return mixed
     */
    public function update(array $data)
    {
        $endpoint = $this->getEndpoint('update/');
        
        $rules = [
            'company_id' => ['required', 'numeric'],
            'product_id' => ['required', 'numeric'],
            'category_id' => ['required', 'numeric'],
            'type' => ['required', 'numeric'],
            'name' => ['required', 'string'],
            'summary' => ['string'],
            'reference' => ['string'],
            'ean' => ['string'],
            'price' => ['required', 'float'],
            'unit_id' => ['required', 'numeric'],
            'has_stock' => ['required', 'boolean'],
            'stock' => ['required', 'float'],
            'minimum_stock' => ['float'],
            'pos_favorite' => ['numeric'],
            'at_product_category' => ['string'],
            'exemption_reason' => ['string'],
            'taxes' => ['array'],
            'taxes.tax_id' => ['required', 'numeric'],
            'taxes.value' => ['required', 'float'],
            'taxes.order' => ['required', 'numeric'],
            'taxes.cumulative' => ['required', 'numeric'],
            'suppliers' => ['array'],
            'suppliers.supplier_id' => ['required', 'numeric'],
            'suppliers.cost_price' => ['required', 'float'],
            'suppliers.reference' => ['numeric'],
            'properties' => ['array'],
            'properties.property_id' => ['required', 'numeric'],
            'properties.value' => ['required', 'string'],
            'warehouses' => ['array'],
            'warehouses.warehouse_id' => ['required', 'numeric'],
            'warehouses.stock' => ['required', 'float']
        ];

        $this->apiClient->validate($rules, $data);
        
        return $this->apiClient->postWithRetry($endpoint);
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
            'product_id' => ['required', 'numeric']
        ];

        $this->apiClient->validate($rules, $data);
        
        return $this->apiClient->postWithRetry($endpoint);
    }

    /**
     * Get Next Reference
     *
     * @param array $data
     * @return mixed
     */
    public function getNextReference(array $data)
    {
        $endpoint = $this->getEndpoint('getNextReference/');
        
        $rules = [
            'company_id' => ['required', 'numeric']
        ];

        $this->apiClient->validate($rules, $data);
        
        return $this->apiClient->postWithRetry($endpoint);
    }
}