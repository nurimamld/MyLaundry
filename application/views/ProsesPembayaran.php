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


    <?php 
        foreach ($pembayaran as $p) :?>
            <?= form_open('MyController/ProsesPembayaran/'.$p['id_transaksi'], ['method' => 'POST']) ?>
    <?php endforeach ?>
                <div class="container">
                    <div class="row mt-3">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Bayar</label>
                                <input type="number" class="form-control" name="bayar" required="">
                            </div> 
                        </div>

                    </div>
                </div>


                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <input type="submit" class="btn" value="Bayar">
                            </div> 
                        </div>
                    </div>   
                </div>
            <?= form_close()?>
        
    

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
        foreach ($pembayaran as $p) :?>
            <tr>
                <td><?= $i++ ?></td>
                <td><?= $p['nm_paket'] ?></td>
                <td><?= number_format($p['harga_paket'], 0, ',', '.') ?></td>
                <td><?= $p['qty'] ?></td>
                <td><?= number_format(($p['harga_paket'] * $p['qty']), 2, ',', '.')  ?></td>

            </tr>
            <?php $total = $total + ($p['harga_paket'] * $p['qty']) ?>
        <?php endforeach ?>
            <tr>
                <td colspan="6">Harga Awal : <?= number_format($total, 2, ',', '.') ?></td>
            </tr>
            <tr>
                <th colspan="6">Total bayar : <?= number_format($p['total_harga'], 2, ',', '.') ?> Dengan Diskon : <?= $p['diskon'] ?> % dan Pajak : <?= $p['pajak'] ?> %</th>  
            </tr>
            <tr>
                <th colspan="6">Sudah dibayar sebesar : <?= number_format($p['bayar_transaksi'], 2, ',', '.') ?></th>  
            </tr>
            <tr>
                <th colspan="6">Kembalian/Kurang : <?= number_format( $p['bayar_transaksi'] - $p['total_harga'], 2, ',', '.') ?></th>  
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