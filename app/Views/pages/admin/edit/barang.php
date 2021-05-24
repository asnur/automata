<?= $this->extend('layout/template_admin'); ?>

<?= $this->section('content'); ?>



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3 class="m-0 text-dark">Edit Data Barang</h3>
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
                            <form action="/admin/save_edit_barang/<?= $barang['id'] ?>" method="POST" enctype="multipart/form-data">
                                <?= csrf_field() ?>
                                <div class="row">
                                    <div class="col-md-8">
                                        <label><b>Nama Barang</b></label>
                                        <input type="text" value="<?= $barang['nama_barang'] ?>" name="nama" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" placeholder="Masukan Nama Barang">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('nama'); ?>
                                        </div><br>
                                        <label><b>Harga</b></label>
                                        <input type="number" value="<?= $barang['harga'] ?>" required name="harga" class="form-control <?= ($validation->hasError('harga')) ? 'is-invalid' : ''; ?>" placeholder="Masukan harga">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('harga'); ?>
                                        </div><br>
                                        <label><b>Stok</b></label>
                                        <input type="number" value="<?= $barang['stok'] ?>" required name="stok" class="form-control <?= ($validation->hasError('stok')) ? 'is-invalid' : ''; ?>" placeholder="Masukan stok">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('stok'); ?>
                                        </div><br>
                                        <label><b>Kategori</b></label>
                                        <select name="kategori" class="form-control <?= ($validation->hasError('kategori')) ? 'is-invalid' : ''; ?>" placeholder="Masukan kategori">
                                            <option value="jual" <?= ($barang['kategori'] == 'jual') ? 'selected' : '' ?>>Jual</option>
                                            <option value="sewa" <?= ($barang['kategori'] == 'sewa') ? 'selected' : '' ?>>Sewa</option>
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
                                            <img src="/assets/images/item/<?= $barang['foto'] ?>" id="blah" style="width: 150px; height:  80px; object-fit:cover; object-position: center;" class="mt-2 mb-2">
                                        </center><br>
                                        <label>Foto Gallery Baru</label><br>
                                        <input type="file" id="galleryInp" name="fotos[]" class="form-control <?= ($validation->hasError('fotos')) ? 'is-invalid' : ''; ?>" multiple="multiple">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('fotos'); ?>
                                        </div>
                                        <br>
                                        <a href="#" data-toggle="modal" data-target="#exampleModal">
                                            Lihat Gallery Foto..
                                        </a>
                                        <div class="row gallery">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label>Deskripsi</label><br>
                                        <textarea rows="5" id="summernote" name="deskripsi" required class="summernote">
                                            <?= $barang['deskripsi'] ?>
                                        </textarea>
                                    </div>
                                    <button type="submit" class="btn btn-warning text-white mb-3 text-bold"><i class="fa fa-edit"></i> Edit</button>
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

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header text-white" style="background-color: #FBC740;">
                <h4 class="modal-title" id="exampleModalLabel">Gallery Foto Barang <?= $barang['nama_barang'] ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                    <div class="alert alert-warning alert-dismissible fade show text-white" role="alert">
                        <strong>Perhatian!</strong> Mengklik Tombol <b>x</b> Akan Menghapus Gambar Secara Permanen.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="gallery-isi">
                        <?php
                        foreach ($gallery_barang as $gb) {
                        ?>
                            <div>
                                <form action="/foto/<?= $gb['id_foto'] ?>" method="POST">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="close remove-image" aria-label="Close" style="position:absolute; margin-left: 10px;">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </form>
                                <img src="/assets/images/item/<?= $gb['nama_foto']; ?>" style="width: 95%; height: 180px; object-fit:cover;">
                            </div>
                        <?php }  ?>
                    </div>
                </div>
            </div>
            <div class="modal-footer" style="background-color: #FBC740;">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>