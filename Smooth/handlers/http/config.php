<?php

	use Smooth\Config\Config;

		Config::set('Http', array(

			'key' => 'http',
			'factory' => SYSPATH . 'http/Request.php'

		));
