<div class="col-sm-9 padding-right">
	<div class="product-details"><!--product-details-->
		<div class="col-sm-5">
			<div class="view-product">
				<a href="" title="">
					<img src="<?php echo base_url()."upload/product/".$product['pro_id']."/".$product['pro_image'] ?>" alt="<?php echo $product['pro_image'] ?>" title="<?php echo $product['pro_name'] ?>" />
				</a>
			</div>
			<div id="similar-product" class="carousel slide" data-ride="carousel">
				
				  <!-- Wrapper for slides -->
				    <div class="carousel-inner">
						<div class="item active">
							<?php 
								// if ($this->data['image']) {
								// 	foreach ($this->data['image'] as $valueImage) {
								// 		echo '<a href=""><img src="'.base_url().'upload/product/images/'.$product['pro_id'].'/'.$valueImage['image'].'" alt="'.$valueImage['image'].'" title="'.$product['pro_name'].'" width="85" height="84"></a>';
								// 	}
								// }
							 ?>
						</div>
						<div class="item">
							<?php 
								// if ($this->data['image']) {
								// 	foreach ($this->data['image'] as $valueImage) {
								// 		echo '<a href=""><img src="'.base_url().'upload/product/images/'.$product['pro_id'].'/'.$valueImage['image'].'" alt="'.$valueImage['image'].'" title="" width="85" height="84"></a>';
								// 	}
								// }
							 ?>
						</div>
					</div>

				  <!-- Controls -->
				  <a class="left item-control" href="#similar-product" data-slide="prev">
					<i class="fa fa-angle-left"></i>
				  </a>
				  <a class="right item-control" href="#similar-product" data-slide="next">
					<i class="fa fa-angle-right"></i>
				  </a>
			</div>

		</div>
		<div class="col-sm-7">
			<div class="product-information"><!--/product-information-->
				<h2><?php echo $product['pro_name'] ?></h2>
				<p>Model: <?php echo $product['pro_id'] ?></p>
				<span>
					<!-- <span>Giá tiền: Quý khách vui lòng gọi tới <b>0904 501 820</b> để được tư vấn và báo giá cụ thể cho từng sản phẩm</span> -->
					<a href="#" class="btn btn-fefault cart">
						<i class="fa fa-shopping-cart"></i>
						Đặt mua
					</a>
				</span>
				<hr>
				<?php echo $product['pro_information'] ?>
			</div><!--/product-information-->
		</div>
	</div><!--/product-details-->
	
	<div class="category-tab shop-details-tab"><!--category-tab-->
		<div class="col-sm-12">
			<ul class="nav nav-tabs">
				<li class="active"><a href="#details" data-toggle="tab">Thông tin chi tiết</a></li>
			</ul>
		</div>
		<div class="tab-content">
			<div class="tab-pane fade active in" id="reviews" >
				<div class="col-sm-12">
					<ul>
						<li><a href=""><i class="fa fa-user"></i><?php echo $product['pro_user'] ?></a></li>
						<li><a href=""><i class="fa fa-clock-o"></i><?php $date = $product['pro_create_date']; $time = date('h:i p',strtotime($date)); echo $time; ?></a></li>
						<li><a href=""><i class="fa fa-calendar-o"></i><?php $date = date('d-m-y',strtotime($date)); echo $date; ?></a></li>
					</ul>
					<?php echo $product['pro_rewrite'] ?>
					<p><b>Nhận xét</b></p>
					<br>
					<div class="fb-comments" data-href="http://dailymaylocnuoc.com/" data-width="100%" data-numposts="10" data-colorscheme="light"></div>
				</div>
			</div>
		</div>
	</div><!--/category-tab-->
</div>