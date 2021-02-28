<?php

error_reporting(0);
	
include "connection.php";

session_start();

	if(!($_SESSION['admin_email']))
	{
		?>
		<script>
		window.location.href="login.php";
		</script>
		<?php
	}
		
	
	if(isset($_POST['btn_submit']) && $count==0)
	{
				
		$file = $_FILES['file_admin_photo']['name'];
		if($file=="")
		{
			$admin_file = $_POST['file_old_admin_photo'];
		}
		else
		{
			$file = $_FILES['file_admin_photo']['name'];
			$dest = "images/$file";
			$src = $_FILES['file_admin_photo']['tmp_name'];
			move_uploaded_file($src, $dest);
			$admin_file = $dest;
		}	
			
		
		$update = "update Tbl_admin set
		admin_name='$_POST[txt_admin_name]',
		admin_email='$_POST[txt_admin_email]',
		admin_photo='$admin_file',
		admin_birthdate='$_POST[txt_admin_birthdate]',
		admin_address='$_POST[txt_admin_address]'
		where admin_id = 1";
		
		$query = mysql_query($update);
			
			if($query)
			{	
				$msg = "Profile is Successfully Updated.";
			}
			else
			{
				$msg = "Sorry!!! Something went wrong.";
				
			}
		
	}
	
	
	$select = "select * from Tbl_admin where admin_id = 1";
	$query_select = mysql_query($select);
	
	$row = mysql_fetch_array($query_select);

?>
	








<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>E-life Ask | My Profile</title>
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
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

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

    <!-- sidebar: style can be found in sidebar.less -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
<?php
include "left_for_index.php";
?>
    <!-- /.sidebar -->
  </aside>

    <!-- /.sidebar -->


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Admin Profile 
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="<?php echo $row['admin_photo']; ?>"  alt="Admin profile picture">

              <h3 class="profile-username text-center"><?php echo $row['admin_name']; ?></h3>

         

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
          
          <!-- /.box -->
        </div>
        <!-- /.col -->
         <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
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
			
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">Timeline</a></li>
              <li><a href="#settings" data-toggle="tab">Settings</a></li>
            </ul>
			
			
			
            <div class="tab-content">
			
			
			
              <div class="active tab-pane" id="activity">
                <!-- Post -->
                 <ul class="timeline timeline-inverse">
                  <!-- timeline time label -->
                 
                  <!-- /.timeline-label -->
                  <!-- timeline item -->
                  <li>
                    <i class="fa fa-envelope bg-blue"></i>

                    <div class="timeline-item">

                      <h3 class="timeline-header">
					 	<b>My Email Address </b>
					  </h3>

                      <div class="timeline-body">
                       <?php 
						echo $row['admin_email'];
					  ?>
                      </div>
                    </div>
                  </li>
                  <!-- END timeline item -->
                  <!-- timeline item -->
                  <li>
                    <i class="fa fa-user bg-aqua"></i>

                    <div class="timeline-item">

                      <h3 class="timeline-header"					
					   	<b> My Birth Date </b>
                      </h3>
					  <div class="timeline-body">
                       <?php 
						echo $row['admin_birthdate'];
					  ?>
                      </div>
                    </div>
                  </li>
                  <!-- END timeline item -->
                  <!-- timeline item -->
                  <li>
                    <i class="fa fa-comments bg-yellow"></i>

                    <div class="timeline-item">

                      <h3 class="timeline-header"> <b>My Address</b> </h3>

                      <div class="timeline-body">			  <pre style="font-family:'Courier New', Courier, monospace;border:hidden;">
<?php echo $row['admin_address']; ?> </pre>
		      </div>
                      
					  </div>
                  </li>
                  <!-- END timeline item -->
                  <!-- timeline time label -->
                </ul>
                <!-- /.post -->
              </div>
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  

              <div class="tab-pane" id="settings">
                <form class="form-horizontal" method="post" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Name</label>

                    <div class="col-sm-10">
                      <input type="text" name="txt_admin_name"  value="<?php echo $row['admin_name']; ?>"  class="form-control" id="inputName" placeholder="Name">
                    </div>
					
                  </div>
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                    <div class="col-sm-10">
                      <input type="email" name="txt_admin_email" value="<?php echo $row['admin_email']; ?>" class="form-control" id="inputEmail" placeholder="Email">
                    </div>
                  </div>				  

		  <div class="form-group">
                    <label for="inputSkills" class="col-sm-2 control-label">Birthdate</label>

                    <div class="col-sm-10">
                      <input type="date" name="txt_admin_birthdate"  value="<?php echo $row['admin_birthdate']; ?>" class="form-control" id="inputSkills" placeholder="Birthdate">
                    </div>

                  </div>
                  
				  
				  <div class="form-group"> 
				  	<div class="col-sm-10" style="margin-left:1%">
                  <label for="exampleInputFile">Upload Photo</label>
                  <input type="file" id="exampleInputFile" name="file_admin_photo">
				  <input type="hidden" id="exampleInputFile" value="<?php echo $row['admin_photo']; ?>" name="file_old_admin_photo"> <br>				</div>
               
              </div>
 
				  
				  
				  <div class="form-group">
                    <label for="inputExperience" class="col-sm-2 control-label">Address</label>

                    <div class="col-sm-10">
                      <textarea class="form-control" name="txt_admin_address"  id="inputExperience" placeholder="Address"><?php echo trim($row['admin_address']); ?></textarea>	
                    </div>

                  </div>
                  
                  <div class="form-group">
                    
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" name="btn_submit" class="btn btn-danger" value="Submit">Save</button>
                    </div>
                  </div>
				  
				     <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <a href="change_password.php"><b>Change Password</b></a>
                    </div>
                  </div>
				  
                </form>
              </div>
              <!-- /.tab-pane -->

            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <!-- Control Sidebar -->
  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
<?php
	include "footer.php";
?>

</body>
</html>
