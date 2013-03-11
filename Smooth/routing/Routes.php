<?php

	namespace Smooth\Routing;

	class Routes
	{

		public $response = array();

		static $routes;

		public function setCustomRoutes($params = array())
		{
			foreach ($params as $key => $value) 
			{
				if( strpos($key, '/') !== false )
				{
					$parts = explode('/', $key);
					$controller = $parts[0];
					$method = $parts[1];
				}
				else
				{
					$controller = $key;
					$method = 'index';
				}
				// $this->response[$key] = $value;
				$this->response = array('controller' => $controller, 'method' => $method, 'redirect' => $value);
				self::$routes = $this->response;
			}
		}

		public static function getRoutes()
		{
			return self::$routes;
		}

	}