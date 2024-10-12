<?php
namespace Geovanefss\LaravelApiMoloni\Http\Auth;

use Geovanefss\LaravelApiMoloni\Http\Abstracts\AuthApiAbstract;

class Authorize extends AuthApiAbstract
{
    /**
     * Get Endpoint
     *
     * @return string
     */
    public function getEndpoint(): string
    {
        return 'authorize';
    }

    /**
     * Authorize
     *
     * @param array $query
     * @return mixed
     * @throws ValidationException|Exception
     */
    public function authorize(array $query)
    {
        $endpoint = $this->getEndpoint();

        $rules = [
            'response_type' => ['required', 'string', 'enum:code'],
            'client_id' => ['required', 'string'],
            'redirect_uri' => ['required', 'string', 'url']
        ];

        $this->httpClient->validate($rules, $query);

        return $this->httpClient->post($endpoint, [], $query);
    }
}