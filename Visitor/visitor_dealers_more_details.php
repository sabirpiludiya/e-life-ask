<?php

session_start();

	error_reporting(0);

	include "connection.php";

?>


<!doctype html>
<html class="no-js" lang="en">
	<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="widtd=device-widtd, initial-scale=1.0" />
    <title>Dealer Details</title>
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
               <a href="user_profile_of_dealers.php">Back<img src="images/back.png" width="30px" height="30px"></a>&nbsp;&nbsp;&nbsp; <h2>Dealer Details</h2>
            </div>
			
            
        </div>
	</section><!-- end post-wrapper-top -->
    
    
	
        	<div class="content clearfix">

            
            
            	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12" style="widtd:100%;overflow:auto">
                 
				<form metdod="post">
							
		
				
                <table border="" class="table table-striped" data-effect="fade" style="border:#330099 dotted 3px;">

                  <tbody>
                    
				    <?php 
						
					$select = "select * from Tbl_dealer where dealer_id = '$_GET[dealer_id]' and dealer_status=1";
					$query = mysql_query($select);
				
					while($row = mysql_fetch_array($query))
					{
					?>
				<tr>
				  <td style="width:150px">
					  <h6 align="center"> <b> <?php echo $row['company_name']; ?> </b> </h6> <p>
					  <img src="<?php echo $row['dealer_photo']; ?>" height="50px" widtd="50px">
				</td>
				  
				  <td>
					  <b> Email : </b><?php echo $row['dealer_email']; ?> <br>
					  <b> Contact : </b><?php echo $row['dealer_mobile_no']; ?> <br>
				<?php
				

					$select1 = "select * from Tbl_city where city_id = '$row[city_id]'";

					 $query1 = mysql_query($select1);

					$rowcity = mysql_fetch_array($query1);
				  ?>
				
					  <b> City : </b><?php echo $rowcity['city_name']; ?>
				  </td>
				  <td style="width:150px">
						<h6 align="center"> <b> Business : </b> </h6> <h6 align="center"> <?php echo $row['business_type']; ?></h6>
				  </td>
				 
                </tr>
				
						<tr> 
							<td colspan="4" >
							<h3><a href="user_dealers_news.php?dn_id=<?php echo $row['dealer_id']; ?>">News</a> ||
							<a href="user_dealers_survey.php?ds_id=<?php echo $row['dealer_id']; ?>">Survey</a> ||
							<a href="user_dealers_events.php?de_id=<?php echo $row['dealer_id']; ?>">Events</a> ||
							<?php
							if($row['business_type']=="Product Marketing")
							{
								?>
								<a href="user_dealers_product.php?dp_id=<?php echo $row['dealer_id']; ?>">Products</a>
								<?php
							}
							else if($row['business_type']=="Service Provider")
							{
								?>
								<a href="user_dealers_service.php?d_service_id=<?php echo $row['dealer_id']; ?>">Service</a>
								<?php
							}
							else if($row['business_type']=="Institute")
							{
								?>
								<a href="user_dealers_institute.php?di_id=<?php echo $row['dealer_id']; ?>">Institute</a>
								<?php
							}
							else if($row['business_type']=="Trust")
							{
								?>
								<a href="user_dealers_trust.php?dt_id=<?php echo $row['dealer_id']; ?>">Trust</a>
								<?php
							}
							?> </h3>
							</td>	
						</tr>
				
				
					<?php } ?>
					
                  </tbody>
				  
				  
				
                </table>
		
			 
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