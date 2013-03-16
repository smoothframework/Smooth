<?php 
	
	/**
	 * Defining the namespace
	 */
	namespace Smooth;

	/**
	 * Using the already created namespaces
	 */
	use Smooth\Libraries\Session;
	use Smooth\Database\Connector;
	use Smooth\Config\Security;

	require_once SYSPATH . 'database/Connector.php';
	require_once SYSPATH . 'action/Controller.php';
	require_once SYSPATH . 'action/Model.php';
	require_once SYSPATH . 'core/Library.php';
	require_once SYSPATH . 'core/Router.php';
	require_once SYSPATH . 'core/Smooth.php';
	require_once SYSPATH . 'loader/Loader.php';
	require_once SYSPATH . 'errors/Handler.php';
	require_once SYSPATH . 'config/Config.php';
	require_once SYSPATH . 'routing/Dispatcher.php';
	require_once SYSPATH . 'kernel/Kernel.php';
	require_once SYSPATH . 'config/Security.php';

	require_once SYSPATH . 'routing/Routes.php';

	require_once APPPATH . 'config/database.php';
	require_once APPPATH . 'config/routes.php';
	require_once APPPATH . 'config/app.php';
	require_once APPPATH . 'config/errors.php';
	require_once APPPATH . 'config/loader.php';

	require_once SYSPATH . 'http/Request.php';
	require_once SYSPATH . 'http/Response.php';

	new Connector();
	new Session();
	new Security();
