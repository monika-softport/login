<?php
	session_unset();
	require_once  'controller/loginController.php';		
    $controller = new loginController();	
    $controller->mvcHandler();
?>