<?php

	use Smooth\Libraries\Crypt;

	class WelcomeController extends Smooth\Controller
	{

		public function index()
		{
			$data['content'] = 'WelcomeSmoothView';
			$this->render('includes/template', compact('data'));	
		}

		public function lib()
		{
			
			$data['var'] = Crypt::crypter('asd', 'my-string');
			$data['content'] = 'LibView';
			$this->render('includes/template', compact('data'));
		}
		
	}