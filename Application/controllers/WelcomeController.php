<?php

	use Smooth\Libraries\Crypt;

	class WelcomeController extends Smooth\Controller
	{

		public function index()
		{
			$data['var'] = "Smooth";
			$data['content'] = 'WelcomeSmoothView';
			$this->render('includes/template', compact('data'));
		}

		public function lib()
		{
			$data['var'] = Crypt::crypter('sha1', 'my-string');
			$data['content'] = 'LibView';
			$this->render('includes/template', compact('data'));
		}
		
		public function test()
		{
			// echo "Can't say no!";
			print_r(Smooth\Libraries\Db::fetch('users'));
		}

	}