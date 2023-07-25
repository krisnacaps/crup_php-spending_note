<?php

// session_start();

include 'Layout/header.php';
// include 'Layout/footer.php';


$data_user = select("SELECT * FROM account");

$id_account = $_SESSION['user_id'];
$user_login = select("SELECT * FROM account WHERE user_id = $id_account");

// function check if add_user clicked
if (isset($_POST['add_user'])) {
    if (create_new_user($_POST) > 0) {
        echo "<script>
                alert('Berhasil menambahkan akun baru');
                document.location.href = 'crud-modal.php';
            </script>";
    } else {
        echo "<script>
                alert('Gagal menambahkan akun baru');
                document.location.href = 'crud-modal.php';
            </script>";
    }
}

if (isset($_POST['update_data'])) {
    if (update_data_user($_POST) > 0) {
        echo "<script>
                alert('Berhasil memperbarui data user');
                document.location.href = 'crud-modal.php';
            </script>";
    } else {
        echo "<script>
                alert('Gagal memperbarui data user');
                document.location.href = 'crud-modal.php';
            </script>";
    }
}

?>

<div class="container mt-4 ">
    <h2>Data Akun</h2>

    <?php if ($_SESSION['level'] == 1) : ?>
        <button type="button" class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#popupModal"><i data-feather="user-plus"></i></button>
        <hr>
    <?php endif; ?>

    <table class="table table-striped table-bordered mt-4" id="tables">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Usename</th>
                <th>Email</th>
                <th>Password</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            <?php $no = 1; ?>
            <?php if ($_SESSION['level'] == 1) : ?>

                <?php foreach ($data_user as $user) : ?>
                    <tr>
                        <td class="text-center"><?= $no++; ?></td>
                        <td><?= $user['name']; ?></td>
                        <td><?= $user['username']; ?></td>
                        <td><?= $user['email']; ?></td>
                        <td>●●●●●●</td>
                        <td class="text-center">
                            <a href="#"><button type="button" class="btn btn-success" style="padding: 4px;" data-bs-toggle="modal" data-bs-target="#popupUpdate<?= $user['user_id']; ?>"><i data-feather="edit-3"></i></button></a>
                            <a href="#"><button type="button" class="btn btn-danger" style="padding: 4px;" data-bs-toggle="modal" data-bs-target="#popupDelete<?= $user['user_id']; ?>"><i data-feather="user-x"></i></button></a>
                        </td>
                    </tr>
                <?php endforeach; ?>

            <?php endif; ?>

            <?php if ($_SESSION['level'] == 2) : ?>

                <?php foreach ($user_login as $user) : ?>
                    <tr>
                        <td class="text-center"><?= $no++; ?></td>
                        <td><?= $user['name']; ?></td>
                        <td><?= $user['username']; ?></td>
                        <td><?= $user['email']; ?></td>
                        <td>●●●●●●</td>
                        <td class="text-center">
                            <a href="#"><button type="button" class="btn btn-success" style="padding: 4px;" data-bs-toggle="modal" data-bs-target="#popupUpdate<?= $user['user_id']; ?>"><i data-feather="edit-3"></i></button></a>
                        </td>
                    </tr>
                <?php endforeach; ?>

            <?php endif; ?>
        </tbody>
    </table>
</div>

<!-- Modal add new user -->
<div class="modal fade" id="popupModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Menambah User Baru</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="post">

                    <div class="mb-3">
                        <label for="name">Nama </label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="username">Username </label>
                        <input type="text" name="username" id="username" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="email">Email </label>
                        <input type="email" name="email" id="email" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="password">Password </label>
                        <input type="password" name="password" id="password" class="form-control" required minlength="6">
                    </div>

                    <div class="mb-3">
                        <label for="level">Level </label>
                        <select name="level" id="level" class="form-control" required>
                            <option value="">-- pilih role --</option>
                            <option value="1">Admin</option>
                            <option value="2">Operator</option>
                        </select>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                        <button type="submit" name="add_user" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Update -->
<?php foreach ($data_user as $user) : ?>

    <div class="modal fade" id="popupUpdate<?= $user['user_id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Mengubah Data Akun</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        <input type="hidden" name="user_id" value="<?= $user['user_id']; ?>">

                        <div class="mb-3">
                            <label for="name">Nama </label>
                            <input type="text" name="name" id="name" class="form-control" value="<?= $user['name']; ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="username">Username </label>
                            <input type="text" name="username" id="username" class="form-control" value="<?= $user['username']; ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="email">Email </label>
                            <input type="email" name="email" id="email" class="form-control" value="<?= $user['email']; ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="password">Password <small>Masukan Password Lama</small></label>
                            <input type="password" name="password" id="password" class="form-control" required minlength="6">
                        </div>

                        <?php if ($_SESSION['level'] == 1) :?>
                        <div class="mb-3">
                            <label for="level">Level </label>
                            <select name="level" id="level" class="form-control" required>
                                <?php $level = $user['level']; ?>
                                <option value="1" <?= $level == '1' ? 'selected' : null ?>>Admin</option>
                                <option value="2" <?= $level == '2' ? 'selected' : null ?>>Operator</option>
                            </select>
                        </div>
                        <?php else :?>
                            <input type="hidden" name="level" value="<?= $user['level'];?>" readonly>
                        <?php endif; ?>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" name="update_data" class="btn btn-success">Ubah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php endforeach; ?>

<!-- Modal Delete -->
<?php foreach ($data_user as $user) : ?>

    <div class="modal fade" id="popupDelete<?= $user['user_id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Akun</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Yakin Menghapus Data Akun <span style="color: red; "><strong><?= $user['username']; ?></strong></span>?</p>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <a href="delete-user-acc.php?id=<?= $user['user_id']; ?>" name="delete_user" class="btn btn-danger">Hapus</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php endforeach; ?>

<?php

include 'Layout/footer.php';

?>