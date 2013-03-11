<?php 

	namespace Smooth\Core;

	use Smooth\Kernel\Kernel;

	/**
	 * @author		Konstantin Rachev
	 * @version		0.1
	**/

	define('Smooth-Version', '1.0.2');

	class Smooth
	{

		private $uri;

		public function __construct()
		{
			// $this->uri = parse_url( $_SERVER['REQUEST_URI'], PHP_URL_PATH );
		}

		public static function run()
		{
			$uri = parse_url( $_SERVER['REQUEST_URI'], PHP_URL_PATH );
			new Kernel($uri);
		}	
 
	}