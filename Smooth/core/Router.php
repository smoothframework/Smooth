<?php

	namespace Smooth\Core;

	use Smooth\Loader\Loader;
	use Smooth\Routing\Dispatcher;
	use Smooth\Routing\Routes;
	use Smooth\Controller;

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
		 * [$route description]
		 * @var [type]
		 */
		protected $route;

		/**
		 * [__construct description]
		 * @param string $uri [description]
		 */
		public function __construct($uri)
		{
			$this->uri = $uri;
			$this->defaultController = BASECONTROLLER;
			$data['content'] = NOTFOUND;
			if( is_object( $uri ) )
			{
				Controller::render('includes/template', compact($data));
				exit();
			}

			$this->count = substr_count($uri, '/');
			
			$this->path = explode('/', $uri);

			$route = array_diff($this->path, explode('/', URL));

			foreach ($route as $key => $value) 
			{
				$this->route[] = $value;
			}

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
			return ( empty( $this->route[0] ) ) ? $this->controller = $this->defaultController : $this->controller = $this->route[0];
		}

		/**
		 * [setMethod description]
		 * @return string [description]
		 */
		public function setMethod()
		{
			return ( empty( $this->route[1] ) ) ? $this->method = 'index' : $this->method = $this->route[1];
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

