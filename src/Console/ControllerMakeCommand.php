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

class ControllerMakeCommand extends BaseControllerMakeCommand
{
    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    
    protected function getStub()
    {
        if ($this->option('model')) {
            $stub = config('stubs.path').'/controller.model.stub';
        } elseif ($this->option('resource')) {
            $stub = config('stubs.path').'/controller.stub';
        } else {
            $stub = config('stubs.path').'/controller.plain.stub';
        }

        return file_exists($stub) ? $stub : parent::getStub();
    }

    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace.config('stubs.namespaces.controller');
    }
}
