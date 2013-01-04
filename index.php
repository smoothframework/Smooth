<?php

	/**
	* Smooth PHP Framework 0.0.1
	* by Konstantin Rachev
	* email: konstantin.rachev.web@gmail.com; website: konstantinrachev.com
	**/

	// Setting up the environment. Possibilities: development(default) and usage.
	define('ENVIRONMENT', 'development');

	if( defined('ENVIRONMENT') )
	{
		switch (ENVIRONMENT) {
			case 'development':
				ini_set('display_errors', 1);
				error_reporting(E_ALL | E_STRICT);
				break;
			case 'usage':
				ini_set('display_errors', 0);
				error_reporting(0);
				break;
			default:
				die('The environment is not set');
				break;
		}
	}

	// Check for php version compability
	if( phpversion() < '5.3.0' )
	{
		exit('Please update your PHP server version with the latest stable from php.net');
	}

	$system_path = 'Smooth';
	$app_path = 'Application';
	$web_path = 'Smooth';
	$base_controller = 'welcome';

	define('BASEPATH', dirname(realpath(__FILE__)) . '/');
	define('APPPATH', BASEPATH . $app_path . '/');
	define('SYSPATH', BASEPATH . $system_path . '/');
	define('WEBPATH', (isset($_SERVER['HTTPS'])?'https://':'http://') . $_SERVER['SERVER_NAME'] . '/' . $web_path. '/');
	define('CONTROLLER', $base_controller);
	define('SMOOTH_V', '0.0.1');

	require_once SYSPATH . '/core/Core.php';
	use Smooth\Core\Smooth;

	$smooth = new Smooth();
	$smooth->run();
