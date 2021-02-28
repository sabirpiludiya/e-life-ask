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

include "connection.php";

	if(isset($_POST['btn_submit']))
	{
		$file = $_FILES['file_sub_category_photo']['name'];
		if($file=="")
		{
			$sub_category_file = $_POST['file_old_sub_category_photo'];
		}
	
		else
		{
			$file = $_FILES['file_sub_category_photo']['name'];
			$dest = "../images/$file";
			$src = $_FILES['file_sub_category_photo']['tmp_name'];
			move_uploaded_file($src,$dest);
			$sub_category_file = $dest;
		}
		
		
		$update = "update Tbl_sub_category set
		sub_category_name='$_POST[txt_sub_category_name]',
		sub_category_photo='$sub_category_file',
		category_id = '$_POST[ddl_category_name]',
		business_type='$_POST[ddl_business_type]'
		where sub_category_id = '$_GET[edit]'";
		
		$query = mysql_query($update);
	?>
	<script>window.location.href="manage_sub_category.php";</script>


<?php 
	}
	
	$select = "select * from Tbl_sub_category where sub_category_id = '$_GET[edit]'";
	$query_select = mysql_query($select);
	
	$row = mysql_fetch_array($query_select);

?>






<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>E-life Ask | Manage Sub Category</title>
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
        :: EDIT SUB CATEGORY ::
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <!-- /.box-header -->
            <!-- form start -->
			
			
<?php 
	
	$select = "select * from Tbl_sub_category where sub_category_id = '$_GET[edit]'";
	$query_select = mysql_query($select);
	
	$row = mysql_fetch_array($query_select);

?>

			
            <form role="form" method="post" enctype="multipart/form-data">
              <div class="box-body">
              
				 <div class="form-group">
                  <label>Name of Sub Category</label>
                  <input type="text" class="form-control" placeholder="Enter Name of Sub Category" name="txt_sub_category_name" value="<?php echo $row['sub_category_name']; ?>"> 
				   <br/>
				
				
				
				 <div class="form-group">
                  <label>Select the Category</label>
                  <select class="form-control" name="ddl_category_name">
                    <option>--Select Category--</option>
					
					<?php 
						$select_cat = "select * from Tbl_category";
						$query = mysql_query($select_cat);		
						while( $row_cat = mysql_fetch_array($query) )
						{
					?>
					<option value="<?php echo $row_cat['category_id']; ?>" 
					<?php
						if(isset($_POST['ddl_category_name']) && $_POST['ddl_category_name']==$row_cat['category_id'] || $row['category_id']==$row_cat['category_id'])
						{
							echo "selected = 'selected'";
						}
					?>
					> 
					
					<?php echo $row_cat['category_name']; ?> </option>
					
					<?php } ?>
			</select>
				
                </div>
				
				
                </div>
				
				
                <div class="form-group">
                  <label for="exampleInputFile">Upload Photo</label>
                  <input type="file" id="exampleInputFile" name="file_sub_category_photo"> <br/>
             	<input type="hidden" id="exampleInputFile" value="<?php echo $row['sub_category_photo']; ?>" name="file_old_sub_category_photo">
				 <i style="color:#CC6699">Existing Photo</i> <br>
				 <img src=" <?php echo $row['sub_category_photo']; ?> " height="30%" width="30%">
			
			
			
			<div class="form-group">
                  <label>Business Type</label>
                  <select class="form-control" name="ddl_business_type">
                    <option>--Select Business Type--</option>
					<option value="Service Provider"  
					<?php
						if(isset($_POST['ddl_business_type']) && $_POST['ddl_business_type']=="Service Provider" || $row['business_type']=="Service Provider")
						{
							echo "selected = 'selected'";
						}
					?>					
					>Service Provider</option>
					
					<option value="Product Marketing"  
					<?php
						if(isset($_POST['ddl_business_type']) && $_POST['ddl_business_type']=="Product Marketing" || $row['business_type']=="Product Marketing")
						{
							echo "selected = 'selected'";
						}
					?>					
					>Product Marketer</option>
					
					<option value="Institute"  
					<?php
						if(isset($_POST['ddl_business_type']) && $_POST['ddl_business_type']=="Institute" || $row['business_type']=="Institute")
						{
							echo "selected = 'selected'";
						}
					?>					
					>Institute</option>
					
			</select>
				
				
                </div>
				
				
                </div>
			
              </div>
			  
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary" name="btn_submit" value="Submit">Submit</button>
              </div>
			  
			  </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
			  
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


<?php
	include "../../footer.php";
?>

</body>
</html>
