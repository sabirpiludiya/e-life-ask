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

		$select = "select * from Tbl_question where survey_id = '$_GET[add_q]'";
		$query_select = mysql_query($select);
		
		$row = mysql_fetch_array($query_select);
		

	if(isset($_POST['btn_submit']))
	{			

		if($row['survey_id'] == '')
		{
			$insert = "insert into Tbl_question values 
			('',
			'$_GET[add_q]',
			'$_POST[txt_question]',
			'$_POST[txt_answer_1]',
			'$_POST[txt_answer_2]',
			'$_POST[txt_answer_3]',
			'$_POST[txt_answer_4]')";
			
			$query = mysql_query($insert);
		}	
		
		else
		{
			$update = "Update Tbl_question set
			question ='$_POST[txt_question]',
			answer_1='$_POST[txt_answer_1]',
			answer_2='$_POST[txt_answer_2]',
			answer_3='$_POST[txt_answer_3]',
			answer_4='$_POST[txt_answer_4]'
			where survey_id = '$_GET[add_q]'";
			
			$query = mysql_query($update);
		}
		
			?>
	<script>window.location.href="dealer_manage_survey.php";</script>

<?php 
	}
?>


<!doctype html>
<html class="no-js" lang="en">
	<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Add Question in Survey</title>
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
                <h2>Add Question in Survey</h2>
            </div>
			
            
        </div>
	</section><!-- end post-wrapper-top -->
    
    
	
   		
			
<?php

	$select = "select * from Tbl_question where survey_id = '$_GET[add_q]'";
	$query_select = mysql_query($select);
	
	$row = mysql_fetch_array($query_select);
?>
   
        	<div class="content clearfix">
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
                  			
                  			<label>Question of Survey</label>
                  <textarea class="form-control" rows="3" placeholder="Enter Question of Survey" name="txt_question"><?php echo $row['question']; ?></textarea>
				
				
						</div>
							
							
						<div class="form-group">
                  			<label>Answer 1</label>
							<input type="text" class="form-control" placeholder="Enter First Answer"  name="txt_answer_1" value="<?php echo $row['answer_1']; ?>"> 
						</div>
						
						
						<div class="form-group">
                  			<label>Answer 2</label>
							<input type="text" class="form-control" placeholder="Enter Second Answer"  name="txt_answer_2" value="<?php echo $row['answer_2']; ?>"> 
						</div>
						
						
						<div class="form-group">
                  			<label>Answer 3</label>
							<input type="text" class="form-control" placeholder="Enter Third Answer"  name="txt_answer_3" value="<?php echo $row['answer_3']; ?>"> 
						</div>
						
						
						<div class="form-group">
                  			<label>Answer 4</label>
							<input type="text" class="form-control" placeholder="Enter Forth Answer"  name="txt_answer_4" value="<?php echo $row['answer_4']; ?>"> 
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