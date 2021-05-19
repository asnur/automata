<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        body {
            background: rgb(5, 32, 134);
            background: linear-gradient(196deg, rgba(5, 32, 134, 1) 0%, rgba(241, 196, 15, 1) 46%, rgba(5, 32, 134, 1) 100%);
            background-repeat: no-repeat;
        }

        .login {
            width: 50%;
            margin-top: 5%;
            border-radius: 10px;
            box-shadow: 5px 5px 10px #000000;
        }

        @media screen and (max-width: 500px) {
            .login {
                width: 90%;
                margin-top: 25%;
            }
        }
    </style>
    <title>Register</title>
</head>

<body>
    <!-- <h1>Hello, world!</h1> -->
    <div class="card mx-auto login">
        <form action="/login/save_register" method="POST" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <div class="card-body">
                <div class="text-center mt-2 mb-4">
                    <img src="/assets/images/icons/logo.png" style="width: 50px; height:50px;"><br>
                    <h4 class="mt-2">PT. Automata Info Nusantara</h4>
                </div>
                <div class="alert alert-warning" role="alert">
                    <h5 class="alert-heading">Perhatian!</h5>
                    <hr>
                    <p class="mb-0">Untuk Form Bukti Anda Harus Melampirkan Foto Kartu Tanda Pegawai di Tempat Perusahaan Anda Bekerja</p>
                </div>
                <label><b>Nama Lengkap</b></label>
                <input type="text" required name="nama" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" placeholder="Masukan Nama Lengkap">
                <div class="invalid-feedback">
                    <?= $validation->getError('nama'); ?>
                </div><br>
                <label><b>Username</b></label>
                <input type="text" required name="username" class="form-control <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?>" placeholder="Masukan Username">
                <div class="invalid-feedback">
                    <?= $validation->getError('username'); ?>
                </div><br>
                <label><b>Password</b></label>
                <input type="password" required name="password" class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" placeholder="Masukan password">
                <div class="invalid-feedback">
                    <?= $validation->getError('username'); ?>
                </div><br>
                <label><b>Email</b></label>
                <input type="email" required name="email" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" placeholder="Masukan Email">
                <div class="invalid-feedback">
                    <?= $validation->getError('email'); ?>
                </div><br>
                <label><b>Foto Profil</b></label>
                <input type="file" required name="foto" class="form-control <?= ($validation->hasError('foto')) ? 'is-invalid' : ''; ?>" required>
                <div class="invalid-feedback">
                    <?= $validation->getError('foto'); ?>
                </div><br>
                <label><b>Nama Perusahaan</b></label>
                <input type="text" required name="perusahaan" class="form-control <?= ($validation->hasError('perusahaan')) ? 'is-invalid' : ''; ?>" placeholder="Masukan Nama Perusahaan">
                <div class="invalid-feedback">
                    <?= $validation->getError('perusahaan'); ?>
                </div><br>
                <label><b>Alamat Perusahaan</b></label>
                <input type="text" required name="alamat_perusahaan" class="form-control <?= ($validation->hasError('alamat_perusahaan')) ? 'is-invalid' : ''; ?>" placeholder="Masukan Alamat Perusahaan">
                <div class="invalid-feedback">
                    <?= $validation->getError('alamat_perusahaan'); ?>
                </div><br>
                <label><b>Bukti</b></label>
                <input type="file" required name="bukti" class="form-control <?= ($validation->hasError('bukti')) ? 'is-invalid' : ''; ?>" required>
                <div class="invalid-feedback">
                    <?= $validation->getError('bukti'); ?>
                </div><br>
                <label><b>No Hp</b></label>
                <input type="number" required name="no_hp" class="form-control <?= ($validation->hasError('no_hp')) ? 'is-invalid' : ''; ?>" placeholder="Masukan No HP">
                <div class="invalid-feedback">
                    <?= $validation->getError('no_hp'); ?>
                </div><br>
                <button type="submit" class="btn btn-warning text-white form-control mb-3 text-bold">Register</button>
            </div>
        </form>
    </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>