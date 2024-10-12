<?php
namespace Geovanefss\LaravelApiMoloni\Http\Abstracts;

use Geovanefss\LaravelApiMoloni\Http\HttpClient;

abstract class AuthApiAbstract
{
    /**
     * Http Client
     *
     * @var HttpClient $httpClient
     */
    protected $httpClient;

    /**
     * Constructor
     */
    public function __construct(HttpClient $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    /**
     * Get Endpoint
     *
     * @return string
     */
    abstract public function getEndpoint(): string;
}