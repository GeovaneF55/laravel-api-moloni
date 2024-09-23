<?php
namespace Geovanefss\LaravelApiMoloni\Http\Entities;

use Geovanefss\LaravelApiMoloni\Http\ApiAbstract;

class Suppliers extends ApiAbstract
{
    /**
     * Get URL
     *
     * @param string $endpoint
     * @return string
     */
    public function getUrl(string $endpoint = '')
    {
        return parent::getBaseUrl('suppliers/' . $endpoint);
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