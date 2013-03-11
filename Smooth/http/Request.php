<?php

	namespace Smooth\Http;

	use Smooth\Http\Response;

	class Request
	{
		private $request;
		private $url;
		private $method;
		private $userAgent;

		/**
		 * [__construct description]
		 * @param [type] $url    [description]
		 * @param [type] $method [description]
		 */
		public function __construct($url = null, $method = null)
		{
			( isset( $_SERVER['HTTP_USER_AGENT'] ) ) ? $this->userAgent = $_SERVER['HTTP_USER_AGENT'] : $this->userAgent = 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US) AppleWebKit/525.19 (KHTML, like Gecko) Chrome/1.0.154.53 Safari/525.19';
		}

		/**
		 * [delete description]
		 * @param  [type] $url  [description]
		 * @param  array  $vars [description]
		 * @return [type]       [description]
		 */
	    public function delete($url, $vars = array())
	    {
	    	$this->method = 'DELETE';
	    	return $this->request($url, 'DELETE', $vars);
	    }

	    /**
	     * [get description]
	     * @param  [type] $url  [description]
	     * @param  array  $vars [description]
	     * @return [type]       [description]
	     */
	    public function get($url, $vars = array())
	    {
	    	$this->method = 'GET';
	    	return $this->request($url, 'GET', $vars);
	    }

	    /**
	     * [head description]
	     * @param  [type] $url  [description]
	     * @param  array  $vars [description]
	     * @return [type]       [description]
	     */
	    public function head($url, $vars = array())
	    {
	    	$this->method = 'HEAD';
	    	return $this->request($url, 'HEAD', $vars);
	    }

	    /**
	     * [put description]
	     * @param  [type] $url  [description]
	     * @param  array  $vars [description]
	     * @return [type]       [description]
	     */
	    public function put($url, $vars = array())
	    {
	    	$this->method = 'PUT';
	    	return $this->request($url, 'PUT', $vars);
	    }

	    /**
	     * [post description]
	     * @param  [type] $url  [description]
	     * @param  array  $vars [description]
	     * @return [type]       [description]
	     */
	    public function post($url, $vars=array())
	    {
	    	$this->method = 'POST';
	    	return $this->request($url, 'POST', $vars);
	    }

	    /**
	     * [setMethod description]
	     * @param string $method [description]
	     */
		public function setMethod($method = 'GET')
		{	
			( isset( $this->method ) ) ? $method = strtoupper($this->method) : strtoupper($method);
		
			switch ($method) 
			{
				case 'GET':
					curl_setopt($this->request, CURLOPT_HTTPGET, true);
					break;
				
				case 'POST':
					curl_setopt($this->request, CURLOPT_POST, true);
					break;

				case 'PUT':
					curl_setopt($this->request, CURLOPT_PUT, true);
					break;

				case 'DELETE':
					curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
					break;

				case 'HEAD':
					curl_setopt($this->request, CURLOPT_NOBODY, true);
					break;

				default:
					curl_setopt($this->request, CURLOPT_CUSTOMREQUEST, $this->method);
					break;
			}
		}

		/**
		 * [setUrl description]
		 * @param [type] $url [description]
		 */
		public function setUrl($url)
		{
			curl_setopt($this->request, CURLOPT_URL, $url);
		}

		/**
		 * [setUserAgent description]
		 * @param [type] $userAgent [description]
		 */
		public function setUserAgent($userAgent)
		{
			curl_setopt($this->request, CURLOPT_USERAGENT, $userAgent);
		}

		/**
		 * [setReturnTransfer description]
		 */
		public function setReturnTransfer()
	    {
	    	curl_setopt($this->request, CURLOPT_RETURNTRANSFER, true);
	    }

	    /**
	     * [request description]
	     * @param  [type] $url    [description]
	     * @param  [type] $method [description]
	     * @param  array  $vars   [description]
	     * @return [type]         [description]
	     */
		public function request($url = null, $method = null, $vars = array())
		{
			$this->request = curl_init();

			if (!empty($vars)) curl_setopt($this->request, CURLOPT_POSTFIELDS, $vars);
			curl_setopt ($this->request, CURLOPT_HEADER, true);
			curl_setopt ($this->request, CURLOPT_SSL_VERIFYPEER, FALSE);
			curl_setopt ($this->request, CURLOPT_TIMEOUT, 0);
			curl_setopt ($this->request, CURLOPT_FOLLOWLOCATION,1);
			curl_setopt ($this->request, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt ($this->request, CURLINFO_HEADER_OUT, true);
			curl_setopt($this->request, CURLOPT_URL, $url);

			$this->setMethod( $this->method );
			$this->setUserAgent( $this->userAgent );
			$this->setReturnTransfer();

			$response = curl_exec($this->request);

			if( $response )
			{
				$response = new Response( $response );
			}
			else
			{
				$response = curl_errno($this->request).' Curl Error: '. curl_error($this->request);
			}

			curl_close($this->request);

			return $response;
		}
	}