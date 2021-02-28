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
$count == 0;

		$select = "select * from Tbl_question where survey_id = '$_GET[view]'";
		$query_select = mysql_query($select);
		
		$row = mysql_fetch_array($query_select);
		


?>






<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>E-life Ask | Manage Survey</title>
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
	   	:: MANAGE SURVEY ::
      </h1>
   
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
         
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body" style="width:100%;overflow:auto">
			
				
			
<?php

	$select = "select * from Tbl_question where survey_id = '$_GET[view]'";
	$query_select = mysql_query($select);
	
	$row = mysql_fetch_array($query_select);
?>
   
			
<?php

$count1 = mysql_query("select count(*) from Tbl_survey_answer where answer = '$row[answer_1]' and question_id = '$row[question_id]'");
$c1 = mysql_result($count1,0,0);	
	
$count2 = mysql_query("select count(*) from Tbl_survey_answer where answer = '$row[answer_2]' and question_id = '$row[question_id]'");
$c2 = mysql_result($count2,0,0);	
	
$count3 = mysql_query("select count(*) from Tbl_survey_answer where answer = '$row[answer_3]' and question_id = '$row[question_id]'");
$c3 = mysql_result($count3,0,0);	
	
$count4 = mysql_query("select count(*) from Tbl_survey_answer where answer = '$row[answer_4]' and question_id = '$row[question_id]'");
$c4 = mysql_result($count4,0,0);	
	
?>
   
        	<div class="content clearfix">
            	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                
                	<form id="registerform" method="post" enctype="multipart/form-data">
								
						
                  			<h2 style="color:#0000FF"><?php echo $row['question']; ?></h2>
                  				<br>
							
							
						<div class="form-group">
                  			<h3><?php echo $row['answer_1']; ?></h3> <h4 style="color:#FF9933"><?php echo $c1; ?> Votes</h4>
						</div>
							
						<div class="form-group">
                  			<h3><?php echo $row['answer_2']; ?></h3> <h4 style="color:#FF9933"><?php echo $c2; ?> Votes</b></h4>
						</div>
							
						<div class="form-group">
                  			<h3><?php echo $row['answer_3']; ?></h3> <h4 style="color:#FF9933"><?php echo $c3; ?> Votes</h4>
						</div>
							
						<div class="form-group">
                  			<h3><?php echo $row['answer_4']; ?></h3> <h4 style="color:#FF9933"><?php echo $c4; ?> Votes</h4>
						</div>
						
						
					</form>
				</div><!-- end col-->
            </div><!-- end content -->
   
   
		   
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
