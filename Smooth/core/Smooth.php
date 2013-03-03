<?php 

	namespace Smooth\Core;

	use Smooth\Core\Router;

	/**
	 * @author		Konstantin Rachev
	 * @version		0.1
	**/

	define('Smooth-Version', '1.0.2');

	class Smooth
	{

		protected $uri;

		public function __construct()
		{
			$this->uri = parse_url( $_SERVER['REQUEST_URI'], PHP_URL_PATH ); 
		}

		public static function run()
		{
			$uri = parse_url( $_SERVER['REQUEST_URI'], PHP_URL_PATH );
			new Router( $uri );
		}	

		public function __destruct()
		{
			// new Router( $this->uri );
		}

 
	}