<div class="container">
  <div class="row">
    <div class="span12">
      <div class="widget ">
        <div class="widget-header">
          <i class="icon-picture"></i>
          <h3>Cập nhật Slider</h3>
        </div> <!-- /widget-header -->
        <div class="widget-content">
          <div class="tabbable">
            <div class="tab-content">
              <div class="tab-pane active" id="formcontrols">
              <form id="edit-profile" class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                <fieldset>
                  <div class="control-group">
                    <label class="control-label">Tên</label>
                    <div class="controls">
                      <input type="text" class="span6" name="name" value="<?php echo $sliderEdit['name'] ?>" placeholder="Tên slider...">
                      <span class="error"><?php echo form_error('name'); ?></span>
                      <?php 
                        if (@$error) {
                          echo '<p class="error">'.$error.'</p>';
                        }
                       ?>
                    </div> <!-- /controls -->
                  </div> <!-- /control-group -->
                  <div class="control-group">
                    <label class="control-label">Status</label>
                    <div class="controls">
                      <select name="status">
                        <option value="1" <?php if ($sliderEdit['status'] == 1) echo 'selected = "selected"'; ?> >Hiển thị</option>
                        <option value="2" <?php if ($sliderEdit['status'] == 2) echo 'selected = "selected"'; ?> >Không hiển thị</option>
                      </select>
                    </div> <!-- /controls -->
                  </div> <!-- /control-group -->
                  <div class="control-group">
                    <label class="control-label">Mô tả</label>
                    <div class="controls">
                      <textarea name="description"><?php echo $sliderEdit['description'] ?></textarea>
                      <script type="text/javascript">
                        CKEDITOR.replace('description');
                      </script>
                      <span class="error"><?php echo form_error('description'); ?></span>
                    </div> <!-- /controls -->
                  </div> <!-- /control-group -->
                  <div class="control-group">
                    <label class="control-label">Bài viết</label>
                    <div class="controls">
                      <textarea name="rewrite"><?php echo $sliderEdit['rewrite'] ?></textarea>
                      <script type="text/javascript">
                        CKEDITOR.replace('rewrite');
                      </script>
                      <span class="error"><?php echo form_error('rewrite'); ?></span>
                    </div> <!-- /controls -->
                  </div> <!-- /control-group -->
                  <div class="control-group">
                    <label class="control-label">Ảnh</label>
                    <div class="controls">
                      <input type="file" name="image">
                      <?php 
                        if ($sliderEdit['images']) {
                          echo "<br>";
                          echo '<img src="'.base_url().'upload/slider/'.$sliderEdit['id'].'/'.$sliderEdit['images'].'" alt="'.$sliderEdit['images'].'" width="200">';
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