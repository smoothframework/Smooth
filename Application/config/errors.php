<?php

	use Smooth\Config\Config;

	Config::set('Errors', array(

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
			'environment' => 'development',

			'log_errors' => 1,

			'display_errors' => 1,

			'all_strict' => 1

		));