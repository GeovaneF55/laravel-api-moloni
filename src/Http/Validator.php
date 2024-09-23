<?php
namespace Geovanefss\LaravelApiMoloni\Http;

use Geovanefss\LaravelApiMoloni\Exceptions\ValidationException;

class Validator
{
    /**
     * Rules
     *
     * @var array
     */
    protected $rules;

    /**
     * Errors
     *
     * @var array
     */
    protected $errors = [];

    /**
     * Constructor
     *
     * @param array $rules
     */
    public function __construct(array $rules)
    {
        $this->rules = $rules;
    }

    /**
     * Validate
     *
     * @param array $data
     * @return boolean
     */
    public function validate(array $data): bool
    {
        $this->errors = [];

        foreach ($this->rules as $field => $rule) {
            if (!isset($data[$field])) {
                if (in_array('required', $rule)) {
                    $this->errors[$field] = "$field is required.";
                }
                continue;
            }

            foreach ($rule as $validation) {
                if ($validation === 'string' && !is_string($data[$field])) {
                    $this->errors[$field] = "$field must be a string.";
                }

                if ($validation === 'array' && !is_array($data[$field])) {
                    $this->errors[$field] = "$field must be an array.";
                }

                if ($validation === 'email' && !filter_var($data[$field], FILTER_VALIDATE_EMAIL)) {
                    $this->errors[$field] = "$field must be a valid email.";
                }

                if ($validation === 'url' && !filter_var($data[$field], FILTER_VALIDATE_URL)) {
                    $this->errors[$field] = "$field must be a valid URL.";
                }

                if ($validation === 'boolean' && !is_bool($data[$field])) {
                    $this->errors[$field] = "$field must be a boolean.";
                }

                if ($validation === 'date' && !strtotime($data[$field])) {
                    $this->errors[$field] = "$field must be a valid date.";
                }

                if ($validation === 'json' && is_null(json_decode($data[$field]))) {
                    $this->errors[$field] = "$field must be a valid JSON string.";
                }

                if ($validation === 'ip_address' && !filter_var($data[$field], FILTER_VALIDATE_IP)) {
                    $this->errors[$field] = "$field must be a valid IP address.";
                }

                if (strpos($validation, 'enum:') === 0) {
                    $validValues = explode(',', substr($validation, 5));
                    if (!in_array($data[$field], $validValues)) {
                        $this->errors[$field] = "$field must be one of: " . implode(', ', $validValues);
                    }
                }

                if (strpos($validation, 'in_array:') === 0) {
                    $arrayField = explode(':', $validation)[1];
                    if (!isset($data[$arrayField]) || !in_array($data[$field], $data[$arrayField])) {
                        $this->errors[$field] = "$field must exist in the array $arrayField.";
                    }
                }

                if ($validation === 'numeric' && !is_numeric($data[$field])) {
                    $this->errors[$field] = "$field must be numeric.";
                }
                
                if (strpos($validation, 'min:') === 0) {
                    $minValue = explode(':', $validation)[1];
                    if (strlen($data[$field]) < $minValue) {
                        $this->errors[$field] = "$field must be at least $minValue characters.";
                    }
                }
                
                if (strpos($validation, 'max:') === 0) {
                    $maxValue = explode(':', $validation)[1];
                    if (strlen($data[$field]) > $maxValue) {
                        $this->errors[$field] = "$field cannot be more than $maxValue characters.";
                    }
                }
            }
        }

        if (!empty($this->errors)) {
            throw new ValidationException($this->errors);
        }

        return true;
    }

    /**
     * Errors
     *
     * @return array
     */
    public function errors(): array
    {
        return $this->errors;
    }
}