<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Login</title>
    <link rel="stylesheet" href="<?= base_url() ?>assets/auth/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/auth/css/fontawesome.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/auth/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/auth/style.css">
    <style>
        .btn-primary {
            background-color: #58d5f7;
            border: 1px solid white
        }

        .btn-primary:hover {
            background-color: #5b93d3;
            border: 1px solid white
        }
    </style>
</head>

<body>

    <div class="main-wrapper login-body">
        <div class="login-wrapper">
            <div class="container">
                <div class="loginbox pb-4 px-3">
                    <div class="login-right">
                        <div class="login-right-wrap">
                            <div class="image text-center mb-2">
                                <img src="<?= base_url() ?>assets/images/12.png" height="100px" class="" alt="">
                            </div>
                            <h2 class="account-subtitle">SMK PASUNDAN 2 CIANJUR</h2>
                            <?= $this->session->flashdata('message'); ?>
                            <form action="" method="post">
                                <div class="form-group">
                                    <label class="form-control-label">Username</label>
                                    <input type="text" name="username" class="form-control" placeholder="Masukkan Username">
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">Password</label>
                                    <div class="pass-group">
                                        <input type="password" name="password" class="form-control pass-input" placeholder="Masukkan Password">
                                        <span class="fas fa-eye toggle-password"></span>
                                    </div>
                                </div>
                                <button name="login" class="btn btn-lg btn-block btn-primary w-100 mt-3" type="submit">Login</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="<?= base_url() ?>assets/auth/jquery-3.6.0.min.js"></script>

    <script src="<?= base_url() ?>assets/auth/bootstrap.bundle.min.js"></script>

    <script src="<?= base_url() ?>assets/auth/feather.min.js"></script>

    <script src="<?= base_url() ?>assets/auth/script.js"></script>
</body>

</html>