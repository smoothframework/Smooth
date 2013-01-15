<?php

	namespace Smooth\Core;

	use Smooth\Loader\Loader;

	class Router
	{

		/**
		 * [$class description]
		 * @var [type]
		 */
		public $class = '';
		/**
		 * [$method description]
		 * @var string
		 */
		public $method = 'index';

		/**
		 * [$defaultController description]
		 * @var [type]
		 */
		public $defaultController = BASECONTROLLER;

		/**
		 * [$path description]
		 * @var [type]
		 */
		public $path = null;

		/**
		 * [$uri description]
		 * @var [type]
		 */
		public static $uri = null;

		/**
		 * [operate description]
		 * @param  [type] $uri [description]
		 * @return [type]
		 */
		public static function operate($uri)
		{

			$path = explode('/', $uri);

			( empty( $path[2] ) ) ? $controller = BASECONTROLLER : $controller = $path[2];	

			( empty( $path[3] ) ) ? $method = 'index' : $method = $path[3];
				
				$class = Loader::controller( $controller );
				$class_name = $controller . 'Controller';

				if( class_exists( $class_name ) )
				{

					if( is_callable( array( $class, $method ) ) )
					{
						if( count($path) == 5 )
							$class->$method($path[4]);
						else
							$class->$method();
					}
					else
					{
						Router::operate( $class );
						// exit('Oops... I could not find the action <strong>' . $method . '</strong> at <b>' . $controller . '</b>' );
					}
				}
				else
				{
					Router::operate( BASECONTROLLER );
					// exit('Oops... I could not find the class <strong>' . $controller . 'Controller' . '</strong>' );
				}

		}

		public function set_controller( $request )
		{
			( empty( $request ) ) ? $controller = BASECONTROLLER : $controller = $path[2];
			return $controller;
		}

	}