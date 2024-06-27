<?php $this->extend('template/layout') ?>
<?php $this->section('content') ?>

<!-- body template -->
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
                            <th scope="col" class="col-1">Kode Peminjaman</th>
                            <th scope="col" class="col-1">Admin</th>
                            <th scope="col" class="col-1">Peminjam</th>
                            <th scope="col" class="col-1">Tgl. Peminjam</th>
                            <th scope="col" class="col-1 text-center">status</th>
                            <th scope="col" class="col-1 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="f-small">
                        <?php
                        if (empty($dataPeminjaman)) {
                            echo "<tr class='text-center fw-bold'><td colspan='7' class='bg-secondary'>Data Peminjaman Tidak Ditemukan</td></tr>";
                        } else {
                            $no = 1;
                            foreach ($dataPeminjaman as $dPinjam) :
                        ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $dPinjam['kode_peminjaman']; ?></td>
                                    <td><?= $dPinjam['nama_admin']; ?></td>
                                    <td><?= $dPinjam['nama_karyawan']; ?></td>
                                    <td><?= $dPinjam['tgl_peminjaman']; ?></td>
                                    <td class="text-center">
                                        <?php
                                        if ($dPinjam['status'] == "kembali") {
                                            echo "<i class='badge text-bg-success'>kembali</i>";
                                        } else {
                                            echo "<i class='badge text-bg-danger'>dipinjam</i>";
                                        }
                                        ?>
                                    </td>
                                    <td class="text-center d-flex">
                                        <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#aprove<?= $dPinjam['kode_peminjaman']; ?>"><i class="bi bi-check2-circle"></i></button>
                                        <a class="ms-1" href="detail/<?= $dPinjam['kode_peminjaman']; ?>"><button class="btn btn-primary btn-sm"><i class="bi bi-arrow-right-square"></i></button></a>
                                        <form id="deleteForm-<?= $dPinjam['kode_peminjaman']; ?>" action="deletePeminjaman" method="post" class="ms-1">
                                            <?= csrf_field() ?>
                                            <input type="hidden" name="kode_peminjaman" value="<?= $dPinjam['kode_peminjaman']; ?>">
                                            <button type="button" class="btn btn-danger btn-sm" name="btnDeletePeminjaman" onclick="confirmDelete('<?= $dPinjam['kode_peminjaman']; ?>')">
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
<?php foreach ($dataPeminjaman as $dPinjam) : ?>
    <div class="modal fade" id="aprove<?= $dPinjam['kode_peminjaman']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <form action="konfirmasiPeminjaman" method="post">
                                <input type="text" name="kode_peminjaman" value="<?= $dPinjam['kode_peminjaman']; ?>" hidden>
                                <div class="col-12 text-center">
                                    <p class="fw-bold text-center">Konfirmasi Pengembalian Barang</p>
                                    <button class="btn btn-success" value="kembali" name="status"><i class="bi bi-check2"></i></button>
                                    <button class="btn btn-danger" value="dipinjam" name="status"><i class="bi bi-x"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<script>
    function confirmDelete(kode_peminjaman) {
        Swal.fire({
            title: "Yakin menghapus data ini?",
            text: "Data tidak akan bisa dipulihkan!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, Hapus!"
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('deleteForm-' + kode_peminjaman).submit();
            }
        });
    }
</script>
<?php $this->endSection(); ?>