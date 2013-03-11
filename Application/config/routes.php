<?php
	
	use Smooth\Config\Config;

	Config::set('Dispatcher', array(

			'base_controller' => 'welcome',
			'404_missing' => 'test'

		));

	// Limit: 1 url rewrite(beta; test period), due to issues, which will be fixed and added into the next beta version of Smooth;
	Config::set('Routes', array(

			'welcome/test' => 'test/t'

		));