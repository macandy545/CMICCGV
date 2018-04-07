<!DOCTYPE html>
<html lang="en">
<head>
<title>WEBOGS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Web Based, Web Based Online Grading System, Grading System, Free System, Free Grading, Free Grading System, Free Web Online Grading Viewer, Grading Viewer System, Grading Viewer, Online Grade Viewer, Grade Viewer, Grade Viewer system" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- css -->
<link rel="icon" href="<?php echo base_url(); ?>webroot/img/favicon.png">
<link href="<?php echo base_url(); ?>webroot/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?php echo base_url(); ?>webroot/css/popup-box.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/home-style.css" type="text/css" media="all" />
<link rel="stylesheet" 	href="<?php echo base_url(); ?>webroot/css/chocolat.css" type="text/css" media="all">
<!--// css -->
<style type="text/css">
	.banner{
		background:url('<?php echo base_url(); ?>webroot/img/banner3.jpg') no-repeat 0px 0px;
		background-size:cover;
	}
	.feat-bottom {
		background: url('<?php echo base_url(); ?>webroot/img/bg.jpg') no-repeat 0px 0px;
		background-size: cover;
		min-height: 720px;
	}
	ul.social-icons li .icon-button .icon-twitter{
	    background: url('<?php echo base_url(); ?>webroot/img/img-sp.png') no-repeat -4px -35px;
	    display: block;
	}
	.contact-left-w3ls:before {
	    content: '';
	    background: url('<?php echo base_url(); ?>webroot/img/c1.png') no-repeat 0px 0px;
	    width: 91%;
	    height: 170px;
	    position: absolute;
	    top: 0;
	    left: -30%;
	}
	.modal-header ,.modal-footer{
  	    background: #1e3b1f;
	}
	.modal-header h4{
		color:#fff;
		text-transform:uppercase;
		font-size:25px;
		letter-spacing:2px;
		font-weight:700;
	}
	.logo-w3 h1{
		color:#5dd85f;
		font-size:35px;
		text-align:left;
		text-transform:uppercase;
		font-family: latin;
		font-weight: bold;
	}
</style>
<script src="<?php echo base_url(); ?>webroot/js/jquery-1.11.1.min.js"></script>
<script src="<?php echo base_url(); ?>webroot/js/bootstrap.js"></script>
	<!-- Popup-Box-JavaScript -->
	<script src="<?php echo base_url(); ?>webroot/js/modernizr.custom.97074.js"></script>
	<script src="<?php echo base_url(); ?>webroot/js/jquery.chocolat.js"></script>
	<script type="text/javascript">
		$(function() {
			$('.gallery-grids a').Chocolat();
		});
	</script>
	<!-- //Popup-Box-JavaScript -->
	<!-- start-smooth-scrolling -->
			<script type="text/javascript" src="<?php echo base_url(); ?>webroot/js/move-top.js"></script>
			<script type="text/javascript" src="<?php echo base_url(); ?>webroot/js/easing.js"></script>
			<script type="text/javascript">
				jQuery(document).ready(function($) {
					$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
				});
			});
			</script>
	<!-- //start-smoth-scrolling -->
		<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/
								
			$().UItoTop({ easingType: 'easeOutQuart' });
								
			});
	</script>
	<script src="<?php echo base_url(); ?>webroot/js/jquery.magnific-popup.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>webroot/js/modernizr.custom.53451.js"></script> 
 <script>
						$(document).ready(function() {
						$('.popup-with-zoom-anim').magnificPopup({
							type: 'inline',
							fixedContentPos: false,
							fixedBgPos: true,
							overflowY: 'auto',
							closeBtnInside: true,
							preloader: false,
							midClick: true,
							removalDelay: 300,
							mainClass: 'my-mfp-zoom-in'
						});
																						
						});
</script>	
</head>
<body>
	<div class="header">
		<div class="container">
			<div class="w3l_header_left"> 
				<ul>
					<li><span class="glyphicon glyphicon-earphone" aria-hidden="true"></span>+ (639) 226598254</li>
					<li><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span><a href="mailto:info@example.com">webogs@gmail.com</a></li>
				</ul>
			</div>
			
			<div class="w3l_header_right">
				<ul>
					<li><a class="book button-isi zoomIn animated" data-wow-delay=".5s" href="<?php echo base_url(); ?>users/login"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>Sign In</a></li>
					<li><a class="book button-isi zoomIn animated" data-wow-delay=".5s" href="<?php echo base_url(); ?>users/registration"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>Sign Up</a></li>
				</ul>
			</div>
			
			<div class="clearfix"> </div>
			
		</div>
	</div>
	<div class="logo-navigation-w3layouts">
		<div class="container">
		<div class="logo-w3">
			<a href="<?php echo base_url(); ?>users/index"><h1><img src="<?php echo base_url(); ?>webroot/img/logo.png" alt=" " /> <span> WEBOGS</span></h1></a>
		</div>
		<div class="navigation agileits w3layouts">
			<nav class="navbar agileits w3layouts navbar-default">
				<div class="navbar-header agileits w3layouts">
					<button type="button" class="navbar-toggle agileits w3layouts collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false">
						<span class="sr-only agileits w3layouts">Toggle navigation</span>
						<span class="icon-bar agileits w3layouts"></span>
						<span class="icon-bar agileits w3layouts"></span>
						<span class="icon-bar agileits w3layouts"></span>
					</button>
				</div>
				<div class="navbar-collapse agileits w3layouts collapse hover-effect" id="navbar">
					<ul class="agileits w3layouts">
						<li class="agileits w3layouts"><a href="#" class="active">Home</a></li>
						<li class="agileits w3layouts"><a class="scroll" href="#about">About</a></li>
						<li class="agileits w3layouts"><a class="scroll" href="#team">Team</a></li>
						<li class="agileits w3layouts"><a class="scroll" href="#services">Goals</a></li>
						<li class="agileits w3layouts"><a class="scroll" href="#gallery">Gallery</a></li>
						<li class="agileits w3layouts"><a class="scroll" href="#contact">Contact</a></li>
					</ul>
				</div>
			</nav>
		</div>
		<div class="clearfix"></div>
		</div>
	</div>

	<div class="banner">
        <h2 style="padding-top: 14%;">Welcome to<span> WEBOGS </span></h2>
		<h2 style="font-size: 25px;">(WEB BASED ONLINE GRADING SYSTEM)</h2>
		<h4>Your friendly Online Grading System</h4>
		<div class="arrow">
			<a href="#contact" class="scroll"><img src="<?php echo base_url(); ?>webroot/img/arrow.png" alt=" " /></a>
		</div>
	</div>
	<!-- about -->
	<div class="about-w3-agile" id="about">
		<div class="container">
			<div class="wthree_about_grids">
				<div class="col-md-6 wthree_about_grid_left">
					<h3>About us</h3>
							<p>Fusce semper, nibh eu sollicitudin imperdiet, dolor magna vestibulum mi, 
								vel tincidunt augue ipsum nec erat. Vestibulum congue leo elementum 
								ullamcorper commodo. Class aptent taciti sociosqu ad litora torquent 
								per conubia nostra, per inceptos himenaeos.</p>
								<a href="#" data-toggle="modal" data-target="#myModal">Read More</a>
				</div>
				<div id="myModal" class="modal fade" role="dialog">
					<div class="modal-dialog">
						<div class="modal-content">
						  <div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">Modal Header</h4>
						  </div>
						  <div class="modal-body">
							<p>Nam tincidunt leo nec molestie accumsan. Fusce iaculis sit amet tellus vel ultrices. Phasellus in tellus ut orci accumsan facilisis eget in ante. Aliquam laoreet finibus augue non pharetra. Nullam tincidunt ex quis massa auctor, quis auctor erat semper. Morbi a justo auctor, semper mi viverra, lacinia libero. Praesent sodales augue tristique tellus eleifend, eu placerat eros hendrerit. Cras imperdiet lorem nec magna congue, blandit auctor arcu posuere. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</p>
						  </div>
						  <div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						  </div>
						</div>
					</div>
				</div>

				<div class="col-md-6 wthree_about_grid_right">
					<img src="<?php echo base_url(); ?>webroot/img/11.jpg" alt=" " class="img-responsive" />
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
<!-- //about -->
	<div class="featured-work">
		<div class="container">
			<h3>Featured work</h3>
			<div class="col-md-6 featured-left">
				<div class="wmuSlider example1 animated wow slideInUp" data-wow-delay=".5s">
					<div class="wmuSliderWrapper">
						<article style="position: absolute; width: 100%; opacity: 0;"> 
							<div class="banner-wrap">
								<img src="<?php echo base_url(); ?>webroot/img/f1.jpg" alt=" " class="img-responsive" />
							</div>
						</article>
						<article style="position: absolute; width: 100%; opacity: 0;"> 
							<div class="banner-wrap">
								<img src="<?php echo base_url(); ?>webroot/img/f2.jpg" alt=" " class="img-responsive" />
							</div>
						</article>
						<article style="position: absolute; width: 100%; opacity: 0;"> 
							<div class="banner-wrap">
								<img src="<?php echo base_url(); ?>webroot/img/f3.jpg" alt=" " class="img-responsive" />
							</div>
						</article>
					</div>
				</div>
			</div>
			<script src="<?php echo base_url(); ?>webroot/js/jquery.wmuSlider.js"></script> 
								<script>
									$('.example1').wmuSlider();         
								</script> 

			<div class="col-md-6 featured-right">
				<h4>Quisque lobortis</h4>
				<p>Nam a leo porta, pulvinar eros id, facilisis nisi. Proin ut blandit tortor, in tempor tellus. Sed lacus metus, hendrerit eu orci ac, aliquam commodo lacus.Morbi gravida pulvinar orci, et consectetur enim consectetur non. Proin nunc leo, tincidunt sed lacinia</p>
				<p>Fusce eu felis et sapien malesuada pretium a ac eros. Praesent quis hendrerit quam. Integer mollis est a cursus pulvinar. Proin leo neque, posuere eu metus </p>
				<a href="#" data-toggle="modal" data-target="#myModal">Read More</a>
			</div>
			<div class="clearfix">
			</div>
		</div>
	</div>
	<div class="feat-bottom">
		<h4>THE PURPOSE OF EDUCATION IS TO MAKE MINDS NOT CAREERS</h4>
	</div>
	<!-- team -->
	<div class="team" id="team">
		<div class="container">
			<h3>Meet Our Team</h3>
			<div class="agile_team_grids">
				<div class="col-md-3 agile_team_grid  agile_team_gridf">
					<div class="agile_team_grid_main">
						<img src="<?php echo base_url(); ?>webroot/img/t1.jpg" alt=" " class="img-responsive" />
						<div class="p-mask">
							<ul class="social-icons">
								<li><a href="https://www.facebook.com/yayabosdik" class="icon-button twitter"><i class="icon-twitter"></i><span></span></a></li>
							</ul>
						</div>
					</div>
					<div class="agile_team_grid1">
						<h4>Christopher Jay Capisnon</h4>
                        <p>IT Instructor</p>
					</div>
				</div>
				<div class="col-md-3 agile_team_grid agile_team_grid2">
					<div class="agile_team_grid_main">
						<img src="<?php echo base_url(); ?>webroot/img/t2.jpg" alt=" " class="img-responsive" />
						<div class="p-mask">
							<ul class="social-icons">
                                <li><a href="https://www.facebook.com/yayabosdik" class="icon-button twitter"><i class="icon-twitter"></i><span></span></a></li>
							</ul>
						</div>
					</div>
					<div class="agile_team_grid1">
                        <h4>Noel Celocia</h4>
                        <p>Front end and Back end Developer</p>
					</div>
				</div>
				<div class="col-md-3 agile_team_grid agile_team_grid3">
					<div class="agile_team_grid_main">
						<img src="<?php echo base_url(); ?>webroot/img/t3.jpg" alt=" " class="img-responsive" />
						<div class="p-mask">
							<ul class="social-icons">
                                <li><a href="https://www.facebook.com/augieken.bestil" class="icon-button twitter"><i class="icon-twitter"></i><span></span></a></li>
							</ul>
						</div>
					</div>
					<div class="agile_team_grid1">
						<h4>Augie Ken Bestil</h4>
                        <p>Support Developer</p>
					</div>
				</div>
				<div class="col-md-3 agile_team_grid agile_team_grid4">
					<div class="agile_team_grid_main">
						<img src="<?php echo base_url(); ?>webroot/img/t4.jpg" alt=" " class="img-responsive" />
						<div class="p-mask">
							<ul class="social-icons">
                                <li><a href="https://www.facebook.com/KhIay" class="icon-button twitter"><i class="icon-twitter"></i><span></span></a></li>
							</ul>
						</div>
					</div>
					<div class="agile_team_grid1">
						<h4>Michelle Khaye Loon</h4>
                        <p>Support Developer</p>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
<!-- //team -->
	<div class="services" id="services">
		<div class="container">
			<h3>Our goals</h3>
			<div class="col-md-4 services-grids services-grids1">
				<span class="glyphicon glyphicon-education" aria-hidden="true"></span>
				<h4>Success</h4>
				<p>To make everyone successful in viewing their grades online.</p>
			</div>
			<div class="col-md-4 services-grids services-grids2">
				<span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span>
				<h4>Fast</h4>
				<p>To help student view thier grades fast and less hassle.</p>
			</div>
			<div class="col-md-4 services-grids services-grids3">
				<span class="glyphicon glyphicon-book" aria-hidden="true"></span>
				<h4>Accurate</h4>
				<p>To have an accurate and reliable Online Grading System</p>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<!-- Gallery -->
	<div class="gallery" id="gallery">
		<div class="container">
			<h3>GALLERY</h3>
			<div class="gallery-grids">
				<div class="col-md-6 col-sm-6 gallery-grids-left gallery-grids-left-gallery1-top">
					<div class="gallery-grid">
						<a class="example-image-link" href="<?php echo base_url(); ?>webroot/img/gallery-1.jpg" data-lightbox="example-set" data-title="">
							<div class="grid">
								<figure class="effect-apollo">
									<img src="<?php echo base_url(); ?>webroot/img/gallery-1.jpg" alt=""/>
										<figcaption></figcaption>
								</figure>
							</div>
						</a>
					</div>
					<div class="gallery-grids-left-sub">
						<div class="col-md-6 col-sm-6 gallery-grids-left-subl">
							<div class="gallery-grid">
								<a class="example-image-link" href="<?php echo base_url(); ?>webroot/img/gallery-4.jpg" data-lightbox="example-set" data-title="">
									<div class="grid">
										<figure class="effect-apollo">
											<img src="<?php echo base_url(); ?>webroot/img/gallery-4.jpg" alt=""/>
												<figcaption></figcaption>
										</figure>
									</div>
								</a>
							</div>
							<div class="gallery-grid gallery-grid-sub grid-middle gallery-grid-sub-left-bottom">
								<a class="example-image-link" href="<?php echo base_url(); ?>webroot/img/gallery-5.jpg" data-lightbox="example-set" data-title="">
									<div class="grid">
										<figure class="effect-apollo">
											<img src="<?php echo base_url(); ?>webroot/img/gallery-5.jpg" alt=""/>
												<figcaption></figcaption>
										</figure>
									</div>
								</a>
							</div>
						</div>
						<div class="col-md-6 col-sm-6 gallery-grids-left-subr gallery-grids-left-subr-long">
							<div class="gallery-grid">
								<a class="example-image-link" href="<?php echo base_url(); ?>webroot/img/gallery-7.jpg" data-lightbox="example-set" data-title="">
									<div class="grid">
										<figure class="effect-apollo">
											<img src="<?php echo base_url(); ?>webroot/img/gallery-7.jpg" alt=""/>
												<figcaption></figcaption>
										</figure>
									</div>
								</a>
							</div>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
				<div class="col-md-6 col-sm-6 gallery-grids-left">
					<div class="col-md-6 col-sm-6 gallery-grids-right gallery-grids-right-first">
						<div class="gallery-grid">
							<a class="example-image-link" href="<?php echo base_url(); ?>webroot/img/gallery-2.jpg" data-lightbox="example-set" data-title="">
								<div class="grid">
									<figure class="effect-apollo">
										<img src="<?php echo base_url(); ?>webroot/img/gallery-2.jpg" alt=""/>
											<figcaption></figcaption>
									</figure>
								</div>
							</a>
						</div>
					</div>
					<div class="col-md-6 col-sm-6 gallery-grids-right gallery-grids-right-two">
						<div class="gallery-grid">
							<a class="example-image-link" href="<?php echo base_url(); ?>webroot/img/gallery-3.jpg" data-lightbox="example-set" data-title="">
								<div class="grid">
									<figure class="effect-apollo">
										<img src="<?php echo base_url(); ?>webroot/img/gallery-3.jpg" alt=""/>
											<figcaption></figcaption>
									</figure>
								</div>
							</a>
						</div>
					</div>
					<div class="clearfix"></div>
					<div class="gallery-grids-right1 gallery-grids-right-hand">
						<div class="gallery-grid">
							<a class="example-image-link" href="<?php echo base_url(); ?>webroot/img/gallery-6.jpg" data-lightbox="example-set" data-title="">
								<div class="grid">
									<figure class="effect-apollo">
										<img src="<?php echo base_url(); ?>webroot/img/gallery-6.jpg" alt=""/>
											<figcaption></figcaption>
									</figure>
								</div>
							</a>
						</div>
					</div>
					<div class="col-md-6 col-sm-6 gallery-grids-right gallery-8">
						<div class="gallery-grid">
							<a class="example-image-link" href="<?php echo base_url(); ?>webroot/img/gallery-8.jpg" data-lightbox="example-set" data-title="">
								<div class="grid">
									<figure class="effect-apollo">
										<img src="<?php echo base_url(); ?>webroot/img/gallery-8.jpg" alt=""/>
											<figcaption></figcaption>
									</figure>
								</div>
							</a>
						</div>
					</div>
					<div class="col-md-6 col-sm-6 gallery-grids-right gallery-9">
						<div class="gallery-grid">
							<a class="example-image-link" href="<?php echo base_url(); ?>webroot/img/gallery-9.jpg" data-lightbox="example-set" data-title="">
								<div class="grid">
									<figure class="effect-apollo">
										<img src="<?php echo base_url(); ?>webroot/img/gallery-9.jpg" alt=""/>
											<figcaption></figcaption>
									</figure>
								</div>
							</a>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="clearfix"></div>
			</div>

		</div>
	</div>
	<!-- //Gallery -->

	<div class="contact-w3-agileits" id="contact">
		<div class="container">
            <div class="col-md-5 contact-left-w3ls" >
                <h3>Contact info</h3>
                <div class="visit">
                    <div class="col-md-2 contact-icon-wthree">
                        <span class="glyphicon glyphicon-home" aria-hidden="true"></span>
                    </div>
                    <div class="col-md-10 contact-text-agileinf0">
                        <h4>Visit us</h4>
                        <h5>Borbajo St. Talamban, Cebu City</h5>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="mail">
                    <div class="col-md-2 contact-icon-wthree">
                        <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
                    </div>
                    <div class="col-md-10 contact-text-agileinf0">
                        <h4>Mail us</h4>
                        <h5><a href="mailto:info@example.com">yayabosdik@gmail.com</a></h5>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="call">
                    <div class="col-md-2 contact-icon-wthree">
                        <span class="glyphicon glyphicon-phone" aria-hidden="true"></span>
                    </div>
                    <div class="col-md-10 contact-text-agileinf0">
                        <h4>Call us</h4>
                        <h5>+091212wadiayto</h5>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="visit">
                    <div class="col-md-2 contact-icon-wthree">
                        <span class="glyphicon glyphicon-time" aria-hidden="true"></span>
                    </div>
                    <div class="col-md-10 contact-text-agileinf0">
                        <h4>Work hours</h4>
                        <h5>Mon-Sat 08:00 AM - 05:00PM</h5>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
	</div>
	<div class="footer-w3l">
		<p> &copy; 2017 WEBOGS . All Rights Reserved | Design by SKIMPERTS.</a></p>
	</div>
	
</body>
</html>