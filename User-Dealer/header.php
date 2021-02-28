<?php

error_reporting(0);

session_start();


		$select = "select * from Tbl_dealer where dealer_id = '$_SESSION[dealer_id]'";
		$query_select = mysql_query($select);
		
		$row = mysql_fetch_array($query_select);



		$select1 = "select * from Tbl_user where user_id = '$_SESSION[user_id]'";
		$query_select1 = mysql_query($select1);
		
		$row_user = mysql_fetch_array($query_select1);

?>


<header class="header">
    	<div class="container">
        	<div class="site-header clearfix">
                <div class="col-lg-3 col-md-3 col-sm-12 title-area pull-left">
                    <div style="margin-top:-5px" class="site-title" id="title">
                        <a href="../index.php" title="">
                            <img src="images/logo.gif" alt="">	
                        </a>
                    </div>
                </div><!-- title area -->
                <div class="col-lg-9 col-md-12 col-sm-12">
                   <div id="nav">
                        <div class="container clearfix">
                       <?php
					   
					   if($_SESSION['dealer_id']!="")
					   {
					   	?>
						
						  <ul id="jetmenu" class="jetmenu blue">
                            <li class="active"><a href="dealer_index.php">Home</a>
                                
                            </li>
							
						
						<?php 
							if($_SESSION['business_type'] == "Product Marketing")
							{ ?>
								<li><a href="#">Product</a>
									<ul class="dropdown">
										<li><a href="dealer_add_product.php">Add Product</a></li>
										<li><a href="dealer_manage_product.php">Manage Product</a></li>
									</ul>
								</li> 
						<?php }
							else if($_SESSION['business_type'] == "Service Provider")
							{ ?>
								<li><a href="#">Service</a>
									<ul class="dropdown">
										<li><a href="dealer_add_service.php">Add Service</a></li>
										<li><a href="dealer_manage_service.php">Manage Service</a></li>
									</ul>
								</li>
							<?php }
							else if($_SESSION['business_type'] == "Trust")
							{ ?>
								<li><a href="#">Trust</a>
									<ul class="dropdown">
										<li><a href="dealer_add_donation.php">Add Donation</a></li>
										<li><a href="dealer_manage_donation.php">Manage Donation</a></li>
									</ul>
								</li>
							<?php }
							else if($_SESSION['business_type'] == "Institute")
							{ ?>
								<li><a href="#">Institute</a>
									<ul class="dropdown">
										<li><a href="dealer_add_facility.php">Add Facility</a></li>
										<li><a href="dealer_manage_facility.php">Manage Facility</a></li>
									</ul>
								</li>
							
							<?php } ?>
							
							
							<li><a href="#">News</a>
                                <ul class="dropdown">
                                    <li><a href="dealer_add_news.php">Add News</a></li>
                                    <li><a href="dealer_manage_news.php">Manage News</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Event</a>
                                <ul class="dropdown">
                                    <li><a href="dealer_add_event.php">Add Event</a></li>
                                    <li><a href="dealer_manage_event.php">Manage Event</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Survey</a>
                                <ul class="dropdown">
                                    <li><a href="dealer_add_survey.php">Add Survey</a></li>
                                    <li><a href="dealer_manage_survey.php">Manage Survey</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Follow</a>
                                <ul class="dropdown" >
                                    <li><a href="dealer_follower.php">Followers</a></li>
                                </ul>
                            </li>
                                
                            <li><a href="#">Profile <img src="<?php echo $row['dealer_photo']; ?>" style="border-radius:50% 50% 50% 50%;width:40px;"></a>
                                <ul class="dropdown" >
                                    <li><a href="dealer_view_profile.php">View Profile</a></li>
                                    <li ><a href="dealer_edit_profile.php">Edit Profile</a></li> 							
		                            <li><a href="dealer_my_plan.php">Plan</a></li>
									<li><a href="logout.php">Logout</a></li>
                                </ul>
                            </li>
                           
					
                        </ul>
						<?php
					   }
					   else if($_SESSION['user_id']!="")
					   {
					   ?>
					   		
									  <ul id="jetmenu" class="jetmenu blue">
                            <li class="active"><a href="user_index.php">Home</a>
                                
                            </li>
                            <li><a href="user_profile_of_dealers.php">Dealers</a></li>


										
                            <li><a href="user_all_news.php">News</a>
                           
                            </li>
                            <li><a href="user_all_events.php">Events</a>
                              
                            </li>
                            <li><a href="user_all_survey.php">Surveys</a>
                           

                            <li><a href="#">Dealer Details</a>
								<ul class="dropdown" >
                                    <li><a href="user_all_products.php">Products</a></li>
                                    <li><a href="user_all_services.php">Services</a></li>
                                    <li ><a href="user_all_trusts.php">Trusts</a></li> 
									<li><a href="user_all_institutes.php">Institutes</a></li>
                                </ul>
                            </li>	
						   
                            <li><a href="#">Profile <img src="<?php echo $row_user['user_photo']; ?>" style="border-radius:50% 50% 50% 50%;width:40px;"></a>
                                <ul class="dropdown" >
                                    <li><a href="user_view_profile.php">View Profile</a></li>
                                    <li ><a href="user_edit_profile.php">Edit Profile</a></li> 
									<li><a href="logout.php">Logout</a></li>
                                </ul>
                            </li>
						
					
                        </ul>
						
						<?php
					   }
					   else
					   { ?>
					   		<ul id="jetmenu" class="jetmenu blue">
                            <li class="active"><a href="../Visitor/visitor_index.php">Home</a>
                                
                            </li>
                            <li><a href="../Visitor/visitor_profile_of_dealers.php">Dealers</a></li>


										
                            <li><a href="../Visitor/visitor_all_news.php">News</a>
                           
                            </li>
                            <li><a href="../Visitor/visitor_all_events.php">Events</a>
                              
                            </li>
                            <li><a href="../Visitor/visitor_all_survey.php">Surveys</a>
                           

                            <li><a href="#">Dealer Details</a>
								<ul class="dropdown" >
                                    <li><a href="../Visitor/visitor_all_products.php">Products</a></li>
                                    <li><a href="../Visitor/visitor_all_services.php">Services</a></li>
                                    <li ><a href="../Visitor/visitor_all_trusts.php">Trusts</a></li> 
									<li><a href="../Visitor/visitor_all_institutes.php">Institutes</a></li>
                                </ul>
                            </li>
							
							<li><a href="login.php">Login</a>
							</li>
							
							<li><a href="#">Register</a>
								<ul class="dropdown" >
                                    <li><a href="register_user.php">As User</a></li>
                                    <li><a href="register_dealer.php">As Dealer</a></li>
                                </ul>
                            </li>
							
							
                        </ul>
					   <?php
					   }
					   
					   ?>
					   
					   
					   
                        </div>
                    </div><!-- nav -->   
                </div><!-- title area -->
            </div><!-- site header -->
    	</div><!-- end container -->
    </header>