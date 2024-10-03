<?php
namespace Geovanefss\LaravelApiMoloni\Http\Company;

use Geovanefss\LaravelApiMoloni\Http\ApiAbstract;

class Company extends ApiAbstract
{
    /**
     * Get Endpoint
     *
     * @param string $endpoint
     * @return string
     * @throws ValidationException|Exception
     */
    public function getEndpoint(string $endpoint = ''): string
    {
        return 'companies/' . $endpoint;
    }

    /**
     * Free Slug
     *
     * @param array $data
     * @return mixed
     * @throws ValidationException|Exception
     */
    public function freeSlug(array $data = [])
    {
        $endpoint = $this->getEndpoint('freeSlug/');
        
        $rules = [
            'slug' => ['required', 'string']
        ];

        $this->apiClient->validate($rules, $data);

        return $this->apiClient->postWithRetry($endpoint, $data);
    }

    /**
     * Get All
     *
     * @param array $data
     * @return mixed
     * @throws ValidationException|Exception
     */
    public function getAll(array $data = [])
    {
        $endpoint = $this->getEndpoint('getAll/');

        $rules = [];

        $this->apiClient->validate($rules, $data);

        return $this->apiClient->postWithRetry($endpoint, $data);
    }

    /**
     * Get One
     *
     * @param array $data
     * @return mixed
     * @throws ValidationException|Exception
     */
    public function getOne(array $data = [])
    {
        $endpoint = $this->getEndpoint('getOne/');

        $rules = [
            'company_id' => ['required', 'numeric']
        ];

        $this->apiClient->validate($rules, $data);

        return $this->apiClient->postWithRetry($endpoint, $data);
    }
}