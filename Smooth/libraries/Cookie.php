<?php

	namespace Smooth\Libraries;

	/**
	 * @package    Smooth Cookie Library
	 */

	class Cookie
	{

		/**
		 * [set description]
		 * @param string $name
		 * @param string | int | array $value
		 * @param string
		 * @return void
		 */
		public static function set($name, $value, $time="3600") 
		{
			$expire = time()+$time;
			return setcookie($name, $value, $expire);
		}

		/**
		 * [get description]
		 * @param  string $name
		 * @return string
		 */
		public static function get($name)
		{
			return $_COOKIE[$name];
		}

		/**
		 * [delete description]
		 * @param  string $name
		 * @return void
		 */
		public static function delete($name)
		{
			return setcookie($name, "", time()-3600);
		}

	}