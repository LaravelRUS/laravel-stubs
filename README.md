# Override Laravel stubs
[![GitHub license](https://img.shields.io/badge/license-MIT-blue.svg)](LICENSE)
[![Packagist Version](https://img.shields.io/packagist/v/atehnix/laravel-stubs.svg)](https://packagist.org/packages/atehnix/laravel-stubs)

The package gives you the opportunity to customize Artisan commands like `artisan make:model`, `artisan make:controller` and other, just as you need. 

Any location of the generated classes and with any content.

## Installation

You can get library through [composer](https://getcomposer.org/)

```
composer require atehnix/laravel-stubs
```

Next up, the service provider 
`Illuminate\Foundation\Providers\ConsoleSupportServiceProvider::class,` 

should be replaced by
`ATehnix\LaravelStubs\Providers\ConsoleSupportServiceProvider::class,`

```php
// config/app.php

'providers' => [
    ...
    // Illuminate\Foundation\Providers\ConsoleSupportServiceProvider::class,
    ATehnix\LaravelStubs\Providers\ConsoleSupportServiceProvider::class,
    ...
];
```

To publish the config file to app/config/stubs.php run:

```
php artisan vendor:publish --provider=ATehnix\LaravelStubs\Providers\ConsoleSupportServiceProvider
```

Done!


## Usage

### Publish stub files for edit
```
php artisan stubs:publish
```

The files will be placed in the directory `resources/stubs` (or other directory if you change it in the configuration file).

Now you can edit any of the stubs and enjoy your customized commands like `artisan make:model`,` artisan make:controller` and others.


## License
[MIT](LICENSE)
