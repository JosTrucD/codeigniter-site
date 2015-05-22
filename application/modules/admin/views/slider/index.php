<form action="<?php echo base_url(); ?>xoa-bo-slider" method="post">
	<div class="container">
	  <div class="row">
	  <!-- Start Content  -->
	    <div class="span6">
	      <div class="widget widget-table action-table">
	        <div class="widget-header"><i class="icon-picture"></i>
	          <h3>Slider</h3>
	          <div class="pull-right" style="padding-right: 5px;">
	            <a href="<?php echo base_url(); ?>them-moi-slider" class="btn btn-primary btn-xs">Insert</a> 
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
	                <th style="width:5%; text-align:center;">Images</th>
	                <th style="width:%; text-align:center;">Name</th>
	                <th style="width:%; text-align:center;">Description</th>
	                <th style="width:10%; text-align:center;">Status</th>
	                <th style="width:5%; text-align:center;" class="td-actions">Action</th>
	              </tr>
	            </thead>
	            <tbody>
	            <?php 
	            	if ($slider) {
	            		$stt = 1;
	            		foreach ($slider as $value) :
	             ?>
	              <tr>
	                <td style="text-align:center;"><input type="checkbox" name="id[]" value="<?php echo $value['id'] ?>"></td>
	                <td style="text-align:center;"><?php echo $stt; ?></td>
	                <?php 
	                	if ($value['images'] == null) {
	                		echo '<td style="text-align:center;"><img src="'.base_url().'upload/no_image.jpg" width="100" alt="no_image.jpg" title="No image"></td>';
	                	} else {
	                		echo '<td style="text-align:center;"><img src="'.base_url().'upload/slider/'.$value['id'].'/'.$value['images'].'" width="100" alt="'.$value['images'].'" title="'.$value['images'].'"></td>';
	                	}
	                 ?>
	                <td style="text-align:center;"><?php echo $value['name'] ?></td>
	                <td style="text-align:center;"><?php echo $value['description'] ?></td>
	            <?php 
	            	if ($value['status'] == 1) {
	            		echo '<td style="text-align:center;">Hiển thị</td>';
	            	} else {
	            		echo '<td style="text-align:center;">Không hiển thị</td>';
	            	}
	             ?>
	                <td style="text-align:center;" class="td-actions"><a href="<?php echo base_url()."cap-nhat-slider/".$value['id'] ?>.html" class="btn btn-info">Edit</a></td>
	              </tr>
	            <?php 
	            		$stt++;
	            		endforeach;
                  	} else {
                    	echo '<tr><td style="text-align: center; color: red;" colspan="7">Data empty !</td></tr>';
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