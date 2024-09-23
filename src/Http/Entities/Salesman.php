<?php
namespace Geovanefss\LaravelApiMoloni\Http\Entities;

use Geovanefss\LaravelApiMoloni\Http\ApiAbstract;

class Salesman extends ApiAbstract
{
    /**
     * Get URL
     *
     * @param string $endpoint
     * @return string
     */
    public function getUrl(string $endpoint = '')
    {
        return parent::getBaseUrl('salesman/' . $endpoint);
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
     * Get By Vat
     *
     * @return mixed
     */
    public function getByVat()
    {
        $url = $this->getUrl('getByVat');
        // TODO
    }

    /**
     * Get By Number
     *
     * @return mixed
     */
    public function getByNumber()
    {
        $url = $this->getUrl('getByNumber');
        // TODO
    }

    /**
     * Get By Email
     *
     * @return mixed
     */
    public function getByEmail()
    {
        $url = $this->getUrl('getByEmail');
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
     * Get By Next Number
     *
     * @return mixed
     */
    public function getNextNumber()
    {
        $url = $this->getUrl('getNextNumber');
        // TODO
    }

    /**
     * Get By Last Number
     *
     * @return mixed
     */
    public function getLastNumber()
    {
        $url = $this->getUrl('getLastNumber');
        // TODO
    }

    /**
     * Get By Modified Since
     *
     * @return mixed
     */
    public function getModifiedSince()
    {
        $url = $this->getUrl('getModifiedSince');
        // TODO
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
     * Count By Vat
     *
     * @return mixed
     */
    public function countByVat()
    {
        $url = $this->getUrl('countByVat');
        // TODO
    }

    /**
     * Count By Number
     *
     * @return mixed
     */
    public function countByNumber()
    {
        $url = $this->getUrl('countByNumber');
        // TODO
    }

    /**
     * Count By Email
     *
     * @return mixed
     */
    public function countByEmail()
    {
        $url = $this->getUrl('countByEmail');
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
     * update
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
}