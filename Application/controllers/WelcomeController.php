<?php

	class WelcomeController extends Controller
	{

		public function index()
		{
			$data['content'] = 'WelcomeSmoothView';
			$this->render('includes/template', compact('data'));	
		}

	}