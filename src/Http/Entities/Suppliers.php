<?php
namespace Geovanefss\LaravelApiMoloni\Http\Entities;

use Geovanefss\LaravelApiMoloni\Http\ApiAbstract;

class Suppliers extends ApiAbstract
{
    /**
     * Get Endpoint
     *
     * @param string $endpoint
     * @return string
     */
    public function getEndpoint(string $endpoint = ''): string
    {
        return 'suppliers/' . $endpoint;
    }

    /**
     * Count
     *
     * @return mixed
     */
    public function count()
    {
        $endpoint = $this->getEndpoint('count');
        // TODO
    }

    /**
     * Get All
     *
     * @return mixed
     */
    public function getAll()
    {
        $endpoint = $this->getEndpoint('getAll');
        // TODO
    }

    /**
     * Get One
     *
     * @return mixed
     */
    public function getOne()
    {
        $endpoint = $this->getEndpoint('getOne');
        // TODO
    }

    /**
     * Count By Search
     *
     * @return mixed
     */
    public function countBySearch()
    {
        $endpoint = $this->getEndpoint('countBySearch');
        // TODO
    }

    /**
     * Get By Search
     *
     * @return mixed
     */
    public function getBySearch()
    {
        $endpoint = $this->getEndpoint('getBySearch');
        // TODO
    }

    /**
     * Count By Vat
     *
     * @return mixed
     */
    public function countByVat()
    {
        $endpoint = $this->getEndpoint('countByVat');
        // TODO
    }

    /**
     * Get By Vat
     *
     * @return mixed
     */
    public function getByVat()
    {
        $endpoint = $this->getEndpoint('getByVat');
        // TODO
    }

    /**
     * Count By Number
     *
     * @return mixed
     */
    public function countByNumber()
    {
        $endpoint = $this->getEndpoint('countByNumber');
        // TODO
    }

    /**
     * Get By Number
     *
     * @return mixed
     */
    public function getByNumber()
    {
        $endpoint = $this->getEndpoint('getByNumber');
        // TODO
    }

    /**
     * Get By Email
     *
     * @return mixed
     */
    public function getByEmail()
    {
        $endpoint = $this->getEndpoint('getByEmail');
        // TODO
    }

    /**
     * Count By Name
     *
     * @return mixed
     */
    public function countByName()
    {
        $endpoint = $this->getEndpoint('countByName');
        // TODO
    }

    /**
     * Get By Name
     *
     * @return mixed
     */
    public function getByName()
    {
        $endpoint = $this->getEndpoint('getByName');
        // TODO
    }

    /**
     * Insert
     *
     * @return mixed
     */
    public function insert()
    {
        $endpoint = $this->getEndpoint('insert');
        // TODO
    }

    /**
     * update
     *
     * @return mixed
     */
    public function update()
    {
        $endpoint = $this->getEndpoint('update');
        // TODO
    }

    /**
     * Delete
     *
     * @return mixed
     */
    public function delete()
    {
        $endpoint = $this->getEndpoint('delete');
        // TODO
    }
}