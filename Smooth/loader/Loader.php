<?php 

	namespace Smooth\Loader;

	class Loader
	{

		public function load()
		{
			// Set all the libraries you want to enable their autoload
			$data = array('form', 'generator', 'db', 'url', 'frontend', 'crypt', 'math', 'datetime');

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
