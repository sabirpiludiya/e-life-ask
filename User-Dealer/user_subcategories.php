<?php

error_reporting(0);

session_start();


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
	$select_page = mysql_query("Select * from Tbl_sub_category where category_id = '$_GET[cat_id]' and sub_category_status=1");
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
if(isset($_POST['btn_search']))
{
	$query = mysql_query("select * from Tbl_sub_category where sub_category_name like '%$_POST[txt_search]%' and category_id = '$_GET[cat_id]' and sub_category_status=1".$limit);
}
else
{
	$query = mysql_query("select * from Tbl_sub_category where category_id = '$_GET[cat_id]' and sub_category_status=1".$limit);
}
?>

<!doctype html>
<html class="no-js" lang="en">
	<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="widtd=device-widtd, initial-scale=1.0" />
    <title>Sub Categories</title>
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

   
    	<div class="container clearfix">
	
                <h3>Sub Categories</h3>
                <hr>
    				
				<div>  
				
 
				<form method="post">
							
		
				<div>  
					<div style="float:right" >
						<input class="txtbox" type="text" name="txt_search" placeholder="Enter Name"  />
						<button class="btnsrc" type="submit" name="btn_search" value="Search">Search</button>
					</div>
					
				</div> <br> <br> <br>
				
				   <tbody>
    
				    <?php 
	/*					
					$select = "select * from Tbl_product where product_status = 1 ";
					$query = mysql_query($select);
	*/
					$count=mysql_num_rows($query);


			
			$count=mysql_num_rows($query);
			
			if($count>=1)
			{				 
				while($row = mysql_fetch_array($query))
				{
				?>            
				<a href="user_subcatproduct.php?subcat_id=<?php echo $row['sub_category_id'];  ?>"><div style="">
              	<pre>  <img src="../admin/pages/tables/<?php echo $row['sub_category_photo']; ?>" height="20%" width="20%">    <b style="font-size:36px"><?php echo $row['sub_category_name']; ?></b></pre>
			</div></a> <br>      
				<?php } 
			}
					
			else
			{ ?>
					<h3 align="center" style="border:#000033 dashed 1px;color:red">Sorry, No Sub Categories to show....</h3>
	<?php	} ?>
				
				  
					
			 
			  <center>
			  <a href="user_subcategories.php?cat_id=<?php echo $_GET['cat_id'];  ?>&page=1"><img src="images/first.png" height="5%" width="5%"></a> |
			  <a href="user_subcategories.php?cat_id=<?php echo $_GET['cat_id'];  ?>&page=<?php echo $pre_page; ?>"><img src="images/prev.png" height="4%" width="4%"></a> 
			  <a href="user_subcategories.php?cat_id=<?php echo $_GET['cat_id'];  ?>&page=<?php echo $next_page; ?>"><img src="images/next.png" height="4%" width="4%"></a> |
			  <a href="user_subcategories.php?cat_id=<?php echo $_GET['cat_id'];  ?>&page=<?php echo $total_page; ?>"><img src="images/last.png" height="5%" width="5%"></a>
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

