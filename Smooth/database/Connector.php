<?php
	
	namespace Smooth\Database;

	use Smooth\Config\Database;

	class Connector
	{

		/**
		 * [connect description]
		 * @return [type] [description]
		 */
		public static function connect()
		{
			$config = Database::config();
			extract($config);

			$db_drivers = array('mysql', 'pgsql', 'sqlsrv', 'sqlite');

			try
			{
				if( in_array($config['driver'], $db_drivers) )
				{
					require_once SYSPATH . 'database/drivers/' . $driver . '.php';
					$driver::connect($config);
				}

			}
			catch(\PDOException $e)
			{
				exit('PDO connection error' . $e->getMessage());
			}

		}

		public static function retrieve()
		{
			$config = Database::config();
			extract($config);
			require_once SYSPATH . 'database/drivers/' . $driver . '.php';
			return $driver::connect($config);
		}

	}