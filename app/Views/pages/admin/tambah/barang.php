<?= $this->extend('layout/template_admin'); ?>

<?= $this->section('content'); ?>



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3 class="m-0 text-dark">Tambah Data Barang</h3>
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
                            <form action="/admin/save_tambah_barang" method="POST" enctype="multipart/form-data">
                                <?= csrf_field() ?>
                                <div class="row">
                                    <div class="col-md-8">
                                        <label><b>Nama Barang</b></label>
                                        <input type="text" required name="nama" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" placeholder="Masukan Nama Barang">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('nama'); ?>
                                        </div><br>
                                        <label><b>Harga</b></label>
                                        <input type="number" required name="harga" class="form-control <?= ($validation->hasError('harga')) ? 'is-invalid' : ''; ?>" placeholder="Masukan harga">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('harga'); ?>
                                        </div><br>
                                        <label><b>Stok</b></label>
                                        <input type="number" required name="stok" class="form-control <?= ($validation->hasError('stok')) ? 'is-invalid' : ''; ?>" placeholder="Masukan stok">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('stok'); ?>
                                        </div><br>
                                        <label><b>Kategori</b></label>
                                        <select required name="kategori" class="form-control <?= ($validation->hasError('kategori')) ? 'is-invalid' : ''; ?>" placeholder="Masukan kategori">
                                            <option value="jual">Jual</option>
                                            <option value="sewa">Sewa</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('kategori'); ?>
                                        </div><br>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Cover</label><br>
                                        <!-- <center>
                                            <img src="/dist/img/find_user.png" id="blah" style="width: 120px; height:  120px; object-fit:cover; object-position: center;" class="mt-2 mb-2 img-circle">
                                        </center> -->
                                        <input type="file" id="imgInp" name="foto" class="form-control <?= ($validation->hasError('foto')) ? 'is-invalid' : ''; ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('foto'); ?>
                                        </div><br>
                                        <center>
                                            <img src="/dist/img/cover/none.png" id="blah" style="width: 150px; height:  80px; object-fit:cover; object-position: center;" class="mt-2 mb-2">
                                        </center><br>
                                        <label>Gallery</label><br>
                                        <input type="file" id="galleryInp" name="fotos[]" class="form-control <?= ($validation->hasError('fotos')) ? 'is-invalid' : ''; ?>" multiple="multiple">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('fotos'); ?>
                                        </div><br>
                                        <div class="row gallery">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label>Deskripsi</label><br>
                                        <textarea rows="5" id="summernote" name="deskripsi" required class="summernote"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-success text-white mb-3 text-bold"><i class="fa fa-paper-plane"></i> Tambahkan</button>
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