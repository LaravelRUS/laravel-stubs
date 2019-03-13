<?php declare(strict_types=1);
/**
 * This file is part of laravel-stubs package.
 *
 * @author ATehnix <atehnix@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ATehnix\LaravelStubs\Console;

trait Modulable
{
    /**
     * The namespace prefix of the module that is being developed
     *
     * @return string|null
     */
    protected function getModuleNamespace()
    {
        $module = trim(config('stubs.module'), '\\');

        return $module ? '\\' . $module : null;
    }
}
