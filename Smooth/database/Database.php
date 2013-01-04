<?php

	namespace Smooth\Database;

	class Database
	{
		// Declaring the variables
		private static $host, $user, $password, $db_name, $driver;
		public static $dbh;

		// Function to connect to the database
		public static function db_connect()
		{
			// Setting up the connection
			$host = ''; // Hostname(in most cases it is localhost)
			$user = ''; // Host user
			$password = ''; // Host password
			$db_name = ''; // Database name 
			$driver = 'mysql'; // Database driver, using mysql by default

				if( !(empty($host)) and !(empty($user)) and !(empty($password)) and !(empty($db_name)) and !(empty($driver)) )
				{
					try 
					{
						return $dbh = new \PDO("". $driver .":host=" . $host . ";dbname=" . $db_name . "", $user, $password, array(\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
					}
					catch (\PDOException $e)
					{
						exit('Oops...<pre>' . $e->getMessage() . '</pre>');
					}
				}
				else
				{
					exit('Your connection to the database is not set in' . SYSPATH . 'core/core.php');
				}
		}
	}