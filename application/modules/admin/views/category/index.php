<form action="<?php echo base_url() ?>xoa-bo-phan-loai" method="post">
    <div class="container">
      <div class="row">
      <!-- Start Content  -->
        <div class="span6">
          <div class="widget widget-table action-table">
            <div class="widget-header"><i class="icon-th-list"></i>
              <h3>Phân loại</h3>
              <div class="pull-right" style="padding-right: 5px;">
                <a href="<?php echo base_url() ?>them-moi-phan-loai" class="btn btn-primary btn-xs">Insert</a>
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
                    <th style="text-align: center; width: %">Phân loại</th>
                    <th style="text-align: center; width: 15%">Status</th>
                    <th style="text-align: center; width: 5%"class="td-actions">Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                  $stt = 1;  
                  foreach ($category as $value) :
                 ?>
                  <tr>
                    <td style="text-align: center"><input type="checkbox" name="id[]" value="<?php echo $value['cate_id'] ?>"></td>
                    <td style="text-align: center"><?php echo $stt ?></td>
                    <?php 
                      $tab = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                      if ($value['lever'] == 1) {
                        $name = '<b>'.$value['cate_name'].'</b>';
                      } else {
                        for ($i=2; $i <= $value['lever']; $i++) { 
                          $tab = $tab.$tab;
                        }
                        $name = $tab.$value['cate_name'];
                      }
                     ?>
                    <td><?php echo $name ?></td>
                    <?php 
                      if ($value['cate_status'] == 1) {
                        echo '<td style="text-align: center">Hiển thị</td>';
                      } else {
                        echo '<td style="text-align: center">Không hiển thị</td>';
                      }
                     ?>
                    <td style="text-align:center" class="td-actions">
                      <a href="<?php echo base_url()."cap-nhat-phan-loai/".$value['cate_id'] ?>.html" class="btn btn-info" title="Edit">Edit</a>
                    </td>
                  </tr>
                <?php 
                  $stt++;
                  endforeach;
                  if (empty($category)) {
                    echo '<tr><td style="text-align: center; color: red;" colspan="5">Data empty !</td></tr>';
                  }
                 ?>
                </tbody>
              </table>
            </div>
            <!-- /widget-content --> 
          </div>
        </div>
        <!-- /span6 --> 
      </div><!-- /row -->
    </div>
    <!-- /container --> 
</form>