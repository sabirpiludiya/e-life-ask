<?php
error_reporting(0);
include "connection.php";

session_start();
$count=="";

if(isset($_POST['btn_submit']))
{
	$type = $_POST['ddl_type'];
	if($type=="---Login As---")
	{
		$err_type = "Select the option to login with..";
		$count++;
	}
	
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
	
	if(isset($_POST['btn_submit']) && $count==0 && $type=="User")
	{
		$select = "select * from Tbl_user where user_email = '$email' and user_password = '$pwd'";
		$select_query = mysql_query($select);
		$row = mysql_fetch_array($select_query);
		
		if($row['user_email']==$_POST['txt_email'] && $row['user_password']==$_POST['txt_password'])
		{
			$_SESSION['user_email'] = $row['user_email'];
			$_SESSION['user_id'] = $row['user_id'];
			?>
				<script>
					alert("Successfully Logged In as User...");
					window.location.href="user_index.php";
				</script>

		<?php
		}

		else
		{
			echo "<script>alert('Invalid Email and Password User');</script>";
		}
	
	}
			
	else if(isset($_POST['btn_submit']) && $count==0 && $type=="Dealer")
	{
		$select = "select * from Tbl_dealer where dealer_email = '$email' and dealer_password = '$pwd'";
		$select_query = mysql_query($select);
		$row = mysql_fetch_array($select_query);
		
		if($row['dealer_email']==$_POST['txt_email'] && $row['dealer_password']==$_POST['txt_password'])
		{
			$_SESSION['dealer_email'] = $row['dealer_email'];
			$_SESSION['dealer_id'] = $row['dealer_id'];
			$_SESSION['business_type'] = $row['business_type'];
			?>
				<script>
					alert("Successfully Logged In as Dealer...");
					window.location.href="dealer_index.php";
				</script>

		<?php
		}
				
		else
		{
			echo "<script>alert('Invalid Email and Password Dealer');</script>";
		}

	}

?>









<!doctype html>
<html class="no-js" lang="en">
	<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Genuine | HTML5 Website Template</title>
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="">
	<link rel="shortcut icon" href="favicon.ico">
    
	<!-- Google Fonts -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900' rel='stylesheet' type='text/css'>
	<!-- Awesome Fonts -->
	<link rel="stylesheet" href="css/font-awesome.css">
	<!-- Bootstrap -->
	<link href="assets/css/bootstrap.css" rel="stylesheet">
	<!-- Template Styles -->
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="css/colors.css">    
	<!-- Layer Slider -->
	<link rel="stylesheet" href="layerslider/css/layerslider.css" type="text/css">

	  <link rel="stylesheet" href="assets/css/admin_validation_notice_add.css">
    
	<!-- http://www.456bereastreet.com/archive/201209/tell_css_that_javascript_is_available_asap/ -->
	<script>
		document.documentElement.className = document.documentElement.className.replace(/(\s|^)no-js(\s|$)/, '$1js$2');
	</script>
  
	<!-- Support for HTML5 -->
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- Enable media queries on older browsers -->
	<!--[if lt IE 9]>
		<script src="assets/js/respond.min.js"></script>
	<![endif]-->
  
	<script src="js/modernizr.js"></script>
  </head>
<body>
    <div class="topbar clearfix">
    	<div class="container">
			<div class="col-lg-6 col-md-6 col-sm-12 text-left">
                <div class="social_buttons">
                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="Facebook"><i class="fa fa-facebook"></i></a>
                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="Twitter"><i class="fa fa-twitter"></i></a>
                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="Google+"><i class="fa fa-google-plus"></i></a>
                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="Github"><i class="fa fa-github"></i></a>
                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="Dribbble"><i class="fa fa-dribbble"></i></a>
                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="RSS"><i class="fa fa-rss"></i></a>
                </div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-12 text-right">
            	<div class="callus">
                    <p><span><i class="fa fa-envelope-o"></i> support@yoursite.com</span> <span><i class="fa fa-phone"></i> +00 222 21 21</span></p>
                </div>
			</div>
    	</div><!-- end container -->
    </div><!-- end topbar -->

    <header class="header">
    	<div class="container">
        	<div class="site-header clearfix">
                <div class="col-lg-3 col-md-3 col-sm-12 title-area pull-left">
                    <div class="site-title" id="title">
                        <a href="index.html" title="">
                            <img src="images/logo.png" alt="">	
                        </a>
                    </div>
                </div><!-- title area -->
                <div class="col-lg-9 col-md-12 col-sm-12">
                   <div id="nav">
                        <div class="container clearfix">
                        <ul id="jetmenu" class="jetmenu blue">
                            <li class="active"><a href="#">Home</a>
                                <ul class="dropdown">
                                    <li><a href="home1.html">Home Example 1</a></li>
                                    <li><a href="home2.html">Home Example 2</a></li>
                                    <li><a href="home3.html">Home Example 3</a></li>
                                    <li><a href="home4.html">Home Example 4</a></li>
                                    <li><a href="home5.html">Home Example 5</a></li>
                                    <li><a href="#">Build your own!</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Pages</a>
                                <ul class="dropdown">
                                    <li><a href="about.html">About Us</a></li>
                                    <li><a href="services.html">Services</a></li>
                                    <li><a href="team-members.html">Team Members</a></li>
                                    <li><a href="testimonials.html">Testimonials</a></li>
                                    <li><a href="404.html">Not Found</a></li>
                                    <li><a href="sitemap.html">Sitemap Page</a></li>
                                    <li><a href="faq.html">FAQ Page</a></li>
                                    <li><a href="navigation-sidebar.html">Navigation Sidebar</a></li>
                                    <li><a href="left-sidebar.html">Left Sidebar</a></li>
                                    <li><a href="right-sidebar.html">Right Sidebar</a></li>
                                    <li><a href="fullwidth.html">Full Width</a></li>
                                    <li><a href="login.html">Login / Register</a></li>
                                    <li><a href="maintenance.html">Maintenance Mode</a></li>
                                    <li><a href="contact.html">Contact</a></li>	
                                </ul>
                            </li>
                            <li><a href="#">Shop</a>
                                <ul class="dropdown">
                                    <li><a href="digital-download.html">Products Page</a></li>
                                    <li><a href="single-product.html">Single Product</a></li>
                                    <li><a href="wishlist.html">Wishlist</a></li>
                                    <li><a href="checkout.html">Checkout</a></li>
                                    <li><a href="account.html">Account Page</a></li>
                                    <li><a href="login.html">Login / Register</a></li>
                                    <li><a href="support.html">Support Center</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Portfolio</a>
                                <ul class="dropdown">
                                    <li><a href="single-portfolio-1.html">Single Portfolio 1</a></li>
                                    <li><a href="single-portfolio-2.html">Single Portfolio 2</a></li>
                                    <li><a href="portfolio-2.html">Portfolio (2 Columns)</a></li>
                                    <li><a href="portfolio-3.html">Portfolio (3 Columns)</a></li>
                                    <li><a href="portfolio-4.html">Portfolio (4 Columns)</a></li>
                                    <li><a href="gallery-portfolio.html">Gallery (No Description)</a></li>
                                    <li><a href="masonry-grid-portfolio.html">Masonry Grid Style</a></li>
                                    <li><a href="portfolio-by-category.html">Portfolio By Category</a></li>  
                                </ul>
                            </li>
                            <li><a href="#">Blog</a>
                                <ul class="dropdown">
                                    <li><a href="blog-left-sidebar.html">Blog Left Sidebar</a></li>
                                    <li><a href="blog-right-sidebar.html">Blog Right Sidebar</a></li>
                                    <li><a href="blog-full-width.html">Blog Full Width</a></li>
                                    <li><a href="single-with-sidebar.html">Single with Sidebar</a></li>
                                    <li><a href="single-without-sidebar.html">Single without Sidebar</a></li>
                                    <li><a href="blog-archives.html">Blog Archives</a></li>
                                    <li><a href="blog-author-details.html">Blog Author Details</a></li> 
                                </ul>
                            </li>
                            <li><a href="#">Shortcodes</a>
                                <ul class="dropdown">
                                    <li><a href="typography.html">Typography</a></li>
                                    <li><a href="icons.html">Retina Icons</a></li>
                                    <li><a href="animations.html">Animations</a></li>
                                    <li><a href="buttons.html">Buttons</a></li>
                                    <li><a href="form-elements.html">Form Elements</a></li>
                                    <li><a href="tables.html">Table Elements</a></li>
                                    <li><a href="tabs.html">Tab Elements</a></li>
                                    <li><a href="accordion-toggle.html">Accordions / Toggles</a></li>
                                    <li><a href="alerts.html">Alert Elements</a></li>
                                    <li><a href="carousel.html">Carousel Elements</a></li>
                                    <li><a href="progress-bars.html">Progress Bars</a></li>
                                    <li><a href="columns.html">Columns</a></li>
                                    <li><a href="pricing-tables.html">Pricing Tables</a></li>
                                    <li><a href="tooltips-popovers.html">Tooltips & Popovers</a></li>
                                </ul>
                            </li>
                            <li class="right"><a href="#">Mega Menu</a>
                                <div class="megamenu full-width">
                                    <div class="row">
                                        <div class="col2">
                                        <h5 class="title">About us</h5>
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry"s standard dummy text ever since the 1500s..</p>
                                        <a class="button small" href="#">read more</a>
                                        </div>
                                        <div class="col2">
                                        <h5 class="title">Our Office</h5>
                                            <div class="he-wrap tpl2">
                                                <img src="demos/office.png" alt="" class="img-responsive">
                                                <div class="he-view">
                                                    <div class="bg a0"  data-animate="fadeIn">
                                                        <div class="center-bar">
                                                            <a href="#" class="twitter a0" data-animate="elasticInDown"></a>
                                                            <a href="#" class="facebook a1" data-animate="elasticInDown"></a>
                                                            <a href="#" class="google a2" data-animate="elasticInDown"></a>
                                                            <a href="#" class="in a3" data-animate="elasticInDown"></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- he wrap -->
                                        </div>
                                        <div class="col2">
                                        <h5 class="title">Contact Details</h5>
                                            <ul class="contact_details">
                                                <li><i class="fa fa-envelope-o"></i> support@yoursite.com</li>
                                                <li><i class="fa fa-envelope-o"></i> info@yoursite.com</li>
                                                <li><i class="fa fa-phone-square"></i> +90 04 333 02 22</li>
                                                <li><i class="fa fa-home"></i> Istanbul Universitesi Iletisim Fakultesi, Istanbul, TURKEY</li>
                                                <li><a href="#"><i class="fa fa-map-marker"></i> View large map</a></li>
                                            </ul><!-- contact_details -->
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col6">
                                        <iframe class="google-map" src="http://maps.google.com/?ie=UTF8&amp;ll=40.748151,-73.985131&amp;spn=0.012355,0.021007&amp;t=m&amp;z=16&amp;output=embed"></iframe>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        </div>
                    </div><!-- nav -->   
                </div><!-- title area -->
            </div><!-- site header -->
    	</div><!-- end container -->
    </header><!-- end header -->
    
	<section class="post-wrapper-top">
    	<div class="container">
            <div class="post-wrapper-top-shadow">
                <span class="s1"></span>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <ul class="breadcrumb">
                    <li><a href="index.html">Home</a></li>
                    <li>Login & Register</li>
                </ul>
                <h2>Login & Register</h2>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<!-- search -->
				<div class="search-bar">
					<form action="" method="get">
						<fieldset>
						<input type="image" src="images/pixel.gif" class="searchsubmit" alt="" />
						<input type="text" class="search_text showtextback" name="s" id="s" value="Search on this site..." />							
						</fieldset>
					</form>
				</div>
				<!-- / end div .search-bar -->
            </div>
        </div>
	</section><!-- end post-wrapper-top -->
    
    <section class="section1">
    	<div class="container clearfix">
			<div class="content col-lg-12 col-md-12 col-sm-12 clearfix">
				<div class="col-lg-4 col-md-4 col-sm-12">
                	<h4 class="title">
                    	<span>Why Join Us?</span>
                    </h4>
                    <p>The Genuine is a custom design professional portfolio template coded with HTML5 CSS3 and Bootstrap 3.0. This template retina and 100% responsive layout design (compatible all modern browsers and mobile devices).</p>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry"s standard dummy text ever since the 1500s..</p>
                </div>
				<div class="col-lg-4 col-md-4 col-sm-12">
                	<h4 class="title">
                    	<span>Login Form</span>
                    </h4>
                	<form id="loginform" method="post" name="loginform" action="">
					
					
						<div class="form-group">
							<div style="height:25px">
								<select name="ddl_type" style="width:280px;border:double 1px;font-weight:bold;border-radius:10px 0px;box-shadow:2px 2px 3px 0px">
									<option>---Login As---</option>
									<option value="User" 
										<?php
											if($type=="User")
											{
												echo "selected = selected";
											}
										?>
									>User</option>
									
									<option value="Dealer" 
										<?php
											if($type=="Dealer")
											{
												echo "selected = selected";
											}
										?>
									>Dealer</option>
								</select>
								
							</div>
 								<div class="notice_add"><?php echo $err_type; ?></div>
			
						</div>
						
						<div class="form-group">
							<div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" class="form-control"   name="txt_email"  placeholder="Email" value="<?php echo $email; ?>">
							</div>	
	 							 <div class="notice_add"><?php echo $err_email; ?></div>
						</div>
						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-lock"></i></span>
								<input type="password" class="form-control" name="txt_password" placeholder="Password" >
							</div>
								 <div class="notice_add"><?php echo $err_pwd; ?></div>
						
						</div>
						<div class="form-group">
							<div class="checkbox">
								<label> 
									<input type="checkbox"> Remember me
								</label>
							</div>
						</div>
						<div class="form-group">
						<button type="submit" class="button" name="btn_submit">Sign in</button>
						</div>
					</form>
                </div><!-- end login -->
				<div class="col-lg-4 col-md-4 col-sm-12">
                	<h4 class="title">
                    	<span>Register Form</span>
                    </h4>
                	<form id="registerform" method="post" name="registerform" action="">
						<div class="form-group">
							<input type="text" class="form-control" placeholder="First name">
						</div>
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Last name">
						</div>
						<div class="form-group">
							<input type="email" class="form-control" placeholder="Email">
						</div>
						<div class="form-group">
							<input type="password" class="form-control" placeholder="Password">
						</div>
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Re-enter password">
						</div>
						<div class="form-group">
							<input type="submit" class="button" value="Register an account">
						</div>
					</form>
				</div><!-- end register -->             
  			</div><!-- end content -->
        </div><!-- end container -->
	</section><!-- end section -->
   
    <footer class="footer">
        <div class="container">
            <div class="widget col-lg-3 col-md-3 col-sm-12">
            <h4 class="title">About us</h4>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry"s standard dummy text ever since the 1500s..</p>
                <a class="button small" href="#">read more</a>
            </div><!-- end widget -->
            <div class="widget col-lg-3 col-md-3 col-sm-12">
            <h4 class="title">Recent Posts</h4>
				<ul class="recent_posts">
					<li>
                    	<a href="#">
						<img src="demos/01_recent_post.png" alt="" />Mockup Design PSD Template
                        </a>
						<a class="readmore" href="#">read more</a>
					</li>
					<li>
                    	<a href="#">
						<img src="demos/02_recent_post.png" alt="" />App Screen Mockup Template
                        </a>
						<a class="readmore" href="#">read more</a>
					</li>
				</ul><!-- recent posts -->
            </div><!-- end widget -->  
            <div class="widget col-lg-3 col-md-3 col-sm-12">
            <h4 class="title">Get In Touch</h4>
                <ul class="contact_details">
                	<li><i class="fa fa-envelope-o"></i> support@yoursite.com</li>
                	<li><i class="fa fa-envelope-o"></i> info@yoursite.com</li>
                	<li><i class="fa fa-phone-square"></i> +90 04 333 02 22</li>
                	<li><i class="fa fa-home"></i> Istanbul Universitesi Iletisim Fakultesi, Istanbul, TURKEY</li>
                	<li><a href="#"><i class="fa fa-map-marker"></i> View large map</a></li>
                </ul><!-- contact_details -->
            </div><!-- end widget -->  
            <div class="widget col-lg-3 col-md-3 col-sm-12">
            <h4 class="title">Flickr Stream</h4>
				<ul class="flickr">
					<li><a href="#"><img alt="" src="demos/01_flickr.jpg"></a></li>
					<li><a href="#"><img alt="" src="demos/02_flickr.jpg"></a></li>
					<li><a href="#"><img alt="" src="demos/03_flickr.jpg"></a></li>
					<li><a href="#"><img alt="" src="demos/04_flickr.jpg"></a></li>
					<li><a href="#"><img alt="" src="demos/05_flickr.jpg"></a></li>
					<li><a href="#"><img alt="" src="demos/06_flickr.jpg"></a></li>
					<li><a href="#"><img alt="" src="demos/07_flickr.jpg"></a></li>
					<li><a href="#"><img alt="" src="demos/08_flickr.jpg"></a></li>
				</ul>
            </div><!-- end widget -->  
        </div><!-- end container -->
        
        <div class="copyrights">
            <div class="container">
                <div class="col-lg-6 col-md-6 col-sm-12 columns">
                    <p>Copyright © 2014 - All right reserved. Designed by <a title="Premium WordPress Themes" href="http://designingmedia.com">Designing Media</a></p>
                </div><!-- end widget -->
                <div class="col-lg-6 col-md-6 col-sm-12 columns text-right">
                    <div class="footer-menu right">
                        <ul class="menu">
                            <li><a href="#">Home</a></li>
                            <li><a href="#">About</a></li>
                            <li><a href="#">Sitemap</a></li>
                            <li><a href="#">Site Terms</a></li>
                            <li><a href="#">Contact</a></li>
                        </ul>
                    </div>
                </div><!-- end large-6 -->   
            </div><!-- end container -->
        </div><!-- end copyrights -->
    </footer><!-- end footer -->
    <div class="dmtop">Scroll to Top</div>

      <!-- Main Scripts-->
	<script src="assets/js/jquery.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.unveilEffects.js"></script>	
	<script src="js/retina-1.1.0.js"></script>
	<script src="js/jquery.hoverex.min.js"></script>
    <script src="js/jetmenu.js"></script>	
	<script src="js/jquery.jigowatt.js"></script>
	<script src="js/custom.js"></script>
	</body>
</html>