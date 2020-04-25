<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
<head>
	<title>Cart</title>
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
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php 
        $i=1;
        $total=0;
        foreach ($keranjang as $k) :?>
            <tr>
                <td><?= $i++ ?></td>
                <td><?= $k['nm_paket'] ?></td>
                <td><?= number_format($k['harga_paket'], 0, ',', '.') ?></td>
                <td><?= $k['qty'] ?></td>
                <td><?= number_format(($k['harga_paket'] * $k['qty']), 2, ',', '.')  ?></td>
                <td>
                    <a href="<?php echo site_url('MyController/DeleteKeranjang/'.$k['id_detail_transaksi']) ?>" class="btn btn-outline-success" onclick="return confirm('are you sure to delete?')"> Hapus</a>
                </td>
            </tr>
            <?php $total = $total + ($k['harga_paket'] * $k['qty']) ?>
        <?php endforeach ?>

        </tbody>
        </table>
    </div>


    <?= form_open('MyController/ProsesKeranjang', ['method' => 'POST']) ?>
        <center><div class="container">
        <hr>
            <div class="row mt-3">
                <div class="col-md-3">
                    <div class="form-group">
                         <label>Id Member</label>
                         <input type="text" class="form-control" name="id_member" placeholder="Id Member" required>
                     </div>
                    <div class="form-group">
                        <label>Biaya Tambahan</label>
                        <input type="number" class="form-control" name="biaya_tambahan" required id="biaya_tambahan" onchange="proses_harga();">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label>Pajak</label>
                        <input type="number" class="form-control" name="pajak" required id="pajak" onchange="proses_harga();">
                    </div>
                    <div class="form-group">
                        <label>Diskon</label>
                        <input type="number" class="form-control" name="diskon" required id="diskon" onchange="proses_harga();">
                    </div>      
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label>Keterangan</label>
                        <input type=text class="form-control" name="keterangan">
                    </div>
                    <div class="form-group">
                        <label>Batas Waktu</label>
                        <input type="date" class="form-control" name="batas_waktu" placeholder="0" required>
                    </div>                       
                </div>

            </div>
        </div>
        </center>

        <!-- mengambil nilai total -->
        <input type=text class="form-control" id="total" name="total" hidden value="<?= $total?>">

        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Total Bayar</label>
                        <input type=text class="form-control" id="total_bayar" name="total_bayar" readonly >
                    </div>  
                </div>
                
            </div>   
        </div>  

        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <input type="submit" class="btn" value="Checkout">
                    </div> 
                </div>
                
            </div>  
         <hr>
        </div>            
    <?= form_close()?>

    <script>
        function proses_harga() {
            var biaya_tambahan = document.getElementById('biaya_tambahan').value;
            var pajak = document.getElementById('pajak').value;
            var diskon = document.getElementById('diskon').value;
            var total = document.getElementById("total").value;

            document.getElementById('total_bayar').value = (parseInt(biaya_tambahan) + (parseInt(total) * parseFloat(pajak)/100) + parseInt(total)) - (parseInt(total) * parseFloat(diskon)/100);
        }
    </script>
    


	 
<?php else: ?>
	<?php $this->load->view('Login') ?>
<?php endif ?>
<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
</body>
</html>