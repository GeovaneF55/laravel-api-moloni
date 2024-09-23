<?php
use PHPUnit\Framework\TestCase;
use Geovanefss\LaravelApiMoloni\Http\ApiClient;

class ApiClientTest extends TestCase
{
    /**
     * Test Public Endpoint Without Token
     *
     * @return void
     */
    public function testPublicEndpointWithoutToken()
    {
        $apiClient = new ApiClient('https://api.moloni.pt/v1');
        $response = $apiClient->get('/authorize', [
            'response_type' => 'code',
            'client_id' => '{{developer_id}}',
            'redirect_uri' => '{{redirect_uri}}'
        ], false);
        $this->assertIsArray($response);
    }

    /**
     * Test Private Endpoint With Token
     *
     * @return void
     */
    public function testPrivateEndpointWithToken()
    {
        $apiClient = new ApiClient('https://api.moloni.pt/v1', 'test-token');
        $response = $apiClient->get('/users/getMe', [], true);
        $this->assertArrayHasKey('data', $response);  // Check that the token worked
    }
}
