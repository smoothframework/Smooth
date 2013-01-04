<?php

	namespace Smooth\Libraries;

	/**
	 * @package    Smooth Cookie Library
	 */

	class Cookie
	{

		public static function set($name, $value, $time="3600") 
		{
			$expire = time()+$time;
			return setcookie($name, $value, $expire);
		}

		public static function get($name)
		{
			return $_COOKIE[$name];
		}

		public static function delete($name)
		{
			return setcookie($name, "", time()-3600);
		}

	}