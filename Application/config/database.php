<?php
	
	
	return $config = 

		array(

			'driver' => 'mysql',

			'charset' => 'utf8',

			'persistent' => true,

			'mysql' => array(
					
					'fetch' => '',
					'host' => 'localhost',
					'username' => 'root',
					'password' => 'ciprop1',
					'database' => 'test',
					'db_col' => 'utf8_general_ci',
					'charset' => 'utf8',
					'prefix' => '',
					'port' => '',
					'unix_socket' => ''

				),

			'sqlite' => array(

				),

			'pgsql' => array(
			
				),

			'mongodb' => array(

					'host' => 'localhost',
					'username' => 'root',
					'password' => 'ciprop1',
					'database' => 'test',
					'db_col' => 'utf8_general_ci',
					'charset' => 'utf8'

				),

			'sqlsrv' => array(

				)

		);