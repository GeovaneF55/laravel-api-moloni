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
     * @return mixed
     */
    public function count()
    {
        $endpoint = $this->getEndpoint('count/');
        // TODO
    }

    /**
     * Get All
     *
     * @return mixed
     */
    public function getAll()
    {
        $endpoint = $this->getEndpoint('getAll/');
        // TODO
    }

    /**
     * Get One
     *
     * @return mixed
     */
    public function getOne()
    {
        $endpoint = $this->getEndpoint('getOne/');
        // TODO
    }

    /**
     * Count By Search
     *
     * @return mixed
     */
    public function countBySearch()
    {
        $endpoint = $this->getEndpoint('countBySearch/');
        // TODO
    }

    /**
     * Get By Search
     *
     * @return mixed
     */
    public function getBySearch()
    {
        $endpoint = $this->getEndpoint('getBySearch/');
        // TODO
    }

    /**
     * Count By Name
     *
     * @return mixed
     */
    public function countByName()
    {
        $endpoint = $this->getEndpoint('countByName/');
        // TODO
    }

    /**
     * Get By Name
     *
     * @return mixed
     */
    public function getByName()
    {
        $endpoint = $this->getEndpoint('getByName/');
        // TODO
    }

    /**
     * Count By Reference
     *
     * @return mixed
     */
    public function countByReference()
    {
        $endpoint = $this->getEndpoint('countByReference/');
        // TODO
    }

    /**
     * Get By Reference
     *
     * @return mixed
     */
    public function getByReference()
    {
        $endpoint = $this->getEndpoint('getByReference/');
        // TODO
    }

    /**
     * Count By EAN
     *
     * @return mixed
     */
    public function countByEAN()
    {
        $endpoint = $this->getEndpoint('countByEAN/');
        // TODO
    }

    /**
     * Get By EAN
     *
     * @return mixed
     */
    public function getByEAN()
    {
        $endpoint = $this->getEndpoint('getByEAN/');
        // TODO
    }

    /**
     * Count Modified Since
     *
     * @return mixed
     */
    public function countModifiedSince()
    {
        $endpoint = $this->getEndpoint('countModifiedSince/');
        // TODO
    }

    /**
     * Get Modified Since
     *
     * @return mixed
     */
    public function getModifiedSince()
    {
        $endpoint = $this->getEndpoint('getModifiedSince/');
        // TODO
    }

    /**
     * Get Last Cost Price
     *
     * @return mixed
     */
    public function getLastCostPrice()
    {
        $endpoint = $this->getEndpoint('getLastCostPrice/');
        // TODO
    }

    /**
     * Insert
     *
     * @return mixed
     */
    public function insert()
    {
        $endpoint = $this->getEndpoint('insert/');
        // TODO
    }

    /**
     * Update
     *
     * @return mixed
     */
    public function update()
    {
        $endpoint = $this->getEndpoint('update/');
        // TODO
    }

    /**
     * Delete
     *
     * @return mixed
     */
    public function delete()
    {
        $endpoint = $this->getEndpoint('delete/');
        // TODO
    }

    /**
     * Get Next Reference
     *
     * @return mixed
     */
    public function getNextReference()
    {
        $endpoint = $this->getEndpoint('getNextReference/');
        // TODO
    }
}