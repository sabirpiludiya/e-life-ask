<?php

error_reporting(0);
	
session_start();
	if(!($_SESSION['admin_email']))
	{
		?>
		<script>
		window.location.href="../../login.php";
		</script>
		<?php
	}

	error_reporting(0);

	include "connection.php";
	
	
	
	if(isset($_GET['delete']))
	{
		
		$delete = "delete from Tbl_comment where comment_id = '$_GET[delete]'";
		$delete_query = mysql_query($delete);
	}
	
?>








<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>E-life Ask | Manage Product</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../bootstrap/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../../bootstrap/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../plugins/datatables/dataTables.bootstrap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  
    
  <style type="text/css">
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
			border:1px thin black;
			cursor:pointer;
			-webkit-border-radius: 5px;
			border-radius: 20px 0px 20px 0px; 
			box-shadow: 3px 3px 5px #888888;
		}
		
		
		.btnsrc
		{
			padding:5px 15px; 
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
  
  
  
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

 
<?php
include "header_for_manage.php";
?>


  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->


<?php
include "left_for_manage.php";
?>

	
	
	
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
	   :: COMMENTS ::
      </h1>
   
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
         
		 <div class="container">
        
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">	
			
			 <?php
			 		$selectp = "select product_name from Tbl_product where product_id = '$_GET[view]'";
					$queryp = mysql_query($selectp);
					$sp = mysql_fetch_array($queryp);
			?>		
            </div> </div>
    <h3 align="center"><?php echo $sp['product_name']; ?></h3>
    <hr><br>
				
				   <tbody>
    
				   		
					<?php $selectc = "select * from Tbl_comment where product_id = '$_GET[view]' and comment_status = 1 order by comment_date_time DESC";
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
if($_SESSION['admin_email'])
{ ?> <br><br> <a href="view_comments.php?view=<?php echo $cc['product_id'];?>&delete=<?php echo $cc['comment_id'];?>"><img src="../../dist/img/delete.png" height="20px" width="20px"> <b>Delete</b></a><?php }
?></p><hr> <?php } ?>  <?php }  else {?>
<font style="color:#FF0000; font-weight:bold"><?php echo "No Comments to Show."; ?> </font> <br> <?php  }
					 ?> </div> <br>
				 
				  
                </tr>
					 
                  </tbody>
					 
                  </tbody>
				  
				
			 
			  </form>
			  
				</div><!-- end col-->
            </div><!-- end content -->
   
		 
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
 
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->


<?php
	include "../../footer.php";
?>

</body>
</html>
