<form action="<?php echo base_url(); ?>xoa-bo-nguoi-dung" method="post">
	<div class="container">
	  <div class="row">
	  <!-- Start Content  -->
	    <div class="span6">
			<div class="widget widget-table action-table">
				<div class="widget-header"><i class="icon-user"></i>
				  <h3>Người dùng</h3>
				  <div class="pull-right" style="padding-right: 5px;">
				    <a href="<?php echo base_url(); ?>them-moi-nguoi-dung" class="btn btn-primary btn-xs">Insert</a>
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
				        <th style="width:25%; text-align:center;">Name</th>
				        <th style="width:%; text-align:center;">Email</th>
				        <th style="width:13%; text-align:center;">Address</th>
				        <th style="width:13%; text-align:center;">Lever</th>
				        <th style="width:5%; text-align:center;" class="td-actions">Action</th>
				      </tr>
				    </thead>
				    <tbody>
				    <?php 
				    	if ($user) {
				    		$stt = 1;
				    		foreach ($user as $value) :
				     ?>
				      <tr>
				        <td style="text-align:center;"><input type="checkbox" name="id[]" value="<?php echo $value['id'] ?>"></td>
				        <td style="text-align:center;"><?php echo $stt; ?></td>
				        <td style="text-align:center;"><?php echo $value['name'] ?></td>
				        <td style="text-align:center;"><?php echo $value['email'] ?></td>
				        <td style="text-align:center;"><?php echo $value['address'] ?></td>
				    <?php 
				    	if ($value['lever'] == 2) {
				    		echo '<td style="text-align:center;">Administrator</td>';
				    	} else {
				    		echo '<td style="text-align:center;">Member</td>';
				    	}
				     ?>
				        <td style="text-align:center;" class="td-actions"><a href="<?php echo base_url()."cap-nhat-nguoi-dung/".$value['id'] ?>.html" class="btn btn-info">Edit</a></td>
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