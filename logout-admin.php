<?php
    	session_name("admin");
		session_start();
    	session_destroy();
    	header('location: begin-admin.php');
?>