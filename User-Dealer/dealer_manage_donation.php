<?php

session_start();

	error_reporting(0);

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
	

	if(isset($_POST['btn_search']))
	{
		$search = $_POST['txt_search'];
		if($search == "")
		{
			echo "<script>alert('First Enter the Name to search...!!!');</script>";
		}
	}





	if(isset($_GET['delete']))
	{
		
		$delete = "delete from tbl_donation_info where donation_id = '$_GET[delete]' and dealer_id = $_SESSION[dealer_id]";
		$delete_query = mysql_query($delete);
	}

	if(isset($_GET['reject']))
	{
		$reject = "update tbl_donation_info set donation_status = 0 where donation_id = '$_GET[reject]' and dealer_id = $_SESSION[dealer_id]";
		$reject_query = mysql_query($reject);
	
	}

	if(isset($_GET['approve']))
	{
		$approve = "update tbl_donation_info set donation_status = 1 where donation_id = '$_GET[approve]' and dealer_id = $_SESSION[dealer_id]";
		$approve_query = mysql_query($approve);
	}


	if(isset($_POST['mul_delete']))
	{
		$del = $_POST['chk_delete'];
		for($i=0 ; $i<count($del) ; $i++)
		{
			$del_id = $del[$i];
			$delete = "delete from tbl_donation_info where donation_id = '$del_id' and dealer_id = $_SESSION[dealer_id]";
			$del_query = mysql_query($delete);
		}
	}

	
	// To pagination 
	$select_page = mysql_query("Select * from tbl_donation_info where dealer_id = $_SESSION[dealer_id]");
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
	$query = mysql_query("select * from tbl_donation_info where dealer_id = $_SESSION[dealer_id] order by donation_title".$limit);
}
else if(isset($_POST['btn_desc']))
{
	$query = mysql_query("select * from tbl_donation_info where dealer_id = $_SESSION[dealer_id] order by donation_title desc".$limit);
}
else if(isset($_POST['btn_search']))
{
	$query = mysql_query("select * from tbl_donation_info where donation_title like '%$_POST[txt_search]%' and dealer_id = $_SESSION[dealer_id]".$limit);
}
else
{
	$query = mysql_query("select * from tbl_donation_info where dealer_id = $_SESSION[dealer_id]".$limit);
}
?>




<!doctype html>
<html class="no-js" lang="en">
	<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Manage Donation</title>
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
                <h2>Manage Donation</h2>
            </div>
			
            
        </div>
	</section><!-- end post-wrapper-top -->
    
    
	
        	<div class="content clearfix">

            
            
            	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12" style="width:100%;overflow:auto">
                 
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
					
				</div> <br>
				
                <table border="1" class="table table-striped" data-effect="fade" style="border:#330099 solid 2px;">
                  <thead>
                    <tr>
					  <th><input id="del_but" type="submit" name="mul_delete" value="Delete"></th>
                      <th class="b_line">#</th>
                      <th class="b_line">Donation Title</th>
                      <th class="b_line">Donation Date</th>
                      <th class="b_line">Trust Type</th>
                      <th class="b_line">Donation Description</th>
                      <th class="b_line">Donation Photo</th>
                      <th class="b_line">Paypal Acc.</th>
					  <th class="b_line">Trust Link</th>
                      <th class="b_line">Donation Status</th>
					  <th class="b_line">Delete</th>
					  <th class="b_line">Approve</th>
					  <th class="b_line">Reject</th>
					  <th class="b_line">Edit</th>
                    </tr>
                  </thead>
                  <tbody>
                    
					    <?php 
					/*
					$select = "select * from tbl_donation_info".$limit;
					$query = mysql_query($select);
					*/
					
					if((mysql_num_rows($query)) == 0)
						$no_rows = "No More Data to Show.....";
					
					
					$c = 0;
					while($row = mysql_fetch_array($query))
					{
						$c++;
				?>
                <tr>
                  <td><input type="checkbox" name="chk_delete[]" value="<?php echo $row['donation_id']; ?>"> </td>
				  <td><?php echo $c; ?></td>
                  <td><?php echo $row['donation_title']; ?> </td>
				  <td><?php echo $row['donation_date']; ?></td>
				  <td><?php echo $row['trust_type']; ?></td>
				  <td><?php echo $row['donation_description']; ?></td>
                  <td><img src="<?php echo $row['donation_photo']; ?>" height="100px" width="100px"></td>
				  <td><?php echo $row['paypal_account']; ?></td>
				  <td><?php echo $row['trust_link']; ?></td>
                  <td><?php echo $row['donation_status']; ?></td>             
				  <td><a href="dealer_manage_donation.php?delete=<?php echo $row['donation_id'];?>"><img src="images/delete.png" height="30px" width="30px"></a></td>
                 <td><a href="dealer_manage_donation.php?approve=<?php echo $row['donation_id'];?>"><img src="images/approve.png" height="30px" width="30px"></a></td>
                 <td><a href="dealer_manage_donation.php?reject=<?php echo $row['donation_id'];?>"><img src="images/reject.jpeg" height="40px" width="40px"></a></td>
				  <td><a href="dealer_edit_donation.php?edit=<?php echo $row['donation_id'];?>"><img src="images/edit.png" height="30px" width="30px"></a></td>
                </tr>
					
					
                  </tbody>
				  
				  
				<?php } ?>
				
                </table>
		
				<?php if($no_rows != "") 
				{	?>				
					<h5 style="color:red;border:dotted 6px black;"><?php echo $no_rows; ?></h5>
				<?php } ?>
		
			
			
			  <center>
			  <a href="dealer_manage_donation.php?page=1"><img src="images/first.png" height="5%" width="5%"></a> |
			  <a href="dealer_manage_donation.php?page=<?php echo $pre_page; ?>"><img src="images/prev.png" height="4%" width="4%"></a> 
			  <a href="dealer_manage_donation.php?page=<?php echo $next_page; ?>"><img src="images/next.png" height="4%" width="4%"></a> |
			  <a href="dealer_manage_donation.php?page=<?php echo $total_page; ?>"><img src="images/last.png" height="5%" width="5%"></a>
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