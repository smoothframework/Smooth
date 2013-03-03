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

	/**
	 * Determing that the $system_path is a real directory
	 * @var string $system_path
	 */
	if( is_dir( $system_path ) )
	{
		if( realpath( $system_path ) !== false )
		{
			define('SYSPATH', BASEPATH . $system_path . '/');
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
	 * Determing that the $app_path is a real directory
	 * @var string $app_path
	 */	
	if( is_dir( $app_path ) )
	{
		if( realpath( $app_path ) !== false )
		{
			define('APPPATH', BASEPATH . $app_path . '/');
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