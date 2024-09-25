<?php
namespace Geovanefss\LaravelApiMoloni\Exceptions;

use Exception;
use GuzzleHttp\Psr7\Response;

class ApiException extends Exception
{
    /**
     * Response
     *
     * @var Response
     */
    protected $response;

    /**
     * Constructor
     *
     * @param Response $response
     * @param integer $code
     */
    public function __construct(Response $response, int $code = 400)
    {
        $this->response = $response;
        parent::__construct("Api failed", $code);
    }

    /**
     * to String
     *
     * @return string
     */
    public function toString(): string
    {
        $bodyContents = json_decode($this->response->getBody()->getContents(), true);

        return json_encode([
            'status_code' => $this->response->getStatusCode(),
            'reason_phrase' => $this->response->getReasonPhrase(),
            'headers' => $this->response->getHeaders(),
            'body' => $bodyContents 
        ], JSON_PRETTY_PRINT);
    }
}
