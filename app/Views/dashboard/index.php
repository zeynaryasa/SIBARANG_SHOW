<?php $this->extend('template/layout') ?>
<?php $this->section('content') ?>
<!-- body template -->
<div class="row mt-2">
    <div class="col-6">
        <!-- content -->
        <!-- change this to your content -->
        <div class="card mb-5">
            <div class="card-body">
                <!-- form cari data barang by kode Barang -->
                <form action="keranjangBarang" method="POST">
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3 mt-2">
                                    <input type="text" name="kode_barang" class="form-control fw-bold" id="kode_barang" placeholder="Masukan Kode Barang" required autofocus oninput="this.value = this.value.toUpperCase()">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="row">
                    <div class="col">
                        <a href="resetCart"><button class="btn btn-danger btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Tooltip on top"><i class="bi bi-trash">Reset</i></button></a>
                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <i class="bi bi-plus"></i>
                            peminjam
                        </button>

                    </div>
                </div>
                <form action="cart" method="post">
                    <?php csrf_field() ?>
                    <table class="table table-striped">
                        <thead>
                            <tr class="f-small">
                                <th scope="col" class="fw-bold">Kode Barang</th>
                                <th scope="col" class=" fw-bold">Nama Barang</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (session('cart')) : ?>
                                <?php foreach (session('cart') as $bKeranjang) : ?>
                                    <tr>
                                        <td class="f-small"><?= $bKeranjang['kode_barang']; ?></td>
                                        <td class="f-small"><?= $bKeranjang['nama_barang']; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>

                        </tbody>
                    </table>
                </form>

            </div>
        </div>
        <!-- end content -->
    </div>

    <div class="col-6">
        <div class="card">
            <div class="card-body">
                <form action="cart" method="post">
                    <div class="row mb-3">
                        <div class="col text-center">
                            <strong class="fw-bold fs-5">Data Peminjaman</strong>
                        </div>
                    </div>
                    <div class="my-row">
                        <div class="col">
                            <p class="f-small"><strong>Kode Peminjaman : </strong><?= $kode_peminjaman; ?>
                                <input type="text" name="kode_peminjaman" value="<?= $kode_peminjaman; ?>" hidden>
                                <button class="btn btn-success btn-sm" name="btnInsertPeminjaman"><i class="bi bi-check2"></i>Save</button>
                            </p>
                        </div>
                    </div>
                    <div class="my-row">
                        <div class="col">
                            <input type="text" name="tgl_peminjaman" value="<?= date('Y-m-d'); ?>" hidden>
                            <p class="f-small"><strong>Tgl. Peminjaman : </strong><?= $tgl_peminjaman; ?></p>
                        </div>
                    </div>
                    <div class="my-row">
                        <div class="col-6">
                            <input type="text" name="id_admin" value="<?= session('id_admin'); ?>" hidden>
                            <p class="f-small"><strong>Admin : <?= session('nama_admin'); ?> </strong></p>
                        </div>
                    </div>
                    <div class="my-row">
                        <div class="col-12">
                            <?php if (session('dataKaryawan')) : ?>
                                <?php foreach (session('dataKaryawan') as $dKaryawan) : ?>
                                    <input type="hidden" name="id_karyawan" value="<?= $dKaryawan['id_karyawan']; ?>" required>
                                    <p class="f-small"><strong>Karyawan : <?= $dKaryawan['nama_karyawan']; ?> </strong>
                                        <a href="resetKaryawan">
                                            <b class="btn btn-danger btn-sm" name="btnUnsetSesionKaryawan"><i class="bi bi-x"></i>reset</b>
                                        </a>
                                    </p>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="my-row mt-2">
                        <div class="col-12">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="f-small">No</th>
                                        <th class="f-small">Kode Barang</th>
                                        <th class="f-small">Nama Barang</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (session('cart')) : ?>
                                        <?php $no = 1;
                                        foreach (session('cart') as $bKeranjang) : ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <input type="hidden" name="kode_barang[]" value="<?= $bKeranjang['kode_barang']; ?>">
                                                <td class="f-small"><?= $bKeranjang['kode_barang']; ?></td>
                                                <td class="f-small"><?= $bKeranjang['nama_barang']; ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="my-row mt-2">
                        <div class=" text-center">
                            <p class="fw-bold"><?= $dataSistem[0]['appName']; ?></p>
                        </div>
                    </div>
                    <div class="my-row">
                        <div class="col text-center">
                            <p class="fw-bold"><?= $dataSistem[0]['companyName']; ?></p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end body template -->

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <form action="getDataKaryawan" method="post">
                    <div class="row">
                        <div class="col">
                            <input type="text" name="id_karyawan" class="form-control" placeholder="Masukan ID Karyawan" required autofocus>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php $this->endSection(); ?>