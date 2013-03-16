<?php

	use Smooth\Database\Connector;

	class MongoDB
	{

		/**
		 * [connect description]
		 * @param  array  $config [description]
		 * @return [type]         [description]
		 */
		public static function connect(array $config)
		{
			extract($config);
			$connection = new MongoClient("mongodb://" . $username . ":" . $password . "@" . $host . "");

			return $connection;
		}

	}