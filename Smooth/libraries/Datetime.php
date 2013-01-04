<?php 

	namespace Smooth\Libraries;

	/**
	 * @package    Smooth Datetime Library
	 */

	class Datetime()
	{

		public static function date($format)
		{
			return date($format);
		}

		public static function time()
		{
			return date('H:i:s');
		}

		public static function time_unix()
		{
			return time();
		}

		public static function now()
		{
			return date("H:i:s:u");
		}

	}