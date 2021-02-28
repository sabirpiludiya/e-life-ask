<?php
error_reporting(0);
include "connection.php";

session_start();
$count=="";

if(isset($_POST['btn_submit']))
{
	$email = $_POST['txt_email'];
	if($email=="")
	{
		$err_email = "Enter Email";
		$count++;
	}
	
	$pwd = $_POST['txt_password'];
	if($pwd=="")
	{
		$err_pwd = "Enter Password";
		$count++;
	}
}


	$select = "select * from Tbl_admin where admin_email = '$email' and admin_password = '$pwd'";
	$select_query = mysql_query($select);
	$row = mysql_fetch_array($select_query);
	
if(isset($_POST['btn_submit']) && $count==0)
{	
	if($row['admin_email']==$_POST['txt_email'] && $row['admin_password']==$_POST['txt_password'])
	{
		$_SESSION['admin_email'] = $row['admin_email'];
		?>
			<script>
				alert("Successfully Logged In...");
				window.location.href="index.php";
			</script>

		<?php
	}
	else
	{
		echo "<script>alert('Invalid Email and Password');</script>";
	}
}



	$select = "select * from Tbl_admin";
	$select_query = mysql_query($select);
	$row = mysql_fetch_array($select_query);
	
	if(isset($_POST['btn_frgt']))
	{
		$to = $row['admin_email'];
		$subj = "E-Life Ask Admin Password";
		$msg = "Your password is : " .$row['admin_password'];
		$from = "from : " .$row['admin_email'];
		
		mail($to, $subj, $msg, $from);
		
		echo "<script>alert('Password has been sent to your Email.');</script>";
	}
	
?>







<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>E - Life Ask | Log in</title>
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
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">
  
  
  <link rel="stylesheet" href="bootstrap/css/admin_validation_notice_add.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>E - Life Ask Admin</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

    <form method="post">
      <div class="form-group has-feedback">
        <input type="text"  name="txt_email" class="form-control" placeholder="Email" value="<?php echo $email;?>">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>	
	  <div class="notice_add"><?php echo $err_email; ?></div>
      </div> 
    
	  <div class="form-group has-feedback">
        <input type="password" name="txt_password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
	  <div class="notice_add"><?php echo $err_pwd; ?></div> 
      </div>
    
	  <div class="row">
        <div class="col-xs-8">
       
        </div>
        <!-- /.col -->
          <button type="submit" name="btn_submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
       
        <!-- /.col -->
      </div><br>
    <center><input type="submit" name="btn_frgt" style="background:#FFFFCC; font-weight:bold" value="Forgot Password? Click to receive in Email."><br></center>
  </form>
  
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 2.2.3 -->

</body>
</html>
