<?php

	use Smooth\Database\Connector;

	class Mysql
	{

		/**
		 * [connect description]
		 * @param  array  $config [description]
		 * @return [type]         [description]
		 */
		public static function connect(array $config)
		{
			extract($config);
			
			$dsn = "mysql:host=";

			if( isset( $mysql['host'] ) )
				$dsn .= $mysql['host'];
			else
				$dsn .= "localhost";

			if( isset( $mysql['port'] ) )
				$dsn .= ";port=" . $mysql['port'];

			if( isset( $mysql['unix_socket'] ) )
				$dsn .= ";unix_socket=" . $mysql['unix_socket'];

			$dsn .= ";dbname=";

			if( isset( $mysql['database'] ) )
				$dsn .= $mysql['database'];
			try
			{
				$connector = new PDO($dsn, $mysql['username'], $mysql['password'], array( PDO::ATTR_PERSISTENT => true ));
			}
			catch(\PDOException $e)
			{
				exit($e->getMessage());
			}

			if( isset( $config['charset'] ) )
				$connector->prepare("SET NAMES " . $config['charset'])->execute();
				$connector->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			return $connector;
		}

	}