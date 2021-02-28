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
			$update = "update Tbl_event set
			event_title='$_POST[txt_event_title]',
			event_description='$_POST[txt_event_description]',
			event_start_date='$_POST[txt_event_start_date]',
			event_end_date='$_POST[txt_event_end_date]',
			event_start_time='$_POST[txt_event_start_time]',
			event_end_time='$_POST[txt_event_end_time]'
			where event_id = '$_GET[edit]'";
			
			
			$query = mysql_query($update);
		?>
	<script>window.location.href="dealer_manage_event.php";</script>

<?php 
	}
		$select = "select * from Tbl_event where event_id = '$_GET[edit]'";
		$query_select = mysql_query($select);
		
		$row = mysql_fetch_array($query_select);

?>


<!doctype html>
<html class="no-js" lang="en">
	<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit Event</title>
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
                <h2>Edit Event</h2>
            </div>
			
            
        </div>
	</section><!-- end post-wrapper-top -->
    
    
	
   		
			
<?php

	$select = "select * from Tbl_event where event_id = '$_GET[edit]'";
	$query_select = mysql_query($select);
	
	$row = mysql_fetch_array($query_select);
?>
   
        	<div class="content clearfix">
            	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                
                	<form id="registerform" method="post" enctype="multipart/form-data">
						<div class="form-group">
                  			<label>Title of Event</label>
							<input type="text" class="form-control" placeholder="Enter Title of Event"  name="txt_event_title" value="<?php echo $row['event_title']; ?>"> 
						</div>
						
						
						<div class="form-group">
                  			
                  			<label>Event Description</label>
                  <textarea class="form-control" rows="3" placeholder="Enter Event Description" name="txt_event_description"><?php echo $row['event_description']; ?></textarea>
				
				
						</div>
							
						<div class="form-group">
                  			
                  			<label>Date when Event Starts</label>
							<input type="date" class="form-control" placeholder="Enter Date when Event Starts"  name="txt_event_start_date" value="<?php echo $row['event_start_date']; ?>">
						</div>
						
						
							
						<div class="form-group">
                  			
                  			<label>Time when Event Starts</label>
							<input type="time" class="form-control" placeholder="Enter Time when Event Starts"  name="txt_event_start_time" value="<?php echo $row['event_start_time']; ?>">
						</div>
						
						
							
						<div class="form-group">
                  			
                  			<label>Date when Event Ends</label>
							<input type="date" class="form-control" placeholder="Enter Date when Event Ends"  name="txt_event_end_date" value="<?php echo $row['event_end_date']; ?>">
						</div>
						
						
							
						<div class="form-group">
                  			
                  			<label>Time when Event Ends</label>
							<input type="time" class="form-control" placeholder="Enter Time when Event Ends"  name="txt_event_end_time" value="<?php echo $row['event_end_time']; ?>">
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