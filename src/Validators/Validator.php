<?php
namespace Geovanefss\LaravelApiMoloni\Validators;

use Geovanefss\LaravelApiMoloni\Exceptions\ValidationException;

class Validator
{
    /**
     * Errors
     *
     * @var array
     */
    protected $errors = [];

    /**
     * Validate
     *
     * @param array $rules
     * @param array $data
     * @return boolean
     * @throws ValidationException
     */
    public function validate(array $rules, array $data): bool
    {
        $this->errors = [];

        foreach ($rules as $field => $rule) {
            if (!isset($data[$field])) {
                $this->validateRequired($rule, $field);
                continue;
            }

            foreach ($rule as $validation) {
                if (is_array($data[$field]) && $validation === 'array') {
                    $this->validateArray($validation, $data, $field);
                    $this->validateRecursive($rules, $data[$field], "$field.");
                } else {
                    $this->validateString($validation, $data, $field);
                    $this->validateFloat($validation, $data, $field);
                    $this->validateArray($validation, $data, $field);
                    $this->validateEmail($validation, $data, $field);
                    $this->validateUrl($validation, $data, $field);
                    $this->validateBoolean($validation, $data, $field);
                    $this->validateDate($validation, $data, $field);
                    $this->validateJson($validation, $data, $field);
                    $this->validateIpAddress($validation, $data, $field);
                    $this->validateEnum($validation, $data, $field);
                    $this->validateInArray($validation, $data, $field);
                    $this->validateNumeric($validation, $data, $field);
                    $this->validateMin($validation, $data, $field);
                    $this->validateMax($validation, $data, $field);
                }
            }
        }

        if (!empty($this->errors)) {
            throw new ValidationException($this->errors);
        }

        return true;
    }

    /**
     * Recursive Validation for Nested Arrays
     *
     * @param array $rules
     * @param array $data
     * @param string $prefix
     * @return void
     */
    private function validateRecursive(array $rules, array $data, string $prefix)
    {
        foreach ($data as $key => $value) {
            $fullKey = $prefix . $key;

            if (is_array($value)) {
                if (isset($rules[$fullKey]) && in_array('array', $rules[$fullKey])) {
                    $this->validateArray('array', $data, $fullKey);
                    $this->validateRecursive($rules, $value, "$fullKey.");
                }
            } else {
                if (isset($rules[$fullKey])) {
                    foreach ($rules[$fullKey] as $validation) {
                        $this->validateString($validation, $data, $fullKey);
                        $this->validateFloat($validation, $data, $fullKey);
                        $this->validateEmail($validation, $data, $fullKey);
                        $this->validateUrl($validation, $data, $fullKey);
                        $this->validateBoolean($validation, $data, $fullKey);
                        $this->validateDate($validation, $data, $fullKey);
                        $this->validateJson($validation, $data, $fullKey);
                        $this->validateIpAddress($validation, $data, $fullKey);
                        $this->validateEnum($validation, $data, $fullKey);
                        $this->validateInArray($validation, $data, $fullKey);
                        $this->validateNumeric($validation, $data, $fullKey);
                        $this->validateMin($validation, $data, $fullKey);
                        $this->validateMax($validation, $data, $fullKey);
                    }
                }
            }
        }
    }

    /**
     * Validate Required
     *
     * @param array $rule
     * @param string $field
     * @return void
     */
    public function validateRequired(array $rule, string $field)
    {
        if (in_array('required', $rule)) {
            $this->errors[$field] = "$field is required.";
        }
    }

    /**
     * Validate String
     *
     * @param string $validation
     * @param array $data
     * @param string $field
     * @return void
     */
    public function validateString(string $validation, array $data, string $field)
    {
        if ($validation === 'string' && !is_string($data[$field])) {
            $this->errors[$field] = "$field must be a string.";
        }
    }

    /**
     * Validate Float
     *
     * @param string $validation
     * @param array $data
     * @param string $field
     * @return void
     */
    public function validateFloat(string $validation, array $data, string $field)
    {
        if ($validation === 'float' && !is_float($data[$field]) && !is_numeric($data[$field])) {
            $this->errors[$field] = "$field must be a valid float.";
        }
    }

    /**
     * Validate Array
     *
     * @param string $validation
     * @param array $data
     * @param string $field
     * @return void
     */
    public function validateArray(string $validation, array $data, string $field)
    {
        if ($validation === 'array' && !is_array($data[$field])) {
            $this->errors[$field] = "$field must be an array.";
        }
    }

    /**
     * Validate Email
     *
     * @param string $validation
     * @param array $data
     * @param string $field
     * @return void
     */
    public function validateEmail(string $validation, array $data, string $field)
    {
        if ($validation === 'email' && !filter_var($data[$field], FILTER_VALIDATE_EMAIL)) {
            $this->errors[$field] = "$field must be a valid email.";
        }
    }

    /**
     * Validate Url
     *
     * @param string $validation
     * @param array $data
     * @param string $field
     * @return void
     */
    public function validateUrl(string $validation, array $data, string $field)
    {
        if ($validation === 'url' && !filter_var($data[$field], FILTER_VALIDATE_URL)) {
            $this->errors[$field] = "$field must be a valid URL.";
        }
    }

    /**
     * Validate Boolean
     *
     * @param string $validation
     * @param array $data
     * @param string $field
     * @return void
     */
    public function validateBoolean(string $validation, array $data, string $field)
    {
        if ($validation === 'boolean' && !is_bool($data[$field])) {
            $this->errors[$field] = "$field must be a boolean.";
        }
    }

    /**
     * Validate Date
     *
     * @param string $validation
     * @param array $data
     * @param string $field
     * @return void
     */
    public function validateDate(string $validation, array $data, string $field)
    {
        if ($validation === 'date' && !strtotime($data[$field])) {
            $this->errors[$field] = "$field must be a valid date.";
        }
    }

    /**
     * Validate Json
     *
     * @param string $validation
     * @param array $data
     * @param string $field
     * @return void
     */
    public function validateJson(string $validation, array $data, string $field)
    {
        if ($validation === 'json' && is_null(json_decode($data[$field]))) {
            $this->errors[$field] = "$field must be a valid JSON string.";
        }
    }

    /**
     * Validate Ip Address
     *
     * @param string $validation
     * @param array $data
     * @param string $field
     * @return void
     */
    public function validateIpAddress(string $validation, array $data, string $field)
    {
        if ($validation === 'ip_address' && !filter_var($data[$field], FILTER_VALIDATE_IP)) {
            $this->errors[$field] = "$field must be a valid IP address.";
        }
    }

    /**
     * Validate Enum
     *
     * @param string $validation
     * @param array $data
     * @param string $field
     * @return void
     */
    public function validateEnum(string $validation, array $data, string $field)
    {
        if (strpos($validation, 'enum:') === 0) {
            $validValues = explode(',', substr($validation, 5));
            if (!in_array($data[$field], $validValues)) {
                $this->errors[$field] = "$field must be one of: " . implode(', ', $validValues);
            }
        }
    }

    /**
     * Validate Numeric
     *
     * @param string $validation
     * @param array $data
     * @param string $field
     * @return void
     */
    public function validateNumeric(string $validation, array $data, string $field)
    {
        if ($validation === 'numeric' && !is_numeric($data[$field])) {
            $this->errors[$field] = "$field must be numeric.";
        }
    }

    /**
     * Validate Min
     *
     * @param string $validation
     * @param array $data
     * @param string $field
     * @return void
     */
    public function validateMin(string $validation, array $data, string $field)
    {
        if (strpos($validation, 'min:') === 0) {
            $minValue = explode(':', $validation)[1];
            if (strlen($data[$field]) < $minValue) {
                $this->errors[$field] = "$field must be at least $minValue characters.";
            }
        }
    }

    /**
     * Validate Max
     *
     * @param string $validation
     * @param array $data
     * @param string $field
     * @return void
     */
    public function validateMax(string $validation, array $data, string $field)
    {
        if (strpos($validation, 'max:') === 0) {
            $maxValue = explode(':', $validation)[1];
            if (strlen($data[$field]) > $maxValue) {
                $this->errors[$field] = "$field cannot be more than $maxValue characters.";
            }
        }
    }

    /**
     * Validate In Array
     *
     * @param string $validation
     * @param array $data
     * @param string $field
     * @return void
     */
    public function validateInArray(string $validation, array $data, string $field)
    {
        if (strpos($validation, 'in_array:') === 0) {
            $arrayField = explode(':', $validation)[1];
            if (!isset($data[$arrayField]) || !in_array($data[$field], $data[$arrayField])) {
                $this->errors[$field] = "$field must exist in the array $arrayField.";
            }
        }
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