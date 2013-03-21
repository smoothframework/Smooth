<?php

	namespace Smooth\Errors;

	use Smooth\Controller;

	class Handler
	{

		public static function handler($errorMessage, $errorCode = null, $errorFile = null, $errorLine = null)
		{
			$data = array(

					'errorMessage' => $errorMessage,
					'errorCode' => $errorCode,
					'errorFile' => $errorFile,
					'errorLine' => $errorLine,
					'content' => 'ErrorView'

				);

			Controller::render('includes/template', compact('data'));
			exit();
		}

	}
