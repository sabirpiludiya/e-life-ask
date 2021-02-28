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

	$mp = "select * from tbl_plan where display_status=1 and plan_id='$_GET[plan]'";
	$query = mysql_query($mp);
	$roww=mysql_fetch_array($query);
	$e_date = date('Y-m-d', strtotime("+".$roww['duration']." days"));

		$qry = mysql_query("select * from tbl_current_plan where dealer_id = $_SESSION[dealer_id]");
		$num = mysql_num_rows($qry);
		
		if($num >= 1)
		{
			$update = "update tbl_current_plan Set 
			plan_id = '$_GET[plan]',
			start_date = (select now()),
			end_date = '$e_date' where dealer_id = $_SESSION[dealer_id]";
			
			$query = mysql_query($update);
		}
		else
		{		
			$insert = "insert into tbl_current_plan values
			(
				'',
				'$_SESSION[dealer_id]',
				'$_GET[plan]',
				(select now()),
				'$e_date',
				'1'
			)";	
			
			$query = mysql_query($insert);
		}	
			
			
			if($query)
			{	
				$msg = "Plan '$roww[plan_name]' is Successfully Activated.";
			}
			else
			{
				$msg = "Sorry!!! Something went wrong.";
				
			}
	
	


?>


<!doctype html>
<html class="no-js" lang="en">
	<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Congratulations!!! Plan is Activated</title>
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
  
	<script>
	function jj()
	{
		window.location.href="dealer_my_plan.php";
	}
  	</script>
	
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
                <h2>Congratulations!!! Plan is Activated</h2>
            </div>
			
            <?php echo $e_date; ?>
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
                
                	<form id="registerform" method="post" enctype="multipart/form-data">
					
						
						
						<div class="form-group">
							<input style="height:10%;width:30%;font-size:20px" type="button" onClick="jj()" name="btn_submit" class="button" value="OK">
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