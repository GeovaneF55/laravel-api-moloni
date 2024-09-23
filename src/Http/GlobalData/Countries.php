<?php
namespace Geovanefss\LaravelApiMoloni\Http\GlobalData;

use Geovanefss\LaravelApiMoloni\Http\ApiAbstract;

class Countries extends ApiAbstract
{
    /**
     * Get URL
     *
     * @param string $endpoint
     * @return string
     */
    public function getUrl(string $endpoint = '')
    {
        return parent::getBaseUrl('countries/' . $endpoint);
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
}