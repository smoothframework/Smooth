<?php

	namespace Smooth\Config;

	class Database
	{
		/**
		 * [config description]
		 * @return [type] [description]
		 */
		public static function config()
		{
			return $mysql = array(

					'fetch' => '',
					'host' => 'localhost',
					'username' => 'root',
					'password' => '',
					'database' => 'test',
					'driver' => 'mysql',
					'db_col' => 'utf8_general_ci',
					'charset' => 'utf8',
					'prefix' => '',
					'port' => '',
					'unix_socket' => ''

				);	

			$sqlite = array(

				);

			$pgsql = array(
			
				);		
		}
	}