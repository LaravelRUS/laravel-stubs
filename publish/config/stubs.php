<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Path to the stub files for the generator
    |--------------------------------------------------------------------------
    */
    'path' => base_path('resources/stubs'),

    /*
    |--------------------------------------------------------------------------
    | Default namespaces for the classes
    |--------------------------------------------------------------------------
    | Warning! Root application namespace (like "App") should be skipped.
    */
    'namespaces' => [
        'channel'      => '\Broadcasting',
        'command'      => '\Console\Commands',
        'controller'   => '\Http\Controllers',
        'event'        => '\Events',
        'exception'    => '\Exceptions',
        'job'          => '\Jobs',
        'listener'     => '\Listeners',
        'mail'         => '\Mail',
        'middleware'   => '\Http\Middleware',
        'model'        => '',
        'notification' => '\Notifications',
        'observer'     => '\Observers',
        'policy'       => '\Policies',
        'provider'     => '\Providers',
        'request'      => '\Http\Requests',
        'resource'     => '\Http\Resources',
        'rule'         => '\Rules',
    ],

    /*
    |--------------------------------------------------------------------------
    | The name of the module that is being developed
    |--------------------------------------------------------------------------
    | When specified, the namespaces will be prefixed with
    | the appropriate module name.
    |
    | For example, if the module is set to 'Blog', then the namespace
    | for the controllers might look like: "App\Blog\Http\Controllers"
    */
    'module' => env('STUBS_MODULE', ''),

];
