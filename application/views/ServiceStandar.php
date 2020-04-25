<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
<head>
  <title>Service</title>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.css') ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css') ?>">
  <link rel="icon" type="image/png" href="<?= base_url('assets/image/favicon.ico')?>"/>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/datatable/datatablecss.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/datatable/datatablecss.min.css') ?>">
</head>
<body>

<?php if ($this->session->has_userdata('username')): ?>

      <div class="container mt-5">
        <div class="row">
        <?php foreach($data as $d) :?>
          <?= form_open('MyController/AmbilPaket/'.$d['id_paket'], ['method' => 'POST']) ?>
            <div class="col-lg-3">
              <div class="card" style="width: 20rem;">
                <div class="card-body">
                  <h5 style="font-weight: bold;" class="card-header">Standart</h5>
                  <h5 style="font-weight: bold;" class="card-title"><?= $d['nm_paket'] ?> <?= number_format($d['harga_paket'], 2, ',', '.') ?> </h5>
                  <p class="card-text"><?= $d['deskripsi_paket'] ?></p>
                  <input type="number"  name="kuantitas" value="1" class="form-control mb-4">
                  <input type="submit" class="btn" value="Cart">
                </div>
              </div>
            </div>
            <?= form_close() ?>
        <?php endforeach ?>
      </div>

    </div>

  
<?php else: ?>
  <?php $this->load->view('Login') ?>
<?php endif ?>
<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
</body>
</html>