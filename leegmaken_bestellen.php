<?php
    require_once 'db.php';    
    require_once 'includes/Winkelmand.php';
    ini_set('display_errors',1);
    session_start(); 
    error_reporting(E_ALL);
    
		if (isset($_POST['mail'])) {
			 			$to      = 'thomas.vanhuysse@telenet.be';
            $subject = 'Winkelmand';
            $message = 'Winkelmand';
            $headers = 'From: thomas.vanhuysse@telenet.be' . "\r\n" .
                'Reply-To: thomas.vanhuysse@telenet.be' . "\r\n" .
                'X-Mailer: PHP/' . phpversion();

            mail($to, $subject, $message, $headers);
		}
		
    $_SESSION['winkelmand']->mandLeegmaken();
		$_SESSION['winkelmand']->mandWeergeven();
?>
