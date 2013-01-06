<?php

	/**
	* 
	* Smooth framework version 0.0.1
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
	 * App path configuration
	 * ----------------------
	 *
	 * You should set your application paths carefully. 
	 * They are set by default, however you can change the directory names as you wish.
	 * 
	 */
	
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
	 */
	
	$app_path = 'Application';

	/**
	 * Web path configuration
	 * -------------------------
	 * This one sets the proper directory of the Smooth's system files.
	 */
	
	$web_path = 'Smooth';

	/**
	 * Base controller configuration
	 * -------------------------
	 * Sets the exact name of the wanted controller, which to be firstly loaded
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
	define('BASEPATH', dirname(realpath(__FILE__)) . '/');
	define('APPPATH', BASEPATH . $app_path . '/');
	define('SYSPATH', BASEPATH . $system_path . '/');
	define('WEBPATH', (isset($_SERVER['HTTPS'])?'https://':'http://') . getenv('HTTP_HOST') . '/' . $web_path. '/');
	define('BASECONTROLLER', $base_controller);
	define('SMOOTH_V', '0.0.1');

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
