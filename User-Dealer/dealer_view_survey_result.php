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

		$select = "select * from Tbl_question where survey_id = '$_GET[view]'";
		$query_select = mysql_query($select);
		
		$row = mysql_fetch_array($query_select);
		


?>


<!doctype html>
<html class="no-js" lang="en">
	<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Survey Result</title>
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
                <h2>Survey Result</h2>
            </div>
			
            
        </div>
	</section><!-- end post-wrapper-top -->
    
    
	
   		
			
<?php

	$select = "select * from Tbl_question where survey_id = '$_GET[view]'";
	$query_select = mysql_query($select);
	
	$row = mysql_fetch_array($query_select);
?>
   
			
<?php

$count1 = mysql_query("select count(*) from Tbl_survey_answer where answer = '$row[answer_1]' and question_id = '$row[question_id]'");
$c1 = mysql_result($count1,0,0);	
	
$count2 = mysql_query("select count(*) from Tbl_survey_answer where answer = '$row[answer_2]' and question_id = '$row[question_id]'");
$c2 = mysql_result($count2,0,0);	
	
$count3 = mysql_query("select count(*) from Tbl_survey_answer where answer = '$row[answer_3]' and question_id = '$row[question_id]'");
$c3 = mysql_result($count3,0,0);	
	
$count4 = mysql_query("select count(*) from Tbl_survey_answer where answer = '$row[answer_4]' and question_id = '$row[question_id]'");
$c4 = mysql_result($count4,0,0);	
	
?>
   
        	<div class="content clearfix">
            	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                
                	<form id="registerform" method="post" enctype="multipart/form-data">
								
						
                  			<h2 style="color:#0000FF"><?php echo $row['question']; ?></h2>
                  				<br>
							
							
						<div class="form-group">
                  			<h3><?php echo $row['answer_1']; ?></h3> <h4 style="color:#FF9933"><?php echo $c1; ?> Votes</h4>
						</div>
							
						<div class="form-group">
                  			<h3><?php echo $row['answer_2']; ?></h3> <h4 style="color:#FF9933"><?php echo $c2; ?> Votes</b></h4>
						</div>
							
						<div class="form-group">
                  			<h3><?php echo $row['answer_3']; ?></h3> <h4 style="color:#FF9933"><?php echo $c3; ?> Votes</h4>
						</div>
							
						<div class="form-group">
                  			<h3><?php echo $row['answer_4']; ?></h3> <h4 style="color:#FF9933"><?php echo $c4; ?> Votes</h4>
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