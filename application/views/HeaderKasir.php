<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
<head>
	<title>MyLaundry</title>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css') ?>">
  <link rel="icon" type="image/png" href="<?= base_url('assets/image/favicon.ico')?>"/>
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/datatable/datatablecss.css') ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/datatable/datatablecss.min.css') ?>">
  <script type="text/javascript" src="<?php echo base_url('assets/datatable/datatable.js') ?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/datatable/datatable.min.js') ?>"></script>
  <style type="text/css">
    body{
       font-family: 'Poppins', sans-serif;
       background-size: cover;
       height: 680px;
       background-repeat: no-repeat;
    }
    .navbar{
      padding: 15px 0;
    }
    .navbar-brand{
      font-weight: 800;
      text-transform: uppercase;
      font-variant-position: 2em;
      color: #27DEC0;
    }
    .navbar-item{
      font-weight: 800;
      margin:5px 5px 5px;
      text-transform: uppercase;
    }
    .nav-link{
      text-decoration: none;
      color: #27DEC0;
      box-shadow: 1px solid #27DEC0;
    }
    
    .nav-link:hover{
      text-decoration: none;
      color: #fff;
      border-radius: 5px;
      background: #27DEC0;
      box-shadow: 1px solid #27DEC0;
    }
    .btn{
      margin-right: 10px;
      background: #27DEC0;
      color: #fff;
      text-decoration: none;
    }
    .btn:hover{
      text-decoration: none;
      color: #fff;
    }
  </style>


</head>
<body>


<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#" style="color:#27DEC0">MyLaundry.</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-lg-auto">
      <li class="nav-item">
        <a class="nav-link" href="<?= site_url('MyController/DataMember') ?>">Member <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= site_url('MyController/Service')?>">Service</a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="<?= site_url('MyController/Keranjang')?>">Cart</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= site_url('MyController/Pembayaran')?>">Payment</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= site_url('MyController/Laporan')?>">Report</a>
      </li>

    </ul>
    <form class="form-inline my-2 my-lg-0">
      <a class="btn  ml-4" href="<?= site_url('MyController/logout')?>">Logout</a>
    </form>
  </div>
</nav>

<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
</body>
</html>