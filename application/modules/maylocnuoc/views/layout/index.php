<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Đại lý máy lọc nước - Bán máy lọc nước các loại">
    <meta name="author" content="JosT">
    <meta property="fb:app_id" content="1489995757957402" />
	<meta property="fb:admins" content="100002691949233"/>
    <title>Đại lý máy lọc nước - Cung cấp các loại máy lọc nước</title>
    <link href="<?php echo base_url() ?>public/maylocnuoc/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>public/maylocnuoc/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>public/maylocnuoc/css/prettyPhoto.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>public/maylocnuoc/css/price-range.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>public/maylocnuoc/css/animate.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>public/maylocnuoc/css/main.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>public/maylocnuoc/css/responsive.css" rel="stylesheet">
    <!-- Tooltip css -->
	<link href="<?php echo base_url() ?>public/maylocnuoc/css/tooltip.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
	<!-- Icon website -->
	<link rel="shortcut icon" href="<?php echo base_url() ?>public/maylocnuoc/images/ico/avatar.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i> +84 904 50 1820</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i> maylocnuocgl@gmail.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="<?php echo base_url() ?>trang-chu"><img src="<?php echo base_url() ?>public/maylocnuoc/images/home/logo.png" alt="" /></a>
						</div>
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								<li><a href="#"><i class="fa fa-user"></i> Account</a></li>
								<li><a href="#"><i class="fa fa-star"></i> Wishlist</a></li>
								<li><a href="#"><i class="fa fa-crosshairs"></i> Checkout</a></li>
								<li><a href="#"><i class="fa fa-shopping-cart"></i> Cart</a></li>
								<li><a href="#"><i class="fa fa-lock"></i> Login</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="<?php echo base_url() ?>trang-chu">Home</a></li>
								<li><a href="<?php echo base_url() ?>tin-tuc">Tin tức</a></li>
								<li><a href="<?php echo base_url() ?>gioi-thieu">Giới thiệu</a></li>
								<li><a href="<?php echo base_url() ?>lien-he">Liên hệ</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="search_box pull-right">
							<input type="text" placeholder="Search"/>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
	
	
	<?php
		if (@$block) {
			$this->load->view($block);
		} else {
	 ?>
	<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
							<li data-target="#slider-carousel" data-slide-to="3"></li>
						</ol>
						<div class="carousel-inner">
						<?php 
							if ($slider) {
								foreach ($slider as $valueSlider) {

						 ?>
							<div class="item">
								<div class="col-sm-6">
									<h2><?php echo $valueSlider['name'] ?></h2>
									<p><?php echo $valueSlider['description'] ?></p>
									<button type="button" class="btn btn-default">Xem thêm</button>
								</div>
								<div class="col-sm-6">
									<img src="<?php echo base_url()."upload/slider/".$valueSlider['id']."/".$valueSlider['images'] ?>" class="girl img-responsive" alt="" />
								</div>
							</div>
						 <?php 
								}
							}
						  ?>
						</div>						
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>					
				</div>
			</div>
		</div>
	</section><!--/slider-->
	
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<div class="brands_products"><!--brands_products-->
						<?php 
							if ($category) :
								foreach ($category as $key => $valueCate) :
									if ($valueCate['lever'] == 1) {
										echo '<h2>'.$valueCate['cate_name'].'</h2>';
						?>
						<?php
									} else {
										$name = $valueCate['cate_name']; 
										$url        = $this->string->replace($valueCate['cate_name']);
										$rewriteUrl = strtolower($url);
						 ?>
							<div class="brands-name">
								<ul class="nav nav-pills nav-stacked">
									<li><a href="<?php echo base_url()."may-loc-nuoc/".$rewriteUrl."-".$valueCate['cate_id'] ?>.html"> <span class="pull-right"></span><?php echo $name ?></a></li>
								</ul>
							</div>
						<?php 
									}
								endforeach;
							endif 
						 ?>
						</div><!--/brands_products-->					
					</div>
				</div>
				<?php if (@$template) $this->load->view($template); ?>
			</div>
		</div>
	</section>
	<?php } ?>
	<footer id="footer"><!--Footer-->
		<div class="footer-top">
			<div class="container">
				<div class="row">
						<p>
							<span>Miễn phí giao hàng trong nội thành Hà Nội</span>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Đại lý cung cấp các loại máy lọc nước ...						</p>
						<a href="#"
							class="btn btn-default" title="Xem thêm">Xem thêm</a>
				</div>
			</div>
		</div>
		
		<div class="footer-widget">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Giới thiệu</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="<?php echo base_url() ?>gioi-thieu">Đại lý máy lọc nước</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Hướng dẫn chung</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="<?php echo base_url() ?>huong-dan-mua-hang">Hướng dẫn mua hàng</a></li>
								<li><a href="">Hình thức thanh toán</a></li>
								<li><a href="">Chính sách bảo hành</a></li>
								<li><a href="">Chính sách đổi, trả lại hàng và hoàn tiền</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Sản phẩm & dịch vụ</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="">Máy lọc nước</a></li>
								<li><a href="">Phụ kiện</a></li>
								<li><a href="">Sửa chữa, thay mới</a></li>
								<li><a href=""></a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Thông tin liên hệ</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><p>[A] Số 801 Nguyễn Đức Thuận - Trâu Quỳ - Gia Lâm - Hà Nội</p></li>
								<li><p>[T] +84 436 76 3616</p></li>
								<li><p>[N] +84 904 50 1820</p></li>
								<li><p>[W] www.dailymaylocnuoc.com</p></li>
								<li><p>[E] maylocnuocgl@gmail.com</p></li>
							</ul>
						</div>
					</div>					
				</div>
			</div>
		</div>
		
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © 2015 dailymaylocnuoc.com  All rights reserved.</p>
					<p class="pull-right">Hotline <i class="fa fa-phone"></i> +84 436 76 3616</p>
				</div>
			</div>
		</div>
		
	</footer><!--/Footer-->  
    <script src="<?php echo base_url() ?>public/maylocnuoc/js/jquery.js"></script>
	<script src="<?php echo base_url() ?>public/maylocnuoc/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url() ?>public/maylocnuoc/js/jquery.scrollUp.min.js"></script>
	<script src="<?php echo base_url() ?>public/maylocnuoc/js/price-range.js"></script>
    <script src="<?php echo base_url() ?>public/maylocnuoc/js/jquery.prettyPhoto.js"></script>
    <script src="<?php echo base_url() ?>public/maylocnuoc/js/main.js"></script>
    <!-- Tooltip js -->
    <script src="<?php echo base_url() ?>public/maylocnuoc/js/tooltip.js"></script>
    <script>
    	$(document).ready(function(){
	    	$('.item').eq(0).addClass('active');
	         $(".tooltip").simpletooltip();
	    });
    </script>
    <div id="fb-root"></div>
	<script>
		(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.3&appId=1489995757957402";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
	</script>
	<!-- Google map -->
	<script src="http://maps.googleapis.com/maps/api/js"></script>

	<script>
		function initialize() {
		  var mapProp = {
		    center:new google.maps.LatLng(51.508742,-0.120850),
		    zoom:5,
		    mapTypeId:google.maps.MapTypeId.ROADMAP
		  };
		  var map=new google.maps.Map(document.getElementById("googleMap"), mapProp);
		}
		google.maps.event.addDomListener(window, 'load', initialize);
	</script>
</body>
</html>