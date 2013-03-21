<?php

	namespace Smooth\Rest;

	use Smooth\Rest\Response;

	class Request
	{

		public $method;
		public $params = array();
		public $route;
		public $uri;
		public $data;

		public function __construct($method = null, $uri = null)
		{
			if( is_null( $method ) )
			{
				$method = isset( $_SERVER['REQUEST_METHOD'] ) ? $_SERVER['REQUEST_METHOD'] : 'GET';
			}

			if( is_null( $uri ) )
			{
				$uri = isset( $_SERVER['REQUEST_URI'] ) ? $_SERVER['REQUEST_URI'] : '/';
			}

			$uri = parse_url( $uri , PHP_URL_PATH );
			$this->uri = rtrim( $uri , '/' );
			$this->method = strtoupper( $method );
			$this->handleRequest();
		}

		public function handleRequest()
		{
			$params = array();

			switch ($this->method) 
			{
				case 'GET':
					$params = $_GET;
					break;
				
				case 'POST':
					$params = $_POST;
					break;

				case 'PUT':
					parse_str(file_get_contents('php://input'), $params);
					break;
			}
			$this->setData(json_encode($params));
		}

		public function setData($data)
		{
			$this->data = $data;
		}

		public function getData()
		{
			return $this->data;
		}

		public function getMethod()
		{
			return $this->method;
		}

		public function sendResponse()
		{
			new Response( $this->status, $body, $contentType );
		}

	}