<?php

session_start();

include 'config/app.php';

// limit access page before login
if (!isset($_SESSION["login"])) {
    echo "<script>
            document.location.href = 'login.php?=anda belum login';
        </script>";

    exit;
}

// get user id form url 
$user_id = (int)$_GET['id'];

if (delete_user_acc($user_id) > 0) {
    echo "<script>
                alert('Berhasil Menghapus Akun');
                document.location.href = 'crud-modal.php';
            </script>";
} else {
    echo "<script>
                alert('Gagal Menghapus Akun');
                document.location.href = 'crud-modal.php';
            </script>";
}
