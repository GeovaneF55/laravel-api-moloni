<h1 align="center">Moloni's API Client for PHP <a href="https://packagist.org/packages/geovanefss/laravel-api-moloni">geovanefss/laravel-api-moloni</a></h1>

<div align="center">
  <p>Geovane's Moloni's API Client for PHP</p>
  <img src="https://img.shields.io/badge/php-7.4-brightgreen.svg?logo=php&longCache=true" alt="Supported PHP Versions" />
    <a href="https://github.com/GeovaneF55/laravel-api-moloni/releases">
        <img alt="GitHub Release" src="https://img.shields.io/github/v/release/GeovaneF55/laravel-api-moloni?include_prereleases">
    </a>
  <a href="https://github.com/markshust/docker-magento/graphs/commit-activity" target="_blank"><img src="https://img.shields.io/badge/maintained%3F-yes-brightgreen.svg" alt="Maintained - Yes" /></a>
  <a href="https://opensource.org/licenses/MIT" target="_blank"><img src="https://img.shields.io/badge/license-MIT-blue.svg" /></a>
</div>

## Installation

To install this package, you must first have [composer](https://getcomposer.org/).
Then you can run this command on your project:

```bash
composer require geovanefss/laravel-api-moloni
```

Below, you have an example of the usage of this package:

## Usage Example

```php
<?php

require_once('vendor/autoload.php');

use Dotenv\Dotenv;
use Geovanefss\LaravelApiMoloni\Exceptions\ApiException;
use Geovanefss\LaravelApiMoloni\Exceptions\TokenException;
use Geovanefss\LaravelApiMoloni\Exceptions\ValidationException;
use Geovanefss\LaravelApiMoloni\Moloni;

try {
    $dotenv = Dotenv::createUnsafeImmutable(__DIR__);
    $dotenv->safeLoad();

    $configs = [
        'grant_type' => getenv('MOLONI_GRANT_TYPE') ?? 'password',                            # Only password fully implemented yet (see: https://www.moloni.pt/dev/autenticacao/)
        'client_id' => getenv('MOLONI_CLIENT_ID') ?? 'test_client_id',                        # Required
        'client_secret' => getenv('MOLONI_CLIENT_SECRET') ?? 'test_client_secret',            # Required
        # 'response_type' => getenv('MOLONI_RESPONSE_TYPE') ?? 'code',                        # Future improvement
        # 'redirect_uri' => getenv('MOLONI_REDIRECT_URI') ?? 'https://example.com/callback',  # Future improvement
        # 'authorization_code' => getenv('MOLONI_AUTHORIZATION_CODE') ?? 'test_auth_code',    # Future improvement
        'username' => getenv('MOLONI_USERNAME') ?? 'test_user',                               # Required
        'password' => getenv('MOLONI_PASSWORD') ?? 'test_password'                            # Required
    ];
    
    $moloni = new Moloni($configs);
    $resp = $moloni->myProfile()->getMe();                                                    # Example of calling the API

    var_dump(json_encode($resp, JSON_PRETTY_PRINT));
} catch (ApiException | ValidationException | TokenException $e) {
    var_dump(get_class($e) . ': ' . $e->toString());
} catch (Exception $e) {
    var_dump(get_class($e) . ': ' . $e->getMessage());
}
```

## Moloni's API Documentation
- [Moloni's API Documentation Link](https://www.moloni.pt/dev/)
