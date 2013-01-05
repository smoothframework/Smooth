<?php 

	/* Define the namespace */
	namespace Smooth;

	/* Using the created namespaces without the Controller and the Model */
	use Smooth\Core\Library;
	use Smooth\Core\Router;
	use Smooth\Core\Smooth;
	use Smooth\Loader\Loader;
	use Smooth\Database\Database;
	use Smooth\Libraries\Session;

	/* Including the core files for running the Smooth framework */
	include SYSPATH . 'action/Controller.php';
	include SYSPATH . 'action/Model.php';
	include SYSPATH . 'core/Library.php';
	include SYSPATH . 'core/Router.php';
	include SYSPATH . 'core/Smooth.php';
	include SYSPATH . 'database/Database.php';
	include SYSPATH . 'loader/Loader.php';
	include SYSPATH . 'libraries/Session.php';

	/* Initializing the Autoload function for all the libraries */
	$loader = new Loader();
	$loader->load();

	/* Checking for the Database connection */
	if( file_exists(SYSPATH . 'core/Database.php') )
		require_once(SYSPATH . 'core/Database.php');

	/* Initializing and starting the Session */
	$session = new Session();
	$session->set();
