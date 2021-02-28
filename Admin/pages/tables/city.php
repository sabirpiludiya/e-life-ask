<?php
	error_reporting(0);

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
		$delete = "delete from Tbl_city where city_id = '$_GET[delete]'";
		$delete_query = mysql_query($delete);
	}


	if(isset($_GET['reject']))
	{
		$reject = "update Tbl_city set city_status = 0 where city_id = '$_GET[reject]'";
		$reject_query = mysql_query($reject);
	
	}

	if(isset($_GET['approve']))
	{
		$approve = "update Tbl_city set city_status = 1 where city_id = '$_GET[approve]'";
		$approve_query = mysql_query($approve);
	}

	if(isset($_POST['mul_delete']))
	{
		$del = $_POST['chk_delete'];
		for($i=0 ; $i<count($del) ; $i++)
		{
			$del_id = $del[$i];
			$delete = "delete from Tbl_city where city_id = '$del_id'";
			$del_query = mysql_query($delete);
		}
	}
	
	// To pagination 
	$select_page = mysql_query("Select * from Tbl_city");
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
			$page = $total_page;
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
	$query = mysql_query("select * from Tbl_city order by city_name".$limit);
}
else if(isset($_POST['btn_desc']))
{
	$query = mysql_query("select * from Tbl_city order by city_name desc".$limit);
}
else if(isset($_POST['btn_search']))
{
	$query = mysql_query("select * from Tbl_city where city_name like '%$_POST[txt_search]%'".$limit);
}
else
{
	$query = mysql_query("select * from Tbl_city".$limit);
}
?>




<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>E-life Ask | Manage City</title>
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
	   :: MANAGE CITY ::
      </h1>
   
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
         
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body" style="width:100%;overflow:auto">
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
				
              <table class="table table-bordered table-hover" >
                <thead>
										
                <tr>
                  <th><input id="del_but" type="submit" name="mul_delete" value="Delete"></th>
                  <th>City Name</th>
                  <th>City Status</th>
                  <th>Delete</th>
                  <th>Approve</th>
                  <th>Reject</th>
				  <th>Edit</th>
                </tr>
                </thead>
						
				<?php 
					/*
					$select = "select * from Tbl_city".$limit;
					$query = mysql_query($select);
					*/
					while($row = mysql_fetch_array($query))
					{
				?>
				
                <tbody>
                
				<tr>
                  <td><input type="checkbox" name="chk_delete[]" value="<?php echo $row['city_id']; ?>"> </td>
                  <td><?php echo $row['city_name']; ?> </td>
                  <td><?php echo $row['city_status']; ?></td>
				  <td><a href="manage_city.php?delete=<?php echo $row['city_id'];?>"><img src="../../dist/img/delete.png" height="30px" width="30px"></a></td>
                 <td><a href="manage_city.php?approve=<?php echo $row['city_id'];?>"><img src="../../dist/img/approve.png" height="30px" width="30px"></a></td>
                 <td><a href="manage_city.php?reject=<?php echo $row['city_id'];?>"><img src="../../dist/img/reject.jpeg" height="40px" width="40px"></a></td> 
				 <td><a href="edit_city.php?edit=<?php echo $row['city_id'];?>"><img src="../../dist/img/edit.png" height="30px" width="30px"></a></td>
                 
                </tr>

                </tbody>

              <?php } ?>
               
              </table>
			  
			  
			  <center>
			  <a href="city.php?page=1"><img src="../../dist/img/first.png" height="5%" width="5%"></a> |
			  <a href="city.php?page=<?php echo $pre_page; ?>"><img src="../../dist/img/prev.png" height="4%" width="4%"></a> 
			  <a href="city.php?page=<?php echo $next_page; ?>"><img src="../../dist/img/next.png" height="4%" width="4%"></a> |
			  <a href="city.php?page=<?php echo $total_page; ?>"><img src="../../dist/img/last.png" height="5%" width="5%"></a>
			  </center>
			 
			  
			  
			  </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
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


</body>
</html>
