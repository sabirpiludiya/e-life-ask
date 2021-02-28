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
		//=======News Title=========//

		$news_title = $_POST['txt_news_title'];
		
		if($news_title == "")
		{
			$err_news_title = "Please Enter Title of News";
			$count++;
		}
			
		
		//=======News Description=========//
		$news_description = $_POST['txt_news_description'];
		if($news_description == "")
		{
			$err_news_description = "Please Enter Description of News";
			$count++;
		}
		
				
		//=======News Display Till Date=========//
		$news_till_date = $_POST['txt_news_till_date'];
		if($news_till_date == "")
		{
			$err_news_till_date = "Please Enter Last date to display News";
			$count++;
		}
	
	
	}
	
	if(isset($_POST['btn_submit']) && $count==0)
	{
		
		$qry = mysql_query("select * from Tbl_news where news_title = '$news_title'");
		$count = mysql_num_rows($qry);
		
		if($count > 0)
		{
			$msg = "Sorry!!! Entered News '".$news_title."' is Already Exist.";
		}
		else
		{			
			$insert = "insert into tbl_news values
			(
				'',
				'$_SESSION[dealer_id]',
				'$_POST[txt_news_title]',
				'$_POST[txt_news_description]',
				(select now()),
				'$_POST[txt_news_till_date]',
				'1'
			)";	
			
			$query = mysql_query($insert);
			
			if($query)
			{	
				$msg = "New News '".$news_title."' is Successfully Created.";
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
    <title>Add News</title>
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
                <h2>Add News</h2>
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
                  			<label>Title of News</label>
							<input type="text" class="form-control" placeholder="Enter Title of News"  name="txt_news_title" value="<?php echo $news_title; ?>"> 
					<div class="validation"><?php echo $err_news_title; ?></div> 
						</div>
												
						
						<div class="form-group">
                  			
                  			<label>News Description</label>
                  <textarea class="form-control" rows="3" placeholder="Enter News Description" name="txt_news_description"><?php echo $news_description; ?></textarea>
				  			<div class="validation"><?php echo $err_news_description; ?></div> 
						</div>	
						
											
						<div class="form-group">
                  			
                  			<label>News Display Till</label>
							<input type="date" class="form-control" placeholder="Enter Last Date to Display News"  name="txt_news_till_date" value="<?php echo $news_till_date; ?>">
				  <div class="validation"><?php echo $err_news_till_date; ?></div> 
				
				
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