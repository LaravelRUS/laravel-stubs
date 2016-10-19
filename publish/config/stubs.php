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
    | Root application namespaсe (like "App") should be skipped.
    */
    'namespaces' => [
        'console'      => '\Console\Commands',
        'controller'   => '\Http\Controllers',
        'event'        => '\Events',
        'job'          => '\Jobs',
        'listener'     => '\Listeners',
        'mail'         => '\Mail',
        'middleware'   => '\Http\Middleware',
        'model'        => '\Models',
        'notification' => '\Notifications',
        'policy'       => '\Policies',
        'provider'     => '\Providers',
        'request'      => '\Http\Requests',
    ],

];
