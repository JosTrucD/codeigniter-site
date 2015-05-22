<div class="container">
  <div class="row">
    <div class="span12">
      <div class="widget ">
        <div class="widget-header">
          <i class="icon-tasks"></i>
          <h3>Cập nhật Phân loại</h3>
        </div> <!-- /widget-header -->
        <div class="widget-content">
          <div class="tabbable">
            <div class="tab-content">
              <div class="tab-pane active" id="formcontrols">
              <form id="edit-profile" class="form-horizontal" action="" method="post">
                <fieldset>
                  <div class="control-group">
                    <label class="control-label">Name</label>
                    <div class="controls">
                      <input type="text" class="span6" name="name" value="<?php echo $categoryEdit['cate_name'] ?>" placeholder="Phân loại...">
                      <?php
                        if (@$errorName) {
                          echo '<p class="help-block">'.$errorName.'</p>';
                        }
                       ?>
                    </div> <!-- /controls -->
                  </div> <!-- /control-group -->
                  <div class="control-group">
                    <label class="control-label">Title</label>
                    <div class="controls">
                      <input type="text" class="span6" name="title" value="<?php echo $categoryEdit['cate_title'] ?>" placeholder="Tiêu đề...">
                    </div> <!-- /controls -->
                  </div> <!-- /control-group -->
                  <div class="control-group">
                    <label class="control-label">Status</label>
                    <div class="controls">
                      <select name="status">
                        <option value="1"<?php if ($categoryEdit['cate_status'] == 1) { echo "selected ='selected'"; } ?> >Hiển thị</option>
                        <option value="2"<?php if ($categoryEdit['cate_status'] == 2) { echo "selected ='selected'"; } ?> >Không hiển thị</option>
                      </select>
                    </div> <!-- /controls -->
                  </div> <!-- /control-group -->
                  <div class="control-group">
                    <label class="control-label">Category Parent</label>
                    <div class="controls">
                      <select name="parent">
                        <option value="0">Category parent</option>
                        <?php 
                          if ($category) {
                            foreach ($category as $value) {
                              $tab = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                              if ($value['lever'] == 1) {
                                $name = $value['cate_name'];
                              } else {
                                for ($i=2; $i <= $value['lever']; $i++) { 
                                  $tab = $tab.$tab;
                                }
                                $name = $tab.$value['cate_name'];
                              }
                              $selected = "";
                              if ($value['cate_id'] == $categoryEdit['cate_parent']) {
                                $selected = "selected";
                              }
                              echo '<option '.$selected.' value="'.$value['cate_id'].'">'.$name.'</option>';
                            }
                          }
                         ?>
                      </select>
                    </div> <!-- /controls -->
                  </div> <!-- /control-group -->
                  <div class="control-group">
                    <label class="control-label">Rewrite</label>
                    <div class="controls">
                      <textarea name="rewrite"><?php echo $categoryEdit['cate_rewrite'] ?></textarea>
                      <script type="text/javascript">
                        CKEDITOR.replace('rewrite');
                      </script>
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