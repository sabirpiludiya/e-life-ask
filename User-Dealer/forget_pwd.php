<?php

error_reporting(0);
session_start();

	if(($_SESSION['dealer_email']))
	{
		?>
		<script>
		window.location.href="dealer_index.php";
		</script>
		<?php
	}

	if(($_SESSION['user_email']))
	{
		?>
		<script>
		window.location.href="user_index.php";
		</script>
		<?php
	}


include "connection.php";
$count == 0;

if(isset($_POST['btn_submit']))
{
	$type = $_POST['ddl_type'];
	if($type=="---I am---")
	{
		$err_type = "Select the option..";
		$count++;
	}
	
	$email = $_POST['txt_email'];
	if($email=="")
	{
		$err_email = "Enter Email";
		$count++;
	}
}
	
	

	if(isset($_POST['btn_submit']) && $count==0 && $type=="User")
	{
		$select = "select * from Tbl_user where user_email = '$email'";
		$select_query = mysql_query($select);
		$row = mysql_fetch_array($select_query);
		
		if($row['user_email']==$_POST['txt_email'])
		{
				$to = $row['user_email'];
				$subj = "E-Life Ask User Password";
				$msg = "Your password is : " .$row['user_password'];
				$from = "from : " .$row['user_email'];
				mail($to, $subj, $msg, $from);
			?>
				<script>
					alert("Password has been sent to your Email.");
					window.location.href="login.php";
				</script>
		<?php
		}
		else
		{
			echo "<script>alert('Invalid Email');</script>";
		}
	
	}
			
	else if(isset($_POST['btn_submit']) && $count==0 && $type=="Dealer")
	{
		$select = "select * from Tbl_dealer where dealer_email = '$email'";
		$select_query = mysql_query($select);
		$row = mysql_fetch_array($select_query);
		
		if($row['dealer_email']==$_POST['txt_email'])
		{
			 	$to = $row['dealer_email'];
				$subj = "E-Life Ask Dealer Password";
				$msg = "Your password is : " .$row['dealer_password'];
				$from = "from : " .$row['dealer_email'];
				mail($to, $subj, $msg, $from);
		?>
				<script>
					alert("Password has been sent to your Email.");
					window.location.href="login.php";
				</script>
		<?php
		}	
		else
		{
			echo "<script>alert('Invalid Email');</script>";
		}

	}

?>


<!doctype html>
<html class="no-js" lang="en">
	<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Forget Password</title>
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
   
   	<link rel="stylesheet" href="assets/css/validation_notice_add.css">
    
	 
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
                <h2>Forget Password</h2>
            </div>
			
            
        </div>
	</section><!-- end post-wrapper-top -->
    <br>
    
	
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" class="content clearfix">
                	<form id="registerform" method="post" enctype="multipart/form-data">
					<div class="form-group">
							<div style="height:25px">
								<select name="ddl_type" style="width:100%;border:double 1px;font-weight:bold;border-radius:10px 0px;box-shadow:2px 2px 3px 0px">
									<option>---I am---</option>
									<option value="User" 
										<?php
											if($type=="User")
											{
												echo "selected = selected";
											}
										?>
									>User</option>
									
									<option value="Dealer" 
										<?php
											if($type=="Dealer")
											{
												echo "selected = selected";
											}
										?>
									>Dealer</option>
								</select>
								
							</div>
 								<div class="notice_add" align="left"><?php echo $err_type; ?></div>
			
						</div>
						
						<div class="form-group">
							<div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" class="form-control"   name="txt_email"  placeholder="Email" value="<?php echo $email; ?>">
							</div>	
	 							 <div class="notice_add" align="left"><?php echo $err_email; ?></div>
						</div>
					
						<div class="form-group" align="center">
						<button type="submit" style="width:50%;font-size:16px" class="button" name="btn_submit">Send Password</button>
						</div>
						
					</form>
                    
				</div><!-- end col-->
            </div><!-- end content -->
   <br><br>
   <br><br>
  
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