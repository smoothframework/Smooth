<?php

	if( version_compare(PHP_VERSION, '5.3.0', '<') )
	{
		exit('Please update your PHP server version with the latest stable from php.net');
	}

	$extensions = array(
			'pdo_mysql',
			'pdo_sqlite',
			'pdo_sqlsrv',
			'pgsql',
			'mongo',
			'sqlite3'
		);

	if( ! in_array($extensions, get_loaded_extensions()) )
	{
		exit('Please install the missing php extensions.');
	}