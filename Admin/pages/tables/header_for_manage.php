<?php

error_reporting(0);
	
	include "connection.php";

	$select = "select * from Tbl_admin where admin_id = 1";
	$query_select = mysql_query($select);
	
	$row = mysql_fetch_array($query_select);

?>


  <header class="main-header">
    <!-- Logo -->
    <a href="../../index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>E</b>LA</span>
      <!-- logo for regular state and mobile devices -->
     <div style="background-color:#D9FBF0;Box-shadow:0px 0px 30px 10px;height:90%;width:95%;border-radius:10px;margin-top:2px"><img src="../../dist/img/logo.gif" height="85%" width="100%" /></div>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
         <? 
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="../../<?php echo $row['admin_photo']; ?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $row['admin_name']; ?></span>
            </a>
            <ul class="dropdown-menu" >
              <!-- User image -->
              <li class="user-header">
                <img src="../../<?php echo $row['admin_photo']; ?>" class="img-circle" alt="User Image">

                <p>
                  <?php echo $row['admin_name']; ?> - Admin
               </p>
              </li>
             
			 
              <!-- Menu Footer-->
              <li class="user-footer"  style="border:double #000000 5px; background:#CCCCCC">
                <div class="pull-left">
                  <a href="../../profile.php" class="btn btn-default btn-flat"><b>Profile</b></a>
                </div>
                <div class="pull-right">
                  <a href="../../logout.php" class="btn btn-default btn-flat"><b>Sign out</b></a>
                </div>
              </li>
            </ul>
          </li>
        
		
        </ul>
      </div>
    </nav>
  </header>