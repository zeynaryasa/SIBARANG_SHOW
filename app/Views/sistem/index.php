<?php $this->extend('template/layout') ?>
<?php $this->section('content') ?>

<!-- body tenplate -->
<div class="row ">
    <div class="col"></div>

    <div class="col-5">
        <!-- content -->
        <!-- change this to your content -->
        <div class="card">
            <div class="card-body">
                <div class="card-title text-center ">
                    <h4 class="fw-bold">Profile Sistem</h4>
                </div>
                <form action="updateSistem" method="POST">
                    <?php foreach ($dataSistem as $dsistem) : ?>
                        <input type="text" value="<?= $dsistem['id']; ?>" hidden name="idProfileSistem">
                        <div class="mb-3">
                            <label for="appName" class="form-label fw-bold">App Name <strong class="text-danger">*</strong></label>
                            <input type="text" name="appName" class="form-control fw-bold" id="appName" value="<?= $dsistem['appName']; ?>" required oninput="this.value = this.value.toUpperCase()">
                        </div>
                        <div class="mb-3">
                            <label for="companyName" class="form-label fw-bold">Company Name <strong class="text-danger">*</strong></label>
                            <input type="text" name="companyName" class="form-control fw-bold" id="companyName" value="<?= $dsistem['companyName']; ?>" required oninput="this.value = this.value.toUpperCase()">
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary" name="submitProfileSistem">Save</button>
                        </div>
                    <?php endforeach; ?>
                </form>
            </div>
        </div>
        <!-- end content -->
    </div>

    <div class="col"></div>
</div>
<!-- end body template -->

<?php $this->endSection(); ?>