<?php
   include "koneksi/koneksi.php";

   function query($query)
   {
      global $koneksi;

      $result = mysqli_query($koneksi, $query);
      $rows = [];
      while ($data = mysqli_fetch_assoc($result)) {
          $rows[] = $data;
      }
      return $rows;
  }

  function addUser($data)
  {
    global $koneksi;

    $name = htmlspecialchars($data['name']);
    $telepon = htmlspecialchars($data['telepon']);
    $email = htmlspecialchars($data['email']);

    $query = "INSERT INTO user VALUES (NULL, '$name', '$telepon', '$email') ";
    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
  }

  function editUser($data, $id)
  {
    global $koneksi;

    $nama = htmlspecialchars($data['name']);
    $telepon = htmlspecialchars($data['telepon']);
    $email = htmlspecialchars($data['email']);

    $query = "UPDATE user SET 
            nama = '$nama',
            telp = '$telepon',
            email = '$email'
            
            WHERE id = '$id'";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
  }

  function deleteUser($id)
  {
      global $koneksi;

      $query = "DELETE FROM user WHERE id = '$id'";

      mysqli_query($koneksi, $query);

      return mysqli_affected_rows($koneksi);
  }

  
?>