<?php 

	class Controller 
	{
		public static $vars = array();

		public static function render($name, $vars = null)
		{
			if( isset($vars) )
				extract( $vars );

			$controller_path = APPPATH . 'views/' . $name . '.php';
				if( file_exists($controller_path) )
					require $controller_path;
				else
					exit('Could not find the requested view at <pre>' . $controller_path . '</pre>');
		}
	}