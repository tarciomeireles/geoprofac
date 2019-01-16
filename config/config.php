<?php
/*
 * Configuration Array
 */
return array
(
    // PDO configuration
    'pdo'	=> array
				(
                'driver' => 'mysql',
                'dbname' => 'databasename',
                'host'	 => 'localhost',
                'user'	 => 'root',
                'pass'	 => '',
				'encod'	 => 'utf8'
    			),

    // Log Configuration
    'log'   => array
				(
                'path'   => __DIR__ . '/../../log/dexter.log',
    			),
		
	// Path aplication
	'path'	=> './public/',		

);