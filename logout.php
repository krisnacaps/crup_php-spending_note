<?php

session_start();

// limit access page before login
if (!isset($_SESSION["login"])) {
    echo "<script>
            document.location.href = 'login.php?=anda belum login';
        </script>";

    exit;
}

$_SESSION = [];

session_unset();
session_destroy();
header("location: login.php"); 
