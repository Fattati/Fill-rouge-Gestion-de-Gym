<?php
//index.php

$error = '';
$name = '';
$email = '';
$subject = '';
$message = '';

function clean_text($string)
{
 $string = trim($string);
 $string = stripslashes($string);
 $string = htmlspecialchars($string);
 return $string;
}

if(isset($_POST["submit"]))
{
 if(empty($_POST["name"]))
 {
  $error .= '<p><label class="text-danger">Please Enter your Name</label></p>';
 }
 else
 {
  $name = clean_text($_POST["name"]);
  if(!preg_match("/^[a-zA-Z ]*$/",$name))
  {
   $error .= '<p><label class="text-danger">Only letters and white space allowed</label></p>';
  }
 }
 if(empty($_POST["email"]))
 {
  $error .= '<p><label class="text-danger">Please Enter your Email</label></p>';
 }
 else
 {
  $email = clean_text($_POST["email"]);
  if(!filter_var($email, FILTER_VALIDATE_EMAIL))
  {
   $error .= '<p><label class="text-danger">Invalid email format</label></p>';
  }
 }
 if(empty($_POST["subject"]))
 {
  $error .= '<p><label class="text-danger">Subject is required</label></p>';
 }
 else
 {
  $subject = clean_text($_POST["subject"]);
 }
 if(empty($_POST["message"]))
 {
  $error .= '<p><label class="text-danger">Message is required</label></p>';
 }
 else
 {
  $message = clean_text($_POST["message"]);
 }

 if($error == '')
 {
  $file_open = fopen("contact_data.csv", "a");
  $no_rows = count(file("contact_data.csv"));
  if($no_rows > 1)
  {
   $no_rows = ($no_rows - 1) + 1;
  }
  $form_data = array(
   'sr_no'  => $no_rows,
   'name'  => $name,
   'email'  => $email,
   'subject' => $subject,
   'message' => $message
  );
  fputcsv($file_open, $form_data);
  $error = '<label class="text-success">Thank you for contacting us</label>';
  $name = '';
  $email = '';
  $subject = '';
  $message = '';
 }
}

?>
<!DOCTYPE HTML>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>GYM MASTER</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">



	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content="" />
	<meta property="og:image" content="" />
	<meta property="og:url" content="" />
	<meta property="og:site_name" content="" />
	<meta property="og:description" content="" />
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,700,800" rel="stylesheet">

	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="css/magnific-popup.css">

	<!-- Owl Carousel  -->
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style.css">

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

</head>

<body>

	<div class="fh5co-loader"></div>

	<div id="page">
		<nav class="fh5co-nav" role="navigation">
			<div class="top">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 text-right">
							<p class="num">Call: +01 123 456 7890</p>
							<ul class="fh5co-social">
								<li><a href="#"><i class="icon-twitter"></i></a></li>
								<li><a href="#"><i class="icon-dribbble"></i></a></li>
								<li><a href="#"><i class="icon-github"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="top-menu">
				<div class="container">
					<div class="row">
						<div class="col-xs-2">
							<div id="fh5co-logo"><a href="index.php">GymMaster<span>.</span></a></div>
						</div>
						<div class="col-xs-10 text-right menu-1">
							<ul>
								<li><a href="index.php">Home</a></li>
								<li><a href="gallery.html">Gallery</a></li>
								<li><a href="about.html">Trainer</a></li>
								<li><a href="pricing.html">Pricing</a></li>
								<li class="active"><a href="contact.php">Contact</a></li>
								<li><a href="login.php">Login</a></li>
								<!-- <li class="btn-cta"><a href="#"><span>Login</span></a></li> -->
							</ul>
						</div>
					</div>

				</div>
			</div>
		</nav>

		<header id="fh5co-header" class="fh5co-cover fh5co-cover-sm" role="banner"
			style="background-image:url(images/img_bg_2.jpg);" data-stellar-background-ratio="0.5">
			<div class="overlay"></div>
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 text-center">
						<div class="display-t">
							<div class="display-tc animate-box" data-animate-effect="fadeIn">
								<h1>Contact Us</h1>

							</div>
						</div>
					</div>
				</div>
			</div>
		</header>
		<div id="map" class="fh5co-map"></div>
		<!-- END map -->

		<div id="fh5co-contact">
			<div class="container">
				<div class="row">
					<div class="col-md-5 col-md-push-1 animate-box">

						<div class="fh5co-contact-info">
							<h3>Contact Information</h3>
							<ul>
								<li class="address">198 West 21th Street, <br> Suite 721 Gym Master NY 10016</li>
								<li class="phone"><a href="tel://1234567920">+ 212 6 1234 98</a></li>
								<li class="email"><a href="mailto:info@yoursite.com">info@gymmaster.com</a></li>
								<!-- <li class="url"><a href="http://gettemplates.co">gettemplates.co</a></li> -->
							</ul>
						</div>
						

					</div>
					<div class="col-md-6 animate-box">
						<h3>Get In Touch</h3>
						<form method="post">
							<div class="row form-group">
								<div class="col-md-6">
									<!-- <label for="fname">First Name</label> -->
									<input type="text" name="name" id="fname" class="form-control" placeholder="Your name">
								</div>
								<div class="col-md-6">
									<!-- <label for="lname">Last Name</label> -->
									<!-- <input type="text" id="lname" class="form-control" placeholder="Your lastname"> -->
								</div>
							</div>

							<div class="row form-group">
								<div class="col-md-12">
									<!-- <label for="email">Email</label> -->
									<input name="email" type="text" id="email" class="form-control" placeholder="Your email address">
								</div>
							</div>

							<div class="row form-group">
								<div class="col-md-12">
									<!-- <label for="subject">Subject</label> -->
									<input name="subject" type="text" id="subject" class="form-control"
										placeholder="Your subject of this message">
								</div>
							</div>

							<div class="row form-group">
								<div class="col-md-12">
									<!-- <label for="message">Message</label> -->
									<textarea name="message" id="message" cols="30" rows="10" class="form-control"
										placeholder="Your message"><?php echo $message; ?></textarea>
								</div>
							</div>
							<div class="form-group">
								<input type="submit" name="submit" value="Send Message" class="btn btn-primary">
							</div>

						</form>
					</div>
				</div>

			</div>
		</div>


		<div id="fh5co-started" class="fh5co-bg" style="background-image: url(images/img_bg_3.jpg);">
			<div class="overlay"></div>
			<div class="container">
				<div class="row animate-box">
					<div class="col-md-8 col-md-offset-2 text-center">
						<h2>Fitness Classes this Summer <br> <span> Pay Now and <br> Get <span
									class="percent">Best%</span> Deal</span></h2>
					</div>
				</div>
				<div class="row animate-box">
					<div class="col-md-8 col-md-offset-2 text-center">
						<p><a href="contact.php" class="btn btn-default btn-lg">Contact Us</a></p>
					</div>
				</div>
			</div>
		</div>


		<footer id="fh5co-footer" class="fh5co-bg" style="background-image: url(images/img_bg_1.jpg);"
			role="contentinfo">
			<div class="overlay"></div>
			<div class="container">
				<div class="row row-pb-md">
					<div class="col-md-4 fh5co-widget">
						<h3>A Little About Gym Master.</h3>
						<p>Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit. Eos cumque dicta
							adipisci architecto culpa amet.</p>
						<!-- <p><a class="btn btn-primary" href="#">Become A Member</a></p> -->
					</div>
					<div class="col-md-8">
						<h3>Classes</h3>
						<div class="col-md-4 col-sm-4 col-xs-6">
							<ul class="fh5co-footer-links">
								<li><a href="#">Cardio</a></li>
								<li><a href="#">Body Building</a></li>
								<li><a href="#">Yoga</a></li>
								<li><a href="#">Boxing</a></li>
								<li><a href="#">Running</a></li>
							</ul>
						</div>

						<div class="col-md-4 col-sm-4 col-xs-6">
							<ul class="fh5co-footer-links">
								<li><a href="#">Boxing</a></li>
								<li><a href="#">Martial Arts</a></li>
								<li><a href="#">Karate</a></li>
								<li><a href="#">Kungfu</a></li>
								<li><a href="#">Basketball</a></li>
							</ul>
						</div>

						<div class="col-md-4 col-sm-4 col-xs-6">
							<ul class="fh5co-footer-links">
								<li><a href="#">Badminton</a></li>
								<li><a href="#">Body Building</a></li>
								<li><a href="#">Teams</a></li>
								<li><a href="#">Advertise</a></li>
								<li><a href="#">API</a></li>
							</ul>
						</div>
					</div>
				</div>

				<div class="row copyright">
					<div class="col-md-12 text-center">
						<p>
							<small class="block">&copy; 2020. All Rights Reserved.</small>
						
						</p>
						<p>
							<ul class="fh5co-social-icons">
								<li><a href="#"><i class="icon-twitter"></i></a></li>
								<li><a href="#"><i class="icon-facebook"></i></a></li>
								<li><a href="#"><i class="icon-linkedin"></i></a></li>
								<li><a href="#"><i class="icon-dribbble"></i></a></li>
							</ul>
						</p>
					</div>
				</div>

			</div>
		</footer>
	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>

	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Stellar Parallax -->
	<script src="js/jquery.stellar.min.js"></script>
	<!-- Carousel -->
	<script src="js/owl.carousel.min.js"></script>
	<!-- countTo -->
	<script src="js/jquery.countTo.js"></script>
	<!-- Magnific Popup -->
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/magnific-popup-options.js"></script>
	<!-- Google Map -->
	<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCefOgb1ZWqYtj7raVSmN4PL2WkTrc-KyA&sensor=false"> -->
	<!-- </script> -->
	<!-- <script src="js/google_map.js"></script> -->
	<!-- Main -->
	<script src="js/main.js"></script>

</body>

</html>