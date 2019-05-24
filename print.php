<?php
   include "function.php";

   $userList = query("SELECT * FROM user");
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Print</title>
   <link rel="stylesheet" href="./vendors/css/bootstrap.min.css">

</head>
<body>
   <div class="mt-3 mb-3">
      <a class="btn btn-warning print-link" href="./">Kembali</a>
      <button class="btn btn-primary print-link" id="print-data">Print</button>
   </div>

   <table class="table table-bordered table-striped table-hover">
         <thead align="center">
            <tr>
               <td width=5>NO</td>
               <td style="width: 300px">Nama</td>
               <td style="width: 200px">No Telp</td>
               <td style="width: 400px">Email</td>
            </tr>
         </thead>
         <tbody align="center">
            <?php
               $i = 1;
               foreach ($userList as $data) {
            ?>
            <tr>
               <td><?= $i++ ?>.</td>
               <td><?= $data['nama'] ?></td>
               <td><?= $data['telp'] ?></td>
               <td><?= $data['email'] ?></td>
            </tr>

            <?php } ?>
         
         </tbody>
      </table>

   <!-- Import data untuk kebutuhan print -->
   <script src="./vendors/js/bootstrap.min.js"></script>
   <script src="./vendors/jquery/jquery.min.js"></script>
   <script src="./vendors/jquery-print/jQuery.print.min.js"></script>

   <!-- Untuk mengatur data yang akan diprint -->
   <!-- yang diprint hanya bagian tabel saja -->
   <script>
      // ketika tombol print ditekan pada halaman index
      $(document).ready(function() {
         $("#data-print").print({
            globalStyles : true,
            mediaPrint : true,
            stylesheet : "http://fonts.googleapis.com/css?family=Inconsolata",
            iframe : false,
            noPrintSelector : ".print-link",
            deferred: $.Deferred().done(function() { console.log('Printing done', arguments); })
         });
      })

      // ketika tombol [ print ] ditekan pada halaman print
      $('#print-data').click(function(){
         $("#data-print").print({
            globalStyles : true,
            mediaPrint : true,
            stylesheet : "http://fonts.googleapis.com/css?family=Inconsolata",
            iframe : false,
            noPrintSelector : ".print-link",
            deferred: $.Deferred().done(function() { console.log('Printing done', arguments); })
         });
      });
   </script>
</body>
</html>