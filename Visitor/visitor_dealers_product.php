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
    <title>Products of Dealer</title>
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
		
		.list
		{
			padding:5px 15px; 
			background:#FFFFFF; 
			border:10px thin black;
			-webkit-border-radius: 5px;
			border-radius: 5px; 
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
                <h2>Products of Dealer</h2>
            </div>
			
            
        </div>
	</section><!-- end post-wrapper-top -->
    
    
	
        	<div class="content clearfix">

            
            
            	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12" style="widtd:100%;overflow:auto">
                 
				<form method="post">
							
		
				
                <table border="1" class="table table-striped" data-effect="fade" style="border:#330099 solid 1px;">

                  <tbody>
                    
				    <?php 
						
					$select = "select * from Tbl_dealer where dealer_id = '$_GET[dp_id]' and dealer_status=1";
					$query = mysql_query($select);
				
					while($row = mysql_fetch_array($query))
					{
					?>
				<tr>
				  <td style="width:150px">
					  <h4 align="center"> <b> <?php echo "Products of " .$row['company_name']; ?> </b> </h4> <p>
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
						
					$select = "select * from Tbl_product where dealer_id = '$_GET[dp_id]' and product_status = 1 ";
					$query = mysql_query($select);
					$count=mysql_num_rows($query);

			if($count>=1)
			{					
					while($row = mysql_fetch_array($query))
					{
					?>
				<pre style="border:dashed 1px">
					  <h4 style="background:#E2E8DD"> <b> <?php echo $row['product_name']; ?> </b> </h4> 
					  <div style="height:100px;width:100px;margin-left:10%;padding:10px;border:solid 1px"><img align="left" src="<?php echo $row['product_photo']; ?>" height="100px" width="100px"></div>

<div style="font-size:18px"><b>Product Brand :</b> <?php echo $row['product_brand']; ?>  <br>
<b>Product Model No. :</b> <?php echo $row['product_model_no']; ?>  <br>
<b>Product Price :</b> <?php echo $row['product_price']." Rupees"; ?>  <br> 
<b>Product Description :</b> <br>	<?php echo $row['product_description']; ?> 
  <hr style="border:dashed 1px"><h3 style="color:#9966FF">Comments</h3><?php $selectc = "select * from Tbl_comment where product_id = '$row[product_id]' and comment_status = 1 order by comment_date_time DESC limit 3";
					$queryc = mysql_query($selectc);
					$ct = mysql_num_rows($queryc);
					
					if($ct!=NULL){
					
					while($cc = mysql_fetch_array($queryc))
					 { 
					$selectu = "select * from Tbl_user where user_id = '$cc[user_id]'";
					$queryu = mysql_query($selectu);
					$cu = mysql_fetch_array($queryu);				 
					
					 ?>		<font style="color:#FF0000; font-size:20px; font-weight:bold"><?php echo $cu['user_first_name'] ." ".$cu['user_last_name']; ?> </font> <font style="color:#660033"><?php echo $cc['comment_description']."<br>"; ?> </font> <?php }
					?> 
<b style="font-size:20px"><a href="user_view_comments.php?product=<?php echo $row['product_id'];?>">Post & View All Comments...</a></b> <?php }  else {?>
		<font style="color:#FF0000; font-weight:bold"><?php echo "No Comments to Show."; ?> </font> <br>
<b style="font-size:20px"><a href="user_view_comments.php?product=<?php echo $row['product_id'];?>">Post & View All Comments...</a></b> <?php  }
					 ?> </div> <div style="float:right"> <b>From SubCategory :</b> <?php $select1 = "select sub_category_name from Tbl_sub_category where sub_category_id = '$row[sub_category_id]'";
					$query1 = mysql_query($select1);
					while($sc = mysql_fetch_array($query1))
					 { echo $sc['sub_category_name']; }?> <br> </div> <br> </pre>
				  
				  
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