<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Login - Bootstrap Admin Template</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes"> 
	<link href="<?php echo base_url(); ?>public/admin/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url(); ?>public/admin/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url(); ?>public/admin/css/font-awesome.css" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
	<link href="<?php echo base_url(); ?>public/admin/css/style.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url(); ?>public/admin/css/pages/signin.css" rel="stylesheet" type="text/css">
</head>
<body>
	<div class="navbar navbar-fixed-top">
	<div class="navbar-inner">
		<div class="container">
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>
			<a class="brand" href="">
				Administrator				
			</a>
			<div class="nav-collapse">
				<ul class="nav pull-right">
					<li class="">						
						<a href="" class="">
							Don't have an account ?
						</a>
					</li>
					<li class="">						
						<a href="" class="">
							<i class="icon-chevron-left"></i>
							Back to Homepage
						</a>
					</li>
				</ul>
			</div><!--/.nav-collapse -->	
		</div> <!-- /container -->
	</div> <!-- /navbar-inner -->
</div> <!-- /navbar -->
<div class="account-container">
	<div class="content clearfix">
		<form action="" method="post">
			<h1>Login From</h1>		
			<div class="login-fields">
				<p>Please provide your details</p>
				<div class="field">
					<label for="username">Username</label>
					<input type="text" id="name" name="name" value="<?php echo isset($_POST['name']) ? $_POST['name'] : "" ?>" placeholder="Username" class="login username-field" />
				</div> <!-- /field -->
				<span class="error"><?php echo form_error('name'); ?></span>
				<div class="field">
					<label for="password">Password</label>
					<input type="password" id="password" name="password" value="<?php echo isset($_POST['password']) ? $_POST['password'] : "" ?>" placeholder="Password" class="login password-field"/>
				</div> <!-- /password -->
				<span class="error"><?php echo form_error('password'); ?></span>
				<?php 
					if (@$error) {
						echo '<p class="error">'.$error.'</p>';
					}
				 ?>
			</div> <!-- /login-fields -->
			<div class="login-actions">
				<span class="login-checkbox">
					<input id="Field" name="Field" type="checkbox" class="field login-checkbox" value="First Choice" tabindex="4" />
					<label class="choice" for="Field">Keep me signed in</label>
				</span>		
				<button type="submit" class="button btn btn-success btn-large" name="submit">Sign In</button>
			</div> <!-- .actions -->
		</form>
		
	</div> <!-- /content -->
	
</div> <!-- /account-container -->
<div class="login-extra">
	<a href="">Reset Password</a>
</div> <!-- /login-extra -->
<script src="<?php echo base_url(); ?>public/admin/js/jquery-1.7.2.min.js"></script>
<script src="<?php echo base_url(); ?>public/admin/js/bootstrap.js"></script>
<script src="<?php echo base_url(); ?>public/admin/js/signin.js"></script>
</body>
</html>