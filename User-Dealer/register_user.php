<?php
error_reporting(0);
include "connection.php";

session_start();



	if($_SESSION['user_email'])
	{
		?>
		<script>
		window.location.href="user_index.php";
		</script>
		<?php
	}
	else if($_SESSION['dealer_email'])
	{
		?>
		<script>
		window.location.href="dealer_index.php";
		</script>
		<?php
	}


$count=="";

if(isset($_POST['btn_submit']))
{	
	$fname = $_POST['txt_fname'];
	if($fname=="")
	{
		$err_fname = "Please Enter First Name";
		$count++;
	}
	
	$lname = $_POST['txt_lname'];
	if($lname=="")
	{
		$err_lname = "Please Enter Last Name";
		$count++;
	}
	
	$mail = $_POST['txt_mail'];
	$qry = mysql_query("select * from tbl_user where user_email =  '$_POST[txt_mail]'");
	$ct = mysql_num_rows($qry);
	
	if($mail=="")
	{
		$err_mail = "Please Enter Mail";
		$count++;
	}
	else if($ct > 0)
	{
		$err_mail = "Given Email is Already Registered";
		$count++;
	}
	
	
	$mobile = $_POST['txt_mobile'];
	$qry1 = mysql_query("select * from tbl_user where user_mobile_no =  '$_POST[txt_mobile]'");
	$ct1 = mysql_num_rows($qry1);
	
	if($mobile=="")
	{
		$err_mobile = "Please Enter Mobile";
		$count++;
	}
	else if($ct1 > 0)
	{
		$err_mobile = "Given Mobile Number is Already Registered";
		$count++;
	}
	
	$address = $_POST['txt_address'];
	if($address=="")
	{
		$err_address= "Please Enter Address";
		$count++;
	}
	
	$pincode = $_POST['txt_pincode'];
	if($pincode=="")
	{
		$err_pincode= "Please Enter Pincode";
		$count++;
	}
	
	
	$photo = $_FILES['file_photo']['name'];
	if($photo=="")
	{
		$err_photo= "Please Upload your Photo";
		$count++;
	}	
	
	$city= $_POST['ddl_city'];
	if($city=="--Select City--")
	{
		$err_city= "Please Select City";
		$count++;
	}
	
	$pwd = $_POST['txt_pwd'];
	if($pwd=="")
	{
		$err_pwd = "Please Enter Password";
		$count++;
	}
	
	$c_pwd = $_POST['txt_c_pwd'];
	if($c_pwd=="")
	{
		$err_c_pwd = "Please Re-Enter Password";
		$count++;
	}
	else if($c_pwd != $pwd)
	{
		$err_c_pwd = "Please Correct Password";
		$count++;
	}
}
	


if(isset($_POST['btn_submit']) && $count==0)
{
			$file = $_FILES['file_photo']['name'];
			$dest = "images/$file";
			$src = $_FILES['file_photo']['tmp_name'];
			move_uploaded_file($src, $dest);
			
				$insert = "insert into Tbl_user values 
				(
					'',
					'$fname',
					'$lname',
					'$mail',
					'$pwd',
					'$mobile',
					'$city',
					'$pincode',
					'$address',
					'$dest',
					'1'		
				)";
			
				$query = mysql_query($insert);
				
				if($query)
				{ ?>
				
				<script>
					alert("Successfully Registered as User...");
					window.location.href="login.php";
				</script>
			
				<?php	
				}
				
}
?>








<!doctype html>
<html class="no-js" lang="en">
	<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="widtd=device-widtd, initial-scale=1.0" />
    <title>Register as User | Welcome to E-LifeAsk</title>
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="autdor" content="">
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
    
	
	<style type="text/css">
	
	.b_line
	{
	border-bottom:solid 10px #000000;
	}
	td
	{
	border-bottom:solid 1px;
	}
	</style>
	
	
	<!-- http://www.456bereastreet.com/archive/201209/tell_css_tdat_javascript_is_available_asap/ -->
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
		<script>
		
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

   
    	<div class="container clearfix" align="center">
	
                <h3>Register as User</h3>
                <hr>
    				
				<div>  
			
			
				<div style="padding:5%;margin:0 auto;width:80%;box-shadow:#999999 0px 0px 10px 10px;text-align:left" align="center">
               
			   
                	<form id="registerform" method="post" name="registerform" enctype="multipart/form-data">
					
					
							<div>
						
								<div class="form-group">
									<label>First Name</label>
									<input type="text" class="form-control" name="txt_fname" value="<?php echo $fname; ?>" placeholder="Enter Your First name">
								<div class="notice_add" align="left"><?php echo $err_fname; ?></div>
								</div>
								<br>
								
								<div class="form-group">
									<label>Last Name</label>
									<input type="text" class="form-control" name="txt_lname" value="<?php echo $lname; ?>" placeholder="Enter Your Last name">
								<div class="notice_add" align="left"><?php echo $err_lname; ?></div>
								</div>
								<br>
					
					
								<div class="form-group">
									<label>Email</label>
									<input type="email" class="form-control" name="txt_mail" value="<?php echo $mail; ?>" placeholder="Enter Your Email">
								<div class="notice_add" align="left"><?php echo $err_mail; ?></div>
								</div>
								<br>
			
								
								<div class="form-group">
									<label>Mobile Number</label>
									<input type="text" maxlength="10" class="form-control" name="txt_mobile" value="<?php echo $mobile; ?>" onKeyPress="return isNumberKey(event)" placeholder="Enter Your Mobile Number">
								<div class="notice_add" align="left"><?php echo $err_mobile; ?></div>
								</div>
								<br>
			
								<div>
									<label>Password</label>
									<input type="password" class="form-control" name="txt_pwd" value="<?php echo $pwd; ?>" placeholder="Enter Your Password">
								<div class="notice_add" align="left"><?php echo $err_pwd; ?>
								</div>
								</div><br>
			
								
								<div class="form-group">
									<label>Confirm Password</label>
									<input type="password" class="form-control" name="txt_c_pwd" placeholder="Re-enter Your password">
								<div class="notice_add" align="left"><?php echo $err_c_pwd; ?></div>
								</div><br>
			
								<div class="form-group">
									<label>Address</label>
								   <textarea class="form-control" name="txt_address"  id="inputExperience" placeholder="Enter Your Address"><?php echo trim($row); ?></textarea>	
                  			 	<div class="notice_add" align="left"><?php echo $err_address; ?>
								</div></div><br>
			
							
							
							 <div class="form-group">
                			  <label>Select the City</label>
            			      <select class="form-control" name="ddl_city">
               				     <option>--Select City--</option>
					
					<?php 
						$select_city = "select * from Tbl_city where city_status=1";
						$query = mysql_query($select_city);		
						while( $row_city = mysql_fetch_array($query) )
						{
					?>
								<option value="<?php echo $row_city['city_id']; ?>" 
									<?php
										if(isset($_POST['ddl_city']) && $_POST['ddl_city']==$row_city['city_id'])
										{
											echo "selected = 'selected'";
										}
									?>
								> 
					
								<?php echo $row_city['city_name']; ?> </option>
					
					<?php } ?>
			</select>
				
							<div class="notice_add" align="left"><?php echo $err_city; ?></div>
                </div><br> 
				
				
			
							  <div class="form-group">
									<label>Pincode</label>
									<input type="text" maxlength="6" class="form-control" name="txt_pincode" value="<?php echo $pincode; ?>" onKeyPress="return isNumberKey(event)" placeholder="Enter Your Pincode">
									<div class="notice_add" align="left"><?php echo $err_pincode; ?></div>
							</div><br>
			
								<div class="form-group" align="left">
									<label>Photo</label>
									<input type="file" name="file_photo"> 
								<div class="notice_add" align="left"><?php echo $err_photo; ?></div>
               					</div><br>
			
								  
				  
				  
                  
								<div class="form-group" align="center">
									<input type="submit" class="button" name="btn_submit" style="width:50%;font-size:16px" value="Register an account">
								</div>
								
 								
						</div>
						
					</form>
                </div><!-- end login -->
				
				
				


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
