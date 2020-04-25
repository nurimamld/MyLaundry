<!DOCTYPE html>
<html>
<head>
    <title>Data Pembayaran</title>
    <link rel="icon" type="image/png" href="<?= base_url('assets/image/favicon.ico')?>"/>
</head>
<body>
    <div class="container">
        <center><h1>Data Laporan Pembayaran</h1></center>
        <hr>
        <div class="row mt-3">
            <div class="col-md-12">
                <table border="1px" id="tabellaporan" class="table table-striped table-bordered" style="width:100%">
                    <thead align="center">
                        <tr>
                            <th>No</th>
                            <th>Nama Member</th>
                            <th>Alamat</th>
                            <th>Kode Invoice</th>
                            <th>Tanggal Transaksi</th>
                            <th>Tanggal Bayar</th>
                            <th>Batas Waktu</th>
                            <th>Total Harga</th>
                            <th>Status Transaksi</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $i=1;
                    $a=0;
                    foreach ($data as $d) :?>
                        <tr>
                            <td><?= $i++ ?></td>
                            <td><?= $d['nm_member'] ?></td>
                            <td><?= $d['alamat_member'] ?></td>
                            <td><?= $d['kode_invoice'] ?></td>
                            <td><?= $d['tgl_transaksi'] ?></td>
                            <td><?= $d['tgl_bayar'] ?></td>
                            <td><?= $d['batas_waktu'] ?></td>
                            <td><?= $d['total_harga'] ?></td>
                            <td><?= $d['status_transaksi'] ?></td>
                        </tr>
                        <?php $a = $a + $d['total_harga']; ?>
                    <?php endforeach ?>
                    </tbody>
            </table>
            <label><b>Total Pemasukan adalah <?= number_format($a , 0, ',', '.') ?></b></label>
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
</body>
</html>