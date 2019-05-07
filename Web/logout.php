<?php

	session_name('lockSession');
	session_start();
	$_SESSION['id']   = "";
    $_SESSION['name'] = "";
    $_SESSION['isLogin'] = false;


    session_unset(); 
	session_destroy();
	header("Location: login.php");
	
?>