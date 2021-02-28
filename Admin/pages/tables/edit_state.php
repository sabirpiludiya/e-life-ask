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
		
		
		$update = "update Tbl_state set
		state_name='$_POST[txt_state_name]'	
		where state_id = '$_GET[edit]'";
		
		$query = mysql_query($update);
		
?>
<script>window.location.href="manage_state.php";</script>

<?php 
	}
	
	
	$select = "select * from Tbl_state where state_id = '$_GET[edit]'";
	$query_select = mysql_query($select);
	
	$row = mysql_fetch_array($query_select);

?>






<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>E-life Ask | Edit State</title>
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
	  
	     :: EDIT STATE ::
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
	
	$select = "select * from Tbl_state where state_id = '$_GET[edit]'";
	$query_select = mysql_query($select);
	
	$row = mysql_fetch_array($query_select);

?>



			
            <form role="form" method="post">
              <div class="box-body">
               
				  
				<div class="form-group">
                  <label>Name of State</label>
                  <input type="text" class="form-control" placeholder="Enter Name of State" name="txt_state_name" value="<?php echo $row['state_name']; ?>"> 

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
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
</div>
<!-- ./wrapper -->

<?php
	include "../../footer.php";
?>

</body>
</html>
