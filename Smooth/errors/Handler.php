<?php

	namespace Smooth\Errors;

	class Handler
	{

		public function __construct()
		{
			set_error_handler(array($this, 'errorHandler'));
			set_exception_handler(array($this, 'exceptionHandler'));
		}

		public function errorHandler()
		{
			
		}

		public function exceptionHandler()
		{
			
		}

		public static function handler()
		{

		}

	}