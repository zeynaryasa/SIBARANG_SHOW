<?php $this->extend('template/layout') ?>
<?php $this->section('content') ?>

<!-- body tenplate -->
<div class="row mt-2">
    <div class="col"></div>

    <div class="col-8">
        <!-- content -->
        <!-- change this to your content -->
        <div class="card">
            <div class="card-body">
                <div class="card-title text-center ">
                    <h4 class="fw-bold">Update Data Karyawan</h4>
                </div>
                <form action="<?= base_url(); ?>updateKaryawan" method="POST">
                    <?php csrf_field() ?>
                    <?php foreach ($dataKaryawanById as $row) : ?>
                        <div class="mb-3 mt-5">
                            <div class="row">
                                <div class="col-3" hidden>
                                    <label for="idKaryawan" class="form-label ">ID Karyawan <strong class="text-danger">*</strong></label>
                                    <input type="text" name="idKaryawan" class="form-control " id="idKaryawan" value="<?= $row['id_karyawan']; ?>" required autofocus>
                                </div>
                                <div class="col-5">
                                    <label for="namaKaryawan" class="form-label ">Nama Karyawan <strong class="text-danger">*</strong></label>
                                    <input type="text" name="namaKaryawan" class="form-control " id="namaKaryawan" value="<?= $row['nama_karyawan']; ?>" required>
                                </div>
                                <div class="col-4">
                                    <label for="posisiKaryawan" class="form-label ">Posisi Karyawan <strong class="text-danger">*</strong></label>
                                    <select name="posisiKaryawan" id="posisiKaryawan" class="form-control">
                                        <option value="<?= $row['posisi_karyawan']; ?>" selected><?= $row['posisi_karyawan']; ?></option>
                                        <option value="Posisi 1">Posisi 1</option>
                                        <option value="Posisi 2">Posisi 2</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-8">
                                <div class="mb-3">
                                    <label for="alamatKaryawan" class="form-label ">Alamat Karyawan <strong class="text-danger">*</strong></label>
                                    <input type="text" name="alamatKaryawan" class="form-control " value="<?= $row['alamat_karyawan']; ?>" id="alamatKaryawan" required>
                                </div>
                            </div>
                        </div>
                        <div class="text-center mb-3 ">
                            <button type="submit" class="btn btn-primary" name="btnInsertKaryawan">Save</button>
                        </div>
                </form>
            <?php endforeach; ?>
            </div>
        </div>
        <!-- end content -->
    </div>

    <div class="col"></div>
</div>
<!-- end body template -->

<?php $this->endSection(); ?>