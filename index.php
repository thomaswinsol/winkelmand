<?php
require_once 'db.php';
require_once 'includes/Winkelmand.php';
error_reporting(E_ALL);
ini_set('display_errors',1);
session_start(); 
?>
<!doctype html>
<html>
    <head>
        <title>Winkelmand</title>
		<link rel="Stylesheet" type="text/css" href="css/layout.css" ></link>
		    <script type="text/javascript" src="js/jquery-1.8.2.min.js"></script>  
		<script type="text/javascript">
			$( function () {
	
				 $(".plus").click( function () {
						$.ajax({
										type: 'POST',
  									url: 'toevoegenAanMand.php',
  									data: {
    											index: $(this).attr("id")
  												},
  									success: function (data) {
														 			//alert("ok");
    															$('#winkelmand').empty().html(data);
  												}
							});
				 });
				 
				 $(".min").click( function () {
						$.ajax({
										type: 'POST',
  									url: 'verwijderenUitMand.php',
  									data: {
    											index: $(this).attr("id")
  												},
  									success: function (data) {
														 			//alert("ok");
    															$('#winkelmand').empty().html(data);
  												}
							});
				 });
				 
				 $("#Mandleegmaken").click( function () {
						$.ajax({
										type: 'POST',
  									url: 'leegmaken.php',
  									data: {    											
  												},
  									success: function (data) {
														 			//alert("ok");
    															$('#winkelmand').empty().html(data);																	
  												}
							});
				 });
			});
</script>
    
    </head>
    <body>
<?php
//session_destroy();

if(!isset($_SESSION['winkelmand'])) {																		
   $winkelmand = new Winkelmand();
	 $winkelmand->mandLeegmaken();
   $_SESSION['winkelmand'] = $winkelmand;
}
?>      


<div style="float:left;">
				<button id='Mandleegmaken'>Winkelmand leegmaken</button>																					
        <table>            
                <tr>
                    <th>Nr</th>
                    <th>Gsm</th>
                    <th>Prijs</th>      
                </tr>            
        <?php    
        $ii=0;    
        foreach ($items as $row) { 
        ?>
                <tr>              
                    <td><?php echo $row['id']; ?></td>                
                    <td><?php echo $row['titel']; ?></td>
                    <td><?php echo $row['prijs']; ?>€</td>
                    <td> <button class='plus' id="<?php echo $ii; ?>">+</button></td> 
										<td> <button class='min' id="<?php echo $ii; ?>">-</button></td> 
                </tr>
                
        <?php $ii++; 
        }
        ?>           
        </table>
</div>
<div id="winkelmand" style="float:right;"> 
<?php echo $_SESSION['winkelmand']->mandWeergeven(); ?>
</div>							
    </body>
</html>