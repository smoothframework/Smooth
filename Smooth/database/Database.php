<?php
	
	use Smooth\Config\Database;

	class Database
	{
		private static $_instance = null;

		public function __construct()
		{
			if()
			{

			}
		}

		public static function & Instance()
		{
			if( self::$_instance == null )
			{
				self::$_instance = new Database();
			}
			return self::$_instance;
		}

		public function __destruct()
		{

		}

		public function __clone()
		{
		  trigger_error('Cloning instances of this class is forbidden.', E_USER_ERROR);
		}

		public function __wakeup()
		{
		  trigger_error('Unserializing instances of this class is forbidden.', E_USER_ERROR);
		}

	}