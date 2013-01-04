<?php

	namespace Smooth\Config;

	class Config
	{
		
		public static function set()
		{
			$system_path = 'Smooth';
			$app_path = 'application';
			$web_path = 'Smooth';
			$base_controller = 'test';

			define('BASEPATH', dirname(realpath(__FILE__)) . '/');
			define('APPPATH', BASEPATH . $app_path . '/');
			define('SYSPATH', BASEPATH . $system_path . '/');
			define('WEBPATH', (isset($_SERVER['HTTPS'])?'https://':'http://') . $_SERVER['SERVER_NAME'] . '/' . $web_path. '/');
			define('CONTROLLER', $base_controller);
		}

	}