<?php

	/**
	* 
	* Smooth framework version 1.0.2
	*
	* Php framework based on PHP 5.3+
	*
	* Smooth is under MIT License
	*
	* @package Smooth
	* @author Konstantin Rachev
	* @link http://smoothphp.com
	* @license http://opensource.org/licenses/MIT
	* 
	*/

	/**
	* Setting up the environment configuration
	* ----------------------------------------
	*
	* In this way you can you can enable strict error reporting or disable. 
	* This feature is useful when developing and testing your apps.
	*
	* Available values:
	* 	- development(set by default)
	* 	- usage
	* 
	*/
	define('ENVIRONMENT', 'development');
	
	if( defined('ENVIRONMENT') )
	{
		switch (ENVIRONMENT) {
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
			default:
				die('The environment is not set');
				break;
		}
	}

	/**
	 * PHP version checker
	 * -------------------
	 *
	 * In order to run Smooth with all its features enabled we should check the PHP version installed on your system.
	 * You need version greater than 5.3.0 to run our product. Check latest version on http://php.net
	 * 
	 */
	if( phpversion() < '5.3.0' )
	{
		exit('Please update your PHP server version with the latest stable from php.net');
	}

	/**
	 * System path configuration
	 * -------------------------
	 * This one sets the proper directory of the Smooth's system files.
	 */
	
	$system_path = 'Smooth';
	
	/**
	 * Application path configuration
	 * -------------------------
	 * This one sets the proper directory of the Smooth's application files.
	 * @var string $system_path
	 */
	
	$app_path = 'Application';

	/**
	 * Web path configuration
	 * -------------------------
	 * This one sets the proper directory of the Smooth's system files.
	 * @var string $web_path 
	 */
	
	$web_path = 'Smooth';

	/**
	 * Base controller configuration
	 * -------------------------
	 * Sets the exact name of the wanted controller, which to be firstly loaded
	 * @var string $base_controller
	 */	
	
	$base_controller = 'welcome';

	/**
	 * Settings the REQUEST_URI server variable
	 * ---------------------------------------- 
	 */
	if ( ! isset($_SERVER['REQUEST_URI']))
	{
		$_SERVER['REQUEST_URI'] = substr($_SERVER['PHP_SELF'],1 );
		if (isset($_SERVER['QUERY_STRING'])) 
		{ 
			$_SERVER['REQUEST_URI'].='?'.$_SERVER['QUERY_STRING']; 
		}
	}

	/**
	 * Defining the Smooth variables
	 * -----------------------------
	 */
	
	use Smooth\Errors\Handler;

	define('BASEPATH', dirname(realpath(__FILE__)) . '/');

	/**
	 * Determing that the $app_path is a real directory
	 * @var string $app_path
	 */
	if( is_dir( $app_path ) )
	{
		if( realpath( $app_path ) !== false )
		{
			define('APPPATH', realpath(BASEPATH . $app_path) . '/');
		}
	}
	else
	{
		if( ! is_dir( $app_path ) )
		{
			Handler::handler(E_USER_ERROR, 'The ' . $app_path . ' is not a valid directory', 'index.php', 138);
		}
	}

	/**
	 * Determing that the $system_path is a real directory
	 * @var string $system_path
	 */
	if( is_dir( $system_path ) )
	{
		if( realpath( $system_path ) !== false )
		{
			define('SYSPATH', realpath(BASEPATH . $system_path) . '/');
		}
	}
	else
	{
		if( ! is_dir( $system_path ) )
		{
			Handler::handler(E_USER_ERROR, 'The ' . $system_path . ' is not a valid directory', 'index.php', 146);
		}
	}

	/**
	 * Determing that the $web_path is a real directory
	 * @var string $web_path
	 */
	if( is_dir( $web_path ) )
	{
		if( realpath( $web_path ) !== false )
		{
			define('WEBPATH', (isset($_SERVER['HTTPS'])?'https://':'http://') . getenv('HTTP_HOST') . '/' . $web_path. '/');
		}
	}
	else
	{
		if( ! is_dir( $web_path ) )
		{
			Handler::handler(E_USER_ERROR, 'The ' . $web_path . ' is not a valid directory', 'index.php', 146);
		}
	}	

	/**
	 * Determing that the $base_controller exists and is readable
	 * @var string $base_controller
	 */
	if( file_exists( APPPATH . 'controllers' . ucfirst($base_controller) . 'Controller.php' ) )
	{
		if ( is_readable( APPPATH . 'controllers' . ucfirst($base_controller) . 'Controller.php' ) )
		{
			define('BASECONTROLLER', ucfirst($base_controller) . 'Controller.php');
		}
	}

	/**
	 * Defening the current Smooth framework version
	 */
	define('SMOOTH_V', '1.0.2');

	/**
	 * Loading our main kernel file
	 * ----------------------------
	 */
	require_once SYSPATH . '/core/Core.php';
	use Smooth\Core\Smooth;

	/**
	 * Initializing the configuration and running the Smooth framework
	 * ----------------------------
	 */
	$smooth = new Smooth();
	$smooth->run();
