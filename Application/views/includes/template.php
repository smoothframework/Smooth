<?php

	Smooth\Controller::render('includes/header');
	Smooth\Controller::render($data['content'], $data);
	Smooth\Controller::render('includes/footer'); 

?>