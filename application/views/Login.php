<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="<?= base_url('assets/image/favicon.ico')?>"/>
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/vendor/bootstrap/css/bootstrap.min.css')?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css')?>">
	<link rel="icon" type="image/png" href="<?= base_url('assets/image/favicon.ico')?>"/>
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/vendor/animate/animate.css')?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/vendor/css-hamburgers/hamburgers.min.css')?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/vendor/select2/select2.min.css')?>">
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/util.css')?>">
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/style.css')?>">
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url(<?=base_url('assets/image/c.png')?>); background-size: cover;">
			<div class="wrap-login100">
				<?php if (!empty($this->session->flashdata('error_login'))) :?>
        			<div class="alert alert-warning">
          			<p>Sorry, password and username wrong!! </p>
        			</div>
      				<?php endif ?>
				 <?= form_open('MyController/Login', ['method' => 'POST']) ?>
				<div class="login100-form validate-form">
					<div class="login100-pic js-tilt" data-tilt>
					<img src="<?= base_url('assets/image/icon-login.jpg')?>" alt="IMG">
				</div>
					<span class="login100-form-title">
						SIGN IN
						<p>Login to your account to start</p>
					</span>
					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="username" placeholder="Username">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="pass" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					<div class="text-center p-t-12">
						<a class="txt2" href="#">
							Forgot password?
						</a>
					</div>
					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Login
						</button>
					</div>
				</div>
				<?= form_close()?>
			</div>
		</div>
	</div>

	<script src="<?=base_url('assets/vendor/jquery/jquery-3.2.1.min.js')?>"></script>

	<script src="<?= base_url('assets/vendor/bootstrap/js/popper.js')?>"></script>
	<script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.min.js')?>"></script>

	<script src="<?= base_url('assets/vendor/select2/select2.min.js')?>"></script>

	<script src="<?= base_url('assets/vendor/tilt/tilt.jquery.min.js')?>"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="<?= base_url('assets/js/main.js')?>"></script>

</body>
</html>