<?php

include 'Layout/header.php';


// check if add button clicked
if (isset($_POST['add'])) {
    if (create_item($_POST) > 0) {
        echo "<script>
                alert('Berhasil disimpan ke database');
                document.location.href = 'index.php';
            </script>";
    } else {
        echo "<script>
                alert('Gagal disimpan ke database');
                document.location.href = 'index.php';
            </script>";
    }
}

?>

<div class="container mt-4 ">
    <h2>Tambah Data</h2>
    <hr>

    <form action="" method="POST">
        <div class="mb-3">
            <label for="date-time" class="form-label">Tanggal</label>
            <input type="date" class="form-control" id="date-time" name="date-time" required />
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Kategori</label>
            <input class="form-control" list="datalistOptions" id="list-category" name="category" placeholder="Kategori.." required />
            <datalist id="datalistOptions">
                <option value="BBM">
                <option value="Makanan">
                <option value="Kuliah">
                <option value="Alat">
                <option value="Dll...">
            </datalist>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi</label>
            <input type="text" class="form-control" id="description" name="description" placeholder="Tentang pengeluaran..." required />
        </div>
        <div class="mb-3">
            <label for="amount" class="form-label">Jumlah</label>
            <input type="number" class="form-control" id="amount" name="amount" placeholder="Contoh 20.000" required />
        </div>

        <button type="submit" name="add" class="btn btn-primary">Tambah</button>
    </form>
</div>

<?php include 'Layout/footer.php'; ?>