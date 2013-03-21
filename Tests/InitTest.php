<?php

	require_once 'index.php';

	class InitTest extends PHPUnit_Framework_TestCase
	{
		
		public function testIfSmoothConstantsAreDefined()
		{		
			$this->assertTrue(defined('BASEPATH'));
			$this->assertTrue(defined('APPPATH'));
			$this->assertTrue(defined('SYSPATH'));
			$this->assertTrue(defined('BASECONTROLLER'));
			$this->assertTrue(defined('NOTFOUND'));
		}

	}
