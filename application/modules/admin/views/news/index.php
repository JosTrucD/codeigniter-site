<form action="<?php echo base_url() ?>xoa-bo-bai-viet" method="post">
    <div class="container">
      <div class="row">
      <!-- Start Content  -->
        <div class="span6">
          <div class="widget widget-table action-table">
            <div class="widget-header"><i class="icon-pencil"></i>
              <h3>Bài viết</h3>
              <div class="pull-right" style="padding-right: 5px;">
                <a href="<?php echo base_url() ?>them-moi-bai-viet" class="btn btn-primary btn-xs">Insert</a>
                <input type="submit" value="Delete" name="delete" class="btn btn-danger" onclick="return show_confirm();">
              </div>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th style="text-align: center; width: 4%"></th>
                    <th style="text-align: center; width: 4%">Stt</th>
                    <th style="text-align: center; width: %">Bài viết</th>
                    <th style="text-align: center; width: 12%">Người viết</th>
                    <th style="text-align: center; width: 12%">Ngày</th>
                    <th style="text-align: center; width: 12%">Status</th>
                    <th style="text-align: center; width: 5%"class="td-actions">Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                  $stt = 1;  
                  foreach ($news as $value) :
                 ?>
                  <tr>
                    <td style="text-align: center"><input type="checkbox" name="id[]" value="<?php echo $value['id'] ?>"></td>
                    <td style="text-align: center"><?php echo $stt ?></td>
                    <td><?php echo $value['name'] ?></td>
                    <td style="text-align: center"><?php echo $value['user'] ?></td>
                    <td style="text-align: center"><?php echo $value['date'] ?></td>
                    <?php 
                      if ($value['status'] == 1) {
                        echo '<td style="text-align: center">Hiển thị</td>';
                      } else {
                        echo '<td style="text-align: center">Không hiển thị</td>';
                      }
                     ?>
                    <td style="text-align:center" class="td-actions">
                      <a href="<?php echo base_url()."cap-nhat-bai-viet/".$value['id'] ?>.html" class="btn btn-info" title="Edit">Edit</a>
                    </td>
                  </tr>
                <?php 
                  $stt++;
                  endforeach;
                  if (empty($news)) {
                    echo '<tr><td style="text-align: center; color: red;" colspan="8">Data empty !</td></tr>';
                  }
                 ?>
                </tbody>
              </table>
            </div>
            <!-- /widget-content --> 
            <div id="pagination">
              <ul class="tsc_pagination">
              <!-- Show pagination links -->
              <?php foreach ($links as $link) echo "<li>". $link."</li>"; ?>
            </div>
          </div>
        </div>
        <!-- /span6 --> 
      </div><!-- /row -->
    </div>
    <!-- /container --> 
</form>