<?php

	/* Defining the namespace */
	namespace Smooth\Libraries;

	class Session
	{

		public function __construct()
		{
			$_SESSION['last_active'] = time();
		}
		public static function set()
		{
			if( time() > $_SESSION['last_active'] + 900 )
			{
				self::destroy();
			}
			else
			{
				session_start();
			}
		}
		public static function init($name, $value)
		{
			return $_SESSION[$name] = $value;
		}
		public static function get($name)
		{
			return $_SESSION[$name];
		}
		public static function destroy()
		{
			return session_destroy();
		}

	}