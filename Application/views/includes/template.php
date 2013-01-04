<?php 
	
	Controller::render('includes/header');
	Controller::render($data['content'], $data);
	Controller::render('includes/footer'); 

?>