<div class="container">
  <div class="row">
    <div class="span12">
      <div class="widget ">
        <div class="widget-header">
          <i class="icon-tasks"></i>
          <h3>Thêm mới Phân loại</h3>
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
                      <input type="text" class="span6" name="name" value="<?php echo isset($_POST['name']) ? $_POST['name'] : "" ?>" placeholder="Phân loại...">
                      <span class="error"><?php echo form_error('name'); ?></span>
                      <?php 
                        if ($error) {
                          echo '<p class="error">'.$error.'</p>';
                        }
                       ?>
                    </div> <!-- /controls -->
                  </div> <!-- /control-group -->
                  <div class="control-group">
                    <label class="control-label">Title</label>
                    <div class="controls">
                      <input type="text" class="span6" name="title" value="<?php echo isset($_POST['title']) ? $_POST['title'] : "" ?>" placeholder="Tiêu đề...">
                      <span class="error"><?php echo form_error('title'); ?></span>
                    </div> <!-- /controls -->
                  </div> <!-- /control-group -->
                  <div class="control-group">
                    <label class="control-label">Status</label>
                    <div class="controls">
                      <select name="status">
                        <option value="1">Hiển thị</option>
                        <option value="2">Không hiển thị</option>
                      </select>
                    </div> <!-- /controls -->
                  </div> <!-- /control-group -->
                  <div class="control-group">
                    <label class="control-label">Category</label>
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
                              echo '<option value="'.$value['cate_id'].'">'.$name.'</option>';
                            }
                          }
                         ?>
                      </select>
                    </div> <!-- /controls -->
                  </div> <!-- /control-group -->
                  <div class="control-group">
                    <label class="control-label">Rewrite</label>
                    <div class="controls">
                      <textarea name="rewrite"></textarea>
                      <script type="text/javascript">
                        CKEDITOR.replace('rewrite');
                      </script>
                      <span class="error"><?php echo form_error('rewrite'); ?></span>
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