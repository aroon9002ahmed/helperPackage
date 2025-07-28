# Qit Helper Package

A collection of helper utilities for Laravel applications.

## Description

This package provides various helper functions and utilities to streamline development in Laravel applications. It includes database migrations and helper functions for common tasks.

## Installation

You can install the package via Composer:

```bash
composer require qit/helper
```

## Configuration

After installation, you need to register the service provider in your Laravel application.

### Laravel 5.5+ (Auto-Discovery)

The package will automatically register itself via Laravel's package auto-discovery feature.

### Manual Registration (Laravel 5.4 and below)

Add the service provider to your `config/app.php` file:

```php
'providers' => [
    // Other service providers...
    Qit\Helper\HelperServiceProvider::class,
],
```

## Usage

### Helper Functions

The package includes various helper functions in the `HelperGen` class:

```php
use Qit\Helper\functions\HelperGen;

// Generate a slug from a string
$slug = HelperGen::generateSlug('Hello World');
// Output: "Helper: hello-world"
```


## Features

- Helper functions for common tasks
- Database migrations
- Laravel service provider integration
- PSR-4 autoloading

## Requirements

- PHP >= 8.0
- Laravel >= 8.0 [min] ~ 12.0

## Contributing

Contributions are welcome! Please feel free to submit a Pull Request.

## License

This package is open-sourced software licensed under the [MIT license](LICENSE).

## Author

**Ahmed Saad Hassan**
- Email: alfker3@gmail.com

## Changelog

### v1.0.0 (2025-07-28)
- Initial release
- Basic helper functions
- Service provider setup
- Database migrations support