<?php
namespace Geovanefss\LaravelApiMoloni\Http;

abstract class ApiAbstract
{
    /**
     * Base Url
     *
     * @var string
     */
    protected $baseUrl;

    /**
     * Constructor
     * 
     * @param $apiVersion
     */
    public function __construct($apiVersion = 'v1')
    {
        $this->baseUrl = 'https://api.moloni.pt/' . $apiVersion . '/';
    }

    /**
     * Get Base URL
     *
     * @param string $endpoint
     * @return string
     */
    protected function getBaseUrl(string $endpoint = '')
    {
        return $this->baseUrl . $endpoint;
    }

    /**
     * Get URL
     *
     * @param string $endpoint
     * @return string
     */
    abstract public function getUrl(string $endpoint = '');
}