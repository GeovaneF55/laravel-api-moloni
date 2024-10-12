<?php
namespace Geovanefss\LaravelApiMoloni\Http\Abstracts;

use Geovanefss\LaravelApiMoloni\Http\ApiClient;

abstract class ApiAbstract
{
    /**
     * Api Client
     *
     * @var ApiClient $apiClient
     */
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