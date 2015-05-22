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
              <form id="edit-profile" class="form-horizontal" action="" method="post">
                <fieldset>
                  <div class="control-group">
                    <label class="control-label">Name</label>
                    <div class="controls">
                      <input type="text" class="span6" name="name" value="<?php echo isset($_POST['name']) ? $_POST['name'] : "" ?>" placeholder="Tên người dùng...">
                      <span class="error"><?php echo form_error('name'); ?></span>
                      <?php 
                        if ($errorName) {
                          echo '<p class="error">'.$errorName.'</p>';
                        }
                       ?>
                    </div> <!-- /controls -->
                  </div> <!-- /control-group -->
                  <div class="control-group">
                    <label class="control-label">Password</label>
                    <div class="controls">
                      <input type="password" class="span6" name="password" value="<?php echo isset($_POST['password']) ? $_POST['password'] : "" ?>" placeholder="Mật khẩu...">
                      <span class="error"><?php echo form_error('password'); ?></span>
                    </div> <!-- /controls -->
                  </div> <!-- /control-group -->
                  <div class="control-group">
                    <label class="control-label">Email</label>
                    <div class="controls">
                      <input type="text" class="span6" name="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : "" ?>" placeholder="Email...">
                      <span class="error"><?php echo form_error('email'); ?></span>
                    </div> <!-- /controls -->
                  </div> <!-- /control-group -->
                  <div class="control-group">
                    <label class="control-label">Address</label>
                    <div class="controls">
                      <input type="text" class="span6" name="address" value="<?php echo isset($_POST['address']) ? $_POST['address'] : "" ?>" placeholder="Địa chỉ...">
                      <span class="error"><?php echo form_error('address'); ?></span>
                    </div> <!-- /controls -->
                  </div> <!-- /control-group -->
                  <div class="control-group">
                    <label class="control-label">Lever</label>
                    <div class="controls">
                      <select name="lever">
                        <option value="1">Member</option>
                        <option value="2">Administrator</option>
                      </select>
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