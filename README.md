# Customize laravel make command
[![GitHub license](https://img.shields.io/badge/license-MIT-blue.svg)](LICENSE)
[![Packagist Version](https://img.shields.io/packagist/v/atehnix/laravel-stubs.svg?maxAge=0)](https://packagist.org/packages/atehnix/laravel-stubs)
[![Packagist Stats](https://poser.pugx.org/atehnix/laravel-stubs/downloads)](https://packagist.org/packages/atehnix/laravel-stubs/stats)


The package gives you the opportunity to customize Artisan commands like `artisan make:model`, `artisan make:controller` and other, just as you need. 

Any location of the generated classes and with any content.


## Installation
> *For laravel v5.4 or older see: [older installation](https://github.com/atehnix/laravel-stubs/tree/v2.0.0#installation)*

You can get library through [composer](https://getcomposer.org/)

```
composer require atehnix/laravel-stubs
```

To publish the config file to `config/stubs.php` run:

```
php artisan vendor:publish --provider="ATehnix\LaravelStubs\Providers\ConsoleSupportServiceProvider"
```

Done!


## Usage

### Configure paths for generated classes
To change the paths of saving the generated classes, you need to configure their namespaces in a configuration file `config/stubs.php`.

### Publish stub files for edit
```
php artisan stubs:publish
```

The files will be placed in the directory `resources/stubs` (or other directory if you change it in the configuration file).

Now you can edit any of the stubs and enjoy your customized commands like `artisan make:model`,` artisan make:controller` and others.


## License
[MIT](LICENSE)
