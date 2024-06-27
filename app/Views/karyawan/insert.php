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
                    <h4 class="fw-bold">Insert Data Karyawan</h4>
                </div>
                <form action="insertKaryawan" method="POST">
                    <?php csrf_field() ?>
                    <div class="mb-3 mt-5">
                        <div class="row">
                            <div class="col-3">
                                <label for="idKaryawan" class="form-label ">ID Karyawan <strong class="text-danger">*</strong></label>
                                <input type="text" name="idKaryawan" class="form-control " id="idKaryawan" required autofocus>
                            </div>
                            <div class="col-5">
                                <label for="namaKaryawan" class="form-label ">Nama Karyawan <strong class="text-danger">*</strong></label>
                                <input type="text" name="namaKaryawan" class="form-control " id="namaKaryawan" required>
                            </div>
                            <div class="col-4">
                                <label for="posisiKaryawan" class="form-label ">Posisi Karyawan <strong class="text-danger">*</strong></label>
                                <select name="posisiKaryawan" id="posisiKaryawan" class="form-control">
                                    <option disabled selected>Choose...</option>
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
                                <input type="text" name="alamatKaryawan" class="form-control " id="alamatKaryawan" required>
                            </div>
                        </div>
                    </div>
                    <div class="text-center mb-3 ">
                        <button type="submit" class="btn btn-primary" name="btnInsertKaryawan">Save</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- end content -->
    </div>

    <div class="col"></div>
</div>
<!-- end body template -->

<?php $this->endSection(); ?>