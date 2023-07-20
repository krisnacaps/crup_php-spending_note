<?php

include 'config/app.php';

if (isset($_GET['id'])) {
    // get item id from url
    $id = (int)$_GET['id'];

    if (delete_item($id) > 0) {
        echo "<script>
            alert('Satu item berhasil dihapus');
            document.location.href = 'index.php';
        </script>";
    } else {
        echo "<script>
            alert('Gagal dihapus');
            document.location.href = 'index.php';
        </script>";
    }
} else {
    // Jika indeks 'id' tidak terdefinisi atau kosong, berikan pesan error atau arahkan ke halaman yang sesuai.
    echo "Error: Parameter 'id' tidak terdefinisi.";
}