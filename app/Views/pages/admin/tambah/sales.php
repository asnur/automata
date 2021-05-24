<?= $this->extend('layout/template_admin'); ?>

<?= $this->section('content'); ?>



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3 class="m-0 text-dark">Tambah Data Sales</h3>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <section class="col-lg-12 connectedSortable">
                    <div class="card">
                        <div class="card-body">
                            <form action="/admin/save_tambah_sales" method="POST" enctype="multipart/form-data">
                                <?= csrf_field() ?>
                                <div class="row">
                                    <div class="col-md-8">
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
                                            <?= $validation->getError('password'); ?>
                                        </div><br>
                                        <label><b>Email</b></label>
                                        <input type="email" required name="email" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" placeholder="Masukan Email">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('email'); ?>
                                        </div><br>
                                        <label><b>No Hp</b></label>
                                        <input type="number" required name="no_hp" class="form-control <?= ($validation->hasError('no_hp')) ? 'is-invalid' : ''; ?>" placeholder="Masukan No HP">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('no_hp'); ?>
                                        </div><br>
                                        <button type="submit" class="btn btn-warning text-white mb-3 text-bold"><i class="fa fa-paper-plane"></i> Register</button>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Foto Profil</label><br>
                                        <center>
                                            <img src="/dist/img/find_user.png" id="blah" style="width: 120px; height:  120px; object-fit:cover; object-position: center;" class="mt-2 mb-2 img-circle">
                                        </center>
                                        <input type="file" id="imgInp" name="foto" class="form-control <?= ($validation->hasError('foto')) ? 'is-invalid' : ''; ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('foto'); ?>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </section>
            </div>
        </div>
    </section>
</div>

<?= $this->endSection(); ?>