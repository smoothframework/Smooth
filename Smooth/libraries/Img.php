<?php 

	/* Defining the namespace */
	namespace Smooth\Libraries;

	/**
	 * @author You must have enabled GD library in your PHP; Determine by using phpinfo(); Donwload it @ http://www.boutell.com/gd/; 
	 * Installation instructions you can find @ http://php.net/manual/en/image.installation.php
	 * @package    Smooth Img Library
	 */

	class Img
	{

		public static function size($path)
		{
			if( ! preg_match('/^http/', $path) )
				return getimagesize(APPPATH . $path);
			else
				return getimagesize($path);
		}

		public static function resize($path, $width, $height)
		{
			$new_image = imagecreatetruecolor($width, $height);
			$src = imagecreatefromjpeg($path);
			imagecopyresized($new_image, $src, 0, 0, 0, 0, $width, $height, imagesx($path), imagesy($path));
			imagejpg($new_image);
		}

		public static function extension($path)
		{
			return image_type_to_extension($path);
		}

	}