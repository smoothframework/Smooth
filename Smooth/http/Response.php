<?php
	
	namespace Smooth\Http;

	class Response
	{

		public $body = '';

		public $headers = array();

	   	public function __construct($response) {
	        # Headers regex
	        $pattern = '#HTTP/\d\.\d.*?$.*?\r\n\r\n#ims';
	        
	        # Extract headers from response
	        preg_match_all($pattern, $response, $matches);
	        $headers_string = array_pop($matches[0]);
	        $headers = explode("\r\n", str_replace("\r\n\r\n", '', $headers_string));
	        
	        # Remove headers from the response body
	        $this->body = str_replace($headers_string, '', $response);
	        
	        # Extract the version and status from the first header
	        $version_and_status = array_shift($headers);
	        preg_match('#HTTP/(\d\.\d)\s(\d\d\d)\s(.*)#', $version_and_status, $matches);
	        $this->headers['Http-Version'] = $matches[1];
	        $this->headers['Status-Code'] = $matches[2];
	        $this->headers['Status'] = $matches[2].' '.$matches[3];
	        
	        # Convert headers into an associative array
	        foreach ($headers as $header) {
	            preg_match('#(.*?)\:\s(.*)#', $header, $matches);
	            $this->headers[$matches[1]] = $matches[2];
	        }
	    }
	    
	    /**
	     * Returns the response body
	     *
	     * <code>
	     * $curl = new Curl;
	     * $response = $curl->get('google.com');
	     * echo $response;  # => echo $response->body;
	     * </code>
	     *
	     * @return string
	    **/
	    public function __toString() {
	        return $this->body;
	    }
	    

	}