<?php

error_reporting(0);

session_start();



include "connection.php";
$count == 0;

		$select = "select * from Tbl_question where survey_id = '$_GET[add_q]'";
		$query_select = mysql_query($select);
		
		$row = mysql_fetch_array($query_select);
		

	if(isset($_POST['btn_submit']))
	{	
			$insert = "insert into Tbl_survey_answer values 
			('',
			'$_GET[question_id]',
			'$_SESSION[user_id]',
			'$_GET[dealer_id]',
			'$_POST[txt_answer]')";
			
			$query = mysql_query($insert);
		
			?>
	<script>window.location.href="user_all_survey.php";</script>

<?php 
	}
?>


<!doctype html>
<html class="no-js" lang="en">
	<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Review the Survey</title>
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
                <h2>Review the Survey</h2>
            </div>
			
            
        </div>
	</section><!-- end post-wrapper-top -->
    
    
	
   		
			
<?php

	$select = "select * from Tbl_question where question_id = '$_GET[question_id]'";
	$query_select = mysql_query($select);
	
	$row = mysql_fetch_array($query_select);
?>

<?php

	$select1 = "select * from Tbl_survey_answer where question_id = '$_GET[question_id]'";
	$query_select1 = mysql_query($select1);
	
	$row1 = mysql_fetch_array($query_select1);
?>
   
   
        	<div class="content clearfix">
            	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                
				<?php
	
				if($row1['answer'] == '')	
				{ ?>		
                	<form id="registerform" method="post" enctype="multipart/form-data">
								
						
						<div class="form-group">
                  			
                  			<h3 style="color:#993333"> <?php echo $row['question']; ?></h3>
                  
						</div>
					<br>		
							
						<div class="form-group">
                  			<h4>Give Your Answer</h4>
							<b style="font-size:20px">1.</b> <input type="radio" name="txt_answer" value="<?php echo $row['answer_1']; ?>"> <?php echo $row['answer_1']; ?> 
							<br> <br> <b style="font-size:20px">2.</b> <input type="radio" name="txt_answer" value="<?php echo $row['answer_2']; ?>">  <?php echo $row['answer_2']; ?>
							<br> <br> <b style="font-size:20px">3.</b> <input type="radio" name="txt_answer" value="<?php echo $row['answer_3']; ?>">  <?php echo $row['answer_3']; ?>
							<br> <br> <b style="font-size:20px">4.</b> <input type="radio" name="txt_answer" value="<?php echo $row['answer_4']; ?>">  <?php echo $row['answer_4']; ?>
						</div>
						
						
						
						<div class="form-group">
							<input type="submit" name="btn_submit" class="button" value="Submit">
						</div>
					</form>
					
		<?php		} 
					else
					{
		?>
						
						<div class="form-group">
                  			
                  			<h3 style="color:#993333"> <?php echo $row['question']; ?></h3>
                  
						</div>
					<br>		
							
						<div class="form-group">
                  			<h4>You Have Already Selected Answer</h4>
							
							<b style="font-size:20px">1.</b> 
							<?php 
								if($row1['answer'] == $row['answer_1'])
								{ 
							 		echo "<b>" .$row['answer_1']. "</b>"; 	
								}
								else
								{
							 		echo $row['answer_1']; 
								} ?>
							<br> <br> 
							
							<b style="font-size:20px">2.</b> 
							<?php 
								if($row1['answer'] == $row['answer_2'])
								{ 
							 		echo "<b>" .$row['answer_2']. "</b>"; 	
								}
								else
								{
							 		echo $row['answer_2']; 
								} ?>
								<br> <br> 
							
							<b style="font-size:20px">3.</b> <?php 
								if($row1['answer'] == $row['answer_3'])
								{ 
							 		echo "<b>" .$row['answer_3']. "</b>"; 	
								}
								else
								{
							 		echo $row['answer_3']; 
								} ?>
								<br> <br> 
							
							<b style="font-size:20px">4.</b> 
							<?php 
								if($row1['answer'] == $row['answer_4'])
								{ 
							 		echo "<b>" .$row['answer_4']. "</b>"; 	
								}
								else
								{
							 		echo $row['answer_4']; 
								} ?>
						</div>
						
			<?php } ?>
					
					
                    
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