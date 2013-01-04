<?php 

	namespace Smooth\Core;

	class Router
	{

		public static $path = null;
		public static $uri = null;

		public static function operate($uri)
		{

			$path = explode('/', $uri);

			( empty( $path[2] ) ) ? $controller = ucfirst(CONTROLLER) : $controller = $path[2];				
			
			( empty( $path[3] ) ) ? $method = 'index' : $method = $path[3];

			self::load_controller($controller);
			$class_name = $controller . 'Controller';

				if( class_exists($class_name) )
				{
					$class = new $class_name;
					
					if( is_callable(array($class, $method)) )
					{
						if( count($path) == 5 )
							$class->$method($path[4]);
						else
							$class->$method();
					}
					else
					{
						exit('Oops... I could not find the action <strong>' . $method . '</strong> at <b>' . $class_name . '</b>' );
					}
				}
				else
				{
					exit('Oops... I could not find the class <strong>' . $class_name . '</strong>' );
				}

		}

		public static function load_controller($name)
		{
			$controller_path = APPPATH . 'controllers/' . $name . 'Controller.php';

			if( file_exists($controller_path) )
				include_once $controller_path;
			else
				exit('Oops... I could not find the requested controller at ' . $controller_path . '');
		}

	}