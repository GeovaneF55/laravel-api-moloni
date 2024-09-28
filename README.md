# My PHP API Moloni Client (laravel-api-moloni)

## Installation

To install this package, you must first have [composer](https://getcomposer.org/).
Then you can run this command on your project:

```bash
composer require geovanefss/laravel-api-moloni
```

Below, you have an example of the usage of this package:

## Usage Example

```bash
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
