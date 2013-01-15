<?php 
	
	/**
	 * Defining the namespace
	 */
	namespace Smooth;

	/**
	 * Using the already created namespaces
	 */
	use Smooth\Core\Library;
	use Smooth\Core\Router;
	use Smooth\Core\Smooth;
	use Smooth\Loader\Loader;
	use Smooth\Database\Database;
	use Smooth\Libraries\Session;
	use Smooth\Database\Connector;

	/**
	 * Including the core files for running the Smooth framework
	 */
	require SYSPATH . 'libraries/Db.php';
	require_once APPPATH . 'config/database.php';
	require SYSPATH . 'database/Connector.php';
	require SYSPATH . 'action/Controller.php';
	require SYSPATH . 'action/Model.php';
	require SYSPATH . 'core/Library.php';
	require SYSPATH . 'core/Router.php';
	require SYSPATH . 'core/Smooth.php';
	require SYSPATH . 'loader/Loader.php';
	require SYSPATH . 'libraries/Session.php';
	require SYSPATH . 'errors/Handler.php';

	Connector::connect();

	/**
	 * Require and check the connection to the DB
	 */
	if( file_exists(SYSPATH . 'core/Database.php') )
		require_once(SYSPATH . 'core/Database.php');

	$session = new Session();