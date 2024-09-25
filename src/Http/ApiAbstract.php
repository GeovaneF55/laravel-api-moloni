<?php
namespace Geovanefss\LaravelApiMoloni\Http;

abstract class ApiAbstract
{
    protected $apiClient;

    /**
     * Constructor
     */
    public function __construct(ApiClient $apiClient)
    {
        $this->apiClient = $apiClient;
    }

    /**
     * Get Endpoint
     *
     * @param string $endpoint
     * @return string
     */
    abstract public function getEndpoint(string $endpoint = ''): string;
}