<?php
namespace Geovanefss\LaravelApiMoloni\Http\Documents;

use Geovanefss\LaravelApiMoloni\Http\ApiAbstract;

class OwnAssetsMovementGuides extends ApiAbstract
{
    /**
     * Get URL
     *
     * @param string $endpoint
     * @return string
     */
    public function getUrl(string $endpoint = '')
    {
        return parent::getBaseUrl('ownAssetsMovementGuides/' . $endpoint);
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
     * Set Transport Code
     *
     * @return mixed
     */
    public function setTransportCode()
    {
        $url = $this->getUrl('setTransportCode');
        // TODO
    }
}