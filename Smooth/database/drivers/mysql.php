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
			$dsn = "mysql:host=";

			if( isset( $config['host'] ) )
				$dsn .= $config['host'];
			else
				$dsn .= "localhost";

			if( isset( $config['port'] ) )
				$dsn .= ";port=" . $config['port'];

			if( isset( $config['unix_socket'] ) )
				$dsn .= ";unix_socket=" . $config['unix_socket'];

			$dsn .= ";dbname=";

			if( isset( $config['database'] ) )
				$dsn .= $config['database'];
			try
			{
				$connector = new PDO($dsn, $config['username'], $config['password'], array( PDO::ATTR_PERSISTENT => true ));
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