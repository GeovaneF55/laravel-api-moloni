<?php
namespace Geovanefss\LaravelApiMoloni\Http\Documents;

use Geovanefss\LaravelApiMoloni\Http\ApiAbstract;

class BillsOfLanding extends ApiAbstract
{
    /**
     * Get Endpoint
     *
     * @param string $endpoint
     * @return string
     */
    public function getEndpoint(string $endpoint = ''): string
    {
        return 'billsOfLading/' . $endpoint;
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
            'customer_id' => ['numeric'],
            'document_set_id' => ['numeric'],
            'number' => ['numeric'],
            'date' => ['date'],
            'year' => ['numeric'],
            'your_reference' => ['string']
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
            'company_id' => ['required', 'numeric'],
            'qty' => ['numeric'],
            'offset' => ['numeric'],
            'customer_id' => ['numeric'],
            'document_set_id' => ['numeric'],
            'number' => ['numeric'],
            'date' => ['date'],
            'year' => ['numeric'],
            'your_reference' => ['string']
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
            'document_id' => ['numeric'],
            'customer_id' => ['numeric'],
            'document_set_id' => ['numeric'],
            'number' => ['numeric'],
            'date' => ['date'],
            'year' => ['numeric'],
            'your_reference' => ['string']
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
            'date' => ['required', 'date'],
            'document_set_id' => ['required', 'numeric'],
            'customer_id' => ['required', 'numeric'],
            'alternate_address_id' => ['numeric'],
            'your_reference' => ['string'],
            'our_reference' => ['string'],
            'associated_documents' => ['array'],
            'associated_documents.associated_id' => ['required', 'numeric'],
            'associated_documents.value' => ['required', 'float'],
            'related_documents_notes' => ['string'],
            'products' => ['required', 'array'],
            'products.product_id' => ['required', 'numeric'],
            'products.name' => ['required', 'string'],
            'products.summary' => ['required', 'string'],
            'products.qty' => ['required', 'float'],
            'products.price' => ['required', 'float'],
            'products.discount' => ['float'],
            'products.order' => ['numeric'],
            'products.exemption_reason' => ['string'],
            'products.taxes' => ['array'],
            'products.taxes.tax_id' => ['required', 'numeric'],
            'products.taxes.value' => ['float'],
            'products.taxes.order' => ['numeric'],
            'products.taxes.cumulative' => ['numeric'],
            'products.child_products' => ['array'],
            'products.child_products.product_id' => ['required', 'numeric'],
            'products.child_products.name' => ['required', 'string'],
            'products.child_products.summary' => ['required', 'string'],
            'products.child_products.qty' => ['required', 'float'],
            'products.child_products.price' => ['required', 'float'],
            'products.child_products.discount' => ['float'],
            'products.child_products.deduction_id' => ['numeric'],
            'products.child_products.order' => ['numeric'],
            'products.child_products.origin_id' => ['numeric'],
            'products.child_products.exemption_reason' => ['string'],
            'products.child_products.warehouse_id' => ['numeric'],
            'products.child_products.properties' => ['array'],
            'products.child_products.properties.title' => ['string'],
            'products.child_products.properties.value' => ['string'],
            'products.child_products.taxes' => ['array'],
            'products.child_products.taxes.tax_id' => ['required', 'numeric'],
            'products.child_products.taxes.value' => ['float'],
            'products.child_products.taxes.order' => ['numeric'],
            'products.child_products.taxes.cumulative' => ['numeric'],
            'exchange_currency_id' => ['numeric'],
            'exchange_rate' => ['float'],
            'delivery_method_id' => ['numeric'],
            'delivery_datetime' => ['required', 'date'],
            'delivery_departure_address' => ['string'],
            'delivery_departure_city' => ['string'],
            'delivery_departure_zip_code' => ['string'],
            'delivery_departure_country' => ['numeric'],
            'delivery_destination_address' => ['string'],
            'delivery_destination_city' => ['string'],
            'delivery_destination_zip_code' => ['string'],
            'delivery_destination_country' => ['numeric'],
            'vehicle_id' => ['numeric'],
            'vehicle_name' => ['string'],
            'vehicle_number_plate' => ['string'],
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
     */
    public function update(array $data)
    {
        $endpoint = $this->getEndpoint('update/');

        $rules = [
            'company_id' => ['required', 'numeric'],
            'document_id' => ['required', 'numeric'],
            'date' => ['required', 'date'],
            'document_set_id' => ['required', 'numeric'],
            'customer_id' => ['required', 'numeric'],
            'alternate_address_id' => ['numeric'],
            'your_reference' => ['string'],
            'our_reference' => ['string'],
            'associated_documents' => ['array'],
            'associated_documents.associated_id' => ['required', 'numeric'],
            'associated_documents.value' => ['required', 'float'],
            'related_documents_notes' => ['string'],
            'products' => ['required', 'array'],
            'products.product_id' => ['required', 'numeric'],
            'products.name' => ['required', 'string'],
            'products.summary' => ['required', 'string'],
            'products.qty' => ['required', 'float'],
            'products.price' => ['required', 'float'],
            'products.discount' => ['float'],
            'products.order' => ['numeric'],
            'products.exemption_reason' => ['string'],
            'products.taxes' => ['array'],
            'products.taxes.tax_id' => ['required', 'numeric'],
            'products.taxes.value' => ['float'],
            'products.taxes.order' => ['numeric'],
            'products.taxes.cumulative' => ['numeric'],
            'products.child_products' => ['array'],
            'products.child_products.product_id' => ['required', 'numeric'],
            'products.child_products.name' => ['required', 'string'],
            'products.child_products.summary' => ['required', 'string'],
            'products.child_products.qty' => ['required', 'float'],
            'products.child_products.price' => ['required', 'float'],
            'products.child_products.discount' => ['float'],
            'products.child_products.deduction_id' => ['numeric'],
            'products.child_products.order' => ['numeric'],
            'products.child_products.origin_id' => ['numeric'],
            'products.child_products.exemption_reason' => ['string'],
            'products.child_products.warehouse_id' => ['numeric'],
            'products.child_products.properties' => ['array'],
            'products.child_products.properties.title' => ['string'],
            'products.child_products.properties.value' => ['string'],
            'products.child_products.taxes' => ['array'],
            'products.child_products.taxes.tax_id' => ['required', 'numeric'],
            'products.child_products.taxes.value' => ['float'],
            'products.child_products.taxes.order' => ['numeric'],
            'products.child_products.taxes.cumulative' => ['numeric'],
            'exchange_currency_id' => ['numeric'],
            'exchange_rate' => ['float'],
            'delivery_method_id' => ['numeric'],
            'delivery_datetime' => ['required', 'date'],
            'delivery_departure_address' => ['string'],
            'delivery_departure_city' => ['string'],
            'delivery_departure_zip_code' => ['string'],
            'delivery_departure_country' => ['numeric'],
            'delivery_destination_address' => ['string'],
            'delivery_destination_city' => ['string'],
            'delivery_destination_zip_code' => ['string'],
            'delivery_destination_country' => ['numeric'],
            'vehicle_id' => ['numeric'],
            'vehicle_name' => ['string'],
            'vehicle_number_plate' => ['string'],
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
     */
    public function delete(array $data)
    {
        $endpoint = $this->getEndpoint('delete/');

        $rules = [
            'company_id' => ['required', 'numeric'],
            'document_id' => ['required', 'numeric']
        ];

        $this->apiClient->validate($rules, $data);

        return $this->apiClient->postWithRetry($endpoint, $data);
    }

    /**
     * Set Transport Code
     *
     * @param array $data
     * @return mixed
     */
    public function setTransportCode(array $data)
    {
        $endpoint = $this->getEndpoint('setTransportCode/');
        
        $rules = [
            'company_id' => ['required', 'numeric'],
            'document_id' => ['required', 'numeric'],
            'transport_code' => ['required', 'string']
        ];

        $this->apiClient->validate($rules, $data);

        return $this->apiClient->postWithRetry($endpoint, $data);
    }
}