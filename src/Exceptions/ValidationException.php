<?php
namespace Geovanefss\LaravelApiMoloni\Exceptions;

use Exception;

class ValidationException extends Exception
{
    /**
     * Errors
     *
     * @var array
     */
    protected $errors;

    /**
     * Constructor
     *
     * @param array $errors
     * @param integer $code
     */
    public function __construct(array $errors, $code = 422)
    {
        parent::__construct("Validation failed", $code);
        $this->errors = $errors;
    }

    /**
     * Get Errors
     *
     * @return array
     */
    public function getErrors(): array
    {
        return $this->errors;
    }

    /**
     * to String
     *
     * @return string
     */
    public function toString(): string
    {
        return json_encode($this->getErrors(), JSON_PRETTY_PRINT);
    }
}