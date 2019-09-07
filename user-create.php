<?php
   $title = "Tambah Makanan";
   include "layouts/header.php";
   include "function.php";
?>


<div class="row p-3 m-3">   
   <div class="col-md-12 mb-3">
      <h2 class="card-title ">
         <?= $title ?>         
      </h2> 
   </div>   
   <div class="col-md-6 bg-white">
      <form action="" method="post" class="shadow-lg p-3 bg-white">
         <label for="nama">Nama</label>
         <input type="text" 
            name="nama" 
            id="nama"
            class="form-control"
            placeholder="Input nama . . ." 
            autofocus="on" required> <br>

         <label for="telepon">No Telepon</label>
         <input type="text" 
            name="telepon" 
            id="telepon"
            class="form-control"
            maxlength="15"
            placeholder="Input nomer telepon . . ." required> <br>
      
         <label for="email">E-mail</label>
         <input type="email" 
            name="email" id="email"
            class="form-control"
            placeholder="Input email . . . " required> <br>

         <input type="submit" name="submit"
            value="Simpan" 
            class="btn btn-success btn-block">
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

   $namaUser = query("SELECT nama FROM user WHERE nama = '$_POST[nama]' ")[0];

   if (isset($_POST['submit'])) 
   {

      if (count($namaUser) > 0) 
      {  
         echo "
            <script>
               alert('Nama sudah ada');
            </script>
         ";
         
      } else {
         if (addUser($_POST) > 0) 
         {
            echo "
               <script>
                  alert('Todo successfully added!');
                  document.location.href = './';
               </script>
               ";

         } else {
               echo "
               <script>
                  alert('Data gagal ditambahkan');
                  // document.location.href = 'todo-create.php';            
               </script>
               ";
               echo("<br>");
               echo mysqli_error($koneksi);        
         }      
         
      }
   }
?>