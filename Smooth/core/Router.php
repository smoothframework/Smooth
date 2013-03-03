<?php

	namespace Smooth\Core;

	use Smooth\Loader\Loader;
	use Smooth\Routing\Dispatcher;

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

		public function __construct($uri)
		{
			$this->uri = $uri;
			$this->defaultController = BASECONTROLLER;
			$this->path = explode('/', $uri);

			( empty( $this->path[2] ) ) ? $this->controller = $this->defaultController : $this->controller = $this->path[2];

			( empty( $this->path[3] ) ) ? $this->method = 'index' : $this->method = $this->path[3];

			$this->class = Loader::controller( $this->controller );

			// $this->getController( $this->path[2] );
			// $this->getMethod( $this->path[3] );
			// Dispatcher::_dispatch( $this->getResponse() );

		}

		public function getController( $controller )
		{
			return ( empty( $controller ) ) ? $this->controller = $this->defaultController : $this->controller = $controller;
		}

		public function getMethod( $method )
		{
			return ( empty( $method ) ) ? $this->method = 'index' : $this->method = $method;
		}

		public function getResponse()
		{
			return array(
					'controller' => $this->controller, 
					'method' => $this->method,
					'path' => $this->path,
					'class' => Loader::controller( $this->controller )
				);	
		}

		public function __destruct()
		{
			Dispatcher::_dispatch(
				array(

						'controller' => $this->controller,
						'class' => $this->class,
						'path' => $this->path,
						'method' => $this->method

					)
				);
			// new Dispatcher($this->class_name, $this->class, $this->method, $this->path);
		}
	}

