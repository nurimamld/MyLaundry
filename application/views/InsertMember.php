<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
<head>
	<title>Insert Member</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css') ?>">
    <link rel="icon" type="image/png" href="<?= base_url('assets/image/favicon.ico')?>"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/datatable/datatablecss.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/datatable/datatablecss.min.css') ?>">
    <style type="text/css">
        .text{
            margin: 10px 10px 10px;
            font-weight: bold;
            color: #27DEC0;
        }.container{
            box-shadow: 2px 2px 2px rgba(0,0,0.8);
            width: 50px;
            border: 1px dashed grey;
            height: 500px;
        }
        .form-group{
            margin-left: 400px;
            width: 300px;
            position: relative;
            
        }
        .btn{
            margin-left: 500px;
        }
    </style>
</head>
<body>
<div>
<?php if ($this->session->has_userdata('username')): ?>
	<div class="row">
		<div class="col-md-12">
			<?php $this->load->view('HeaderKasir') ?>
		</div>
	</div>

	<div class="row mt-5">
	<div class="container">
		<?= form_open('MyController/InsertMember', ['method' => 'POST']) ?>
       <center><h5 class="text">ADD NEW MEMBER</h5></center><hr> 
            <div class="form-group">
                <label>Member Name</label><br>
                <input type="text" class="form-control" name="nm_member" required>
            </div>
            <div class="form-group">
                <label>Phone Number</label>
                <input type="number" class="form-control" name="tlp_member" required>
            </div>
            <div class="form-group">
                <label>Gender</label><br>
                <p><input type="radio" class="radio-inline" name="jk_member" required value="L">L</p>
                <p><input type="radio" class="radio-inline" name="jk_member" required value="P">P</p>
            </div>
            <div class="form-group">
                <label>Address</label>
                <input type="text" class="form-control" name="alamat_member" required>
            </div>
            <input type="submit" class="btn" value="Daftar">
    	<?= form_close()?>
    </div>
	</div>
</div>
<?php else: ?>
    <?php $this->load->view('Login') ?>
<?php endif ?>
<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
</body>
</html>