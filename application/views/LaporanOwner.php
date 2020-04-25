<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
<head>
	<title>Report</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css') ?>">
     <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/datatable/datatablecss.css') ?>">
    <link rel="icon" type="image/png" href="<?= base_url('assets/image/favicon.ico')?>"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/datatable/datatablecss.min.css') ?>">


    <script type="text/javascript" src="<?php echo base_url('assets/datatable/datatable.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/datatable/datatable.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/datatable/datatable.bootstrap4.min.js') ?>"></script>

</head>
<body>

<?php if ($this->session->has_userdata('username')): ?>

	<div class="row">
		<div class="col-md-12">
			<?php $this->load->view('HeaderOwner') ?>
		</div>
	</div>

   <?php if (!empty($this->session->flashdata('status'))): ?>
        <div class="alert alert-warning">
            <?= $this->session->flashdata('status') ?>
        </div>
    <?php endif ?>
     <?= form_open('MyController/SearchRangeOwner', ['method' => 'POST']) ?>
        <div class="container mt-3">
            <div class="row">
                <div class="col-md-3">
                     <div class="form-group">
                        <label>Start Date</label>
                        <input id="min" type="date" class="form-control" name="tgl_awal" required="">
                    </div> 
                </div>
                 <div class="col-md-3">
                     <div class="form-group">
                        <label>Last Date</label>
                        <input id="max" type="date" class="form-control" name="tgl_akhir" required="">
                    </div> 
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <input type="submit" class="btn" value="Search">
                        <a href="<?= site_url('MyController/Pdf') ?>" class="btn">PDF</a>
                    </div> 
                </div>
            </div>
        </div>
    <?= form_close()?>


    <div class="container">
        <div class="row mt-3">
            <div class="col-md-12">
                <table id="tabellaporan" class="table table-striped table-bordered" style="width:100%; background: #fff;">
                    <thead align="center">
                        <tr>
                            <th>No</th>
                            <th>Member Name</th>
                            <th>Address</th>
                            <th>Code Invoice</th>
                            <th>Transaction Date</th>
                            <th>Pay Date</th>
                            <th>Deadline</th>
                            <th>Total Price</th>
                            <th>Transaction Status</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $i=1;
                    $total=0;
                    foreach ($owner as $o) :?>
                        <tr>
                            <td><?= $i++ ?></td>
                            <td><?= $o['nm_member'] ?></td>
                            <td><?= $o['alamat_member'] ?></td>
                            <td><?= $o['kode_invoice'] ?></td>
                            <td><?= $o['tgl_transaksi'] ?></td>
                            <td><?= $o['tgl_bayar'] ?></td>
                            <td><?= $o['batas_waktu'] ?></td>
                            <td><?= $o['total_harga'] ?></td>
                            <td><?= $o['status_transaksi'] ?></td>
                        </tr>
                        <?php $total = $total + $o['total_harga']; ?>
                    <?php endforeach ?>
                    </tbody>
            </table>
            <label><b>Total Revenue = <?= number_format($total , 0, ',', '.') ?></b></label>
            </div>
        </div>
    </div>

  <script>
              
    $(document).ready(function() {
          var table = $('#tabellaporan').DataTable();
     

          $('#min').keyup( function() { table.draw(); } );
          $('#max').keyup( function() { table.draw(); } );
      } );
  </script>  
	 
<?php else: ?>
	<?php $this->load->view('Login') ?>
<?php endif ?>
<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
</body>
</html>