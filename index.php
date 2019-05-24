<?php
   $title = "Data User";
   include "layouts/header.php";
   include "function.php";

   $userList = query("SELECT * FROM user");
?>

<div class="row p-3 m-3">
   
   <h2 class="card-title mb-3">
      <?= $title ?>   
   </h2> 

   <div class="col-md-12 bg-white shadow-lg">
      <div class="row">
         <div class="col-md-12 text-right">
            <a href="user-create.php" 
               class="btn btn-primary mt-3 mb-3">Tambah data user</a>
            <a href="print.php" 
               class="btn btn-success mt-3 mb-3">Print</a>
         </div>
      </div>
      <table class="table table-bordered table-striped table-hover">
         <thead align="center">
            <tr>
               <td width=5>NO</td>
               <td style="width: 300px">Nama</td>
               <td style="width: 200px">No Telp</td>
               <td style="width: 400px">Email</td>
               <td>Action</td>
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
               <td>
                  <a href="user-edit.php?id=<?= $data['id'] ?>" 
                     class="btn btn-warning btn-sm">Edit</a>
                  <a href="user-delete.php?id=<?= $data['id'] ?>" 
                     onclick="return confirm('Apakah anda ingin menghapus user ini ?')"
                     class="btn btn-danger btn-sm">Delete</a>
               </td>
            </tr>

            <?php } ?>
         
         </tbody>
      </table>
   </div>
</div>

<?php
   include "layouts/footer.php";
?>