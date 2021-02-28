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

	
	include "connection.php";

?>


<!doctype html>
<html class="no-js" lang="en">
	<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="widtd=device-widtd, initial-scale=1.0" />
    <title>My Profile</title>
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
	
		#del_but
		{
			padding:5px 15px; 
			background:#F9B1AA; 
			border:1px tdin black;
			cursor:pointer;
			-webkit-border-radius: 5px;
			border-radius: 10px; 
			box-shadow: 3px 3px 5px #888888;
		}
		
		.btnrd
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
		
		
		.btnsrc
		{
			padding:5px 15px; 
			color:#000000;
			background:#FFCC00; 
			border:10px tdin black;
			cursor:pointer;
			-webkit-border-radius: 5px;
			border-radius: 10px; 
			box-shadow: 5px 5px 3px 2px #888888;
		}
		
		.txtbox
		{
			padding:5px 15px; 
			background:#FFFFCC; 
			border:10px tdin black;
			-webkit-border-radius: 5px;
			border-radius: 8px; 
			box-shadow: 5px 5px 3px 2px #888888;
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
                <h2>My Profile</h2>
            </div>
			
            
        </div>
	</section><!-- end post-wrapper-top -->
    
    
	
        	<div class="content clearfix">

            
            
            	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12" style="widtd:100%;overflow:auto">
                 
				<form metdod="post">
							
		
				
                <table border="1" class="table table-striped" data-effect="fade" style="border:#330099 double;">

                  <tbody>
                    
					    <?php 
						
					$select = "select * from Tbl_dealer where dealer_id = $_SESSION[dealer_id]";
					$query = mysql_query($select);
				
					
		
					$row = mysql_fetch_array($query)
					?>
				<tr>
				  <td style="width:150px">Name</td>
				  <td><?php echo $row['dealer_first_name'] ." " .$row['dealer_last_name']; ?></td>
                </tr>
					
				<tr>
				  <td>Photo</td>
				  <td><img src="<?php echo $row['dealer_photo']; ?>" height="100px" widtd="100px"></td>
                </tr>
					
					
				<tr>
				  <td>Company Name</td>
				  <td><?php echo $row['company_name']; ?></td>
                </tr>
					
				<tr>
				  <td>Email</td>
				  <td><?php echo $row['dealer_email']; ?></td>
                </tr>
					
				<tr>
				  <td>Mobile Number</td>
				  <td><?php echo $row['dealer_mobile_no']; ?></td>
                </tr>
					
				<tr>
				  <td>Designation</td>
				  <td><?php echo $row['designation']; ?></td>
                </tr>
					
					
				<tr>
				  <td>Address</td>
				  <td><?php echo $row['dealer_address']; ?> <br>
				  
					    <?php 
						
					$select = "select * from Tbl_city where city_id = (select city_id from tbl_dealer where dealer_id = '$_SESSION[dealer_id]')";
					$query = mysql_query($select);
					$city_row = mysql_fetch_array($query)
					?>
				   <?php echo "City : " .$city_row['city_name']; ?>
				   
				   </td>
                </tr>
				
				<tr>
				  <td>Pincode</td>
				  <td><?php echo $row['pin_code']; ?></td>
                </tr>
					
				<tr>
				  <td>Details</td>
				  <td><?php echo $row['dealer_details']; ?></td>
                </tr>
					
					
				<tr>
				  <td>Web URL</td>
				  <td><?php echo $row['web_url']; ?></td>
                </tr>
					
					
				<tr>
				  <td>Join Date</td>
				  <td><?php echo $row['JOD']; ?></td>
                </tr>
					
					
					
				<tr>
				  <td>Business Type</td>
				  <td><?php echo $row['business_type']; ?></td>
                </tr>
					
					
					
				<tr>
				  <td>Dealer 1st Proof</td>
				  <td><img src="<?php echo $row['dealer_proof_1']; ?>" height="100px" widtd="100px"></td>
                </tr>
					
					
				<tr>
				  <td>Dealer 2nd Proof</td>
				  <td><img src="<?php echo $row['dealer_proof_2']; ?>" height="100px" widtd="100px"></td>
                </tr>
					
					
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