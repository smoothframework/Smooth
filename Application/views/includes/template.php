<?php

	use Smooth\Controller;

	Controller::render('includes/header');
	Controller::render($data['content'], compact('data'));
	Controller::render('includes/footer'); 

?>