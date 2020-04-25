<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
<head>
	<title>User Data</title>
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
				<table id="tabeluser" class="table table-striped table-bordered" style="width:100%">
				<thead align="center">
					<tr>
						<th>No</th>
						<th>Name</th>
						<th>Username</th>
						<th>Password</th>
						<th>ID Outlet</th>
						<th>Status</th>
						<th>--</th>
					</tr>
				</thead>
				<tbody>
				<?php 
				$i=1;
				foreach ($user as $u) :?>
					<tr>
						<td><?= $i++ ?></td>
						<td><?= $u['nm_user'] ?></td>
						<td><?= $u['username'] ?></td>
						<td><?= $u['password'] ?></td>
						<td><?= $u['id_outlet'] ?></td>
						<td><?= $u['role'] ?></td>
						<td align="center">
							<a href="<?php echo site_url('MyController/EditUser/'.$u['id_user']) ?>" class="btn">Edit</a>
							<a href="<?php echo site_url('MyController/DeleteUser/' . $u['id_user']) ?>" class="btn" onclick="return confirm('Yakin ingin menghapus')">Delete</a>
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
	            $('#tabeluser').DataTable();
	        } );
 	   </script> 


	<div class="row">
		<div class="container col-md-9">
			<a href="<?php echo site_url('MyController/InputUser') ?>" class="btn">Add User</a>
		</div>
	</div>
<?php else: ?>
	<?php $this->load->view('Login') ?>
<?php endif ?>
<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
</body>
</html>