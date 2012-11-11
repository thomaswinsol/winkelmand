<?php
    require_once 'db.php';    
    require_once 'includes/Winkelmand.php';
    ini_set('display_errors',1);
    session_start(); 
    error_reporting(E_ALL);
       
    $_SESSION['winkelmand']->mandLeegmaken();
		$_SESSION['winkelmand']->mandWeergeven();
?>
