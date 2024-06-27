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
                <div class="card-title text-center fw-bold">Data Peminjaman</div>
                <table class="table">
                    <thead>
                        <tr class="f-small">
                            <th scope="col" class="col-1">No</th>
                            <th scope="col" class="col-2">Kode Peminjaman</th>
                            <th scope="col" class="col-2">Kode Barang</th>
                            <th scope="col" class="col-2"> Barang</th>
                            <th scope="col" class="col-1 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="f-small">
                        <?php
                        if (empty($dataDetailPeminjaman)) {
                            echo "<tr class='text-center fw-bold'><td colspan='5' class='bg-secondary'>Detail Data Peminjaman Tidak Ditemukan</td></tr>";
                        } else {
                            $no = 1;
                            foreach ($dataDetailPeminjaman as $dDPinjam) :
                        ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $dDPinjam['kode_peminjaman']; ?></td>
                                    <td><?= $dDPinjam['kode_barang']; ?></td>
                                    <td><?= $dDPinjam['nama_barang']; ?></td>
                                    <td class="text-center d-flex">
                                        <a href="<?= base_url(); ?>peminjaman"><button class="btn btn-success btn-sm"><i class="bi  bi-arrow-left-square"></i></button></a>
                                        <form id="deleteForm-<?= $dDPinjam['kode_barang']; ?>" action="<?= base_url(); ?>deleteDetail" method="post" class="ms-1">
                                            <?= csrf_field() ?>
                                            <input type="hidden" name="kode_barang" value="<?= $dDPinjam['kode_barang']; ?>">
                                            <input type="hidden" name="kode_peminjaman" value="<?= $dDPinjam['kode_peminjaman']; ?>">
                                            <button type="button" class="btn btn-danger btn-sm" name="btnDeleteBarang" onclick="confirmDelete('<?= $dDPinjam['kode_barang']; ?>')">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                        <?php endforeach;
                        } ?>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- end content -->
    </div>
</div>
<!-- end body template -->
<script>
    function confirmDelete(kode_barang) {
        Swal.fire({
            title: "Yakin menghapus data ini?",
            text: "Data tidak akan bisa dipulihkan",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, Hapus!"
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('deleteForm-' + kode_barang).submit();
            }
        });
    }
</script>
<?php $this->endSection(); ?>