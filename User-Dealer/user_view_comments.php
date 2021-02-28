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
	
	
	
	
	
	if(isset($_GET['delete']))
	{
		
		$delete = "delete from Tbl_comment where comment_id = '$_GET[delete]' and user_id = $_SESSION[user_id]";
		$delete_query = mysql_query($delete);
	}
	
	$search = $_POST['txt_comment'];
	
	if(isset($_POST['btn_submit']))
	{
		if($search == "")
		{
			echo "<script>alert('First Enter the Comment...!!!');</script>";
		}
		
		else
		{				
			$insert = "insert into tbl_comment values
			(
				'',
				'$_POST[product_id]',
				'$_POST[txt_comment]',
				'$_SESSION[user_id]',
				(select now()),
				'1'
			)";	
			
			$query = mysql_query($insert);
			
			if($query)
			{	?>
				<script>
				window.location.href="user_view_comments.php?product=<?php echo $_POST['product_id']; ?>";
				</script>
				<?php
			}				
		}
	}
	
?>


<!doctype html>
<html class="no-js" lang="en">
	<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="widtd=device-widtd, initial-scale=1.0" />
    <title>Products of All Dealers</title>
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
		#bx
		{
			padding:5px 15px; 
			color:#000000;
			border:10px thin black;
			cursor:text;
			width:40%;
			-webkit-border-radius: 5px;
			border-radius: 10px; 
			box-shadow: 5px 5px 3px 2px #888888;
		}	
		
		#cmt
		{
			padding:5px 15px; 
			color:#000000;
			font-weight:bold;
			background:#FFFF33; 
			margin-left:1%;
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
			
			 <?php
			 		$selectp = "select product_name from Tbl_product where product_id = '$_GET[product]'";
					$queryp = mysql_query($selectp);
					$sp = mysql_fetch_array($queryp);
			?>		   
                <h2>Comments</h2>
            </div>
			
            
        </div>
	</section><!-- end post-wrapper-top -->
    <h3 align="center"><?php echo $sp['product_name']; ?></h3>
    <hr>
	
        	<div class="content clearfix">

            
            
            	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12" style="width:100%;overflow:auto">
                 
				
 
				<form method="post">
					
				<textarea name="txt_comment" id="bx"></textarea>		   	
				<input type="submit" id="cmt" value="Comment" name="btn_submit" >
				<input type="hidden" name="product_id" value="<?php echo $_GET['product'] ?>">
				<div>  
				
				
					
				</div> <br>
				
				   <tbody>
    
				    <?php 
	/*					
					$select = "select * from Tbl_product where product_status = 1 ";
					$query = mysql_query($select);
	*/			
					?>
									
					<pre><?php $selectc = "select * from Tbl_comment where product_id = '$_GET[product]' and comment_status = 1 order by comment_date_time DESC";
					$queryc = mysql_query($selectc);
					$ct = mysql_num_rows($queryc);
					if($ct!=NULL){					
					while($cc = mysql_fetch_array($queryc))
					 { 
					$selectu = "select * from Tbl_user where user_id = '$cc[user_id]'";
					$queryu = mysql_query($selectu);
					$cu = mysql_fetch_array($queryu); ?>
<font style="color:#FF0000; font-size:20px; font-weight:bold">	<?php echo $cu['user_first_name'] ." ".$cu['user_last_name']."<br>"; ?> </font> <font style="color:#660033">	     <?php echo $cc['comment_description']; ?></font>
<p style="text-align:right"><b>On : </b><?php echo ( date("d/m/Y H:m A", strtotime($cc['comment_date_time'])) ); ?>
<?php
if($cc['user_id'] == $_SESSION['user_id'])
{ ?> <br><br> <a href="user_view_comments.php?product=<?php echo $cc['product_id'];?>&delete=<?php echo $cc['comment_id'];?>"><img src="images/delete.png" height="20px" width="20px"> <b>Delete</b></a><?php }
?></p><hr> <?php } ?>  <?php }  else {?>
<font style="color:#FF0000; font-weight:bold"><?php echo "No Comments to Show."; ?> </font> <br> <?php  }
					 ?> </div> <br> </pre>
				 
				  
                </tr>
					
                  </tbody>
					 
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