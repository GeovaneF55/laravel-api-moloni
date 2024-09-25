<?php
namespace Geovanefss\LaravelApiMoloni\Http\Documents;

use Geovanefss\LaravelApiMoloni\Http\ApiInterface;

class SimplifiedInvoices implements ApiInterface
{
    /**
     * Get Endpoint
     *
     * @param string $endpoint
     * @return string
     */
    public function getEndpoint(string $endpoint = ''): string
    {
        return 'simplifiedInvoices/' . $endpoint;
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
     * Update
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

    /**
     * Generate MB Reference
     *
     * @return mixed
     */
    public function generateMBReference()
    {
        $endpoint = $this->getEndpoint('generateMBReference');
        // TODO
    }
}