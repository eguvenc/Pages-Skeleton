<?php

/**
 * List of enabled middlewares for this application.
 *
 * Order of array is important, HttpMethodMiddleware should be at the top.
 */
return  [
    'Obullo\Middleware\HttpMethodMiddleware',
];