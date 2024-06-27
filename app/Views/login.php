<!DOCTYPE html>
<html>

<head>
    <style>
        body {
            background-color: #f0f0f0;
            font-family: Arial, sans-serif;
        }

        .login-container {
            width: 300px;
            padding: 16px;
            background-color: #ffffff;
            margin: 0 auto;
            margin-top: 100px;
            border-radius: 4px;
            box-shadow: 0px 0px 10px 0px #000;
        }

        .login-container h1 {
            text-align: center;
            color: #5b6574;
        }

        .login-container form {
            width: 100%;
            height: auto;
            padding-top: 20px;
        }

        .login-container form input {
            width: 100%;
            height: 40px;
            margin-bottom: 20px;
            padding-left: 40px;
            box-sizing: border-box;
            border-radius: 20px;
            border: 1px solid #ccc;
        }

        .login-container form button {
            width: 100%;
            height: 40px;
            background-color: #003285;
            border: 0;
            border-radius: 20px;
            color: white;
            font-weight: bold;
            transition: background-color 1s;
            cursor: pointer;
        }

        .login-container form button:hover {
            background-color: #FF5F00;
        }
    </style>
    <link rel="stylesheet" href="<?= base_url(); ?>css/main.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<div class=" container-fluid">
    <div class="mx-5">
        <div class="col">
            <?php if (session()->getFlashdata('pesan')) : ?>
                <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: '<?= session()->getFlashdata('pesan'); ?>',
                        showConfirmButton: false,
                        timer: 700
                    })
                </script>
            <?php endif; ?>
        </div>
    </div>
</div>
<div class=" container-fluid">
    <div class="mx-5">
        <div class="col">
            <?php if (session()->getFlashdata('Logout')) : ?>
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: ' <?= session()->getFlashdata('Logout'); ?>',
                        text: 'Logout Berhasil',
                        showConfirmButton: false,
                        timer: 1000
                    })
                </script>

            <?php endif; ?>
        </div>
    </div>
</div>

<body>
    <div class="login-container">
        <h1>Login</h1>
        <form class="" action="prcLogin" method="POST">
            <?php csrf_field() ?>
            <div>
                <label for="id_admin">ID</label>
                <div class="mt-2">
                    <input id="id_admin" name="id_admin" type="text" autocomplete="off" required>
                </div>
            </div>

            <div>
                <div class="flex items-center justify-between">
                    <label for="password" class="block text-sm font-medium leading-6 text-black">Password</label>
                </div>
                <div class="mt-2">
                    <input id="password" name="password" type="password" autocomplete="current-password" required>
                </div>
            </div>

            <div>
                <button type="submit" value="btnLogin" name="btnLogin">Sign in</button>
            </div>
        </form>
    </div>
</body>
<footer style="text-align: center; padding: 10px; background-color: #f2f2f2; margin-top:5%;">
    © <?php echo date("Y"); ?> I Kadek Naryasa. All rights reserved.
</footer>

</html>