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
                <h2>Dealer Details</h2>
            </div>
			
            
        </div>
	</section><!-- end post-wrapper-top -->
    
    
	
        	<div class="content clearfix">

            
            
            	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12" style="widtd:100%;overflow:auto">
                 
				
				<?php
				
					$select = "select * from Tbl_dealer where dealer_status = 1";
					$query = mysql_query($select);
					while($row=mysql_fetch_array($query))
					{
					
				?>
										
<table width="100%" border="1">
  <tr>
    <td colspan="2"><h3><?php echo $row['company_name']; ?></h3></td>
  </tr>
 
  <tr>
    <td width="32%"> </td>
    <td width="68%"> </td>
  </tr>
  <tr>
    <td rowspan="5" valign="top"><img src="<?php echo $row['dealer_photo'];?>" width="100%" height="100%" /></td>
    <td> </td>
    <td> </td>
  </tr>
  <tr>
    <td><strong>Business : </strong> <?php echo $row['business_type'];?></td>
  </tr>
  <tr>
    <td><strong>Email : </strong> <?php echo $row['dealer_email'];?></td>
  </tr>
  <tr>
    <td><strong>Contact : </strong> <?php echo $row['dealer_mobile_no'];?></td>
  </tr>
  <tr>
    <td><strong>City : </strong>
	
				<?php
				

					$select1 = "select * from Tbl_city where city_id = '$row[city_id]'";

					 $query1 = mysql_query($select1);

					$rowcity = mysql_fetch_array($query1);
				 	
					echo $rowcity['city_name']; 
				  
				  ?>
	</td>
  </tr>
  <tr>
    <td colspan="2"><strong>Dealer Address :</strong> <?php echo $row['dealer_address'];?></td>
  </tr>

  <tr>
    <td colspan="2"><strong>Dealer Details :</strong> <?php echo $row['dealer_details'];?></td>
  </tr>

  <tr>
    <td colspan="2"><strong>Website :</strong> <?php echo $row['web_url'];?></td>
  </tr>

  <tr  width="100%">
    <td width="20%"> <strong>News</strong> </td>
    <td width="20%"> <strong>Surveys</strong> </td>
    <td width="20%"> <strong>Events</strong> </td>
    <td width="20%"> <strong>oisrjtosrjot</strong></td>
	
  </tr>
  
  </form>
</table>
<?php   }  ?>
</body>
</html>

 
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