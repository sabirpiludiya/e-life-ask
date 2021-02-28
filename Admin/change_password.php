<?php
error_reporting(0);
session_start();
	if(!($_SESSION['admin_email']))
	{
		?>
		<script>
		window.location.href="login.php";
		</script>
		<?php
	}


include "connection.php";
$count == 0;

		$query = mysql_query("select * from Tbl_admin where admin_id = 1");
		$row = mysql_fetch_array($query);
		$pwd= $row['admin_password'];
		
	if(isset($_POST['btn_submit']))
	{
		//=======Old Password=========//
		$old_password = $_POST['txt_old_password'];
		if($old_password == "")
		{
			$err_old_password = "Please Enter Old Password";
			$count++;
		}
		else if($old_password != $pwd)
		{
			$err_old_password = "Old Password is Incorrect ";
			$count++;
		}
		
		//=======New Password=========//
		$new_password = $_POST['txt_new_password'];
		if($new_password == "")
		{
			$err_new_password = "Please Enter New Password";
			$count++;
		}
		else if($old_password == $pwd)
		{
			if($new_password == $old_password)
			{
				$err_new_password = "Selected Password Is Same as Old Password";
				$count++;
			}
		}
		
		//=======Confirm New Password=========//
		$confirm_password = $_POST['txt_confirm_password'];
		if($confirm_password == "")
		{
			$err_confirm_password = "Please Re-Enter Password";
			$count++;
		}
		
		else if($old_password == $pwd)
		{
			if($new_password == $old_password || $new_password == "")
			{
				$err_confirm_password = "First Choose New Password";
				$count++;
			}
			else
			{		
				if($confirm_password != $new_password)
				{
					$err_confirm_password = "Password Not Matched.. Please Enter Correctly!";
					$count++;
				}
			}
		}
		
		
		
		
		if(isset($_POST['btn_submit']) && $count == 0)
		{
			
			$update = "update Tbl_admin set admin_password = '$confirm_password' where admin_id = 1";
			
			$query = mysql_query($update);
			
	?> 
			<script>window.location.href="profile.php";</script>
				
	<?php

		}
		
		
		
		
	}
	?>





<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>E-life Ask | Change Password</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bootstrap/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bootstrap/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  
  <link rel="stylesheet" href="bootstrap/css/admin_validation_notice_add.css">
  

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
include "header_for_index.php";
?>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->

<?php
include "left_for_index.php";
?>



    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
	  
	     :: CHANGE PASSWORD ::
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
		
		
		<form role="form" method="post">
              <div class="box-body">
               
				  
				<div class="form-group">
                  <label>Enter Old Password</label>
                  <input type="password" class="form-control" placeholder="Enter Old Password" name="txt_old_password" value="<?php echo $old_password; ?>"> 
				<div class="notice_add"><?php echo $err_old_password; ?></div> 

                </div>
				
				<div class="form-group">
                  <label>Enter New Password</label>
                  <input type="password" class="form-control" placeholder="Enter New Password" name="txt_new_password" value="<?php echo $new_password; ?>"> 
				<div class="notice_add"><?php echo $err_new_password; ?></div> 
				
				</div>
               
				<div class="form-group">
                  <label>Confirm New Password</label>
                  <input type="password" class="form-control" placeholder="Re-Enter New Password" name="txt_confirm_password" value="<?php echo $confirm_password; ?>"> 
				<div class="notice_add"><?php echo $err_confirm_password; ?></div> 

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
	include "footer.php";
?>

</body>
</html>
