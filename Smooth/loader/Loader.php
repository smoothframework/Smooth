<?php 

	namespace Smooth\Loader;

	class Loader
	{

		public function load()
		{
			// Set all the libraries you want to enable their autoload
			$data = array('config', 'form', 'generator', 'db', 'url', 'text', 'frontend', 'crypt', 'security', 'cache', 'img', 
				'math', 'cookie', 'export');

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