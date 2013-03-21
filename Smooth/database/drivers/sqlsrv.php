<?php

	use Smooth\Database\Connector;

	class Sqlsrv
	{

		/**
		 * [connect description]
		 * @param  array  $config [description]
		 * @return [type]         [description]
		 */
		public static function connect(array $config)
		{
			$dsn = "mysql:Server=";

			if( isset( $config['host'] ) )
				$dsn .= $config['host'];
			else
				$dsn .= "localhost";

			if( isset( $config['port'] ) )
				$dsn .= "," . $config['port'];

			$dsn .= ";Database=";

			if( isset( $config['database'] ) )
				$dsn .= $config['database'];
			try
			{
				$connector = new PDO($dsn, $config['username'], $config['password']);
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