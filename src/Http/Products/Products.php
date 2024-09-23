<?php
namespace Geovanefss\LaravelApiMoloni\Http\Products;

use Geovanefss\LaravelApiMoloni\Http\ApiAbstract;

class Products extends ApiAbstract
{
    /**
     * Get URL
     *
     * @param string $endpoint
     * @return string
     */
    public function getUrl(string $endpoint = '')
    {
        return parent::getBaseUrl('products/' . $endpoint);
    }

    /**
     * Count
     *
     * @return mixed
     */
    public function count()
    {
        $url = $this->getUrl('count');
        // TODO
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
     * Get One
     *
     * @return mixed
     */
    public function getOne()
    {
        $url = $this->getUrl('getOne');
        // TODO
    }

    /**
     * Count By Search
     *
     * @return mixed
     */
    public function countBySearch()
    {
        $url = $this->getUrl('countBySearch');
        // TODO
    }

    /**
     * Get By Search
     *
     * @return mixed
     */
    public function getBySearch()
    {
        $url = $this->getUrl('getBySearch');
        // TODO
    }

    /**
     * Count By Name
     *
     * @return mixed
     */
    public function countByName()
    {
        $url = $this->getUrl('countByName');
        // TODO
    }

    /**
     * Get By Name
     *
     * @return mixed
     */
    public function getByName()
    {
        $url = $this->getUrl('getByName');
        // TODO
    }

    /**
     * Count By Reference
     *
     * @return mixed
     */
    public function countByReference()
    {
        $url = $this->getUrl('countByReference');
        // TODO
    }

    /**
     * Get By Reference
     *
     * @return mixed
     */
    public function getByReference()
    {
        $url = $this->getUrl('getByReference');
        // TODO
    }

    /**
     * Count By EAN
     *
     * @return mixed
     */
    public function countByEAN()
    {
        $url = $this->getUrl('countByEAN');
        // TODO
    }

    /**
     * Get By EAN
     *
     * @return mixed
     */
    public function getByEAN()
    {
        $url = $this->getUrl('getByEAN');
        // TODO
    }

    /**
     * Count Modified Since
     *
     * @return mixed
     */
    public function countModifiedSince()
    {
        $url = $this->getUrl('countModifiedSince');
        // TODO
    }

    /**
     * Get Modified Since
     *
     * @return mixed
     */
    public function getModifiedSince()
    {
        $url = $this->getUrl('getModifiedSince');
        // TODO
    }

    /**
     * Get Last Cost Price
     *
     * @return mixed
     */
    public function getLastCostPrice()
    {
        $url = $this->getUrl('getLastCostPrice');
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
     * Get Next Reference
     *
     * @return mixed
     */
    public function getNextReference()
    {
        $url = $this->getUrl('getNextReference');
        // TODO
    }
}