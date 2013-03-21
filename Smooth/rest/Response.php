<?php

	namespace Smooth\Rest;

	class Response
	{

		public $status;
		public $contentType;
		public $body;

		public function __construct( $status, $body = '', $contentType = 'application/json' )
		{
			$this->status = $status;
			$this->contentType = $contentType;
			$this->body = $body;
			$this->sendResponse( $this->status, $this->body, $this->contentType );
		}

		public function sendResponse( $status, $body, $contentType )
		{
			$header = 'HTTP/1.1 ' . $status . ' ' . $this->getStatusMessage( $status );
			header( $header );
			header('Content-Type: ' . $contentType);

			if( ! is_null($body) or $body != '' or !empty($body) )
			{
				echo $body;
				exit;
			}
			else
			{

				switch($status)
				{
					case 401:
						$message = 'You must be authorized to view this page.';
						break;
					case 404:
						$message = 'The requested URL ' . $_SERVER['REQUEST_URI'] . ' was not found.';
						break;
					case 500:
						$message = 'The server encountered an error processing your request.';
						break;
					case 501:
						$message = 'The requested method is not implemented.';
						break;
				}

				$signature = ($_SERVER['SERVER_SIGNATURE'] == '') ? $_SERVER['SERVER_SOFTWARE'] . ' Server at ' . $_SERVER['SERVER_NAME'] . ' Port ' . $_SERVER['SERVER_PORT'] : $_SERVER['SERVER_SIGNATURE'];
				
				$body = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
							<html>
								<head>
									<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
									<title>' . $status . ' ' . $this->getStatusCodeMessage($this->status) . '</title>
								</head>
								<body>
									<h1>' . $this->getStatusCodeMessage($this->status) . '</h1>
									<p>' . $message . '</p>
									<hr />
									<address>' . $signature . '</address>
								</body>
							</html>';

				echo $body;
				exit;

			}

		}

		public function getStatusMessage($status)
		{

			$codes = array(

				100 => 'Continue',
				101 => 'Switching Protocols',
				200 => 'OK',
				201 => 'Created',
				202 => 'Accepted',
				203 => 'Non-Authoritative Information',
				204 => 'No Content',
				205 => 'Reset Content',
				206 => 'Partial Content',
				207 => 'Multi-Status',
				300 => 'Multiple Choices',
				301 => 'Moved Permanently',
				302 => 'Found',
				303 => 'See Other',
				304 => 'Not Modified',
				305 => 'Use Proxy',
				307 => 'Temporary Redirect',
				400 => 'Bad Request',
				401 => 'Unauthorized',
				402 => 'Payment Required',
				403 => 'Forbidden',
				404 => 'Not Found',
				405 => 'Method Not Allowed',
				406 => 'Not Acceptable',
				407 => 'Proxy Authentication Required',
				408 => 'Request Timeout',
				409 => 'Conflict',
				410 => 'Gone',
				411 => 'Length Required',
				412 => 'Precondition Failed',
				413 => 'Request Entity Too Large',
				414 => 'Request-URI Too Long',
				415 => 'Unsupported Media Type',
				416 => 'Requested Range Not Satisfiable',
				417 => 'Expectation Failed',
				422 => 'Unprocessable Entity',
				423 => 'Locked',
				424 => 'Failed Dependency',
				500 => 'Internal Server Error',
				501 => 'Not Implemented',
				502 => 'Bad Gateway',
				503 => 'Service Unavailable',
				504 => 'Gateway Timeout',
				505 => 'HTTP Version Not Supported',
				507 => 'Insufficient Storage',
				509 => 'Bandwidth Limit Exceeded'

			);
			
			return ( isset( $codes[$status] ) ) ? $codes[$status] : '';

		}

	}