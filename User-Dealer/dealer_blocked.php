<?php
error_reporting(0);

session_start();


	if(!($_SESSION['dealer_email']))
	{
		?>
		<script>
		window.location.href="login.php";
		</script>
		<?php
	}
	
		$select = "select * from Tbl_dealer where dealer_email = $_SESSION[dealer_email]";
		$select_query = mysql_query($select);
		$row = mysql_fetch_array($select_query);

		if($_SESSION['dealer_status']==1)
		{
			?>
			<script>
			window.location.href="dealer_index.php";
			</script>
			<?php
		}


?>

<!doctype html>
<html class="no-js" lang="en">
	<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>E-life Ask</title>
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

    <?php
		include "header.php";
	?><!-- end header -->


   <div class="container clearfix">
	
 
    
    <section class="section1">
    	<div class="container clearfix">
	
            <div class="general-title text-center">
                <h3>Sorry, You are blocked by Administrator.</h3>
                <hr>
            </div>

			  
		</div><!-- end col-->
    </div><!-- end content -->
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
	 
<?php
	include "footer.php";
?>
    <div class="dmtop">Scroll to Top</div>

      <!-- Main Scripts-->
	<script src="assets/js/jquery.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.unveilEffects.js"></script>	
	<script src="js/retina-1.1.0.js"></script>
	<script src="js/jquery.hoverdir.js"></script>
    <script src="js/jetmenu.js"></script>	
	<script src="js/jquery.hoverex.min.js"></script>
	<script src="js/jquery.prettyPhoto.js"></script>
	<script src="js/jquery.jigowatt.js"></script>
	<script src="js/custom.js"></script>
    
	<!-- LayerSlider script files -->
	<script src="layerslider/js/greensock.js" type="text/javascript"></script>
	<script src="layerslider/js/layerslider.transitions.js" type="text/javascript"></script>
	<script src="layerslider/js/layerslider.kreaturamedia.jquery.js" type="text/javascript"></script>
	<!-- Initializing the slider -->
    <script type="text/javascript">
		jQuery("#layerslider").layerSlider({
			pauseOnHover: false,
			autoPlayVideos: false,
			responsive: false,
			responsiveUnder: 1280,
			layersContainer: 1280,
			skin: 'v5',
			skinsPath: 'layerslider/skins/'
		});
	</script>
    
    <script src="js/owl.carousel.js"></script>	
    <script type="text/javascript">
		$(document).ready(function() {
			$("#popularposts").owlCarousel({
			items : 3,
			lazyLoad : true,
			navigation : false
			});
		});
	</script>
    
	<script src="js/jquery.animate-enhanced.min.js"></script>
	<script src="js/jquery.easypiechart.min.js"></script>
    <script type="text/javascript">
		$('.chart').easyPieChart({
			easing: 'easeOutBounce',
			size : 200,
			animate : 2000,
			lineWidth : 10,
			lineCap : 'square',
			lineWidth : 19,
			barColor : false,
			trackColor : '#F5F5F5',
			scaleColor : false,
			onStep: function(from, to, percent) {
			$(this.el).find('.percent').text(Math.round(percent)+'%');
			}
		});
	</script>
	
  	<script src="js/jquery.isotope.min.js"></script>
    <script type="text/javascript">
		(function($) {
			"use strict";
			var $container = $('.portfolio'),
				$items = $container.find('.portfolio-item'),
				portfolioLayout = 'fitRows';
				
				if( $container.hasClass('portfolio-centered') ) {
					portfolioLayout = 'masonry';
				}
						
				$container.isotope({
					filter: '*',
					animationEngine: 'best-available',
					layoutMode: portfolioLayout,
					animationOptions: {
					duration: 750,
					easing: 'linear',
					queue: false
				},
				masonry: {
				}
				}, refreshWaypoints());
				
				function refreshWaypoints() {
					setTimeout(function() {
					}, 1000);   
				}
						
				$('nav.portfolio-filter ul a').on('click', function() {
						var selector = $(this).attr('data-filter');
						$container.isotope({ filter: selector }, refreshWaypoints());
						$('nav.portfolio-filter ul a').removeClass('active');
						$(this).addClass('active');
						return false;
				});
				
				function getColumnNumber() { 
					var winWidth = $(window).width(), 
					columnNumber = 1;
				
					if (winWidth > 1200) {
						columnNumber = 5;
					} else if (winWidth > 950) {
						columnNumber = 4;
					} else if (winWidth > 600) {
						columnNumber = 3;
					} else if (winWidth > 400) {
						columnNumber = 2;
					} else if (winWidth > 250) {
						columnNumber = 1;
					}
						return columnNumber;
					}       
					
					function setColumns() {
						var winWidth = $(window).width(), 
						columnNumber = getColumnNumber(), 
						itemWidth = Math.floor(winWidth / columnNumber);
						
						$container.find('.portfolio-item').each(function() { 
							$(this).css( { 
							width : itemWidth + 'px' 
						});
					});
				}
				
				function setPortfolio() { 
					setColumns();
					$container.isotope('reLayout');
				}
					
				$container.imagesLoaded(function () { 
					setPortfolio();
				});
				
				$(window).on('resize', function () { 
				setPortfolio();          
			});
		})(jQuery);
	</script>
    
	<script src="js/jquery.mb.YTPlayer.js"></script>    
    <script type="text/javascript">
    $(function(){
      $(".player").mb_YTPlayer();
    });
	</script>
    
	<script src="http://maps.google.com/maps/api/js?sensor=false"></script>
	<script src="js/jquery.gmap.js"></script>
    <script type="text/javascript">
			var mapMarkers = [{				
				address: "Saskatoon, SK S7V 0A4 Canada",
				html: "<strong>We Are ENVATO!</strong><br>Saskatoon, SK S7V 0A4 Canada<br><br><a href='#' onclick='mapCenterAt({latitude: 52.100343, longitude: -106.551482, zoom: 16}, event)'>[+] View Original Map</a>",
				icon: {
					image: "images/pin.png",
					iconsize: [100, 100],
					iconanchor: [64, 45]
				}
			}];
			<!-- select location on here : http://itouchmap.com/latlong.html -->
			var initLatitude = 52.100343;
			var initLongitude = -106.551482;
			var mapSettings = {
				controls: {
					panControl: true,
					zoomControl: true,
					mapTypeControl: true,
					scaleControl: true,
					streetViewControl: true,
					overviewMapControl: true
				},
				scrollwheel: false,
				markers: mapMarkers,
				latitude: initLatitude,
				longitude: initLongitude,
				zoom: 5
			};
			var map = $("#googlemaps").gMap(mapSettings);
			var mapCenterAt = function(options, e) {
				e.preventDefault();
				$("#googlemaps").gMap("centerAt", options);
			}
		</script>
	</body>
</html>