<?php 

	namespace Smooth;

	use Smooth\Errors\Handler;

	class Controller
	{
		public $responce = null;

		public $request = null;

		public $load;

		public static $vars = array();

		public function __construct()
		{
			$this->load = new Model();
		}

		/**
		 * [render description]	
		 * @param  [type] $name [description]
		 * @param  [type] $vars [description]
		 * @return [type]       [description]
		 */
		public static function render($name, $vars = null)
		{
			if( isset($vars) )
				extract( $vars );

			$controller_path = APPPATH . 'views/' . $name . '.php';
				if( file_exists($controller_path) )
				{
					require_once $controller_path;
					// header('Content-Type: application/json; charset=utf8');
			        // echo json_encode($content);
			        // return true;
				}
				else
				{
					Handler::handler(E_USER_ERROR, 'Could not find the requested view at ' . $controller_path, 
						SYSPATH . 'action/Controller.php', 22);
				}
		}

		protected static function buildOutput($content)
		{
			return json_encode($content, JSON_NUMERIC_CHECK);
		}
	}