<?php
	
	namespace Smooth\Errors;

	class Errors
	{
		public static function configure(array $params)
		{
			extract($params);

			define('ENVIRONMENT', $environment);

			if( defined('ENVIRONMENT') )
			{
				switch (ENVIRONMENT) 
				{
					case 'development':
						ini_set('log_errors', 1);
						ini_set('display_errors', 1);
						error_reporting(E_ALL | E_STRICT);
						break;
					case 'usage':
						ini_set('log_errors', 0);
						ini_set('display_errors', 0);
						error_reporting(0);
						break;
				}
			}

		}
	}