<?php

	namespace Smooth\Errors;

	class Handler
	{

		public static function 301()
		{
			return "Moved Permanently";
		}

		public static function 302()
		{
			return "Moved Temporarly";
		}

		public static function 403()
		{
			return "Forbidden";
		}

		public static function 404()
		{
			return "Not Found";
		}

		public static function 500()
		{
			return "Server Error";
		}

		public static function 502()
		{
			return "Bad Gateway";
		}

		public static function 503()
		{
			return "Out of Resources";
		}

	}