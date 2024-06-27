<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="<?= base_url(); ?>css/main.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        * {
            font-family: 'Inter', sans-serif;
            margin: 0;
            padding: 0;
        }

        #scroll-table {
            max-height: 400px;
            overflow-y: auto;
            display: block;
        }

        .f-small {
            font-size: smaller;
        }
    </style>
</head>
<div class=" container-fluid">
    <div class="mx-5">
        <div class="col">
            <?php if (session()->getFlashdata('login')) : ?>
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: ' <?= session()->getFlashdata('login'); ?>',
                        text: 'Selamat Datang <?= session('nama_admin'); ?> ',
                        showConfirmButton: false,
                        timer: 1000
                    })
                </script>

            <?php endif; ?>
        </div>
    </div>
</div>
<div class=" container-fluid">
    <div class="mx-5">
        <div class="col">
            <?php if (session()->getFlashdata('pesan')) : ?>
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: ' Sukses !',
                        text: '<?= session()->getFlashdata('pesan'); ?> ',
                        showConfirmButton: false,
                        timer: 1500
                    })
                </script>

            <?php endif; ?>
        </div>
    </div>
</div>
<div class=" container-fluid">
    <div class="mx-5">
        <div class="col">
            <?php if (session()->getFlashdata('warning')) : ?>
                <script>
                    Swal.fire({
                        icon: 'warning',
                        title: ' Warning !',
                        text: '<?= session()->getFlashdata('warning'); ?> ',
                        showConfirmButton: false,
                        timer: 1500
                    })
                </script>

            <?php endif; ?>
        </div>
    </div>
</div>

<body>
    <!-- profile -->
    <nav class="navbar  bg-primary">
        <h4 class="text-light text-center mx-auto my-auto fw-bold"><?= $dataSistem[0]['appName'] ?></h4>
    </nav>
    <!-- end Profile -->

    <div class="container-fluid">
        <!-- body -->
        <div class="row">
            <!-- navbar -->
            <div class="col-2">
                <div class="card mt-2">
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><a href="<?= base_url(); ?>dashboard" class="text-decoration-none text-black"><i class="bi bi-house-fill me-1"></i>Dashboard &raquo;</a></li>
                            <li class="list-group-item"><a href="<?= base_url(); ?>barang" class="text-decoration-none text-black"><i class="bi bi-shop me-1"></i>Barang &raquo;</a></li>
                            <li class="list-group-item"><a href="<?= base_url(); ?>peminjaman" class="text-decoration-none text-black"><i class="bi bi-card-list me-1"></i>Peminjaman &raquo;</a></li>
                            <li class="list-group-item"><a href="<?= base_url(); ?>admin" class="text-decoration-none text-black"><i class="bi bi-person-fill-gear me-1"></i>Admin &raquo;</a></li>
                            <li class="list-group-item"><a href="<?= base_url(); ?>karyawan" class="text-decoration-none text-black"><i class="bi bi-people-fill me-1"></i>Karyawan &raquo;</a></li>
                            <li class="list-group-item"><a href="<?= base_url(); ?>sistem" class="text-decoration-none text-black"><i class="bi bi-gear-fill me-1"></i>Profile Sistem &raquo;</a></li>
                            <li class="list-group-item"><a href="<?= base_url(); ?>profile" class="text-decoration-none text-black"><i class="bi bi-person-fill-gear me-1"></i>Profile &raquo;</a></li>
                            <li class="list-group-item"><a type=" button" href="" class="text-decoration-none text-black " data-bs-toggle="modal" data-bs-target="#modalProfile">Logout
                                    <strong>&raquo;</strong>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- end Navbar -->

            <!-- body full -->
            <div class="col-9 mt-2 ">
                <div class="card py-0">
                    <!-- card container -->
                    <div class="card-body ">

                        <!-- template -->
                        <div class="row ">
                            <div class="col-2 fw-bold text-danger">
                                <strong class="badge text-bg-primary"><?= $dataSistem[0]['companyName'] ?></strong>
                            </div>
                            <div class="col-1 fw-bold text-danger">
                                <strong class="badge text-bg-success"><?= session('nama_admin') ?></strong>
                            </div>
                            <div class="col">
                                <!-- 
                                    ..... 
                                 -->
                            </div>

                            <!-- date & clock -->
                            <div class="col-3">
                                <div class="card border border-danger bg-primary">
                                    <div class="card-body text-center text-white">
                                        <?php
                                        $nama_bulan = [
                                            1 => 'Januari', 2 => 'Februari', 3 => 'Maret',
                                            4 => 'April', 5 => 'Mei', 6 => 'Juni',
                                            7 => 'Juli', 8 => 'Agustus', 9 => 'September',
                                            10 => 'Oktober', 11 => 'November', 12 => 'Desember'
                                        ];

                                        $bulan_sekarang = date('n'); // Angka bulan saat ini (1-12)
                                        echo date('d') . " " . $nama_bulan[$bulan_sekarang] . " " . date('Y');

                                        ?>
                                    </div>
                                </div>
                            </div>

                            <!-- end date & clock -->
                        </div>
                        <!-- end template -->

                        <!-- content -->
                        <?= $this->renderSection('content'); ?>
                        <!-- end content -->
                    </div>
                    <!-- end card container -->

                </div>
            </div>
            <!-- end Body full -->
        </div>
        <!-- end body -->
    </div>
    <footer style="text-align: center; padding: 10px; background-color: #f2f2f2;">
        © 2024 - <?php echo date("Y"); ?> I Kadek Naryasa. All rights reserved.
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
<div class="modal fade" id="modalProfile" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalProfile" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="text-center">
                    <img src="<?= base_url('img/avatar.png'); ?>" alt="" width="25%">
                </div>
                <div class="fw-semibold text-center"><?= session('nama_admin'); ?></div>
                <?= csrf_field(); ?>
                <div class="col-md-12 text-center mt-5">
                    <a href="<?= base_url(); ?>logout" class="text-decoration-none">
                        <button class="btn btn-success me-5">Keluar</button>
                    </a>
                    <button class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">Kembali</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

</html>