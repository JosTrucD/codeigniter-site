<form action="<?php echo base_url(); ?>xoa-bo-san-pham" method="post">
	<div class="container">
	  <div class="row">
	  <!-- Start Content  -->
	    <div class="span6">
			<div class="widget widget-table action-table">
				<div class="widget-header"><i class="icon-shopping-cart"></i>
				  <h3>Sản phẩm</h3>
				  <div class="pull-right" style="padding-right: 5px;">
				    <a href="<?php echo base_url(); ?>them-moi-san-pham" class="btn btn-primary btn-xs">Insert</a>
                	<input type="submit" value="Delete" name="delete" class="btn btn-danger" onclick="return show_confirm();">
				  </div>
				</div>
				<!-- /widget-header -->
				<div class="widget-content">
				  <table class="table table-striped table-bordered">
				    <thead>
				      <tr>
				        <th style="width:4%; text-align:center;"></th>
				        <th style="width:4%; text-align:center;">Stt</th>
				        <th style="width:5%; text-align:center;">Ảnh</th>
				        <th style="width:%; text-align:center;">Tên sản phẩm</th>
				        <th style="width:10%; text-align:center;">Giá</th>
				        <th style="width:10%; text-align:center;">Tài khoản</th>
				        <th style="width:10%; text-align:center;">Ngày tạo</th>
				        <th style="width:10%; text-align:center;">Ngày cập nhật</th>
				        <th style="width:10%; text-align:center;">Tình trạng</th>
				        <th style="width:5%; text-align:center;" class="td-actions">Action</th>
				      </tr>
				    </thead>
				    <tbody>
				    <?php 
				    	if ($product) {
				    		$stt = 1;
				    		foreach ($product as $value) :
				     ?>
				      <tr>
				        <td style="text-align:center;"><input type="checkbox" name="id[]" value="<?php echo $value['pro_id'] ?>"></td>
				        <td style="text-align:center;"><?php echo $stt; ?></td>				        
				        <?php 
				        	if ($value['pro_image']) {
				        		echo '<td style="text-align:center;"><img src="'.base_url().'upload/product/'.$value['pro_id'].'/'.$value['pro_image'].'" alt="'.$value['pro_image'].'" title="'.$value['pro_image'].'" width="100"></td>';
				        	} else {
				        		echo '<td style="text-align:center;"><img src="'.base_url().'upload/no_image.jpg" alt="no_image.jpg" title="No image" width="100"></td>';
				        	}
				         ?>
				        <td style="text-align:center;"><?php echo $value['pro_name'] ?></td>
				        <td style="text-align:center;"><?php echo $value['pro_price'] ?></td>
				        <td style="text-align:center;"><?php echo $value['pro_user'] ?></td>
				        <td style="text-align:center;"><?php echo $value['pro_create_date'] ?></td>
				        <td style="text-align:center;"><?php echo $value['pro_update_date'] ?></td>
				    <?php 
				    	if ($value['pro_status'] == 1) {
				    		echo '<td style="text-align:center;">Hiển thị</td>';
				    	} else {
				    		echo '<td style="text-align:center;">Không hiển thị</td>';
				    	}
				     ?>
				        <td style="text-align:center;" class="td-actions"><a href="<?php echo base_url()."cap-nhat-san-pham/".$value['pro_id'] ?>.html" class="btn btn-info">Edit</a></td>
				      </tr>
				    <?php 
				    		$stt++;
				    		endforeach;
				      	} else {
				        	echo '<tr><td style="text-align: center; color: red;" colspan="10">Data empty !</td></tr>';
				      	}
				     ?>
				    </tbody>
				  </table>
				</div>
				<!-- /widget-content --> 
				<div id="pagination">
					<ul class="tsc_pagination">
					<!-- Show pagination links -->
					<?php foreach ($links as $link)	echo "<li>". $link."</li>"; ?>
				</div>
			</div>
	    </div>
	    <!-- /span6 --> 
	  </div><!-- /row -->
	   
	</div>
<!-- /container --> 
</form>