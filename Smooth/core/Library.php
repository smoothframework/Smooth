<?php 

	/* Defining the namespace */
	namespace Smooth\Core;

	class Library
	{
		public static function load($name)
		{
			$library_path = SYSPATH . 'libraries/' . $name . '.php';

				if( file_exists($library_path) )
					require $library_path;
				else
					exit('I could not find the <b>' . $name . '</b> library at <b>' . $library_path . '</b>');
		}

		public static function autoload()
		{
			// Set all the libraries you want to enable their autoload
			$data = array('config', 'form', 'generator', 'db', 'url', 'text', 'frontend', 'crypt', 'security', 'cache', 'img', 'math');

			foreach($data as $library)
			{
				$library_path = SYSPATH . 'libraries/' . ucfirst($library) . '.php';
				if( file_exists($library_path) )
					include $library_path;
				else
					exit('I can not find <b>' . $library . '</b> library at <b>' . $library_path . '</b>');
			}

		}
	}