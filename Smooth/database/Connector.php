<?php
	
	namespace Smooth\Database;

	class Connector
	{

		/**
		 * [connect description]
		 * @return [type] [description]
		 */
		public function __construct()
		{
			require 'Application/config/database.php';

			$db_drivers = array('Mysql', 'pgsql', 'sqlsrv', 'sqlite', 'mongodb');

			try
			{
				if( in_array($config['driver'], $db_drivers) )
				{
					require SYSPATH . 'database/drivers/' . $driver . '.php';
					$driver::connect($config);
				}

			}
			catch(\PDOException $e)
			{
				exit('PDO connection error' . $e->getMessage());
			}
		}

		public static function getConnection()
		{
			include 'Application/config/database.php';
			extract($config);
			require_once SYSPATH . 'database/drivers/' . $driver . '.php';
			return $driver::connect($config);
		}

	}