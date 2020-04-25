<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
<head>
	<title>Package Data</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css') ?>">
	<link rel="icon" type="image/png" href="<?= base_url('assets/image/favicon.ico')?>"/>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/datatable/datatablecss.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/datatable/datatablecss.min.css') ?>">

    <script type="text/javascript" src="<?php echo base_url('assets/datatable/datatable.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/datatable/datatable.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/datatable/datatable.bootstrap4.min.js') ?>"></script>
</head>
<body>

<?php if ($this->session->has_userdata('username')): ?>
	<div class="row">
		<div class="col-md-12">
			<?php $this->load->view('HeaderAdmin') ?>
		</div>
	</div>
	
	<?php if (!empty($this->session->flashdata('status'))): ?>
		<div class="alert alert-warning">
			<?= $this->session->flashdata('status') ?>
		</div>
	<?php endif ?>
	
	<div class="container">
		<div class="row mt-3">
			<div class="col-md-12">
				<table id="tabelpaket" class="table table-striped table-bordered" style="width:100%">
				<thead align="center">
					<tr>
						<th>No</th>
						<th>ID Outlet</th>
						<th>Package Type</th>
						<th>Package Name</th>
						<th>Price</th>
						<th>Description</th>
						<th>--</th>
					</tr>
				</thead>
				<tbody>
				<?php 
				$i=1;
				foreach ($paket as $p) :?>
					<tr>
						<td><?= $i++ ?></td>
						<td><?= $p['id_outlet'] ?></td>
						<td><?= $p['jenis_paket'] ?></td>
						<td><?= $p['nm_paket'] ?></td>
						<td><?= $p['harga_paket'] ?></td>
						<td><?= $p['deskripsi_paket'] ?></td>
						<td align="center">
							<a href="<?php echo site_url('MyController/EditPaket/'.$p['id_paket']) ?>" class="btn">Edit </a>
							<a href="<?php echo site_url('MyController/DeletePaket/' .$p['id_paket']) ?>" class="btn" onclick="return confirm('Yakin ingin menghapus')"> Delete</a>
						</td>
					</tr>
				<?php endforeach ?>
				</tbody>
				</table>
			</div>
		</div>
	</div>


	  <script>   
	        $(document).ready(function() {
	            $('#tabelpaket').DataTable();
	        } );
 	   </script> 


	<div class="row">
		<div class="container col-md-9">
			<a href="<?php echo site_url('MyController/InputPaket') ?>" class="btn">Add Paket</a>
		</div>
	</div>
<?php else: ?>
	<?php $this->load->view('Login') ?>
<?php endif ?>
<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
</body>
</html>