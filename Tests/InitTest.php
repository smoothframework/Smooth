<?php

	require '../index.php';

	class InitTest extends PHPUnit_Framework_TestCase
	{
		
		public function testSmoothVars()
		{		
			$this->assertTrue(defined('BASEPATH'));
			$this->assertTrue(defined('APPPATH'));
			$this->assertTrue(defined('SYSPATH'));
			$this->assertTrue(defined('BASECONTROLLER'));
			$this->assertTrue(defined('NOTFOUND'));
		}

	}
