

<!DOCTYPE html>
<html lang="en">
<head>
	<title>SMK KUSUMA NEGARA KERTOSONO</title>
	<meta charset="UTF-8">
	<meta name="description" content="SMK KUSUMA NEGARA KERTOSONO">
	<meta name="keywords" content="smk, kusuma negara, kertosono, nganjuk">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->   
	<link href="img/favicon.ico" rel="shortcut icon"/>

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i" rel="stylesheet">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="<?=base_url();?>assets/frontend/css/bootstrap.min.css"/>
	<link rel="stylesheet" href="<?=base_url();?>assets/frontend/css/font-awesome.min.css"/>
	<link rel="stylesheet" href="<?=base_url();?>assets/frontend/css/themify-icons.css"/>
	<link rel="stylesheet" href="<?=base_url();?>assets/frontend/css/magnific-popup.css"/>
	<link rel="stylesheet" href="<?=base_url();?>assets/frontend/css/animate.css"/>
	<link rel="stylesheet" href="<?=base_url();?>assets/frontend/css/owl.carousel.css"/>
	<link rel="stylesheet" href="<?=base_url();?>assets/frontend/css/style.css"/>
	<link rel="stylesheet" href="<?=base_url();?>assets/frontend/css/hover.css"/>


	<style>
		.map-container{
		overflow:hidden;
		padding-bottom:56.25%;
		position:relative;
		height:0;
		}
		.map-container iframe{
		left:0;
		top:0;
		height:100%;
		width:100%;
		position:absolute;
		}
	</style>
	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
<body>
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>

	<!-- header section -->
	<header class="header-section">
		<div class="container">
			<!-- logo -->
			<a href="<?=site_url('home');?>" class="site-logo"><img src="<?=base_url();?>assets/frontend/img/logo-smk.png" alt=""></a>
			<div class="nav-switch">
				<i class="fa fa-bars"></i>
			</div>
			<div class="header-info">
				<div class="hf-item">
					<i class="fa fa-clock-o"></i>
					<p><span><strong>Jam Kerja :</strong> </span>Senin - Sabtu : 07.00 WIB - 15.00 WIB</p>
				</div>
				<div class="hf-item">
					<i class="fa fa-map-marker"></i>
					<p><span><strong>Alamat Kami :</strong></span> Jl. Panglima Sudirman No. 01 Klinter Kertosono </p>
				</div>
			</div>
		</div>
	</header>
	<!-- header section end-->


	<!-- Header section  -->
	<nav class="nav-section">
		<div class="container">
			<div class="nav-right">
				<!-- <a href="javascript:voi(0);"><i class="fa fa-search"</i></! -->
				<!-- <i href=""><i class="fa fa-shopping-cart"></i></a> -->
			</div>
			<ul class="main-menu">
				<li class="<?=$this->uri->segment(2)=="home"? 'active':'';?>"><a href="<?=site_url('home');?>"> Home</a></li>
				<li class="<?=$this->uri->segment(2)=="profile"? 'active':'';?>"><a href="<?=site_url('home/profile');?>">Profile</a></li>
				<li class="<?=$this->uri->segment(2)=="news"? 'active':'';?>"><a href="<?=site_url('home/news');?>">Berita</a></li>
				<li class="<?=$this->uri->segment(2)=="gtk"? 'active':'';?>"><a href="<?=site_url('home/gtk');?>">Guru dan Staf TU</a></li>
				<li class="<?=$this->uri->segment(2)=="galery"? 'active':'';?>"><a href="<?=site_url('home/galery');?>">Galery</a></li>
				<li class="<?=$this->uri->segment(2)=="contact"? 'active':'';?>"><a href="<?=site_url('home/contact');?>">Kontak Kami</a></li>
			</ul>
		</div>
	</nav>
	<!-- Header section end -->

<?=$page ?>	

	<!-- Footer section -->
	<footer class="footer-section">
		<div class="container footer-top">
			<div class="row">
				<!-- widget -->
				<div class="col-sm-6 col-lg-3 footer-widget">
					<div class="about-widget">
						<img src="<?=base_url();?>assets/frontend/img/logo-light.png" alt="">
						<p>SMK Unggul, Berkarakter, Kompeten, dan Berdaya Saing</p>
						<div class="social pt-1">
							<a href=""><i class="fa fa-twitter-square"></i></a>
							<a href=""><i class="fa fa-facebook-square"></i></a>
							<!-- <a href=""><i class="fa fa-google-plus-square"></i></a>
							<a href=""><i class="fa fa-linkedin-square"></i></a> -->
							<a href=""><i class="fa fa-youtube-square"></i></a>
						</div>
					</div>
				</div>
			
			
				
			
				<!-- widget -->
				<div class="col-sm-6 col-lg-3 footer-widget">
					<h6 class="fw-title">CONTACT</h6>
					<ul class="contact">
						<li><p><i class="fa fa-map-marker"></i> Jl. Panglima Sudirman No.01 Klinter - Kertosono. (TIMUR THE LEGEND WATERPARK KERTOSONO)</p></li>
						<li><p><i class="fa fa-phone"></i> 0358-5501000</p></li>
						<li><p><i class="fa fa-envelope"></i> mail@smkkusumanegarakertosono.sch.id</p></li>
						<li><p><i class="fa fa-clock-o"></i> Senin - Jumat, 07:00 WIB - 15:15 WIB</p></li>
					</ul>
				</div>
				<div class="col-sm-6 col-lg-6 footer-widget">
				<h6 class="fw-title">Alamat Kami :</h6>
					<!--Google map-->
					<div id="map-container-google-2" class="z-depth-1-half map-container" style="height: 150px">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6651.024699376471!2d112.08026330086822!3d-7.605098839858087!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7846426e250c6f%3A0xaa4b42aa3de2bab4!2sSMK%20KUSUMA%20NEGARA%20KERTOSONO!5e0!3m2!1sen!2sid!4v1585838679784!5m2!1sen!2sid" width="600" height="450" frameborder="0" style="border:5;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
					</div>

					<!--Google Maps-->
				</div>
			</div>
		</div>
		<!-- copyright -->
		<div class="copyright">
			<div class="container">
				<p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> SMK Kusuma Negara - All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
			</div>		
		</div>
	</footer>
	<!-- Footer section end-->

	<!--====== Javascripts & Jquery ======-->
	<script src="<?=base_url();?>assets/frontend/js/jquery-3.2.1.min.js"></script>
	<script src="<?=base_url();?>assets/frontend/js/owl.carousel.min.js"></script>
	<script src="<?=base_url();?>assets/frontend/js/jquery.countdown.js"></script>
	<script src="<?=base_url();?>assets/frontend/js/masonry.pkgd.min.js"></script>
	<script src="<?=base_url();?>assets/frontend/js/magnific-popup.min.js"></script>
	<script src="<?=base_url();?>assets/frontend/js/main.js"></script>
	
</body>
</html>