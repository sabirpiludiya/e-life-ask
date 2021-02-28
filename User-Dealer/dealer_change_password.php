<?php

session_start();
error_reporting(0);

	if(!($_SESSION['dealer_email']))
	{
		?>
		<script>
		window.location.href="login.php";
		</script>
		<?php
	}


include "connection.php";
$count == 0;

		$query = mysql_query("select * from Tbl_dealer where dealer_id = $_SESSION[dealer_id]");
		$row = mysql_fetch_array($query);
		$pwd= $row['dealer_password'];
		
	if(isset($_POST['btn_submit']))
	{
		//=======Old Password=========//
		$old_password = $_POST['txt_old_password'];
		if($old_password == "")
		{
			$err_old_password = "Please Enter Old Password";
			$count++;
		}
		else if($old_password != $pwd)
		{
			$err_old_password = "Old Password is Incorrect ";
			$count++;
		}
		
		//=======New Password=========//
		$new_password = $_POST['txt_new_password'];
		if($new_password == "")
		{
			$err_new_password = "Please Enter New Password";
			$count++;
		}
		else if($old_password == $pwd)
		{
			if($new_password == $old_password)
			{
				$err_new_password = "Selected Password Is Same as Old Password";
				$count++;
			}
		}
		
		//=======Confirm New Password=========//
		$confirm_password = $_POST['txt_confirm_password'];
		if($confirm_password == "")
		{
			$err_confirm_password = "Please Re-Enter Password";
			$count++;
		}
		
		else if($old_password == $pwd)
		{
			if($new_password == $old_password || $new_password == "")
			{
				$err_confirm_password = "First Choose New Password";
				$count++;
			}
			else
			{		
				if($confirm_password != $new_password)
				{
					$err_confirm_password = "Password Not Matched.. Please Enter Correctly!";
					$count++;
				}
			}
		}
		
		
		
		
		if(isset($_POST['btn_submit']) && $count == 0)
		{
			
			$update = "update Tbl_dealer set dealer_password = '$confirm_password' where dealer_id = $_SESSION[dealer_id]";
			
			$query = mysql_query($update);
			
	?> 
 
			<script>window.location.href="dealer_edit_profile.php";</script>
				
	<?php

		}
		
		
		
		
	}
	?>



<!doctype html>
<html class="no-js" lang="en">
	<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Change Password</title>
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
                <h2>Change Password</h2>
            </div>
			
            
        </div>
	</section><!-- end post-wrapper-top -->
    
    
	
   		
			
<?php

	$select = "select * from Tbl_dealer where dealer_id = '$_SESSION[dealer_id]'";
	$query_select = mysql_query($select);
	
	$row = mysql_fetch_array($query_select);
?>
   
        	<div class="content clearfix">
            	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                			<div style="margin-top:10px;font-size:19px;font-weight:bold;color:
			<?php
				if($query)
				{
					echo "green";
				}
				else
				{
					echo "red";
				}
			
			?>">
				<?php 
					echo $msg;
				?>
			</div>
		
		
		<form role="form" method="post">
              <div class="box-body">
               
				  
				<div class="form-group">
                  <label>Enter Old Password</label>
                  <input type="password" class="form-control" placeholder="Enter Old Password" name="txt_old_password" value="<?php echo $old_password; ?>"> 
				<div class="validation"><?php echo $err_old_password; ?></div> 

                </div>
				
				<div class="form-group">
                  <label>Enter New Password</label>
                  <input type="password" class="form-control" placeholder="Enter New Password" name="txt_new_password" value="<?php echo $new_password; ?>"> 
				<div class="validation"><?php echo $err_new_password; ?></div> 
				
				</div>
               
				<div class="form-group">
                  <label>Confirm New Password</label>
                  <input type="password" class="form-control" placeholder="Re-Enter New Password" name="txt_confirm_password" value="<?php echo $confirm_password; ?>"> 
				<div class="validation"><?php echo $err_confirm_password; ?></div> 

                </div>
				
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary" name="btn_submit" value="Submit">Submit</button>
              </div>
			  </div>
	  
          <!-- /.form-group -->
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