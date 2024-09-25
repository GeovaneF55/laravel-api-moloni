<?php
namespace Geovanefss\LaravelApiMoloni\Exceptions;

use Exception;

class TokenException extends Exception
{
    /**
     * Constructor
     *
     * @param string $message
     * @param integer $code
     */
    public function __construct(string $message, int $code = 400)
    {
        parent::__construct($message, $code);
    }

    /**
     * to String
     *
     * @return string
     */
    public function toString(): string
    {
        return $this->getMessage();
    }
}
