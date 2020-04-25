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


    <div class="row mt-3">
        <table class="container col-md-9 table table-striped">

        <thead>
            <tr>
                <th>No</th>
                <th>Nama Paket</th>
                <th>Harga</th>
                <th>Qty</th>
                <th>Total Harga</th>
            </tr>
        </thead>
        <tbody>
        <?php 
        $i=1;
        $total=0;
        foreach ($ambil as $a) :?>
            <tr>
                <td><?= $i++ ?></td>
                <td><?= $a['nm_paket'] ?></td>
                <td><?= number_format($a['harga_paket'], 0, ',', '.') ?></td>
                <td><?= $a['qty'] ?></td>
                <td><?= number_format(($a['harga_paket'] * $a['qty']), 2, ',', '.')  ?></td>
            </tr>
            <?php $total = $total + ($a['harga_paket'] * $a['qty']) ?>
        <?php endforeach ?>
            <tr>
                <th colspan="6">Status Pembayaran : <?= $a['status_pembayaran'] ?></th>  
            </tr>
            <tr>
                <th>
                    <a href="<?php echo site_url('MyController/ProsesPengambilan/'.$a['id_transaksi']) ?>" class="btn" onclick="return confirm('Yakin Barang Ingin Diambil')"> Konfirmasi </a>
                </th>
            </tr>
        </tbody>
        </table>
    </div>
	 
<?php else: ?>
	<?php $this->load->view('Login') ?>
<?php endif ?>
<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
</body>
</html>