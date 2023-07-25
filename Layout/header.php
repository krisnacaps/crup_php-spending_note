<?php

include 'config/app.php';
include 'layout/footer.php';

session_start();

// limit access page before login
if (!isset($_SESSION["login"])) {
    echo "<script>
            document.location.href = 'login.php?=anda belum login';
        </script>";

    exit;
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Catat Uang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

    <script src="https://unpkg.com/feather-icons"></script>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.css" />

</head>

<body>

    <div>
        <nav class="navbar bg-dark navbar-expand-lg bg-body" data-bs-theme="dark">
            <div class="container">
                <a class="navbar-brand" href="#">Catat Uang</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link " aria-current="page" href="./index.php">Pengeluaran</a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link disabled" href="#">Pemasukan</a>
                        </li>
                        <?php if($_SESSION['level'] == 1):?>
                        <li class="nav-item active">
                            <a class="nav-link" aria-current="page" href="./crud-modal.php">User</a>
                        </li>
                        <?php endif;?>
                    </ul>
                </div>

                <div class="d-flex">
                    <div class="dropdown me-1">
                        <button type="button" class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" data-bs-target="#dropdownMenu" aria-expanded="false" data-bs-offset="10,20">
                            <i data-feather="user"></i> <?= $_SESSION['name']; ?>
                        </button>
                        <ul class="dropdown-menu" id="dropdownMenu">
                            <li><a class="dropdown-item" href="crud-modal.php">Profile</a></li>
                            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </nav>
    </div>