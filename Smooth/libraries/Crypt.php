<?php 

	namespace Smooth\Libraries;

	/**
	 * @package    Smooth Crypt Library
	 */

	class Crypt
	{

		public static function sha1($string)
		{
			return hash('sha1', $string);
		}
		public static function sha224($string)
		{
			return hash('sha224', $string);
		}		
		public static function sha256($string)
		{
			return hash('sha256', $string);
		}
		public static function sha384($string)
		{
			return hash('sha384', $string);
		}
		public static function sha512($string)
		{
			return hash('sha512', $string);
		}
		public static function md2($string)
		{
			return hash('md2', $string);
		}
		public static function md4($string)
		{
			return hash('md4', $string);
		}
		public static function md5($string)
		{
			return hash('md5', $string);
		}
		public static function ripemd128($string)
		{
			return hash('ripemd128', $string);
		}
		public static function ripemd160($string)
		{
			return hash('ripemd160', $string);
		}
		public static function ripemd256($string)
		{
			return hash('ripemd256', $string);
		}
		public static function ripemd320($string)
		{
			return hash('ripemd320', $string);
		}
		public static function whirlpool($string)
		{
			return hash('whirlpool', $string);
		}
		public static function snefru($string)
		{
			return hash('snefru', $string);
		}
		public static function snefru256($string)
		{
			return hash('snefru256', $string);
		}
		public static function gost($string)
		{
			return hash('gost', $string);
		}
		public static function crc32($string)
		{
			return hash('crc32', $string);
		}
		public static function crc32b($string)
		{
			return hash('crc32b', $string);
		}
		public static function adler32($string)
		{
			return hash('adler32', $string);
		}

	}