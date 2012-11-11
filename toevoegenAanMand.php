<?php
    require_once 'db.php';    
    require_once 'includes/Winkelmand.php';
    ini_set('display_errors',1);
    session_start(); 
    error_reporting(E_ALL);

    
    $index = $_POST['index'];
    //var_dump($_SESSION['winkelmand']);
    //die("ok");
    //$winkelmand=$_SESSION['winkelmand'];        
     $_SESSION['winkelmand']->toevoegenAanMand($items[$index]);
    
    //$_SESSION['winkelmand'] = $winkelmand;
		//echo "<pre>";
    echo $_SESSION['winkelmand']->mandWeergeven();
?>
