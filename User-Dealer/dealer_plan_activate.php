<?php

error_reporting(0);

session_start();


	if(!($_SESSION['dealer_email']))
	{
		?>
		<script>
		window.location.href="login.php";
		</script>
		<?php
	}

		
	if(!($_SESSION['dealer_status']))
	{
		?>
		<script>
		window.location.href="dealer_blocked.php";
		</script>
		<?php
	}
		

include "connection.php";


?>


<!doctype html>
<html class="no-js" lang="en">
	<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Activate Plan</title>
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="">
	<link rel="shortcut icon" href="favicon.ico">
    
	<!-- Google Fonts -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900' rel='stylesheet' type='text/css'>
	<!-- Awesome Fonts -->
	<link rel="stylesheet" href="css/font-awesome.css">
	<!-- Bootstrap -->
	<link href="assets/css/bootstrap.css" rel="stylesheet">
	<!-- Template Styles -->
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="css/colors.css">    
	<!-- Layer Slider -->
	<link rel="stylesheet" href="layerslider/css/layerslider.css" type="text/css">
    
	<style>
	.validation
	{
		color:red;
		font-weight:bold;
	}
	</style>
	<!-- http://www.456bereastreet.com/archive/201209/tell_css_that_javascript_is_available_asap/ -->
	<script>
		document.documentElement.className = document.documentElement.className.replace(/(\s|^)no-js(\s|$)/, '$1js$2');
	</script>


	<script>
	function goback()
	{
		window.location.href="dealer_my_plan.php";
	}
	</script>
  
	<!-- Support for HTML5 -->
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- Enable media queries on older browsers -->
	<!--[if lt IE 9]>
		<script src="assets/js/respond.min.js"></script>
	<![endif]-->
  
	<script src="js/modernizr.js"></script>
  	<script src="js/jquery-1.11.3.min.js"></script>
	<script>
	function money()
	{
		var money = document.getElementById("n1").value;
		document.getElementById("n2").value = money;
	}
	
	 function isNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

         return true;
      }
	
	</script>
  </head>
<body>

<?php
	include "header.php";
?>
    
	<section class="post-wrapper-top">
    	<div class="container">
            <div class="post-wrapper-top-shadow">
                <span class="s1"></span>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">			   
                <h2>Activate Plan</h2>
            </div>
			
            
        </div>
	</section><!-- end post-wrapper-top -->
    
    <?php
	
	
		$select_plan = "select * from Tbl_plan where plan_id = '$_GET[plan_id]'";
		$query_plan = mysql_query($select_plan);
		
		$row_plan = mysql_fetch_array($query_plan);

	
	?>
	<br>
					<form id="registerform" method="post" enctype="multipart/form-data"  action="https://www.sandbox.paypal.com/cgi-bin/webscr" name="frm_paypal">
					<div style="box-shadow: 0px 0px 15px #888888;margin-left:" align="center" >
					
					<table width="60%" align="center">
						
						
					<?php
					$paypal_id="myplan@gmail.com"; 
					?>
					
					<input type='hidden' name='business' value='<?php echo $paypal_id; ?>'>
					<input type='hidden' name='cmd' value='_xclick'>
					<input type='hidden' id="n2" name='amount' value='<?php echo $row_plan['plan_price'];?>'>
					<input type='hidden' name='no_shipping' value='1'>
					<input type='hidden' name='currency_code' value='USD'>
					   
					<input type='hidden' name='return'  value='http://localhost/TestFinal/User-Dealer/dealer_plan_success.php?plan=<?php echo $row_plan['plan_id'];?>'>


						<tr>
							<th style="font-size:35px;color:#0000FF;text-align:center;background:#CCCCCC;box-shadow: 0px 0px 5px #0066FF ;"><?php echo $row_plan['plan_name']; ?></th>
						</tr>
					
					
						<tr>
							<td style="font-size:21px;color:#6699FF"><?php echo $row_plan['plan_description']; ?></td>
						</tr>
					
						<tr>
							<td style="color:#333333;font-size:20px"> >> Duration : <?php echo $row_plan['duration']." ".$row_plan['dur_type']; ?> Days</td>
						</tr>
					
					
						<tr>
							<td style="color:#000000;font-size:24px"><b> Price : <?php echo $row_plan['plan_price']; ?> </b><br>  </td>
						</tr>
					
	<?php
					
				$_SESSION['plan_id'] = $row_plan['plan_id'];
				session_start();
	?>
						<tr><td>
							<input style="height:10%;font-size:20px" type="submit"  name="btn_submit" class="button" value="Purchase">
							<input type="button" onClick="goback()" name="btn_submit" class="button" value="More Plans..">
						</td></tr>
                  	
					</table>
					</div>
					
					
					
					
					
					
				
					</form>
					 
<?php
	include "footer.php";
?>
    <div class="dmtop">Scroll to Top</div>

      <!-- Main Scripts-->
	<script src="assets/js/jquery.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.unveilEffects.js"></script>	
	<script src="js/retina-1.1.0.js"></script>
	<script src="js/jquery.hoverex.min.js"></script>
	<script src="js/jquery.hoverdir.js"></script>
    <script src="js/owl.carousel.js"></script>	
    <script src="js/jetmenu.js"></script>	
	<script src="js/jquery.hoverex.min.js"></script>
	<script src="js/jquery.prettyPhoto.js"></script>
	<script src="js/custom.js"></script>
	</body>
</html>