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
			* 	- test
			* 	- usage
			* 
			*/
			'environment' => 'development',

			'all_strict' => 1

		));