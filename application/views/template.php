<!DOCTYPE html>
<html lang="en">
<head>
	<title><?=$title?></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="<?=base_url('uploads/favicon/'.$favicon)?>"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/fonts/themify/themify-icons.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/fonts/elegant-font/html-css/style.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/vendor/slick/slick.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/vendor/lightbox2/css/lightbox.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/vendor/noui/nouislider.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/main.css">
<!--===============================================================================================-->

<style>
  /* Make the image fully responsive */
  .carousel-inner img {
    width: 100%;
    height: 100%;
  }
</style>

<style>
	html{
		font-size: 12px;
	}

	@media (max-width : 500px){
		table{
			font-size: 10px;
		}

		/* .g-recaptcha .validation{
			width: 100px;
		} */
	}

	.sticky-container{ padding:0px; margin:0px; position:fixed; right:-130px;top:250px; width:230px; z-index: 1100;}
	.sticky li{list-style-type:none;background-color:#fff;color:#efefef;height:60px;padding:0px;margin:0px 0px 1px 0px; -webkit-transition:all 0.25s ease-in-out;-moz-transition:all 0.25s ease-in-out;-o-transition:all 0.25s ease-in-out; transition:all 0.25s ease-in-out; cursor:pointer;}
	.sticky li:hover{margin-left:-115px;}
	.sticky li img{float:left;margin:5px 4px;margin-right:5px;}
	.sticky li p{padding-top:5px;margin:0px;line-height:16px; font-size:11px;}
	.sticky li p a{ text-decoration:none; color:#2C3539;}
	.sticky li p a:hover{text-decoration:underline;}
</style>

<!--===============================================================================================-->
<script type="text/javascript" src="<?=base_url()?>assets/vendor/jquery/jquery-3.2.1.min.js"></script>

</head>
<body class="animsition">

	<!-- Header -->
	<header class="header1">
		<!-- Header desktop -->
		<div class="container-menu-header">

			<div class="wrap_header">
				<!-- Logo -->
				<a href="<?=base_url()?>" class="logo">
					<img src="<?=base_url('uploads/logo/'.$logo)?>" alt="IMG-LOGO">
				</a>

				<!-- Menu -->
				<div class="wrap_menu">
					<nav class="menu">
						<ul class="main_menu">
							<li> <!-- for active nav use 'sale-noti' -->
								<a href="<?=base_url()?>">Home</a>
							</li>

							<li>
								<a href="<?=base_url('shop')?>">Products</a>
							</li>

							<?php if(isset($_SESSION['id_member'])) : ?>

								<li>
									<a href="<?=base_url('cart')?>">Cart</a>
								</li>

							<?php endif; ?>

							<!-- <li>
								<a href="blog.html">Blog</a>
							</li> -->

							<li>
								<a href="<?=base_url('about')?>">About Us</a>
							</li>

						</ul>
					</nav>
				</div>

				<!-- Header Icon -->
				<div class="header-icons">
        <!-- for member when login -->
					<?php if(!isset($_SESSION['id_member'])) : ?>

						<a href="<?=base_url('login')?>">Login</a>

					<?php else : ?>
					<!-- <a href="#" class="header-wrapicon1 dis-block">
            <span style="margin-right: 10px;">Hai, <?=$_SESSION['name_member']?></span>
						<img src="<?=base_url()?>assets/images/icons/icon-header-01.png" class="header-icon1" alt="ICON">
					</a> -->

					<div class="header-wrapicon2">
						<span style="margin-right: 10px;">Hai, <?=$_SESSION['name_member']?></span>
						<img src="<?=base_url()?>assets/images/icons/icon-header-01.png" class="header-icon1 js-show-header-dropdown" alt="ICON">

						<!-- Header cart noti -->
						<div class="header-cart header-dropdown">
							<ul class="header-cart-wrapitem">

									<li class="header-cart-item">
										<a href="<?=base_url('profile')?>">My Profile</a>
									</li>

									<li>
										<a href="<?=base_url('history')?>">History Order</a>
									</li>

									<li class="header-cart-item">
										<a href="<?=base_url('login/logout')?>">Logout</a>
									</li>

							</ul>

						</div>
					</div>
					<?php endif; ?>

					<span class="linedivide1"></span>

					<div class="header-wrapicon2">
						<img src="<?=base_url()?>assets/images/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
						<span class="header-icons-noti">
							<div id="load_cart"></div>
						</span>

						<!-- Header cart noti -->
						<div class="header-cart header-dropdown">
							<ul class="header-cart-wrapitem">
								<?php foreach($items as $x): ?>

									<li class="header-cart-item">
										<div class="header-cart-item-img">
											<img src="<?=base_url('uploads/product/'.$x['img'])?>" alt="IMG">
										</div>

										<div class="header-cart-item-txt">
											<a href="#" class="header-cart-item-name">
												<?=$x['name']?>
											</a>

											<span class="header-cart-item-info">
												<?=$x['qty']." x ".rupiah($x['price'])?>
											</span>
										</div>
									</li>

								<?php endforeach; ?>

							</ul>

							<div class="header-cart-total">
								Total: <?=$money." ".rupiah($total)?>
							</div>

							<div class="header-cart-buttons">
								<div class="header-cart-wrapbtn">
									<!-- Button -->
									<a href="<?=base_url('cart')?>" class="btn btn-info">
										View Cart
									</a>
								</div>

							</div>
						</div>
					</div>

				</div>
			</div>
		</div>

		<!-- Header Mobile -->
		<div class="wrap_header_mobile">
			<!-- Logo moblie -->
			<a href="<?=base_url()?>" class="logo-mobile">
				<img src="<?=base_url('uploads/logo/'.$logo)?>" alt="IMG-LOGO">
			</a>

			<!-- Button show menu -->
			<div class="btn-show-menu">
				<!-- Header Icon mobile -->
				<div class="header-icons-mobile">
					<?php if(!isset($_SESSION['id_member'])) : ?>

						<a href="<?=base_url('login')?>">Login</a>

					<?php else : ?>
						<!-- <a href="#" class="header-wrapicon1 dis-block">
							<img src="<?=base_url()?>assets/images/icons/icon-header-01.png" class="header-icon1" alt="ICON">
						</a> -->

						<div class="header-wrapicon2">
						<img src="<?=base_url()?>assets/images/icons/icon-header-01.png" class="header-icon1 js-show-header-dropdown" alt="ICON">

						<!-- Header cart noti -->
						<div class="header-cart header-dropdown">
							<ul class="header-cart-wrapitem">

									<li class="header-cart-item">
										<a href="<?=base_url('profile')?>">My Profile</a>
									</li>

									<li class="header-cart-item">
										<a href="<?=base_url('login/logout')?>">Logout</a>
									</li>

							</ul>

						</div>
					</div>

					<?php endif; ?>

					<span class="linedivide2"></span>

					<div class="header-wrapicon2">
						<img src="<?=base_url()?>assets/images/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
						<span class="header-icons-noti">
							<div id="load_cart2"></div>
						</span>

						<!-- Header cart noti -->
						<div class="header-cart header-dropdown">
							<ul class="header-cart-wrapitem">
								<?php foreach($items as $x): ?>

									<li class="header-cart-item">
										<div class="header-cart-item-img">
											<img src="<?=base_url('uploads/product/'.$x['img'])?>" alt="IMG">
										</div>

										<div class="header-cart-item-txt">
											<a href="#" class="header-cart-item-name">
												<?=$x['name']?>
											</a>

											<span class="header-cart-item-info">
												<?=$x['qty']." x ".rupiah($x['price'])?>
											</span>
										</div>
									</li>

								<?php endforeach; ?>

							</ul>

							<div class="header-cart-total">
								Total: <?=$money." ".rupiah($total)?>
							</div>

							<div class="header-cart-buttons">
								<div class="header-cart-wrapbtn">
									<!-- Button -->
									<a href="<?=base_url('cart')?>" class="btn btn-info">
										View Cart
									</a>
								</div>

							</div>
						</div>
					</div>
				</div>

				<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
					<span class="hamburger-box">
						<span class="hamburger-inner"></span>
					</span>
				</div>
			</div>
		</div>

		<!-- Menu Mobile -->
		<div class="wrap-side-menu">
			<nav class="side-menu">
				<ul class="main-menu">

					<li class="item-topbar-mobile p-l-10">
						<div class="topbar-social-mobile">
							<a href="<?=$facebook?>" target="blank" class="topbar-social-item fa fa-facebook"></a>
							<a href="<?=$instagram?>" target="blank" class="topbar-social-item fa fa-instagram"></a>
							<a href="<?=$twitter?>" target="blank" class="topbar-social-item fa fa-twitter"></a>
							<a href="<?=$youtube?>" target="blank" class="topbar-social-item fa fa-youtube-play"></a>
							<a href="<?=$whatsapp?>" target="blank" class="topbar-social-item fa fa-whatsapp"></a>
						</div>
					</li>

					<li class="item-menu-mobile">
						<a href="<?=base_url()?>">Home</a>
					</li>

					<li class="item-menu-mobile">
						<a href="<?=base_url('shop')?>">Products</a>
					</li>

					<?php if(isset($_SESSION['id_member'])) : ?>

						<li class="item-menu-mobile">
							<a href="<?=base_url('cart')?>">Cart</a>
						</li>

					<?php endif; ?>

					<!-- <li class="item-menu-mobile">
						<a href="blog.html">Blog</a>
					</li> -->

					<li class="item-menu-mobile">
						<a href="<?=base_url('about')?>">About Us</a>
					</li>

					<li class="item-menu-mobile">
						<a href="<?=base_url('contact')?>">Contact Us</a>
					</li>

					<?php if(isset($_SESSION['id_member'])) : ?>

						<li class="item-menu-mobile">
							<a href="<?=base_url('history')?>">History Order</a>
						</li>

					<?php endif; ?>

				</ul>
			</nav>
		</div>
	</header>

	
  <div class="content-wrapper">

			<div class="flash-data" data-flashdata="<?= $this->session->flashdata('success') ?>"></div>
			<div class="flash-data2" data-flashdata="<?= $this->session->flashdata('error') ?>"></div>
			<div class="flash-data3" data-flashdata="<?= $this->session->flashdata('success2') ?>"></div>

      <?=$contents?>
  </div>

	<!-- Footer -->
	<footer class="bg6 p-t-45 p-b-43 p-l-45 p-r-45">

		<div class="t-center p-l-15 p-r-15 mt-3">
			
			<a href="#">
				<img class="h-size2" src="<?=base_url()?>assets/images/icons/visa.png" alt="IMG-VISA">
			</a>

			<a href="#">
				<img class="h-size2" src="<?=base_url()?>assets/images/icons/mastercard.png" alt="IMG-MASTERCARD">
			</a>

			<a href="#">
				<img class="h-size2" src="<?=base_url()?>assets/images/icons/express.png" alt="IMG-EXPRESS">
			</a>


			<div class="t-center s-text8 p-t-20">
				<?=$copyright?>
			</div>
		</div>
	</footer>



	<!-- Back to top -->
	<div class="btn-back-to-top bg0-hov" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="fa fa-angle-double-up" aria-hidden="true"></i>
		</span>
	</div>

	<div class="btn-back-to-top">
		<span class="symbol-btn-back-to-top">
			<i class="fa fa-whatsapp" aria-hidden="true"></i>
		</span>
	</div>

	<!-- Container Selection1 -->
	<div id="dropDownSelect1"></div>




<!--===============================================================================================-->
	<script type="text/javascript" src="<?=base_url()?>assets/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="<?=base_url()?>assets/vendor/bootstrap/js/popper.js"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="<?=base_url()?>assets/vendor/select2/select2.min.js"></script>
	<script type="text/javascript">
		$(".selection-1").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});

    $(".selection-2").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect2')
		});
	</script>
<!--===============================================================================================-->
	<script type="text/javascript" src="<?=base_url()?>assets/vendor/slick/slick.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="<?=base_url()?>assets/js/slick-custom.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="<?=base_url()?>assets/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="<?=base_url()?>assets/vendor/lightbox2/js/lightbox.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="<?=base_url()?>assets/vendor/daterangepicker/moment.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="<?=base_url()?>assets/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="<?=base_url()?>assets/vendor/sweetalert/sweetalert.min.js"></script>

	<script type="text/javascript">
		

		const flashData = $('.flash-data').data('flashdata');
		// console.log(flashData);

		if(flashData)
		{
			swal({
				// title: 'Selamat !!!',
				text: flashData+' Success Add To Cart',
				icon: 'success',
				timer: 3000
			});
		}

		const flashData2 = $('.flash-data2').data('flashdata');
		// console.log(flashData);

		if(flashData2)
		{
			swal({
				// title: 'Selamat !!!',
				text: flashData2,
				icon: 'error',
				timer: 3000
			});
		}

		const flashData3 = $('.flash-data3').data('flashdata');
		// console.log(flashData);

		if(flashData3)
		{
			swal({
				// title: 'Selamat !!!',
				text: flashData3,
				icon: 'success',
				timer: 3000
			});
		}

		// var auto_refresh = setInterval(
    // function () {
       $('#load_cart').load('<?=base_url('cart/count')?>');
       $('#load_cart2').load('<?=base_url('cart/count')?>');
    // }, 1000); // refresh setiap 1000 milliseconds

	</script>

<!--===============================================================================================-->
	<script src="<?=base_url()?>assets/js/main.js"></script>

</body>
</html>
