<?php

error_reporting(0);

include "connection.php";

$count == 0;

	if(isset($_POST['btn_submit']))
	{
		$first_name = $_POST['txt_first_name'];	
		if($first_name == "")
		{
			$err_first_name = "Please Enter your First Name";
			$count++;
		}
	

		$last_name = $_POST['txt_last_name'];
		if($last_name == "")
		{
			$err_last_name = "Please Enter your Last Name";
			$count++;
		}
	
		$email = $_POST['txt_email'];
		if($email == "")
		{
			$err_email = "Please Enter your Email";
			$count++;
		}
	
		$mobile_no = $_POST['txt_mobile_no'];
		if($mobile_no == "")
		{
			$err_mobile_no = "Please Enter your Mobile number";
			$count++;
		}
		
		$donate_money = $_POST['txt_donate_money'];
		if($donate_money == "")
		{
			$err_donate_money = "Please Enter Amount";
			$count++;
		}
	
	}
		

	if(isset($_POST['btn_submit']) && $count==0)
	{	
			$insert = "insert into Tbl_donor_info values 
			('',
			'$_GET[donation_id]',
			'$_POST[txt_first_name]',
			'$_POST[txt_last_name]',
			'$_POST[txt_email]',
			'$_POST[txt_mobile_no]',
			'$_POST[txt_donate_money]',
			now())";
			
			$query = mysql_query($insert);
		
			?>
	<script>window.location.href="visitor_all_trusts.php";</script>

<?php 
	}
?>


<!doctype html>
<html class="no-js" lang="en">
	<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Donate</title>
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
                <h2>Donate</h2>
            </div>
			
            
        </div>
	</section><!-- end post-wrapper-top -->
    
    
	
   		
   
   
        	<div class="content clearfix">
            	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
               	
                	<form id="registerform" method="post"  enctype="multipart/form-data" action="https://www.sandbox.paypal.com/cgi-bin/webscr" name="frm_paypal">
						<div class="form-group">
                  			<label>First Name</label>
							<input type="text" class="form-control" placeholder="Enter First Name"  name="txt_first_name" value="<?php echo $first_name; ?>" required> 
					<div class="validation"><?php echo $err_first_name; ?></div> 
						</div>
												
							<div class="form-group">
                  			<label>Last Name</label>
							<input type="text" class="form-control" placeholder="Enter Last Name"  name="txt_last_name" value="<?php echo $last_name; ?>" required> 
					<div class="validation"><?php echo $err_last_name; ?></div> 
						</div>
												
							<div class="form-group">
                  			<label>Email</label>
							<input type="mail" class="form-control" placeholder="Enter Email"  name="txt_email" value="<?php echo $email; ?>" required> 
					<div class="validation"><?php echo $err_email; ?></div> 
						</div>
												
							<div class="form-group">
                  			<label>Mobile Number</label>
							<input type="text" class="form-control" maxlength="10" onKeyPress="return isNumberKey(event)" placeholder="Enter Mobile number"  name="txt_mobile_no" value="<?php echo $mobile_no; ?>" required> 
					<div class="validation"><?php echo $err_mobile_no; ?></div> 
						</div>
												
						
						<div class="form-group">
                  			<label>How much amount you want to donate? </label>
							<input type="text" class="form-control" placeholder="Enter Amount to donate"  name="txt_donate_money" id="n1" onKeyPress="return isNumberKey(event)" onChange="money()" required>		<div class="validation"><?php echo $err_donate_money; ?></div> 
			
						</div>
						
					<?php
					$paypal_id=$_GET['paypal_account']; 
					?>
					
					<input type='hidden' name='business' value='<?php echo $paypal_id; ?>'>
					<input type='hidden' name='cmd' value='_xclick'>
					<input type='hidden' id="n2" name='amount' value='<?php echo $_POST['txt_donate_money'];?>'>
					<input type='hidden' name='no_shipping' value='1'>
					<input type='hidden' name='currency_code' value='USD'>
					   
					<input type='hidden' name='return'  value='http://localhost/TestFinal/visitor/visitor_all_trusts.php'>



						<div class="form-group">
							<input type="submit" name="btn_submit" class="button" value="Submit">
						</div>
					</form>
					
                    
				</div><!-- end col-->
            </div><!-- end content -->
   
    
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