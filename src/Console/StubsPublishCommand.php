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

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class StubsPublishCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'stubs:publish';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Publish any stub files from framework';

    /**
     * The filesystem instance.
     *
     * @var \Illuminate\Filesystem\Filesystem
     */
    protected $files;

    /**
     * Path to the Laravel Framework source directory
     *
     * @var string
     */
    protected $frameworkPath = 'vendor/laravel/framework/src/';

    /**
     * Paths to stub files and a map of their names
     *
     * @var array
     */
    protected $stubs = [
        'channel.stub'                 => 'Illuminate/Foundation/Console/stubs/channel.stub',
        'console.stub'                 => 'Illuminate/Foundation/Console/stubs/console.stub',
        'controller.api.stub'          => 'Illuminate/Routing/Console/stubs/controller.api.stub',
        'controller.invokable.stub'    => 'Illuminate/Routing/Console/stubs/controller.invokable.stub',
        'controller.model.api.stub'    => 'Illuminate/Routing/Console/stubs/controller.model.api.stub',
        'controller.model.stub'        => 'Illuminate/Routing/Console/stubs/controller.model.stub',
        'controller.nested.api.stub'   => 'Illuminate/Routing/Console/stubs/controller.nested.api.stub',
        'controller.nested.stub'       => 'Illuminate/Routing/Console/stubs/controller.nested.stub',
        'controller.plain.stub'        => 'Illuminate/Routing/Console/stubs/controller.plain.stub',
        'controller.stub'              => 'Illuminate/Routing/Console/stubs/controller.stub',
        'event.stub'                   => 'Illuminate/Foundation/Console/stubs/event.stub',
        'exception-render-report.stub' => 'Illuminate/Foundation/Console/stubs/exception-render-report.stub',
        'exception-render.stub'        => 'Illuminate/Foundation/Console/stubs/exception-render.stub',
        'exception-report.stub'        => 'Illuminate/Foundation/Console/stubs/exception-report.stub',
        'exception.stub'               => 'Illuminate/Foundation/Console/stubs/exception.stub',
        'factory.stub'                 => 'Illuminate/Database/Console/Factories/stubs/factory.stub',
        'job.stub'                     => 'Illuminate/Foundation/Console/stubs/job.stub',
        'job-queued.stub'              => 'Illuminate/Foundation/Console/stubs/job-queued.stub',
        'listener-duck.stub'           => 'Illuminate/Foundation/Console/stubs/listener-duck.stub',
        'listener-queued-duck.stub'    => 'Illuminate/Foundation/Console/stubs/listener-queued-duck.stub',
        'listener-queued.stub'         => 'Illuminate/Foundation/Console/stubs/listener-queued.stub',
        'listener.stub'                => 'Illuminate/Foundation/Console/stubs/listener.stub',
        'mail.stub'                    => 'Illuminate/Foundation/Console/stubs/mail.stub',
        'markdown-mail.stub'           => 'Illuminate/Foundation/Console/stubs/markdown-mail.stub',
        'markdown-notification.stub'   => 'Illuminate/Foundation/Console/stubs/markdown-notification.stub',
        'markdown.stub'                => 'Illuminate/Foundation/Console/stubs/markdown.stub',
        'middleware.stub'              => 'Illuminate/Routing/Console/stubs/middleware.stub',
        'migration.blank.stub'         => 'Illuminate/Database/Migrations/stubs/blank.stub',
        'migration.create.stub'        => 'Illuminate/Database/Migrations/stubs/create.stub',
        'migration.update.stub'        => 'Illuminate/Database/Migrations/stubs/update.stub',
        'model.stub'                   => 'Illuminate/Foundation/Console/stubs/model.stub',
        'notification.stub'            => 'Illuminate/Foundation/Console/stubs/notification.stub',
        'observer.stub'                => 'Illuminate/Foundation/Console/stubs/observer.stub',
        'observer.plain.stub'          => 'Illuminate/Foundation/Console/stubs/observer.plain.stub',
        'pivot.model.stub'             => 'Illuminate/Foundation/Console/stubs/pivot.model.stub',
        'policy.plain.stub'            => 'Illuminate/Foundation/Console/stubs/policy.plain.stub',
        'policy.stub'                  => 'Illuminate/Foundation/Console/stubs/policy.stub',
        'provider.stub'                => 'Illuminate/Foundation/Console/stubs/provider.stub',
        'request.stub'                 => 'Illuminate/Foundation/Console/stubs/request.stub',
        'resource-collection.stub'     => 'Illuminate/Foundation/Console/stubs/resource-collection.stub',
        'resource.stub'                => 'Illuminate/Foundation/Console/stubs/resource.stub',
        'rule.stub'                    => 'Illuminate/Foundation/Console/stubs/rule.stub',
        'seeder.stub'                  => 'Illuminate/Database/Console/Seeds/stubs/seeder.stub',
        'test.stub'                    => 'Illuminate/Foundation/Console/stubs/test.stub',
        'unit-test.stub'               => 'Illuminate/Foundation/Console/stubs/unit-test.stub',
    ];

    /**
     * Create a new command instance.
     *
     * @param \Illuminate\Filesystem\Filesystem $files
     */
    public function __construct(Filesystem $files)
    {
        parent::__construct();

        $this->files = $files;
    }

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $path = config('stubs.path');
        $this->createDirectory($path);
        $publishedCount = 0;

        foreach ($this->stubs as $name => $stub) {
            $from = base_path($this->frameworkPath . $stub);
            $to = $path . '/' . $name;
            $publishedCount += (int)$this->publishFile($from, $to);
        }

        if ($publishedCount === 0) {
            $this->line('Nothing to publish');
        }
    }

    /**
     * Create the directory to house the published files if needed.
     *
     * @param string $directory
     * @return void
     */
    protected function createDirectory($directory)
    {
        if (!$this->files->isDirectory($directory)) {
            $this->files->makeDirectory($directory, 0755, true);
        }
    }

    /**
     * Publish the file to the given path.
     *
     * @param string $from
     * @param string $to
     * @return bool
     */
    protected function publishFile($from, $to)
    {
        if ($this->files->exists($to) || !$this->files->exists($from)) {
            return false;
        }

        $this->files->copy($from, $to);
        $this->info('Stub published: ' . basename($to));

        return true;
    }
}
