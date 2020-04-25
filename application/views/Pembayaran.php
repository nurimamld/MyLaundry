<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
<head>
	<title>Payment</title>
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
                <table id="tabelpembayaran" class="table table-striped table-bordered" style="width:100%">
                    <thead align="center">
                        <tr>
                            <th>No</th>
                            <th>Member Name</th>
                            <th>Code Invoice</th>
                            <th>Transaction Status</th>
                            <th>Payment Status</th>
                            <th>Contact Number</th>
                            <th>--</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $i=1;
                    foreach ($pembayaran as $p) :?>
                        <tr>
                            <td><?= $i++ ?></td>
                            <td><?= $p['nm_member'] ?></td>
                            <td><?= $p['kode_invoice'] ?></td>
                            <td><?= $p['status_transaksi'] ?></td>
                            <td><?= $p['status_pembayaran'] ?></td>
                            <td><?= $p['tlp_member'] ?></td>
                            <td align="center">
                            <?php if ($p['status_pembayaran'] != 'dibayar') :?>
                                <a href="<?php echo site_url('MyController/ProsesHasilPembayaran/'.$p['id_transaksi']) ?>" class="btn"> Pay </a>
                                <a href="<?php echo site_url('MyController/DeletePembayaran/'.$p['id_transaksi']) ?>" class="btn" onclick="return confirm('Yakin ingin menghapus')"> Delete </a>
                            <?php endif ?>
                            <?php if ($p['status_transaksi'] == 'proses') :?>
                                <a href="<?php echo site_url('MyController/Selesai/'.$p['id_transaksi']) ?>" class="btn" onclick="return confirm('Yakin Apakah Barang Telah selesai Dicuci')"> Selesai </a>
                            <?php endif ?>
                            <?php if (($p['status_pembayaran'] == 'dibayar') && ($p['status_transaksi'] != 'diambil') && ($p['status_transaksi'] != 'proses')):?>
                                <a href="<?php echo site_url('MyController/TampilProsesPengambilan/'.$p['id_transaksi']) ?>" class="btn"> Ambil </a>
                            <?php endif ?>
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
            $('#tabelpembayaran').DataTable();
        } );
  </script>  
	 
<?php else: ?>
	<?php $this->load->view('Login') ?>
<?php endif ?>
<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
</body>
</html>