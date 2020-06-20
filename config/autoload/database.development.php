<?php

/**
 * Database Configuration Override
 *
 * This configuration override file is for overriding environment-specific and
 * security-sensitive configuration information. 
 * 
 * NOTE: This file is loaded from environment-specific configuration application.config.php.
 * 
 */

return [
    
    'db' =>  [
    	'driver' => 'Mysqli',
	    'database' => 'test',
	    'hostname' => '127.0.0.1',
	    'port' 	   => '3306',
	    'username' => 'root',
	    'password' => '123456',
    ],
];
