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
    															$('#winkelmand').empty().html(data);
  												}
							});
				 });
				 
				 $(".min").live("click", function(){ 			
						$.ajax({
										type: 'POST',
  									url: 'verwijderenUitMand.php',
  									data: {
    											index: $(this).attr("id")
  												},
  									success: function (data) {
    															$('#winkelmand').empty().html(data);
  												}
							});
				 });
				 $("#Mandleegmaken").live("click", function(){ 
				    if (confirm("Wilt u werkelijk de winkelmand leegmaken?")) {				 
						$.ajax({
										type: 'POST',
  									url: 'leegmaken_bestellen.php',
  									data: {    											
  												},
  									success: function (data) {
    															$('#winkelmand').empty().html(data);																	
  												}
							});
					   }
				 });
				 
				 $("#Mandbestellen").live("click", function(){ 
				    if (confirm("Wilt u werkelijk de winkelmand bestellen?")) {				 
						$.ajax({
										type: 'POST',
  									url: 'leegmaken_bestellen.php',
  									data: {   
															mail: 1, 											
  												},
  									success: function (data) {
    															$('#winkelmand').empty().html(data);	
																	alert("Uw winkelmand is verzonden");																
  												}
							});
					   }
				 });
				 
			});
			</script>
    
      </head>
      <body>
<?php
if(!isset($_SESSION['winkelmand'])) {																		
   $winkelmand = new Winkelmand();
	 $winkelmand->mandLeegmaken();
   $_SESSION['winkelmand'] = $winkelmand;
}
?>      
<div style="float:left;">			
<div id="box">			
		 <div id="title">Artikellijst</title></div>																			
        <table>            
                <tr>
                    <th>Nr</th>
                    <th>Omschrijving</th>
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
                    <td> <button class='plus' id="<?php echo $ii; ?>">Toevoegen aan winkelmand</button></td>
                </tr>
                
        <?php $ii++; 
        }
        ?>           
        </table>
				</div>
</div>
<div style="float:right;"> 
				<div id="winkelmand">
						 <?php echo $_SESSION['winkelmand']->mandWeergeven(); ?>
				</div>
</div>	
						
</body>
</html>