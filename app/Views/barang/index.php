<?php $this->extend('template/layout') ?>
<?php $this->section('content') ?>
<!-- body tenplate -->
<div class="col">
    <a href="insertBarang"><button class="btn btn-primary btn-sm"><i class="bi bi-plus"></i></button></a>
    <button class="btn btn-secondary btn-sm " disabled><i class="bi bi-printer">Cetak Barcode<span class="badge text-bg-danger">*soon</span> </i></button>
</div>

<div class="row mt-2">
    <div class="col">
        <!-- content -->
        <!-- change this to your content -->
        <div class="card">
            <div class="card-body">
                <div class="card-title text-center fw-bold">Data Barang</div>
                <table class="table">
                    <thead>
                        <tr class="f-small">
                            <th scope="col" class="col-1">No</th>
                            <th scope="col" class="col-2">Kode Barang</th>
                            <th scope="col" class="col-2">Nama Barang</th>
                            <th scope="col" class="col-2">Jumlah</th>
                            <th scope="col" class="col-1">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="f-small">
                        <?php
                        if (empty($dataBarang)) {
                            echo "<tr class='text-center fw-bold'><td colspan='5' class='bg-secondary'>Data Barang Tidak Ditemukan</td></tr>";
                        } else {
                            $no = 1;
                            foreach ($dataBarang as $dBarang) :
                        ?>
                                <tr>
                                    <th scope="row"><?= $no++; ?></th>
                                    <td><?= $dBarang['kode_barang']; ?></td>
                                    <td><?= $dBarang['nama_barang']; ?></td>
                                    <td><?= $dBarang['jumlah']; ?></td>
                                    <td class="d-flex">
                                        <a href="barang/<?= $dBarang['kode_barang']; ?>"><button class="btn btn-warning btn-sm"><i class="bi bi-tools"></i></button></a>
                                        <form id="deleteForm-<?= $dBarang['kode_barang']; ?>" action="deleteBarang" method="post" class="ms-1">
                                            <?= csrf_field() ?>
                                            <input type="hidden" name="kode_barang" value="<?= $dBarang['kode_barang']; ?>">
                                            <button type="button" class="btn btn-danger btn-sm" name="btnDeleteBarang" onclick="confirmDelete('<?= $dBarang['kode_barang']; ?>')">
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
    function confirmDelete(kode_barang) {
        Swal.fire({
            title: "Yakin menghapus data ini?",
            text: "Data barang pada peminjaman dengan kode ini juga akan DIHAPUS",
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