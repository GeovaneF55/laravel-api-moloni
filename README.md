<h1 align="center">Geovane's Moloni's API Client for PHP</h1>

<div align="center">
    <p align="center">
        <a href="https://packagist.org/packages/geovanefss/laravel-api-moloni">https://packagist.org/packages/geovanefss/laravel-api-moloni</a>
    </p>
    <a href="https://php.watch/versions" target="_blank">
        <img src="https://img.shields.io/badge/php-7.4-brightgreen.svg?logo=php&longCache=true" alt="Supported PHP Versions" />
    </a>
    <a href="https://github.com/GeovaneF55/laravel-api-moloni/releases" target="_blank">
        <img src="https://img.shields.io/github/v/release/GeovaneF55/laravel-api-moloni?include_prereleases" alt="GitHub Releases" />
    </a>
    <a href="https://github.com/markshust/docker-magento/graphs/commit-activity" target="_blank">
        <img src="https://img.shields.io/badge/maintained%3F-yes-brightgreen.svg" alt="Maintained - Yes" />
    </a>
    <a href="https://opensource.org/licenses/MIT" target="_blank">
        <img src="https://img.shields.io/badge/license-MIT-blue.svg" />
    </a>
</div>

## Installation

To install this package, ensure you have [Composer](https://getcomposer.org/) installed on your system. Then, run the following command in your project directory:

```bash
composer require geovanefss/laravel-api-moloni
```

## Environment Configuration

In your `.env` file, define the necessary environment variables to configure the Moloni API. This will keep your credentials secure and allow for easy configuration changes.

```dotenv
MOLONI_GRANT_TYPE=password
MOLONI_CLIENT_ID=your_client_id
MOLONI_CLIENT_SECRET=your_client_secret
MOLONI_USERNAME=your_username
MOLONI_PASSWORD=your_password
```

You can adjust these values based on your Moloni API credentials and usage requirements.

## Usage Example

Below is an example demonstrating how to use this package in your Laravel project:

```php
<?php

require_once('vendor/autoload.php');

use Dotenv\Dotenv;
use Geovanefss\LaravelApiMoloni\Exceptions\ApiException;
use Geovanefss\LaravelApiMoloni\Exceptions\TokenException;
use Geovanefss\LaravelApiMoloni\Exceptions\ValidationException;
use Geovanefss\LaravelApiMoloni\Moloni;

try {
    // Load environment variables
    $dotenv = Dotenv::createUnsafeImmutable(__DIR__);
    $dotenv->safeLoad();

    // Set Moloni API configuration using environment variables
    $configs = [
        // grant_type: Only password fully implemented yet (see: https://www.moloni.pt/dev/autenticacao/)
        'grant_type' => getenv('MOLONI_GRANT_TYPE'),            // Required
        'client_id' => getenv('MOLONI_CLIENT_ID'),              // Required
        'client_secret' => getenv('MOLONI_CLIENT_SECRET'),      // Required
        // 'response_type' => getenv('MOLONI_RESPONSE_TYPE'),
        // 'redirect_uri' => getenv('MOLONI_REDIRECT_URI'),
        // 'authorization_code' => getenv('MOLONI_AUTHORIZATION_CODE'),
        'username' => getenv('MOLONI_USERNAME'),                // Required
        'password' => getenv('MOLONI_PASSWORD'),                // Required
    ];
    
    // Initialize Moloni instance
    $moloni = new Moloni($configs);

    // Example: Fetch user profile from Moloni API
    $resp = $moloni->myProfile()->getMe();

    // Output the response in a readable format
    var_dump(json_encode($resp, JSON_PRETTY_PRINT));

} catch (ApiException | ValidationException | TokenException $e) {
    // Handle Moloni API-specific exceptions
    var_dump(get_class($e) . ': ' . $e->toString());
} catch (Exception $e) {
    // Handle general exceptions
    var_dump(get_class($e) . ': ' . $e->getMessage());
}
```

## Explanation

### Using Environment Variables
By placing the configuration values in the `.env` file, you avoid hard-coding sensitive data like client credentials and user passwords. This makes the application:
- **Easier to configure**: Modify `.env` for different environments (e.g., production, staging, development).
- **More secure**: Credentials are not exposed in source code.

### Steps Breakdown:
1. **Environment Setup**: Define all the necessary environment variables for the Moloni API configuration in the `.env` file.
2. **Load Environment Variables**: The `Dotenv` library is used to load these variables dynamically.
3. **Configure the API**: Pass the loaded environment variables to the `Moloni` API configuration array.

## Moloni's API Documentation

For more details, please refer to the official Moloni API documentation:

- [Moloni's API Documentation Link](https://www.moloni.pt/dev/)
