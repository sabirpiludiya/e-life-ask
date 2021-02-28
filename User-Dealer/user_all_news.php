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
	

	if(isset($_POST['btn_search']))
	{
		$search = $_POST['txt_search'];
		if($search == "")
		{
			echo "<script>alert('First Enter the Name to search...!!!');</script>";
		}
	}


	
	// To pagination 
	$select_page = mysql_query("Select * from Tbl_news n, Tbl_follow_block f where n.dealer_id = f.dealer_id and f.user_id = $_SESSION[user_id] and block_status = 0 and news_display_status=1");
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



<?php
if(isset($_POST['btn_asc']))
{
	$query = mysql_query("select * from Tbl_news n, Tbl_follow_block f where n.dealer_id = f.dealer_id and f.user_id = $_SESSION[user_id] and block_status = 0 and news_display_status=1 order by news_title".$limit);
}
else if(isset($_POST['btn_desc']))
{
	$query = mysql_query("select * from Tbl_news n, Tbl_follow_block f where n.dealer_id = f.dealer_id and f.user_id = $_SESSION[user_id] and block_status = 0 and news_display_status=1 order by news_title desc".$limit);
}
else if(isset($_POST['btn_search']))
{
	$query = mysql_query("select * from Tbl_news n, Tbl_follow_block f where n.dealer_id = f.dealer_id and f.user_id = $_SESSION[user_id] and block_status = 0  and news_display_status=1 and news_title like '%$_POST[txt_search]%'".$limit);
}
else
{
	$query = mysql_query("select * from Tbl_news n, Tbl_follow_block f where n.dealer_id = f.dealer_id and f.user_id = $_SESSION[user_id] and block_status = 0 and news_display_status=1".$limit);
}
?>



<!doctype html>
<html class="no-js" lang="en">
	<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="widtd=device-widtd, initial-scale=1.0" />
    <title>News of All Dealers</title>
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
                <h2>News of All Dealers</h2>
            </div>
			
            
        </div>
	</section><!-- end post-wrapper-top -->
    
    
	
        	<div class="content clearfix">

            
            
            	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12" style="widtd:100%;overflow:auto">
                 
			
 
				<form method="post">
							
				<div>  
					<div style="float:left">
						<button class="btnrd" type="submit" name="btn_asc" value="Ascending">Ascending</button>
						<button class="btnrd" type="submit" name="btn_desc" value="Descending">Descending</button>
					</div>
					<div style="float:right" >
						<input class="txtbox" type="text" name="txt_search" placeholder="Enter Name"  />
						<button class="btnsrc" type="submit" name="btn_search" value="Search">Search</button>
					</div>
					
				</div> <br> <br> <br>
				
		
				   <tbody>
                    
				    <?php 
				/*		
					$select = "select * from Tbl_news where news_display_status = 1 order by news_date DESC";
					$query = mysql_query($select);
			*/		$count=mysql_num_rows($query);
			
			if($count>=1)
			{
					while($row = mysql_fetch_array($query))
					{
					?>
				<pre style="border:dashed 1px"><?php $select1 = "select * from Tbl_dealer where dealer_id = '$row[dealer_id]'";
					$query1 = mysql_query($select1);
					while($sc = mysql_fetch_array($query1))
					 { ?> <p align="center" style="border:groove 4px black;"><font style="color:#0000FF;font-weight:bold;font-size:19px">News by :  <?php echo $sc['company_name']; }?></font></p> <h4 style="background:#E2E8DD"> <b style="font-size:35px"> <?php echo $row['news_title']; ?> </b> </h4> 			  <p> <?php echo $row['news_description']; ?> </p>
					  <p style="float:right">  <b>Published on :</b> <br>  <?php echo ( date("d/m/Y", strtotime($row['news_date'])) ); ?></p> <br>
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
				  
				  
			
			  <center>
			  <a href="user_all_news.php?page=1"><img src="images/first.png" height="5%" width="5%"></a> |
			  <a href="user_all_news.php?page=<?php echo $pre_page; ?>"><img src="images/prev.png" height="4%" width="4%"></a> 
			  <a href="user_all_news.php?page=<?php echo $next_page; ?>"><img src="images/next.png" height="4%" width="4%"></a> |
			  <a href="user_all_news.php?page=<?php echo $total_page; ?>"><img src="images/last.png" height="5%" width="5%"></a>
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