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
	
	// To pagination 
	$select_page = mysql_query("Select * from Tbl_plan");
	$rows = mysql_num_rows($select_page);
	$per_page = 5;
	$total_page = ceil($rows/$per_page);
	if(isset($_GET['page']))
	{
		$page = $_GET['page'];
		$pre_page = $_GET['page']-1;
		$next_page = $_GET['page']+1;
		if($page < 1)
		{
			$page = 1;		
		}
		if($pre_page < 1)
		{
			$pre_page=1;
		}
		if($next_page > $total_page)
		{	
			$next_page = $total_page;
		}
	}
	else
	{
		$page = 1;
		$pre_page = 1;
		$next_page = 2;
	}
	$limit_page = $page-1;
	$limit = " Limit ".$limit_page*$per_page.",".$per_page;

?>







<!doctype html>
<html class="no-js" lang="en">
	<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>All Plans</title>
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
			border:1px thin black;
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
			border:10px thin black;
			cursor:pointer;
			-webkit-border-radius: 5px;
			border-radius: 10px; 
			box-shadow: 5px 5px 3px 2px #888888;
		}
		
		.txtbox
		{
			padding:5px 15px; 
			background:#FFFFCC; 
			border:10px thin black;
			-webkit-border-radius: 5px;
			border-radius: 8px; 
			box-shadow: 5px 5px 3px 2px #888888;
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
	<script src="js/jquery-1.11.3.min.js"></script>
	<script>
	function money()
	{
		var money = document.getElementById("n1").value;
		document.getElementById("n2").value = money;
	}
		$(document).ready(function(){

$(".button").click(function(){
		alert("Hellooo");  
		var val = $(this).parent().parent().find("#n1").val();
		alert(val);
		});
	});
	
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
                <h2>All Plans</h2>
            </div>
			
            
        </div>
	</section><!-- end post-wrapper-top -->
    
    
	
        	<div class="content clearfix">

            
            
            	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12" style="width:100%;overflow:auto">
	<?php
		$mp = "select * from tbl_current_plan where display_status=1 and dealer_id = $_SESSION[dealer_id]";
		$query = mysql_query($mp);
		$roww=mysql_fetch_array($query);
		$cur_date = (date("Y-m-d"));
		$ex_date = $roww['end_date'];
?>
                 
				<form id="registerform" method="post" enctype="multipart/form-data" name="frm_paypal">
						
						
                <table border="1" class="table table-striped" data-effect="fade" style="border:#330099 solid 2px;">
                  <thead>
                    <tr>
                      <th class="b_line">#</th>
                      <th class="b_line">Plan Name</th>
                      <th class="b_line">Plan Price</th>
                      <th class="b_line">Plan Description</th>
                      <th class="b_line">Duration</th>
                      <th class="b_line">Activate now from here</th>
				
                    </tr>
                  </thead>
                  <tbody>

<?php
	$query = mysql_query("select * from Tbl_plan".$limit);
?>                    
					    <?php 
				
		$select_cur = "select * from Tbl_current_plan c, Tbl_plan p where dealer_id = $_SESSION[dealer_id] and c.plan_id = p.plan_id";
		$query_cur = mysql_query($select_cur);
		$row_cur = mysql_fetch_array($query_cur);

					if((mysql_num_rows($query)) == 0)
						$no_rows = "No More Data to Show.....";
					
					
					$c = 0;
					while($row = mysql_fetch_array($query) )
					{
						$c++;
				?>
                <tr>
				  <td><?php echo $c; ?></td>
                  <td id="n1"><?php echo $row['plan_name']; ?> </td>
				  <td><?php echo $row['plan_price']; ?></td>
				  <td><?php echo $row['plan_description']; ?></td>
				  <td><?php echo $row['duration']; ?></td>
				  <td style="font-size:20px"><?php
					if($row_cur['plan_id']==$row['plan_id'] && ($ex_date > $cur_date))
					{
						echo "<b>Activated</b>";
					}
					
					else
					{ ?>
					
				  <b style="font-size:20px"><a href="dealer_plan_activate.php?plan_id=<?php echo $row['plan_id'];?>">Purchase</a></b>
                <?php } ?>
				</td>
				</tr>
					
					
                  </tbody>
				  
				  
				<?php } ?>
				
                </table>
		
				<?php if($no_rows != "") 
				{	?>				
					<h5 style="color:red;border:dotted 6px black;"><?php echo $no_rows; ?></h5>
				<?php } ?>
		
			
			
			  <center>
			  <a href="dealer_my_plan.php?page=1"><img src="images/first.png" height="5%" width="5%"></a> |
			  <a href="dealer_my_plan.php?page=<?php echo $pre_page; ?>"><img src="images/prev.png" height="4%" width="4%"></a> 
			  <a href="dealer_my_plan.php?page=<?php echo $next_page; ?>"><img src="images/next.png" height="4%" width="4%"></a> |
			  <a href="dealer_my_plan.php?page=<?php echo $total_page; ?>"><img src="images/last.png" height="5%" width="5%"></a>
			  </center>
			
			  
			 
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