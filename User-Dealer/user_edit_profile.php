<?php

error_reporting(0);
session_start();


	if(!($_SESSION['user_email']))
	{
		?>
		<script>
		window.location.href="login.php";
		</script>
		<?php
	}




include "connection.php";

	if(isset($_POST['btn_submit']))
	{	
				$file = $_FILES['file_user_photo']['name'];
				if($file=="")
				{
					$user_file = $_POST['file_old_user_photo'];
				}
	
				else
				{
					$file = $_FILES['file_user_photo']['name'];
					$dest = "images/$file";
					$src = $_FILES['file_user_photo']['tmp_name'];
					move_uploaded_file($src,$dest);
					$user_file = $dest;
				}	
				
				
						
			$update = "update Tbl_user set
			user_first_name ='$_POST[txt_user_first_name]',
			user_last_name ='$_POST[txt_user_last_name]',
			user_email ='$_POST[txt_user_email]',
			user_mobile_no ='$_POST[txt_user_mobile_no]',
			city_id ='$_POST[ddl_city_name]',
			pin_code='$_POST[txt_pin_code]',
			user_address='$_POST[txt_user_address]',
			user_photo='$user_file'
			where user_id = '$_SESSION[user_id]'";
			
			
			$query = mysql_query($update);
		?>
		
<?php 
	}
		$select = "select * from Tbl_user where user_id = '$_SESSION[user_id]'";
		$query_select = mysql_query($select);
		
		$row = mysql_fetch_array($query_select);

?>


<!doctype html>
<html class="no-js" lang="en">
	<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit My Profile</title>
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
                <h2>Edit My Profile</h2>
            </div>
			
            
        </div>
	</section><!-- end post-wrapper-top -->
    
    
	
   		
			
<?php

	$select = "select * from Tbl_user where user_id = '$_SESSION[user_id]'";
	$query_select = mysql_query($select);
	
	$row = mysql_fetch_array($query_select);
?>
   
        	<div class="content clearfix">
            	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                
                	<form id="registerform" method="post" enctype="multipart/form-data">
					
					
					
									
                <div class="form-group">
                  <label for="exampleInputFile">Upload Your Photo</label>
                  <input type="file" id="exampleInputFile" name="file_user_photo"> <br/>
             	<input type="hidden" id="exampleInputFile" value="<?php echo $row['user_photo']; ?>" name="file_old_user_photo">
				 <i style="color:#CC6699">Existing Photo</i> <br>
				 <img src=" <?php echo $row['user_photo']; ?> " height="30%" width="30%">
			
				</div>
					
					
						<div class="form-group">
                  			<label>First Name</label>
							<input type="text" class="form-control" placeholder="Enter Your First Name"  name="txt_user_first_name" value="<?php echo $row['user_first_name']; ?>"> 
						</div>
					
						<div class="form-group">
                  			<label>Last Name</label>
							<input type="text" class="form-control" placeholder="Enter Your Last Name"  name="txt_user_last_name" value="<?php echo $row['user_last_name']; ?>"> 
						</div>
						
						
						<div class="form-group">
                  			<label>Email</label>
							<input type="text" class="form-control" placeholder="Enter Your Email"  name="txt_user_email" value="<?php echo $row['user_email']; ?>"> 
						</div>
						
						
						
						<div class="form-group">
                  			<label>Mobile Number</label>
							<input type="text" class="form-control" placeholder="Enter Your Mobile Number"  name="txt_user_mobile_no" value="<?php echo $row['user_mobile_no']; ?>"> 
						</div>
												
						
			   
			   	 <div class="form-group">
                  <label>Select the City</label>
                  <select class="form-control" name="ddl_city_name">
                    <option>--Select City--</option>
					
					<?php 
						$select_city = "select * from Tbl_city";
						$query = mysql_query($select_city);		
						while( $row_city = mysql_fetch_array($query) )
						{
					?>
					<option value="<?php echo $row_city['city_id']; ?>" 
					<?php
						if(isset($_POST['ddl_city_name']) && $_POST['ddl_city_name']==$row_city['city_id'])
						{
							echo "selected = 'selected'";
						}
					?>
					> 
					
					<?php echo $row_city['city_name']; ?> </option>
					
					<?php } ?>
			</select>
				
                </div>
				
						
						
						<div class="form-group">
                  			<label>Pin Code</label>
							<input type="text" class="form-control" placeholder="Enter Your Pin Code"  name="txt_pin_code" value="<?php echo $row['pin_code']; ?>"> 
						</div>					
						
						
						<div class="form-group">  			
                  			<label>User Address</label>
                  <textarea class="form-control" rows="3" placeholder="Enter Your Address" name="txt_user_address"><?php echo $row['user_address']; ?></textarea>
				 		</div>
						
						
						<div class="form-group">
							<input type="submit" name="btn_submit" class="button" value="Submit">
						</div>
						
						
						<div class="form-group">
							<b><a href="user_change_password.php">Change Password</a></b>
						</div>
					
					
					</form>
					
                    
				</div><!-- end col-->
            </div><!-- end content -->
   
   
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