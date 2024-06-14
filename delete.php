<?php

require 'db.php';

function hapus($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM tb_image WHERE image_id = $id");
    
    return mysqli_affected_rows($conn);
}

    $id = $_GET["image_id"];

    if (hapus($id) > 0 ) {
        echo "
        <script>
            alert('Resep berhasil dihapus!');
            document.location.href = 'index.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Resep gagal dihapus!');
            document.location.href = 'index.php';
        </script>
        ";
    }
?>