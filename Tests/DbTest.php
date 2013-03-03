<?php

	require 'vendor/autoload.php';

	class DbTest extends PHPUnit_Framework_TestCase
	{

		public function testConnection()
		{
			$connection = new Db;
			$this->assertEquals(4, $connection->add(2, 2));
		}

	}