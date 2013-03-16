<?php 

	/* Defining the namespace */
	namespace Smooth\Libraries;

	/**
	 * @package    Smooth Url Library
	 **/

	class Url
	{
		public static function component($num)
		{
			$url = parse_url($_SERVER['REQUEST_URI']);
			$c = explode('/', $url['path']);
			$error = array('content' => 'Invalid uri argument.');
			if( array_key_exists($num, $c) )
			{
				$component = array($num => $c[$num]);
				return $component[$num];				
			}
			else
			{
				return $error['content'];
			}
		}
		public static function current()
		{
			$url = parse_url($_SERVER['REQUEST_URI']);
			return $url['path'];
		}
		public static function base()
		{
			return WEBPATH;
		}
		public static function redirect($url)
		{
			header("Location: " . $url);
		}
	}