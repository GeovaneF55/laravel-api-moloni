<?php
namespace Geovanefss\LaravelApiMoloni\Http\Settings;

use Geovanefss\LaravelApiMoloni\Http\ApiInterface;

class DocumentSets implements ApiInterface
{
    /**
     * Get Endpoint
     *
     * @param string $endpoint
     * @return string
     */
    public function getEndpoint(string $endpoint = ''): string
    {
        return 'documentSets/' . $endpoint;
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
     * countModifiedSince
     *
     * @return mixed
     */
    public function countModifiedSince()
    {
        $endpoint = $this->getEndpoint('countModifiedSince');
        // TODO
    }

    /**
     * getModifiedSince
     *
     * @return mixed
     */
    public function getModifiedSince()
    {
        $endpoint = $this->getEndpoint('getModifiedSince');
        // TODO
    }

    /**
     * aT Insert Code
     *
     * @return mixed
     */
    public function aTInsertCode()
    {
        $endpoint = $this->getEndpoint('aTInsertCode');
        // TODO
    }

    /**
     * aT Insert Code Bulk
     *
     * @return mixed
     */
    public function aTInsertCodeBulk()
    {
        $endpoint = $this->getEndpoint('aTInsertCodeBulk');
        // TODO
    }
}