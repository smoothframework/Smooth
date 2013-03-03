<?php

	namespace Smooth\Config;

	use Smooth\Routing\Dispatcher;
	use Smooth\Config\App;
	use Smooth\Errors\Errors;
	use Smooth\Loader\Loader;

	class Config
	{

		/**
		 * [set description]
		 * @param [type] $value  [description]
		 * @param array  $params [description]
		 */
		public static function set($value, array $params)
		{

			$list = array('Errors', 'App', 'Loader', 'Dispatcher', 'Database');
			
			if( in_array( $value, $list ) )
			{
				switch ($value) 
				{
					case 'Dispatcher':
						require_once SYSPATH . 'routing/Dispatcher.php';
						Dispatcher::configure( $params );
						break;
					
					case 'Loader':
						require_once SYSPATH . 'loader/Loader.php';
						Loader::configure( $params );
						break;

					case 'App';
						require_once SYSPATH . 'config/App.php';
						App::configure( $params );
						break;

					case 'Errors':
						require_once SYSPATH . 'errors/Errors.php';
						Errors::configure( $params );
						break;

					case 'Database':
						// Database::configure( $params );
						break;
				}
			}
			else
			{
				exit('Error');
			}
		}
		
	}