<?php
    include "function.php";
    $id = $_GET['id'];

    if (deleteUser($id) > 0) {
        echo "
            <script>
                alert('Delete user successfully!');
                document.location.href = './';
            </script>
        ";
    } else {
        echo "
            <script>
               //  alert('Hapus data gagal');
                document.location.href = 'todo-delete.php';
            </script>
        ";
        echo("<br>");
        echo mysqli_error($koneksi);
    }
    
?>