<?php

	include 'https://raw.github.com/smoothframework/Smooth/master/index.php';

	class InitTest extends PHPUnit_Framework_TestCase
	{
		
		public function test_smooth_vars()
		{		
			$this->assertTrue(defined('BASEPATH'));
			$this->assertTrue(defined('APPPATH'));
			$this->assertTrue(defined('SYSPATH'));
			$this->assertTrue(defined('WEBPATH'));
			$this->assertTrue(defined('BASECONTROLLER'));
			$this->assertTrue(defined('SMOOTH_V'));
			$this->assertTrue(isset($_SERVER['REQUEST_URI']));
		}

	}
