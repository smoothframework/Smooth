<?php 

	namespace Smooth;

	use Smooth\Errors\Handler;
	use Smooth\Template\Engine;

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
			$data['content'] = NOTFOUND;
			if( isset($vars) )
			{
				extract( $vars );
			}
				$viewPath = APPPATH . 'views/' . $name . '.php';

				// print_r($vars);
					if( file_exists( $viewPath ) )
					{
						require_once $viewPath;
						// $render = new Engine($viewPath);
						// foreach ($vars['data'] as $key => $value)
						// {
						// 	$render->set($key, $value);
						// }
						// echo $render->output();
					}
					else
					{
						self::render('includes/template', compact('data'));
					}

		}

		/**
		 * [buildOutput description]
		 * @param  [type] $content [description]
		 * @return [type]          [description]
		 */
		public static function buildOutput($request = array())
		{
			$response = array();

			foreach ($request as $key => $value)
			{
				array_push($response, array(

					$key => $value

				));
			}
			return json_encode($response);
		}
	}