<?php
/**
 * This file is part of laravel-stubs package.
 *
 * @author ATehnix <atehnix@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ATehnix\LaravelStubs\Console;

use Illuminate\Routing\Console\ControllerMakeCommand as BaseControllerMakeCommand;
use Illuminate\Support\Str;
use InvalidArgumentException;

class ControllerMakeCommand extends BaseControllerMakeCommand
{
    /**
     * The Laravel application instance.
     *
     * @var \Illuminate\Foundation\Application
     */
    protected $laravel;

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        $stub = null;

        if ($this->option('parent')) {
            $stub = config('stubs.path') . '/controller.nested.stub';
        } elseif ($this->option('model')) {
            $stub = config('stubs.path') . '/controller.model.stub';
        } elseif ($this->option('invokable')) {
            $stub = config('stubs.path') . '/controller.invokable.stub';
        } elseif ($this->option('resource')) {
            $stub = config('stubs.path') . '/controller.stub';
        }

        if ($this->option('api') && is_null($stub)) {
            $stub = config('stubs.path') . '/controller.api.stub';
        } elseif ($this->option('api') && !is_null($stub) && !$this->option('invokable')) {
            $stub = config('stubs.path') . str_replace('.stub', '.api.stub', $stub);
        }

        $stub = $stub ?? config('stubs.path') . '/controller.plain.stub';

        return file_exists($stub) ? $stub : parent::getStub();
    }

    /**
     * Get the default namespace for the class.
     *
     * @param  string $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . config('stubs.namespaces.controller');
    }

    /**
     * Get the fully-qualified model class name.
     *
     * @param  string $model
     * @return string
     */
    protected function parseModel($model)
    {
        if (preg_match('([^A-Za-z0-9_/\\\\])', $model)) {
            throw new InvalidArgumentException('Model name contains invalid characters.');
        }

        $model = trim(str_replace('/', '\\', $model), '\\');
        $namespace = $this->laravel->getNamespace() . ltrim(config('stubs.namespaces.model') . '\\', '\\');

        if (!Str::startsWith($model, $namespace)) {
            $model = $namespace . $model;
        }

        return $model;
    }
}
