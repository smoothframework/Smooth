<?php 

	namespace Smooth\Core;

	/**
	 * @author		Konstantin Rachev
	 * @version		0.1
	**/

	class Smooth
	{

		public static $core = null;

		public function __construct()
		{

		}

		public static function sample()
		{
			if( $core == null )
			{
				$core = new Smooth;
			}
			return $core;
		}

		public static function run()
		{
			$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
			Router::operate($uri);
		}	

	}