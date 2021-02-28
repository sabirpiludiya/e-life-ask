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
$count == 0;

	if(isset($_POST['btn_submit']))
	{
			$file = $_FILES['file_facility_photo']['name'];
				if($file=="")
				{
					$facility_file = $_POST['file_old_facility_photo'];
				}
	
				else
				{
					$file = $_FILES['file_facility_photo']['name'];
					$dest = "images/$file";
					$src = $_FILES['file_facility_photo']['tmp_name'];
					move_uploaded_file($src,$dest);
					$facility_file = $dest;
				}	
				
					
			
			$update = "update tbl_institute_facility set
			facility_title='$_POST[txt_facility_title]',
			facility='$_POST[txt_facility]',
			sub_category_id='$_POST[ddl_sub_category_name]',
			institute_type='$_POST[ddl_institute_type]',
			facility_photo='$facility_file'
			where facility_id = '$_GET[edit]'";
			
			
			$query = mysql_query($update);
		?>
	<script>window.location.href="dealer_manage_facility.php";</script>

<?php 
	}
		$select = "select * from tbl_institute_facility where facility_id = '$_GET[edit]'";
		$query_select = mysql_query($select);
		
		$row = mysql_fetch_array($query_select);

?>


<!doctype html>
<html class="no-js" lang="en">
	<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit Facility</title>
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
                <h2>Edit Facility</h2>
            </div>
			
            
        </div>
	</section><!-- end post-wrapper-top -->
    
    
	
   		
			
<?php

	$select = "select * from tbl_institute_facility where facility_id = '$_GET[edit]'";
	$query_select = mysql_query($select);
	
	$row = mysql_fetch_array($query_select);
?>
   
        	<div class="content clearfix">
            	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                
                	<form id="registerform" method="post" enctype="multipart/form-data">
						<div class="form-group">
                  			<label>Title of Facility</label>
							<input type="text" class="form-control" placeholder="Enter Title of Facility"  name="txt_facility_title" value="<?php echo $row['facility_title']; ?>"> 
						</div>
						
						
						<div class="form-group">
                  			<label>Select the Sub Category</label>
						  <select class="form-control" name="ddl_sub_category_name">
                    <option>--Select Sub Category--</option>
					
					<?php 
						$select_sub_cat = "select * from Tbl_sub_category";
						$query = mysql_query($select_sub_cat);		
						while( $row_sc = mysql_fetch_array($query) )
						{
					?>
					<option value="<?php echo $row_sc['sub_category_id']; ?>" 
					<?php
						if(isset($_POST['ddl_sub_category_name']) && $_POST['ddl_sub_category_name']==$row_sc['sub_category_id'] || $row['sub_category_id']==$row_sc['sub_category_id'])
						{
							echo "selected = 'selected'";
						}
					?>
					> 
					
					<?php echo $row_sc['sub_category_name']; ?> </option>
					
					<?php } ?>
			</select>
						
						</div>
			
						
	
						
			<div class="form-group">
                  <label>Institute Type</label>
                  <select class="form-control" name="ddl_institute_type">
                    <option>--Select Institute Type--</option>
					<option value="School"  
					<?php
						if(isset($_POST['ddl_institute_type']) && $_POST['ddl_institute_type']=="School" || $row['institute_type']=="School")
						{
							echo "selected = 'selected'";
						}
					?>					
					>School</option>
					
					<option value="College"  
					<?php
						if(isset($_POST['ddl_institute_type']) && $_POST['ddl_institute_type']=="College" || $row['institute_type']=="College")
						{
							echo "selected = 'selected'";
						}
					?>					
					>College</option>
					
					<option value="Coaching Class"  
					<?php
						if(isset($_POST['ddl_institute_type']) && $_POST['ddl_institute_type']=="Coaching Class" || $row['institute_type']=="Coaching Class")
						{
							echo "selected = 'selected'";
						}
					?>					
					>Coaching Class</option>
			
					<option value="Private Hostipital"  
					<?php
						if(isset($_POST['ddl_institute_type']) && $_POST['ddl_institute_type']=="Private Hostipital" || $row['institute_type']=="Private Hostipital")
						{
							echo "selected = 'selected'";
						}
					?>					
					>Private Hostipital</option>
										
			</select>
				
                </div>
				
	
	
						
						
						<div class="form-group">
                  			
                  			<label>Facility</label>
                  <textarea class="form-control" rows="3" placeholder="Enter Facility" name="txt_facility"><?php echo $row['facility']; ?></textarea>
				  
						</div>	
						
						
		 				<div class="form-group">

						    <label for="exampleInputFile">Upload Photo</label>
                  <input type="file" id="exampleInputFile" name="file_facility_photo">
             	<input type="hidden" id="exampleInputFile" value="<?php echo $row['facility_photo']; ?>" name="file_old_facility_photo">
				 <i style="color:#CC6699">Existing Photo</i> <br>
				 <img src=" <?php echo $row['facility_photo']; ?> " height="30%" width="30%"> 
			
					</div>
						
						 
						
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