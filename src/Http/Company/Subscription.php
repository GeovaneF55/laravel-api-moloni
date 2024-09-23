<?php
namespace Geovanefss\LaravelApiMoloni\Http\Company;

use Geovanefss\LaravelApiMoloni\Http\ApiAbstract;

class Subscription extends ApiAbstract
{
    /**
     * Get URL
     *
     * @param string $endpoint
     * @return string
     */
    public function getUrl(string $endpoint = '')
    {
        return parent::getBaseUrl('subscription/' . $endpoint);
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
}