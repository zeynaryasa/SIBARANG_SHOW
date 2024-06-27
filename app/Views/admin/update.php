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
                    <h4 class="fw-bold">Insert Data Admin</h4>
                </div>
                <form action="<?= base_url(); ?>updateAdmin" method="POST">
                    <?php csrf_field() ?>
                    <?php foreach ($dataAdminById as $row) : ?>
                        <div class="mb-3 mt-5">
                            <div class="row">
                                <input type="text" name="idAdmin" class="form-control " value="<?= $row['id_admin']; ?>" id="idAdmin" required autofocus hidden>
                                <div class="col-5">
                                    <label for="namaAdmin" class="form-label ">Nama Admin <strong class="text-danger">*</strong></label>
                                    <input type="text" name="namaAdmin" class="form-control " id="namaAdmin" value="<?= $row['nama_admin']; ?>" required>
                                </div>
                                <div class="col-4">
                                    <label for="posisiAdmin" class="form-label ">Posisi Admin <strong class="text-danger">*</strong></label>
                                    <select name="posisiAdmin" id="posisiAdmin" class="form-control" required>
                                        <option selected value="<?= $row['posisi_admin']; ?>"><?= $row['posisi_admin']; ?></option>
                                        <option value="Posisi 1">Posisi 1</option>
                                        <option value="Posisi 2">Posisi 2</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-8">
                                <div class="mb-3">
                                    <label for="alamatAdmin" class="form-label ">Alamat Admin <strong class="text-danger">*</strong></label>
                                    <input type="text" name="alamatAdmin" class="form-control " value="<?= $row['alamat_admin']; ?>" id="alamatAdmin" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label for="password" class="form-label ">Password <strong class="text-danger">*</strong></label>
                                    <input type="password" name="password" class="form-control " value="<?= $row['password']; ?>" id="password" required>
                                </div>
                            </div>
                        </div>
                        <div class="text-center mb-3 ">
                            <button type="submit" class="btn btn-primary" name="btnInsertAdmin">Save</button>
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