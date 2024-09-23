<?php
namespace Geovanefss\LaravelApiMoloni\Http\Products;

use Geovanefss\LaravelApiMoloni\Http\ApiAbstract;

class ProductStocks extends ApiAbstract
{
    /**
     * Get URL
     *
     * @param string $endpoint
     * @return string
     */
    public function getUrl(string $endpoint = '')
    {
        return parent::getBaseUrl('productStocks/' . $endpoint);
    }

    /**
     * Get All
     *
     * @return mixed
     */
    public function getAll()
    {
        $url = $this->getUrl('getAll');
        // TODO
    }

    /**
     * Insert
     *
     * @return mixed
     */
    public function insert()
    {
        $url = $this->getUrl('insert');
        // TODO
    }

    /**
     * Update
     *
     * @return mixed
     */
    public function update()
    {
        $url = $this->getUrl('update');
        // TODO
    }

    /**
     * Delete
     *
     * @return mixed
     */
    public function delete()
    {
        $url = $this->getUrl('delete');
        // TODO
    }

    /**
     * Move To Warehouse
     *
     * @return mixed
     */
    public function moveToWarehouse()
    {
        $url = $this->getUrl('moveToWarehouse');
        // TODO
    }
}