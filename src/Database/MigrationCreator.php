<?php
/**
 * This file is part of laravel-stubs package.
 *
 * @author Daniel Camargo <daniel.camargo.eti@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ATehnix\LaravelStubs\Console;

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
            return $this->getBlankStub($table, $create);
        }
        return ($create) ? $this->getCreateStub($table, $create) : $this->getUpdateStub($table, $create);
    }

    /**
     * Get blank stub
     *
     * @param $table
     * @param $create
     * @return string
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    private function getBlankStub($table, $create)
    {
        $blankStub = config('stubs.path') . '/migration.blank.stub';
        if (!file_exists($blankStub)) {
            return parent::getStub($table, $create);
        }

        return $this->files->get($blankStub);
    }

    /**
     * Get create stub
     *
     * @param $table
     * @param $create
     * @return string
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    private function getCreateStub($table, $create)
    {
        $createStub = config('stubs.path') . '/migration.create.stub';
        if (!file_exists($createStub)) {
            return parent::getStub($table, $create);
        }

        return $this->files->get($createStub);
    }

    /**
     * Get update stub
     *
     * @param $table
     * @param $create
     * @return string
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    private function getUpdateStub($table, $create)
    {
        $updateStub = config('stubs.path') . '/migration.update.stub';
        if (!file_exists($updateStub)) {
            return parent::getStub($table, $create);
        }

        return $this->files->get($updateStub);
    }
}
