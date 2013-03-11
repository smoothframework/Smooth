<?php

	namespace Smooth\Routing;

	use Smooth\Core\Router;
	use Smooth\Kernel\Kernel;

	class Dispatcher
	{

		/**
		 * [$class_name description]
		 * @var [type]
		 */
		protected $class_name;

		/**
		 * [$class description]
		 * @var [type]
		 */
		protected $class;
		
		/**
		 * [$method description]
		 * @var [type]
		 */
		protected $method;
		
		/**
		 * [$path description]
		 * @var [type]
		 */
		protected $path;

		/**
		 * [__construct description]
		 * @param [type] $class_name [description]
		 * @param [type] $class      [description]
		 * @param [type] $method     [description]
		 * @param [type] $path       [description]
		 */
		public function __construct( $class_name, $class, $method, $path )
		{
			$this->class_name = $class_name;
			$this->class = $class;
			$this->method = $method;
			$this->path = $path;
		}

		/**
		 * [_dispatch description]
		 * @param  array  $request [description]
		 * @return [type]          [description]
		 */
		public static function _dispatch(array $request)
		{
			self::handleRequest($request);
		}

		public static function handleRequest($params)
		{
			extract($params);

			if( self::_exists( $controller . 'Controller' ) === true )
			{
				if( self::_callable( $class, $method ) === true )
				{
					if( count($path) == 5 )
						return $class->$method( $path[4] );
					else
						return $class->$method();
				}
				else
				{
					new Router( $class );
				}
			}
			else
			{
				new Router( BASECONTROLLER );
			}
		}

		/**
		 * [_exists description]
		 * @param  [type] $class [description]
		 * @return true;false       [description]
		 */
		public static function _exists( $class )
		{
			return ( class_exists( $class ) ) ? true : false;
		}

		/**
		 * [_callable description]
		 * @param  [type] $class  [description]
		 * @param  [type] $method [description]
		 * @return true;false         [description]
		 */
		public static function _callable( $class, $method )
		{
			return ( is_callable( array( $class, $method ) ) ) ? true : false;
		}

		/**
		 * [configure description]
		 * @param  array  $params [description]
		 * @return true;false         [description]
		 */
		public static function configure(array $params)
		{
			extract( $params );

			$controllerPath = APPPATH . 'controllers/' . ucfirst( $base_controller ) . 'Controller.php';
			
			if( file_exists( $controllerPath ) )
			{
				if ( is_readable( $controllerPath ) )
				{
					define('BASECONTROLLER', ucfirst( $base_controller ));
				}
				else
				{
					throw new Exception("Error Processing Request", 1);
				}
			} 
			else
			{
				throw new Exception("Error Processing Request", 1);
			}

		}

		/**
		 * [__destruct description]
		 */
		public function __destruct()
		{
			if( class_exists( $this->class_name ) )
			{

				if( is_callable( array( $this->class, $this->$method ) ) )
				{
					if( count($this->path) == 5 )
					{
						$this->class->$this->method($path[4]);
					}
					else
					{
						$this->class->$this->method();
					}
				}
				else
				{
					new Router( $class );
				}
			}
			else
			{
				new Router( BASECONTROLLER );
			}
		}

	}