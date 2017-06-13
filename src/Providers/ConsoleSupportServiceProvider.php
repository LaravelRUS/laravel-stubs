<?php
/**
 * This file is part of laravel-stubs package.
 *
 * @author ATehnix <atehnix@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace ATehnix\LaravelStubs\Providers;

use Illuminate\Foundation\Providers\ConsoleSupportServiceProvider as BaseServiceProvider;

class ConsoleSupportServiceProvider extends BaseServiceProvider
{
    /**
     * The provider class names.
     *
     * @var array
     */
    protected $providers = [
        'ATehnix\LaravelStubs\Providers\ArtisanServiceProvider',
        'Illuminate\Database\MigrationServiceProvider',
        'Illuminate\Foundation\Providers\ComposerServiceProvider',
    ];

    /**
     * Path to the config file
     *
     * @var string
     */
    protected $configPath = __DIR__.'/../../publish/config/stubs.php';

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom($this->configPath, 'stubs');

        parent::register();
    }

    /**
     * Bootstrapping the service provider.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            $this->configPath => config_path('stubs.php'),
        ], 'config');
    }
}
