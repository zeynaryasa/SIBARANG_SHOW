<?php $this->extend('template/layout') ?>
<?php $this->section('content') ?>

<!-- body tenplate -->
<div class="col">
    <button class="btn btn-secondary btn-sm" disabled><i class="bi bi-printer"></i><span class="badge text-bg-danger">*soon</span></button>
</div>
<div class="row mt-2">
    <div class="col">
        <!-- content -->
        <!-- change this to your content -->
        <div class="card">
            <div class="card-body">
                <div class="card-title text-center fw-bold">Data Admin</div>
                <table class="table">
                    <thead>
                        <tr class="f-small">
                            <th scope="col" class="col-1">ID</th>
                            <th scope="col" class="col-2">Nama</th>
                            <th scope="col" class="col-2">Alamat</th>
                            <th scope="col" class="col-2">Posisi</th>
                            <th scope="col" class="col-1">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="f-small">
                        <?php
                        if (empty($dataAdmin)) {
                            echo "<tr class='text-center fw-bold'><td colspan='5' class='bg-secondary'>Data Admin Tidak Ditemukan</td></tr>";
                        } else {
                            foreach ($dataAdmin as $dAdmin) :
                        ?>
                                <tr>
                                    <td><?= $dAdmin['id_admin']; ?></td>
                                    <td><?= $dAdmin['nama_admin']; ?></td>
                                    <td><?= $dAdmin['alamat_admin']; ?></td>
                                    <td><?= $dAdmin['posisi_admin']; ?></td>
                                    <td class="d-flex py-1">
                                        <a href="updateAdmin/<?= $dAdmin['id_admin']; ?>"><button class="btn btn-warning btn-sm "><i class="bi bi-tools"></i></button></a>
                                    </td>
                                </tr>
                        <?php endforeach;
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- end content -->
    </div>
</div>
<!-- end body template -->

<?php $this->endSection(); ?>