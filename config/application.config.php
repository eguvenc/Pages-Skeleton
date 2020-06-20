<?php

return [

    // Root path
    'root' => dirname(__DIR__),

    // Modules
    'modules' => require __DIR__ . '/modules.config.php',

    // Middlewares
    'middlewares' => require __DIR__ . '/middlewares.config.php',

    // Configuration overrides during development mode
    'module_listener_options' => [

        // An array of paths from which to glob configuration files after
        // modules are loaded. These effectively override configuration
        // provided by modules themselves. Paths may use GLOB_BRACE notation.
        'config_glob_paths' => [realpath(__DIR__) . sprintf('/autoload/{,*.}{global,%s,local}.php', getenv('APP_ENV') ?: 'development')],

        // Whether or not to enable a configuration cache.
        // If enabled, the merged configuration will be cached and used in
        // subsequent requests.
        // 
        'config_cache_enabled' => false,
        // Whether or not to enable a module class map cache.
        // If enabled, creates a module class map cache which will be used
        // by in future requests, to reduce the autoloading process.
        // 
        'module_map_cache_enabled' => false,
        // The path in which to cache merged configuration.
        // 
        'cache_dir' => dirname(__DIR__). '/data/cache/',
    ],
];