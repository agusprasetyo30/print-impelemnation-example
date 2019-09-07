<?php
   $title = "Edit Todo";
   include "layouts/header.php";
   include "function.php";

   $id = $_GET['id'];
   
   $user = query("SELECT * FROM user WHERE id = '$id'")[0];
?>


<div class="row p-3 m-3">   
   <div class="col-md-12 mb-3">
      <h2 class="card-title ">
            <?= $title ?>
      </h2> 
   </div>   
   <div class="col-md-6 bg-white">
      <form action="" method="post" class="shadow-lg p-3 bg-white">
      <label for="name">Nama</label>
         <input type="text" 
            name="name" 
            id="name"
            class="form-control"
            placeholder="Input nama . . ." 
            autofocus="on" required
            value="<?= $user['nama'] ?>"> <br>

         <label for="telepon">No Telepon</label>
         <input type="text" 
            name="telepon" 
            id="telepon"
            class="form-control"
            placeholder="Input nomer telepon . . ." required
            value="<?= $user['telp'] ?>"> <br>
      
         <label for="email">E-mail</label>
         <input type="email" 
            name="email" id="email"
            class="form-control"
            placeholder="Input email . . . " required
            value="<?= $user['email'] ?>"> <br>
      
         <input type="submit" name="submit"
            value="Update" 
            class="btn btn-warning btn-block"/>

            <a
               class="btn btn-info btn-block text-white"
               onclick="document.location.href = './'">
               Kembali
            </a>
         </form>
   </div>
</div>

<?php
   include "layouts/footer.php";

   if (isset($_POST['submit'])) {
      if (editUser($_POST, $id) > 0) 
      {
         echo "
            <script>
               alert('User successfully updated!');
               document.location.href = 'index.php';
            </script>
            ";

        } else {
            echo "
            <script>
               alert('Data gagal diubah');
               // document.location.href = 'todo-create.php';            
            </script>
            ";
            echo("<br>");
            echo mysqli_error($koneksi);        
      }
   }
?>