<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
<head>
	<title>Data Member</title>
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
			<?php $this->load->view('HeaderKasir') ?>
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
				<table id="tabelmember" class="table table-striped table-bordered" style="width:100%; background: #fff;">
				<thead align="center">
					<tr>
						<th>No</th>
						<th>Member Name</th>
						<th>Phone Number</th>
						<th>Gender</th>
						<th>Address</th>
						<th>--</th>
					</tr>
				</thead>
				<tbody>
				<?php 
				$i=1;
				foreach ($member as $m) :?>
					<tr>
						<td><?= $i++ ?></td>
						<td><?= $m['nm_member'] ?></td>
						<td><?= $m['tlp_member'] ?></td>
						<td><?= $m['jk_member'] ?></td>
						<td><?= $m['alamat_member'] ?></td>
						<td align="center">
							<a href="<?php echo site_url('MyController/EditMember/'.$m['id_member']) ?>" class="btn">Edit </a>
							<a href="<?php echo site_url('MyController/DeleteMember/' . $m['id_member']) ?>" class="btn" onclick="return confirm('Yakin ingin menghapus')"> Delete</a>
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
	            $('#tabelmember').DataTable();
	        } );
 	   </script> 


	<div class="row">
		<div class="container col-md-9">
			<a href="<?php echo site_url('MyController/InputMember') ?>" class="btn"> Add Member</a>
		</div>
	</div>
<?php else: ?>
	<?php $this->load->view('Login') ?>
<?php endif ?>
<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
</body>
</html>