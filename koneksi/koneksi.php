<?php
   $hostname = "localhost";
   $username = "root";
   $password = "";
   $db_name = "sertifikasi-bnsp";

   $koneksi = mysqli_connect($hostname, $username, $password, $db_name) or trigger_error(mysqli_error($koneksi), E_USER_NOTICE);
?>
