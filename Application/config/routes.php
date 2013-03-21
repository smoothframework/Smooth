<?php
	
	use Smooth\Config\Config;

	Config::set('Dispatcher', array(

			'baseController' => 'welcome', /* The default controller view */
			'missingView' => '404View' /* 404 error not found view */

		));

	// Limit: 1 url rewrite(beta; test period), due to issues, which will be fixed and added into the next beta version of Smooth;
	Config::set('Routes', array(

			// 'welcome/test' => 'test/t'

		));