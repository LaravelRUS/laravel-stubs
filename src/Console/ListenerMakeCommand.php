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

use Illuminate\Foundation\Console\ListenerMakeCommand as BaseListenerMakeCommand;
use Illuminate\Support\Str;

class ListenerMakeCommand extends BaseListenerMakeCommand
{
    /**
     * The Laravel application instance.
     *
     * @var \Illuminate\Foundation\Application
     */
    protected $laravel;

    /**
     * Get the default namespace for the class.
     *
     * @param  string $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . config('stubs.namespaces.listener');
    }

    /**
     * @param string $name
     * @return mixed|string
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    protected function buildClass($name)
    {
        $stub = $this->files->get($this->getStub());
        $stub = $this->replaceNamespace($stub, $name)->replaceClass($stub, $name);
        $event = $this->getEvent();
        $stub = str_replace('DummyEvent', class_basename($event), $stub);
        $stub = str_replace('DummyFullEvent', $event, $stub);

        return $stub;
    }

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        if ($this->option('queued') && $this->option('event')) {
            $stub = config('stubs.path') . '/listener-queued.stub';
        } elseif ($this->option('queued')) {
            $stub = config('stubs.path') . '/listener-queued-duck.stub';
        } elseif ($this->option('event')) {
            $stub = config('stubs.path') . '/listener.stub';
        } else {
            $stub = config('stubs.path') . '/listener-duck.stub';
        }

        return file_exists($stub) ? $stub : parent::getStub();
    }

    protected function getEvent()
    {
        $event = $this->option('event');

        if (!Str::startsWith($event, [
            $this->laravel->getNamespace(),
            'Illuminate',
            '\\',
        ])) {
            $eventNamespace = ltrim(config('stubs.namespaces.event'), '\\') . '\\';
            $event = $this->laravel->getNamespace() . $eventNamespace . $event;
        }

        return $event;
    }
}
