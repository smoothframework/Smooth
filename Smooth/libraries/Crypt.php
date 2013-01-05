<?php 

	namespace Smooth\Libraries;

	/**
	 * @package    Smooth Crypt Library
	 */

	class Crypt
	{

		public static function now($method, $string)
		{
			$methods = array('sha1', 'sha224', 'sha256', 'sha384', 'sha512', 'md2', 'md4', 'md5', 'ripemd128', 'ripemd160', 'ripemd256',
				'ripemd320', 'whirlpool', 'snefru', 'snefru256', 'gost', 'crc32', 'crc32b', 'adler32');

			if( in_array( $method, $crypt_methods ) )
				return hash($method, $string);
		}

	}