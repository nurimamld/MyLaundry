<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
<head>
	<title>Insert Package</title>
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
            height: 600px;
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
			<?php $this->load->view('HeaderAdmin') ?>
		</div>
	</div>

	<div class="row mt-5">
	<div class="container">
		<?= form_open_multipart('MyController/InsertPaket', ['method' => 'POST']) ?>
        <center><h5 class="text">ADD NEW PACKAGE</h5></center><hr>
            <div class="form-group">
                <label>ID Outlet</label>
                <select name="id_outlet" required="" class="form-control">
                <option value="">- Select -</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
            </select>
            </div>
            <div class="form-group">
                <label>Jenis Paket</label>
                <select name="jenis_paket" required="" class="form-control">
                <option value="">- Select -</option>
                <option value="standar">Standar</option>
                <option value="paketan">Paketan</option>
            </select>
            </div>
            <div class="form-group">
                <label>Package Name</label>
                <input type="text" class="form-control" name="nm_paket" required>
            </div>
            <div class="form-group">
                <label>Price</label>
                <input type="text" class="form-control" name="harga_paket" required>
            </div>
            <div class="form-group">
                <label>Description Package</label>
                <input type="text" class="form-control" name="deskripsi_paket" required>
            </div>
            


            <input type="submit" class="btn" value="Add">
        </div>
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