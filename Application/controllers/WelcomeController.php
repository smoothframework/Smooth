<?php

	use Smooth\Libraries\Crypt;
	use Smooth\Template\Engine;

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
			print_r(Smooth\Libraries\Db::fetch('users'));
		}

		public function missing()
		{
			$data['content'] = '404View';
			$this->render('includes/template', compact('data'));
		}

		public function handle()
		{
			$data['c'] = array('title' => 'My JSON title', 'body' => 'My JSON body', 'some' => 'Yeah some');
			$data['content'] = 'HandleBarsView';
			$this->render('includes/template', compact('data'));
		}

		public function template()
		{
			$data['var'] = array('header' => 'My Header', 'content' => 'My Content', 'another' => 'Yeah');
			$data['content'] = 'WelcomeSmoothView';
			$this->render('includes/template', compact('data'));
		}

	}