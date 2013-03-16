<?php

	namespace Smooth\Kernel;

	use Smooth\Http\Request;
	use Smooth\Core\Router;
	use Smooth\Routing\Dispatcher;

	class Kernel
	{
		public $url;

		private $response;

		/**
		 * [__construct description]
		 * @param [type] $url [description]
		 */
		public function __construct( $url )
		{
			( !empty( $url ) ) ? $this->url = $url : $this->url = parse_url( $_SERVER['REQUEST_URI'], PHP_URL_PATH );
			$this->handleRequest($this->url);
		}

		/** [handleRequest description] */
		public function handleRequest($url)
		{
			$router = new Router( $url );
			$this->response = $router->getResponse();
			$this->sendResponse();
		}

		/**
		 * [sendResponse description]
		 * @return [type] [description]
		 */
		public function sendResponse()
		{
			extract($this->response);
			Dispatcher::_dispatch(
				array(

						'controller' => $controller,
						'class' => $class,
						'path' => $path,
						'method' => $method

					)
				);
		}

	}