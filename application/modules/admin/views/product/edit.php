<div class="container">
  <div class="row">
    <div class="span12">
      <div class="widget ">
        <div class="widget-header">
          <i class="icon-user"></i>
          <h3>Thêm mới Người dùng</h3>
        </div> <!-- /widget-header -->
        <div class="widget-content">
          <div class="tabbable">
            <div class="tab-content">
              <div class="tab-pane active" id="formcontrols">
              <form id="edit-profile" class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                <fieldset>
                  <legend>Thông tin chung</legend>
                  <div class="control-group">
                    <label class="control-label">Tên sản phẩm</label>
                    <div class="controls">
                      <input type="text" class="span6" name="name" value="<?php echo $productEdit['pro_name'] ?>" placeholder="Tên sản phẩm...">
                      <span class="error"><?php echo form_error('name'); ?></span>
                      <?php 
                        if ($error) {
                          echo '<p class="error">'.$error.'</p>';
                        }
                       ?>
                    </div> <!-- /controls -->
                  </div> <!-- /control-group -->
                  <div class="control-group">
                    <label class="control-label">Giá sản phẩm</label>
                    <div class="controls">
                      <input type="text" class="span6" name="price" value="<?php echo $productEdit['pro_price'] ?>" placeholder="Giá sản phẩm...">
                      <span class="error"><?php echo form_error('price'); ?></span>
                    </div> <!-- /controls -->
                  </div> <!-- /control-group -->
                  <div class="control-group">
                    <label class="control-label">Tình trạng</label>
                    <div class="controls">
                      <select name="status">
                        <option value="1" <?php if ($productEdit['pro_status'] == 1) echo 'selected = "selected"'; ?> >Hiển thị</option>
                        <option value="2" <?php if ($productEdit['pro_status'] == 2) echo 'selected = "selected"'; ?> >Không hiển thị</option>
                      </select>
                    </div> <!-- /controls -->
                  </div> <!-- /control-group -->
                  <div class="control-group">
                    <label class="control-label">Thông tin sản phẩm</label>
                    <div class="controls">
                      <textarea name="info"><?php echo $productEdit['pro_information'] ?></textarea>
                      <script type="text/javascript">
                        CKEDITOR.replace('info');
                      </script>
                      <span class="error"><?php echo form_error('info'); ?></span>
                    </div> <!-- /controls -->
                  </div> <!-- /control-group -->
                  <div class="control-group">
                    <label class="control-label">Bài viết</label>
                    <div class="controls">
                      <textarea name="rewrite"><?php echo $productEdit['pro_rewrite'] ?></textarea>
                      <script type="text/javascript">
                        CKEDITOR.replace('rewrite');
                      </script>
                      <span class="error"><?php echo form_error('rewrite'); ?></span>
                    </div> <!-- /controls -->
                  </div> <!-- /control-group -->
                  <legend>Phân loại sản phẩm</legend>
                  <div class="control-group">
                    <label class="control-label">Phân loại</label>
                    <div class="controls">
                      <?php
	                    $checked = "";
	                    if ($categories) {
	                      foreach ($categories as $valueCate) {
	                        $tab = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
	                        $disabled = "";
	                        if ($valueCate['lever'] == 1) {
	                          $name = '<b>'.$valueCate['cate_name'].'</b>';
	                          $disabled = "disabled";
	                        } else {
	                          for ($i=2; $i <= $valueCate['lever']; $i++) { 
	                            $tab = $tab.$tab;
	                          }
	                          $name = $tab.$valueCate['cate_name'];
	                        }
	                        if ($category) {
	                          foreach ($category as $valueCatePro) {
	                            if ($valueCatePro['cate_id'] == $valueCate['cate_id']) {
	                              $checked = "checked"; break;
	                            } else {
	                              $checked = "";
	                            }
	                          }
	                        }
	                        echo '<input '.$checked.$disabled.' type="checkbox" name="category[]" value="'.$valueCate['cate_id'].'" style="margin-left: 150px;"> '.$name.'<br>';
	                      }
	                    }
                       ?>
                    </div> <!-- /controls -->
                  </div> <!-- /control-group -->
                  <legend>Ảnh sản phẩm</legend>
                  <div class="control-group">
                    <label class="control-label">Ảnh đại diện</label>
                    <div class="controls">
                      <input type="file" name="image">
                      <?php 
                        if ($productEdit['pro_image']) {
                          echo "<br>";
                          echo '<img src="'.base_url().'upload/product/'.$productEdit['pro_id'].'/'.$productEdit['pro_image'].'" alt="'.$productEdit['pro_image'].'" width="200">';
                        }
                       ?>
                    </div> <!-- /controls -->
                  </div> <!-- /control-group -->
                  <div class="control-group">
                    <label class="control-label">Ảnh sản phẩm</label>
                    <div class="controls">
                      <input type="file" name="images[]" multiple="multiple">
                      <?php 
                        if ($images) {
							echo "<br>";
							foreach ($images as $value) {
								echo '<img src="'.base_url().'upload/product/images/'.$productEdit['pro_id'].'/'.$value['image'].'" alt="'.$value['image'].'" width="100">';
							}
                        }
                       ?>
                    </div> <!-- /controls -->
                  </div> <!-- /control-group -->
                  <div class="form-actions">
                    <input type="submit" name="submit" value="Save" class="btn btn-primary">
                    <input type="reset" name="reset" value="Cancel" class="btn">
                  </div> <!-- /form-actions -->
                </fieldset>
              </form>
              </div>
            </div>
          </div>
        </div> <!-- /widget-content -->
      </div> <!-- /widget -->
    </div> <!-- /span8 -->
  </div> <!-- /row -->
</div> <!-- /container -->