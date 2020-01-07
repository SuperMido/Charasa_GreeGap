<?php
	//Date time
	date_default_timezone_set("Asia/Bangkok");
    function getCurrentDate()
    {
        return date("Y-m-d H:i:s");
	}
	
	//Main index
	session_start();
	require_once('connection.php');
	if(!isset($_SESSION['role']))
        $_SESSION['role'] = "Anonymous";
	if (isset($_GET['controller'])) {
	  $controller = $_GET['controller'];
	  if (isset($_GET['action'])) {
	    $action = $_GET['action'];
	  } else {
	    $action = 'index';
	  }
	} else {
	  $controller = 'pages';
	  $action = 'home';
	}
	require_once('routes.php');