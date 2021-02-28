<?php

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
		//=======Plan Name=========//
		$plan_name = $_POST['txt_plan_name'];
		if($plan_name == "")
		{
			$err_plan_name = "Please Enter Name of Plan";
			$count++;
		}
		
		//=======Plan Price=========//
		$plan_price = $_POST['txt_plan_price'];
		if($plan_price == "")
		{
			$err_plan_price = "Please Enter Price of Plan";
			$count++;
		}
		
		//=======Plan Description=========//
		$plan_description = $_POST['txt_plan_description'];
		if($plan_description == "")
		{
			$err_plan_description = "Please Enter Description of Plan";
			$count++;
		}
	
	
	
	
	
		//=======Duration=========//
		$duration = $_POST['txt_duration'];
		if($duration== "")
		{
			$err_duration = "Please Enter Duration Days";
			$count++;
		}
	
	
	}
	
	if(isset($_POST['btn_submit']) && $count==0)
	{
		$qry = mysql_query("select * from Tbl_plan where plan_name = '$plan_name'");
		$count = mysql_num_rows($qry);
		
		if($count > 0)
		{
			$msg = "Sorry!!! Entered Plan '".$plan_name."' is Already Exist.";
		}
		else
		{	
			$insert = "insert into tbl_plan values
				(
					'',
					'$_POST[txt_plan_name]',
					'$_POST[txt_plan_price]',
					'$_POST[txt_plan_description]',
					'$_POST[txt_duration]',
					'1'
				)";
				
				$query = mysql_query($insert);
				
				if($query)
				{	
					$msg = "New Plan '".$plan_name."' is Successfully Created.";
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
  <title>E-life Ask | Add Plan</title>
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
        :: ADD PLAN ::
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
                  <label>Plan Name</label>
                  <input type="text" class="form-control" placeholder="Enter Plan Name" name="txt_plan_name"  value="<?php echo $plan_name; ?>">
				  <div class="notice_add"><?php echo $err_plan_name; ?></div> 
                </div>
				
				
			
				  
				<div class="form-group">
                  <label>Plan Price</label>
                  <input type="text" class="form-control" placeholder="Enter Plan Price" name="txt_plan_price" value="<?php echo $plan_price; ?>">
				  <div class="notice_add"><?php echo $err_plan_price; ?></div> 
                </div>
				
				
				
				
				
				 <div class="form-group">
                  <label>Plan Description</label>
                  <textarea class="form-control" rows="3" placeholder="Enter Plan Description" name="txt_plan_description"><?php echo $plan_description; ?></textarea>
				  <div class="notice_add"><?php echo $err_plan_description; ?></div> 
                </div>				
				
				
				<div class="form-group">
                  <label>Duration</label>
                  <input type="text" class="form-control" placeholder="Enter Duration" name="txt_duration" value="<?php echo $duration; ?>">
				  <div class="notice_add"><?php echo $err_duration; ?></div> 

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

</div><!-- ./wrapper -->
<?php
	include "../../footer.php";
?>

</body>
</html>
