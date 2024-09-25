<?php
namespace Geovanefss\LaravelApiMoloni\Http;

interface ApiInterface
{
    /**
     * Get Endpoint
     *
     * @param string $endpoint
     * @return string
     */
    public function getEndpoint(string $endpoint = ''): string;
}