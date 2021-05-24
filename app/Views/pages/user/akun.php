<?= $this->extend('layout/template_user_1'); ?>

<?= $this->section('content'); ?>

<form action="/home/save_akun" method="POST" enctype="multipart/form-data">
    <?= csrf_field() ?>
    <div class="container mt-5 mb-5">
        <h1 class="mt-5 mb-5">Ubah Data Akun </h1>
        <div class="row">
            <div class="row">
                <div class="col-md-8">
                    <label><b>Nama Lengkap</b></label>
                    <input type="text" required name="nama" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" placeholder="Masukan Nama Lengkap" value="<?= $pelanggan['nama'] ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('nama'); ?>
                    </div><br>
                    <label><b>Username</b></label>
                    <input type="text" required name="username" class="form-control <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?>" placeholder="Masukan Username" value="<?= $pelanggan['username'] ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('username'); ?>
                    </div><br>
                    <label><b>Email</b></label>
                    <input type="email" required name="email" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" placeholder="Masukan Email" value="<?= $pelanggan['email'] ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('email'); ?>
                    </div><br>
                    <label><b>Nama Perusahaan</b></label>
                    <input type="text" required name="perusahaan" class="form-control <?= ($validation->hasError('perusahaan')) ? 'is-invalid' : ''; ?>" placeholder="Masukan Nama Perusahaan" value="<?= $pelanggan['perusahaan'] ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('perusahaan'); ?>
                    </div><br>
                    <label><b>Alamat Perusahaan</b></label>
                    <input type="text" required name="alamat_perusahaan" class="form-control <?= ($validation->hasError('alamat_perusahaan')) ? 'is-invalid' : ''; ?>" placeholder="Masukan Alamat Perusahaan" value="<?= $pelanggan['alamat'] ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('alamat_perusahaan'); ?>
                    </div><br>
                    <label><b>No Hp</b></label>
                    <input type="number" required name="no_hp" class="form-control <?= ($validation->hasError('no_hp')) ? 'is-invalid' : ''; ?>" placeholder="Masukan No HP" value="<?= $pelanggan['no_hp'] ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('no_hp'); ?>
                    </div><br>
                    <button type="submit" class="btn btn-warning text-white mb-3 text-bold"><i class="fa fa-paper-plane"></i> Edit Akun</button>
                </div>
                <div class="col-md-4">
                    <label><b>Foto Profil</b></label><br>
                    <center>
                        <img src="<?= (empty($pelanggan['foto']) ? '/dist/img/find_user.png' : '/dist/img/user/' . $pelanggan['foto'] . '') ?>" id="blah" style="width: 120px; height:  120px; object-fit:cover; object-position: center;" class="mt-2 mb-2 img-circle">
                    </center>
                    <input type="file" id="imgInp" name="foto" class="form-control <?= ($validation->hasError('foto')) ? 'is-invalid' : ''; ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('foto'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
</form>


<?= $this->endSection(); ?>