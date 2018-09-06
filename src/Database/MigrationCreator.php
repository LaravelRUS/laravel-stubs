<?php
/**
 * This file is part of laravel-stubs package.
 *
 * @author ATehnix <atehnix@gmail.com>
 * @author Daniel Camargo <daniel.camargo.eti@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ATehnix\LaravelStubs\Database;

use Illuminate\Database\Migrations\MigrationCreator as BaseMigrationCreator;

class MigrationCreator extends BaseMigrationCreator
{
    /**
     * Get the migration stub file.
     *
     * @param  string $table
     * @param  bool $create
     * @return string
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    protected function getStub($table, $create)
    {
        if (is_null($table)) {
            $stub = config('stubs.path') . '/migration.blank.stub';
        } else {
            $stub = $create
                ? config('stubs.path') . '/migration.create.stub'
                : config('stubs.path') . '/migration.update.stub';
        }

        return file_exists($stub) ? $this->files->get($stub) : parent::getStub($table, $create);
    }
}
