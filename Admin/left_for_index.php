<?php

error_reporting(0);
		
	$select = "select * from Tbl_admin where admin_id = 1";
	$query_select = mysql_query($select);
	
	$row = mysql_fetch_array($query_select);
?>


<!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo $row['admin_photo']; ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $row['admin_name']; ?> </p>
        </div>
      </div>
     
	 
	 
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
               
        
        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Category</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/forms/add_category.php"><i class="fa fa-circle-o"></i> Add Category</a></li>
            <li><a href="pages/tables/manage_category.php"><i class="fa fa-circle-o"></i> Manage Category</a></li>
          </ul>
        </li>
		
		<li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Sub Category</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/forms/add_sub_category.php"><i class="fa fa-circle-o"></i> Add Sub Category</a></li>
            <li><a href="pages/tables/manage_sub_category.php"><i class="fa fa-circle-o"></i> Manage Sub Category</a></li>
          </ul>
        </li>
		
		
		
		<li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Plan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/forms/add_plan.php"><i class="fa fa-circle-o"></i> Add Plan</a></li>
            <li><a href="pages/tables/manage_plan.php"><i class="fa fa-circle-o"></i> Manage Plan</a></li>
          </ul>
        </li>
		<li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>State</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/forms/add_state.php"><i class="fa fa-circle-o"></i> Add State</a></li>
            <li><a href="pages/tables/manage_state.php"><i class="fa fa-circle-o"></i> Manage State</a></li>
          </ul>
        </li>
		<li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>City</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/forms/add_city.php"><i class="fa fa-circle-o"></i> Add City</a></li>
            <li><a href="pages/tables/manage_city.php"><i class="fa fa-circle-o"></i> Manage City</a></li>
          </ul>
        </li>
       
	   
	   <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>User</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/tables/manage_user.php"><i class="fa fa-circle-o"></i> Manage User</a></li>
          </ul>
        </li>
		
		
		<li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Dealer</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/tables/manage_dealer.php"><i class="fa fa-circle-o"></i> Manage Dealer</a></li>
          </ul>
        </li>
		
		
	   
	   
	   
	   
       <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Product</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/tables/manage_product.php"><i class="fa fa-circle-o"></i> Manage Product</a></li>
          </ul>
        </li>
		
		
		
       <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Service</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/tables/manage_service.php"><i class="fa fa-circle-o"></i> Manage Service</a></li>
          </ul>
        </li>
		
		
		
       <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Institute Facility</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/tables/manage_institute_facility.php"><i class="fa fa-circle-o"></i> Manage Institute Facility</a></li>
          </ul>
        </li>
		
	
		
       <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>News</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/tables/manage_news.php"><i class="fa fa-circle-o"></i> Manage News</a></li>
          </ul>
        </li>
		
		
		
       <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Event</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/tables/manage_event.php"><i class="fa fa-circle-o"></i> Manage Event</a></li>
          </ul>
        </li>
		
		
		
       <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Survey</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/tables/manage_survey.php"><i class="fa fa-circle-o"></i> Manage Survey</a></li>
          </ul>
        </li>
		
		
		
       
        
      </ul>
    </section>
	
	
	
	
	
	
<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>