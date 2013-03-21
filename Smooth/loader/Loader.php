<?php 

	namespace Smooth\Loader;

	use Smooth\Errors\Handler;
	use Smooth\Controller;

	class Loader
	{
		/**
		 * [$_controllersDirectory description]
		 * @var array
		 */
		protected $_controllersDirectory = array();

		/**
		 * [$_viewsDirectory description]
		 * @var array
		 */
		protected $_viewsDirectory = array();

		/**
		 * [$_modelsDirectory description]
		 * @var array
		 */
		protected $_modelsDirectory = array();

		/**
		 * [$_librariesDirectory description]
		 * @var array
		 */
		protected $_librariesDirectory = array();

		/**
		 * [$_handlersDirectory description]
		 * @var [type]
		 */
		protected $_handlersDirectory;

		public function __construct()
		{
			$this->controllersDirectory = APPPATH . 'controllers';
			$this->viewsDirectory = APPPATH . 'views';
			$this->modelsDirectory = APPPATH . 'models';
			$this->librariesDirectory = SYSPATH . 'libraries';
			$this->handlersDirectory = SYSPATH . 'handlers';
			Loader::handlersCatch();
			spl_autoload_register('configure');
		}

		/**
		 * [load description]
		 * @param  string $file
		 * @param  array  $params
		 * @return void
		 */
		public static function initialize_object($object = '', array $params = null)
		{						
			try
			{
				if( is_array( $object ) )
				{
					foreach ($object as $class) 
					{	
						if( is_readable( $class ) )
						{
							require_once $class . '.php';
						}
					}
				}
				if( is_string( $object ) )
				{
					if( is_readable( $object . '.php' ) )
					{
						require_once $object . '.php';
					}
				}
			}
			catch(Exception $e)
			{
				Handler::handler(E_USER_WARNING, $e->getMessage(), SYSPATH . 'Loader/Loader.php', 61, '');
			}
		}

		/**
		 * [library description]
		 * @param  string | array $library
		 * @return void
		 */
		public static function library($library = '')
		{
			$data['content'] = NOTFOUND;
			if( is_array( $library ) )
			{
				foreach ($library as $class) 
				{
					if( is_readable( SYSPATH . 'libraries/' . ucfirst($class) . '.php' ) )
					{
						require_once SYSPATH . 'libraries/' . ucfirst($class) . '.php';
						new $class;
						// Loader::initialize_object( SYSPATH . 'libraries/' . ucfirst($class) . '.php' );
					}
					else
					{
						// Handler::handler(E_USER_WARNING, 'Could not read the requested library', SYSPATH . 'Loader/Loader.php', 98, '');
						Controller::render('includes/template', compact($data));
					}
				}
			}
			
			if( is_string( $library ) )
			{
				if( is_readable( SYSPATH . 'libraries/' . ucfirst($library) . '.php' ) )
				{
					require_once SYSPATH . 'libraries/' . ucfirst($library) . '.php';
					Loader::initialize_object( ucfirst($library) );
				}
				else
				{
					// Handler::handler(E_USER_WARNING, 'Could not read the requested library', SYSPATH . 'Loader/Loader.php', 112);
					Controller::render('includes/template', compact($data));
				}
			}
		}

		/**
		 * [controller description]
		 * @param  string $controller     [description]
		 * @param  [type] $initController [description]
		 * @return [type]
		 */
		public static function controller($controller = '', $initController = null)
		{
			$data['content'] = NOTFOUND;
			if( is_array( $controller ) )
			{
				foreach ($controller as $class) {
					if( is_readable( APPPATH . 'controllers/' . ucfirst($controller) . 'Controller.php' ) )
					{
						$class_name = $class . 'Controller';
						Loader::initialize_object( APPPATH . 'controllers/' . $class_name );
						$initController = new $class_name;
					}
					else
					{
						$c = new Controller();
						$c->render('includes/template', compact($data));
					}
				}
			}

			if( is_string( $controller ) )
			{
				if( is_readable( APPPATH . 'controllers/' . ucfirst($controller) . 'Controller.php' ) )
				{
					$class_name = $controller . 'Controller';
					Loader::initialize_object( APPPATH . 'controllers/' . $class_name );
					$initController = new $class_name;
				}
				else
				{
					Controller::render('includes/template', compact($data));
				}
			}

			return $initController;
		}

		public static function configure(array $params)
		{
			extract($params);

			foreach ($libraries as $key => $value) {
				Loader::library( $value );
			}
		}

		public static function handlersCatch()
		{
			$configurators = glob($this->handlersDirectory . "/config.php");
			foreach ($configurators as $key => $value) 
			{
					
			}
		}

	}