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

use Illuminate\Database\Console\Factories\FactoryMakeCommand as BaseFactoryMakeCommand;
use Illuminate\Support\Str;

class FactoryMakeCommand extends BaseFactoryMakeCommand
{
    /**
     * The Laravel application instance.
     *
     * @var \Illuminate\Foundation\Application
     */
    protected $laravel;

    /**
     * Build the class with the given name.
     *
     * @param  string $name
     * @return string
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    protected function buildClass($name)
    {
        $model = $this->option('model')
            ? $this->parseModel($this->option('model'))
            : 'Model';

        $stub = $this->files->get($this->getStub());
        $stub = $this->replaceNamespace($stub, $name)->replaceClass($stub, $name);

        return str_replace(
            'DummyModel', $model, $stub
        );
    }

    /**
     * Get the fully-qualified model class name.
     *
     * @param  string $model
     * @return string
     */
    protected function parseModel($model)
    {
        $model = trim(str_replace('/', '\\', $model), '\\');
        $namespace = $this->laravel->getNamespace() . ltrim(config('stubs.namespaces.model') . '\\', '\\');

        if (!Str::startsWith($model, $namespace)) {
            $model = $namespace . $model;
        }

        return $model;
    }

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        $stub = config('stubs.path') . '/factory.stub';

        return file_exists($stub) ? $stub : parent::getStub();
    }
}
