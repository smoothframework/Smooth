<?php

	namespace Smooth\Libraries;

	class Security
	{

		public static function removeHtmlEntities($data = '', $ent = ENT_QUOTES, $type = 'UTF-8')
		{
			return htmlentities($data, $ent, $type);
		}

		public static function removeHtmlSpecialChars($data='', $ENT = ENT_QUOTES, $type = 'UTF-8') {
	        $data = htmlspecialchars($data, $ENT, $type);
	        return $data;
	    }

	    public static function removeNamespaceElements($data = '')
	    {
	    	return preg_replace('#</*\w+:\w[^>]*+>#i', '', $data);
	    }

	    public static function removeJS($data = '')
	    {
	    	$data = preg_replace('#([a-z]*)[\x00-\x20]*=[\x00-\x20]*([`\'"]*)[\x00-\x20]*j[\x00-\x20]*a[\x00-\x20]*v[\x00-\x20]*a[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2nojavascript...', $data);
			$data = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*v[\x00-\x20]*b[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2novbscript...', $data);
			$data = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*-moz-binding[\x00-\x20]*:#u', '$1=$2nomozbinding...', $data);
	    	return $data;
	    }

		public static function xssClean($data = '')
		{
			$data = self::removeHtmlEntities($data);
			$data = self::removeHtmlSpecialChars($data);
			$data = self::removeNamespaceElements($data);
			$data = self::removeJS($data);

			return $data;
		}

	}