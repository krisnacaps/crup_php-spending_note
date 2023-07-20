<?php

include 'Layout/header.php';

$data_spending = select("SELECT * FROM spending");

?>

    <div class="container mt-4 ">
        <h2>Pengeluaran</h2>

        <a href="form-add-item.php" class="btn btn-primary mt-2"><i data-feather="plus"></i></a>
        <hr>

        <table class="table table-striped table-bordered mt-4" id="tables">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Kategory</th>
                    <th>Deskripsi</th>
                    <th>Jumlah</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($data_spending as $spend) : ?>
                
                <tr>
                     <td class="text-center"><?= $no++;?></td>
                     <td class="text-center"><?= date('d/m/Y', strtotime($spend['date_time']));  ?></td>
                     <td><?= $spend['category']; ?></td>
                     <td><?= $spend['description']; ?></td>
                     <td>Rp. <?= number_format($spend['amount'], 0,',','.') ;?></td> 
                     <td class="text-center">
                        <a href="edit-item.php?id=<?= $spend['id']?>"><button type="button" class="btn btn-success" style="padding: 4px;"><i data-feather="edit"></i></button></a>
                        <a href="delete-item.php?id=<?= $spend['id']?>"><button type="button" class="btn btn-danger" style="padding: 4px;"><i data-feather="trash-2"></i></button></a>
                     </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

   
<?php

include 'Layout/footer.php';

?>