<?php

	use Smooth\Libraries\Export;
	use Smooth\Libraries\Cache;
	use Smooth\Libraries\Security;
	use Smooth\Libraries\Db;

	class TestController extends Smooth\Controller
	{

		public function index()
		{
			$data = 'Carry out';
			$cache = new Cache();
			$cache->write('test', $data);
		}

		public function t()
		{
			$request = new Smooth\Http\Request;
			$response = $request->get('http://apple.com/');
			print_r($response->headers);
			echo $response->body;
		}

		public function dbTest()
		{
			print_r(Db::fetch('users'));
		}

		public function security()
		{
			$data = '["asd"]';
			echo Security::xssClean($data);
		}

		public function cacheTest()
		{
			$cache = new Cache(APPPATH . 'cache');
			$data = 'Manchester United';

			$cache->write('test', $data);

			echo $cache->get('test');
		}

	}