<?php
namespace Geovanefss\LaravelApiMoloni\Http\Settings;

use Geovanefss\LaravelApiMoloni\Http\ApiAbstract;

class DocumentSets extends ApiAbstract
{
    /**
     * Get URL
     *
     * @param string $endpoint
     * @return string
     */
    public function getUrl(string $endpoint = '')
    {
        return parent::getBaseUrl('documentSets/' . $endpoint);
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
     * countModifiedSince
     *
     * @return mixed
     */
    public function countModifiedSince()
    {
        $url = $this->getUrl('countModifiedSince');
        // TODO
    }

    /**
     * getModifiedSince
     *
     * @return mixed
     */
    public function getModifiedSince()
    {
        $url = $this->getUrl('getModifiedSince');
        // TODO
    }

    /**
     * aT Insert Code
     *
     * @return mixed
     */
    public function aTInsertCode()
    {
        $url = $this->getUrl('aTInsertCode');
        // TODO
    }

    /**
     * aT Insert Code Bulk
     *
     * @return mixed
     */
    public function aTInsertCodeBulk()
    {
        $url = $this->getUrl('aTInsertCodeBulk');
        // TODO
    }
}