<!DOCTYPE html>
<html>
<head>
	<title>MyLaundry</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="<?= base_url('assets/image/favicon.ico')?>"/>
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/vendor/bootstrap/css/bootstrap.min.css')?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css')?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/vendor/animate/animate.css')?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/vendor/css-hamburgers/hamburgers.min.css')?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/vendor/select2/select2.min.css')?>">
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/util.css')?>">
	<style type="text/css">
		body{
			background-image: url(<?= base_url('assets/image/bg-lagi.png')?>);
			background-size: cover;
			width: 100%;
			background-repeat: no-repeat;
		}
		a{
			text-decoration: none;
			color: #fff;
		}
		button{
			background:#27DEC0;
			color: #fff;
			border-radius: 20px;
			width: 30%;
			height: 50px;
			cursor: pointer;
			font-weight: bold;
			border: none;
		}
		button:hover{
			width: 32%;
			height: 53px;
			transition: 0.3s;
		}
		a:hover{
			text-decoration: none;
			color: #fff;
		}

	</style>
</head>
<body>
	<div class="container">
			<div class="icon"><img src="<?= base_url('assets/image/lagi1.png')?>" style="width: 550px; float: right; margin-top: 180px;" >
			</div>
			<div style="margin-top: 230px; position: absolute;" >
				<h1>Welcome,</h1><br>
				<p>Mylaundry is a laundry service management application. You don't <br> need to calculate and record customer data. Get better stats about <br> your business with MyLaundry</p><br>
				<button><a href="<?= site_url('MyController/LoginView')?>">SIGN IN</a></button>
			</div>
	</div>
</body>
</html>