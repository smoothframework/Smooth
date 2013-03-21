<?php

	use Smooth\Database\Connector;

	class Pgsql
	{

		/**
		 * [connect description]
		 * @param  array  $config [description]
		 * @return [type]         [description]
		 */
		public static function connect(array $config)
		{
			$dsn = "pgsql:host=";

			if( isset( $config['host'] ) )
				$dsn .= $config['host'];
			else
				$dsn .= "localhost";

			if( isset( $config['port'] ) )
				$dsn .= ";port=" . $config['port'];

			$dsn .= ";dbname=";

			if( isset( $config['database'] ) )
				$dsn .= $config['database'];

			$dsn .= ";user=";

			if( isset( $config['username'] ) )
				$dsn .= $config['username'];

			$dsn .= ";password=";

			if( isset( $config['password'] ) )
				$dsn .= $config['password'];

			try
			{
				$connector = new PDO($dsn);
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