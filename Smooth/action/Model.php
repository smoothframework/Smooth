<?php 

	class Model
	{
		public static function load($name)
		{
			$model_path = APPPATH . 'models/' . ucfirst($name) . 'Model.php';
			
			if( file_exists($model_path) )
				require $model_path;
			else
				exit('I could not find the <b>' . $name . '</b> model at <b> ' . $model_path . '</b>');

		}
	}