<?php

session_start();

	error_reporting(0);

	if(!($_SESSION['user_email']))
	{
		?>
		<script>
		window.location.href="login.php";
		</script>
		<?php
	}


		
	if(!($_SESSION['user_status']))
	{
		?>
		<script>
		window.location.href="user_blocked.php";
		</script>
		<?php
	}
		



	include "connection.php";

?>


<!doctype html>
<html class="no-js" lang="en">
	<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="widtd=device-widtd, initial-scale=1.0" />
    <title>Survey of Dealer</title>
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
    
	
	
	<style type="text/css">
	
	.b_line
	{
	border-bottom:solid 10px #000000;
	}
	td
	{
	border-bottom:solid 1px;
	}
	
		
		.btnmored
		{
			padding:5px 15px; 
			background:#33FF66;
			color:BLACK;
			border:1px solid black;
			-webkit-border-radius: 5px;
			box-shadow: 3px 3px 5px #888888;
		}
		
		
		.btnunfollow
		{
			padding:5px 15px; 
			background:#A9FFFF;
			color:BLACK;
			font-weight:bold;
			font-size:15px;
			border:1px solid black;
			cursor:pointer;
			-webkit-border-radius: 5px;
			border-radius: 20px 0px 20px 0px; 
			box-shadow: 3px 3px 5px #888888;
		}
		
		
		.btnfollow
		{
			padding:5px 15px; 
			color:#000000;
			background:#00FFCC; 
			border:10px tdin black;
			cursor:pointer;
			 font-weight:bold;
			-webkit-border-radius: 5px;
			border-radius: 10px; 
			box-shadow: 1px 1px 1px 0px #888888;
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
                <h2>Survey of Dealer</h2>
            </div>
			
            
        </div>
	</section><!-- end post-wrapper-top -->
    
    
	
        	<div class="content clearfix">

            
            
            	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12" style="widtd:100%;overflow:auto">
                 
				<form method="post">
							
		
				
                <table border="1" class="table table-striped" data-effect="fade" style="border:#330099 solid 1px;">

                  <tbody>
                    
				    <?php 
						
					$select = "select * from Tbl_dealer where dealer_id = '$_GET[ds_id]' and dealer_status=1";
					$query = mysql_query($select);
				
					while($row = mysql_fetch_array($query))
					{
					?>
				<tr>
				  <td style="width:150px">
					  <h4 align="center"> <b> <?php echo "Survey of " .$row['company_name']; ?> </b> </h4> <p>
					  <div align="center"><img src="<?php echo $row['dealer_photo']; ?>" height="100px" width="120px"></div>
				</td>
				  
				
                </tr>
					<?php } ?>
					
                  </tbody>
				  
				  
				
                </table>
		
			 
			  </form>
			  	
		
		<hr>
 
				<form method="post">
							
		
				   <tbody>
                    
				    <?php 
						
					$select = "select * from Tbl_survey s , Tbl_question q where dealer_id = '$_GET[ds_id]' and s.survey_id = q.survey_id and display_status = 1 order by survey_start_date DESC";
					
			
					$query = mysql_query($select);
					$count=mysql_num_rows($query);
			
			if($count>=1)
			{				
					while($row = mysql_fetch_array($query))
					{
					?>
				<pre style="border:dashed 1px">
					  <h4 style="background:#E2E8DD"> <b> <?php echo $row['survey_title']; ?> </b> </h4>
<b style="font-size:20px"><a href="user_survey_answer.php?survey_id=<?php echo $row['survey_id'];?>&dealer_id=<?php echo $row['dealer_id'];?>&question_id=<?php echo $row['question_id'];?>">Give Review</a></b>
					  <p style="float:right"> <b>Started on :</b> <?php echo ( date("d/m/Y", strtotime($row['survey_start_date'])) ); ?> <br> <b>Ending on :</b> <?php echo ( date("d/m/Y", strtotime($row['survey_end_date'])) ); ?></p> <br>
				</pre>
				  
				  
                </tr>
					<?php } 
				}
					
				else
				{ ?>
						<h3 align="center" style="border:#000033 dashed 1px;color:red">Sorry, Record Not Found....</h3>
		<?php	}
					
					 ?>
					
                  </tbody>
				  
				  
				
		
			 
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