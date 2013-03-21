<?php
	
	use Smooth\Libraries\Crypt;
	use Smooth\Libraries\Generator;

	class LibrariesTest extends PHPUnit_Framework_TestCase
	{

		public function setUp()
		{
			$this->string = "Smooth";
		}

		public function testIfCrypterLibraryReturnsAnAccurateResult()
		{
			$cryptMethods = array('sha1', 'sha224', 'sha256', 'sha384', 'sha512', 'md2', 'md4', 'md5', 'ripemd128', 'ripemd160', 'ripemd256',
				'ripemd320', 'whirlpool', 'snefru', 'snefru256', 'gost', 'crc32', 'crc32b', 'adler32');
			foreach ($cryptMethods as $key => $value) 
			{
				$this->assertEquals(hash($value, $this->string), Crypt::crypter($value, $this->string));
			}
		}

		public function testIfGeneratorLibraryReturnsAnAccurateResult()
		{
			$generatorTypes = array('string', 'int', 'string_int');
			foreach ($generatorTypes as $key => $value) 
			{
				$this->assertStringMatchesFormat('%a', Generator::$value(5));
			}
		}

	}
