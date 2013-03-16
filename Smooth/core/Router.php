<?php

	namespace Smooth\Core;

	use Smooth\Loader\Loader;
	use Smooth\Routing\Dispatcher;
	use Smooth\Routing\Routes;

	class Router
	{

		/**
		 * [$class description]
		 * @var [type]
		 */
		protected $class;
		/**
		 * [$method description]
		 * @var string
		 */
		protected $method;

		/**
		 * [$defaultController description]
		 * @var [type]
		 */
		protected $defaultController;

		/**
		 * [$path description]
		 * @var [type]
		 */
		protected $path;

		/**
		 * [$uri description]
		 * @var [type]
		 */
		protected $uri;
		
			/**
		 * [$controller description]
		 * @var [type]
		 */
		protected $controller;

		/**
		 * [__construct description]
		 * @param string $uri [description]
		 */
		public function __construct($uri)
		{
			$this->uri = $uri;
			$this->defaultController = BASECONTROLLER;
			if( is_object( $uri ) )
				exit('There is no existing controller method!');

			$this->path = explode('/', $uri);

			$this->setController();
			$this->setMethod();
			$this->checkRouting();

			$this->class = Loader::controller( $this->controller );

		}

		/**
		 * [setController description]
		 * @return string [description]
		 */
		public function setController()
		{
			return ( empty( $this->path[2] ) ) ? $this->controller = $this->defaultController : $this->controller = $this->path[2];
		}

		/**
		 * [setMethod description]
		 * @return string [description]
		 */
		public function setMethod()
		{
			return ( empty( $this->path[3] ) ) ? $this->method = 'index' : $this->method = $this->path[3];
		}

		/**
		 * [checkRouting description]
		 * @return [type] [description]
		 */
		public function checkRouting()
		{	
			$route = Routes::getRoutes();
			if( count( $route ) > 0 )
			{
				extract($route);
				if( strtolower($this->controller) === strtolower($controller) and strtolower($this->method) === strtolower($method) )
				{
					$n = explode('/', $redirect);
					$this->controller = $n[0];
					$this->method = $n[1];
				}
			}
		}


		/**
		 * [getController description]
		 * @param  [type] $controller [description]
		 * @return string             [description]
		 */
		public function getController( $controller )
		{
			return $this->controller;
		}

		/**
		 * [getMethod description]
		 * @return string [description]
		 */
		public function getMethod()
		{
			return $this->method;
		}

		/**
		 * [getResponse description]
		 * @return array [description]
		 */
		public function getResponse()
		{
			return array(
					'controller' => $this->controller, 
					'method' => $this->method,
					'path' => $this->path,
					'class' => Loader::controller( $this->controller )
				);	
		}

	}

