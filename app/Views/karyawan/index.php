<?php $this->extend('template/layout') ?>
<?php $this->section('content') ?>

<!-- body tenplate -->
<div class="col">
    <a href="insertKaryawan"><button class="btn btn-primary btn-sm"><i class="bi bi-plus"></i></button></a>
    <button class="btn btn-secondary btn-sm" disabled><i class="bi bi-printer"></i><span class="badge text-bg-danger">*soon</span></button>
</div>
<div class="row mt-2">
    <div class="col">
        <!-- content -->
        <!-- change this to your content -->
        <div class="card">
            <div class="card-body">
                <div class="card-title text-center fw-bold">Data Karyawan</div>
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
                        <tr>
                            <?php
                            if (empty($dataKaryawan)) {
                                echo "<tr class='text-center fw-bold'><td colspan='5' class='bg-secondary'>Data Karyawan Tidak Ditemukan</td></tr>";
                            } else {
                                foreach ($dataKaryawan as $dataKaryawan) :
                            ?>
                                    <td><?= $dataKaryawan['id_karyawan']; ?></td>
                                    <td><?= $dataKaryawan['nama_karyawan']; ?></td>
                                    <td><?= $dataKaryawan['alamat_karyawan']; ?></td>
                                    <td><?= $dataKaryawan['posisi_karyawan']; ?></td>
                                    <td class="d-flex">
                                        <a href="updateKaryawan/<?= $dataKaryawan['id_karyawan']; ?>"><button class="btn btn-warning btn-sm"><i class="bi bi-tools"></i></button></a>

                                        <form id="deleteForm-<?= $dataKaryawan['id_karyawan']; ?>" action="deleteKaryawan" method="post" class="ms-1">
                                            <?= csrf_field() ?>
                                            <input type="hidden" name="id_karyawan" value="<?= $dataKaryawan['id_karyawan']; ?>">
                                            <button type="button" class="btn btn-danger btn-sm" name="btnDeleteKaryawan" onclick="confirmDelete('<?= $dataKaryawan['id_karyawan']; ?>')">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
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
<script>
    function confirmDelete(id_karyawan) {
        Swal.fire({
            title: "Yakin menghapus data ini?",
            text: "data peminjaman oleh karyawan ini juga akan DIHAPUS!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, Hapus!"
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('deleteForm-' + id_karyawan).submit();
            }
        });
    }
</script>
<?php $this->endSection(); ?>