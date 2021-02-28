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
		//=======Survey Title=========//

		$survey_title = $_POST['txt_survey_title'];
		
		if($survey_title == "")
		{
			$err_survey_title = "Please Enter Title of Event";
			$count++;
		}
			
		
		//=======Survey Description=========//
		$display_result = $_POST['txt_display_result'];
		if($display_result == "")
		{
			$err_display_result = "Please Enter Description of Survey";
			$count++;
		}
		
					
		//=======Survey End Date=========//
		$survey_end_date = $_POST['txt_survey_end_date'];
		if($survey_end_date == "")
		{
			$err_survey_end_date = "Please Enter Date when Survey Ends";
			$count++;
		}
	
	}
	
	if(isset($_POST['btn_submit']) && $count==0)
	{
		
		$qry = mysql_query("select * from Tbl_survey where survey_title = '$survey_title'");
		$count = mysql_num_rows($qry);
		
		if($count > 0)
		{
			$msg = "Sorry!!! Entered Survey '".$survey_title."' is Already Exist.";
		}
		else
		{			
			$insert = "insert into tbl_survey values
			(
				'',
				'$_SESSION[dealer_id]',
				'$_POST[txt_survey_title]',
				(select now()),
				'$_POST[txt_survey_end_date]',
				'$_POST[txt_display_result]',
				'1'
			)";	
			
			$query = mysql_query($insert);
			
			if($query)
			{	
				$msg = "New Survey '".$survey_title."' is Successfully Created.";
			}
			else
			{
				$msg = "Sorry!!! Something went wrong.";
				
			}
		}
	}


?>


<!doctype html>
<html class="no-js" lang="en">
	<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Add Survey</title>
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
                <h2>Add Survey</h2>
            </div>
			
            
        </div>
	</section><!-- end post-wrapper-top -->
    
    
	
		<div class="content clearfix">

               
			   	<div  class="col-lg-8 col-md-8 col-sm-8 col-xs-12" style="margin-top:10px;font-size:19px;font-weight:bold;color:
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
					if($msg) 
					echo $msg ."<br> <br>";
				?> 
			</div>
            
            	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                
	<?php
		$mp = "select * from tbl_current_plan where display_status=1 and dealer_id = $_SESSION[dealer_id]";
		$query = mysql_query($mp);
		$roww=mysql_fetch_array($query);
		$cur_date = (date("Y-m-d"));
		$ex_date = $roww['end_date'];
		
		if($ex_date > $cur_date)
		{
?>
                	<form id="registerform" method="post" enctype="multipart/form-data">
						<div class="form-group">
                  			<label>Title of Survey</label>
							<input type="text" class="form-control" placeholder="Enter Title of Survey"  name="txt_survey_title" value="<?php echo $survey_title; ?>"> 
					<div class="validation"><?php echo $err_survey_title; ?></div> 
						</div>
												
						
						<div class="form-group">
                  			
                  			<label>Survey Description</label>
                  <textarea class="form-control" rows="3" placeholder="Enter Survey Description" name="txt_display_result"><?php echo $display_result; ?></textarea>
				  			<div class="validation"><?php echo $err_display_result; ?></div> 
						</div>	
						
							
							
											
						<div class="form-group">
                  			
                  			<label>Date when Survey Ends</label>
							<input type="date" class="form-control" placeholder="Enter Date when Survey Ends"  name="txt_survey_end_date" value="<?php echo $survey_end_date; ?>">
				  <div class="validation"><?php echo $err_survey_end_date; ?></div> 
				
				
						</div>
						
						
						
						<div class="form-group">
							<input type="submit" name="btn_submit" class="button" value="Submit">
						</div>
					</form>
  <?php }
 	else
	{ ?>
			<h1>Sorry, You Have Not Any Activated Plan.</h1>
			<hr>
			<h3>Please Subscribe a plan to add products.</h3>
			<a href="dealer_my_plan.php" style="font-weight:bold;font-size:24px;text-decoration:underline">Click here to Subscribe any plan.</a>
<?php	} 
?>                    
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