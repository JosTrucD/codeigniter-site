<div class="col-sm-9 padding-right">
	<div class="features_items"><!--features_items-->
		<h2 class="title text-center"><?php echo $title['cate_name'] ?></h2>
		<?php 
			if ($product) :
				foreach ($product as $valuePro) :
		 ?>
				<div class="col-sm-4">
					<div class="product-image-wrapper">
						<div class="single-products">
							<div class="productinfo text-center">
								<a href="<?php echo base_url() ?>" class="product-hover">
									<img class="tooltip" src="<?php echo base_url()."upload/product/".$valuePro['pro_id']."/".$valuePro['pro_image'] ?>" alt="<?php echo $valuePro['pro_image'] ?>" title="<?php echo $valuePro['pro_information'] ?>">
									<img src="<?php echo base_url()."upload/product/".$valuePro['pro_id']."/".$valuePro['pro_image'] ?>" with="288" height="288" alt="<?php echo $valuePro['pro_image'] ?>">
								</a>
								<!-- <h2><?php echo $valuePro['pro_price'] ?></h2> -->
								<p><?php echo $valuePro['pro_name'] ?></p>
							</div>
							<!-- <img src="<?php echo base_url() ?>public/maylocnuoc/images/home/new.png" class="new" alt="" /> -->
						</div>
						<div class="choose">
							<ul class="nav nav-pills nav-justified">
								<?php 
									$url = $this->string->replace($valuePro['pro_name']);
									$rewriteUrl = strtolower($url);
								 ?>
								<li><a href="<?php echo base_url().$rewriteUrl."-".$valuePro['pro_id'] ?>.html"><i class="fa fa-plus-square"></i>Chi tiết</a></li>
								<li><a href="#"><i class="fa fa-shopping-cart"></i>Đặt mua</a>
							</ul>
						</div>
					</div>
				</div>
		<?php 
				endforeach;
			endif;
		 ?>
	</div><!--features_items-->				
</div>