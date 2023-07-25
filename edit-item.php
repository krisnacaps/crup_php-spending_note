<?php


include 'Layout/header.php';
include 'Layout/footer.php';


// limit access page before login
if (!isset($_SESSION["login"])) {
    echo "<script>
            document.location.href = 'login.php?=anda belum login';
        </script>";

    exit;
}

// get item id form url
$id_item = (int)$_GET['id'];

$data_item = select("SELECT * FROM spending WHERE id = $id_item")[0];

// checking if add-button clicked
if (isset($_POST['save'])) {
    if (update_item($_POST) > 0) {
        echo "<script>
                alert('Berhasil diubah ke database');
                document.location.href = 'index.php';
            </script>";
    } else {
        echo "<script>
                alert('Berhasil diubah ke database');
                document.location.href = 'index.php';
            </script>";
    }
} else if(isset($_POST['cancel'])){
    echo "<script>
            document.location.href = 'index.php';
        </script>";
}

?>

<div class="container mt-4 ">
    <h2>Edit Item</h2>
    <hr>

    <form action="" method="POST">

        <input type="hidden" name="id" value="<?= $data_item['id']; ?>">

        <div class="mb-3">
            <label for="date-time" class="form-label text-center">Tanggal</label>
            <input type="date" class="form-control" id="date-time" name="date-time" value="<?= $data_item['date_time']; ?>" required />
        </div>

        <div class="mb-3">
            <label for="category" class="form-label">Kategori</label>
            <input class="form-control" list="datalistOptions" id="list-category" name="category" value="<?= $data_item['category']; ?>" placeholder="Kategori.." required />
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
            <input type="text" class="form-control" id="description" name="description" value="<?= $data_item['description']; ?>" placeholder="Tentang pengeluaran..." required />
        </div>

        <div class="mb-3">
            <label for="amount" class="form-label">Jumlah</label>
            <input type="number" class="form-control" id="amount" name="amount" value="<?= $data_item['amount']; ?>" placeholder="Contoh 20.000" required />
        </div>

        <button type="submit" name="save" class="btn btn-primary">Simpan</button>
        <button type="submit" name="cancel" class="btn btn-outline-secondary">Cancel</button>
    </form>
</div>

<?php include 'Layout/footer.php'; ?>