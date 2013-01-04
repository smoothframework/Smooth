<?php 

	/* Defining the namespace */	
	namespace Smooth\Libraries;

	/**
	 * @package    Smooth Generator Library
	 */

	class Generator
	{

		public static function string($length)
		{
			$symbols = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$string = '';

			for ($i=0; $i < $length; $i++) { 
				$string .= $symbols[mt_rand(0, strlen($symbols) - 1)];
			}
			return $string;
		}

		public static function int($length)
		{
			$symbols = '0123456789';
			$nums = '';

			for ($i=0; $i < $length; $i++) { 
				$nums .= $symbols[mt_rand(0, strlen($symbols) -1)];
			}
			return $nums;
		}

		public static function string_int($length)
		{
			$symbols = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$string = '';

			for ($i=0; $i < $length; $i++) { 
				$string .= $symbols[mt_rand(0, strlen($symbols) - 1)];
			}
			return $string;
		}
		
		public static function text($chars=null, $words=null)
		{
			// $text = fopen('lorem.txt', 'r');
			// fclose($text);

			return $text;
		}

	}