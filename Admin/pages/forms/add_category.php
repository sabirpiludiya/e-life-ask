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
$count = "0";

	if(isset($_POST['btn_submit']))
	{
		//=======Category Name=========//
		$category_name = $_POST['txt_category_name'];
		if($category_name == "")
		{
			$err_category_name = "Please Enter Name of Category";
			$count++;
		}
		
		//=======Category File=========//
		$category_photo = $_FILES['file_category_photo']['name'];
		if($category_photo == "")
		{
			$err_category_photo = "Please Select a File";
			$count++;
		}
	
	}
	
	if(isset($_POST['btn_submit']) && $count==0)
	{
		
		$qry = mysql_query("select * from Tbl_category where category_name = '$category_name'");
		$count = mysql_num_rows($qry);
	
		if($count > 0)
		{
			$msg = "Sorry!!! Entered Category '".$category_name."'  is Already Exist.";
		}
		else
		{
			$file = $_FILES['file_category_photo']['name'];
			$dest = "../images/$file";
			$src = $_FILES['file_category_photo']['tmp_name'];
			move_uploaded_file($src, $dest);
			
			$insert = "insert into tbl_category values
			(
				'',
				'$_POST[txt_category_name]',
				'$dest',
				'1'
			)";
			
			$query = mysql_query($insert);
			
			if($query)
			{	
				$msg = "New Category '".$category_name."' is Successfully Created.";
			}
			else
			{
				$msg = "Sorry!!! Something went wrong.";
				
			}
		}
	}
	
?>



<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>E-life Ask | Add Category</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../bootstrap/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../../bootstrap/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">

  <link rel="stylesheet" href="../../bootstrap/css/admin_validation_notice_add.css"> 
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
include "header_for_add.php";
?>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
<?php
include "left_for_add.php";
?>  
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        :: ADD CATEGORY ::
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
			<div style="margin-top:10px;font-size:19px;font-weight:bold;color:
			<?php
				if($query)
				{
					echo "green";
				}
				else
				{
					echo "red";
				}
			
			?>">
				<?php 
					echo $msg;
				?>
			</div>
            
			<form role="form" method="post" enctype="multipart/form-data">
              <div class="box-body">
                
				 <div class="form-group">
                  <label>Name of Category</label>
                  <input type="text" class="form-control" placeholder="Enter Name of Category" name="txt_category_name" value="<?php echo $category_name; ?>">
				<div class="notice_add"><?php echo $err_category_name; ?></div>
				
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">Upload Photo</label>
                  <input type="file" id="exampleInputFile" name="file_category_photo">
				  <div class="notice_add"><?php echo $err_category_photo; ?></div> 

               
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
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
</div>
</div>
<?php
	include "../../footer.php";
?>

</body>
</html>
