<?= $this->extend('layout/template_admin'); ?>

<?= $this->section('content'); ?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3 class="m-0 text-dark">Barang</h3>
                </div><!-- /.col -->
                <div class="col-md-6">
                    <div class="float-right">
                        <a href="/admin/tambah_barang" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Data</a>
                    </div>
                </div>
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
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Jual</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Sewa</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                    <br>
                                    <table id="table" class="table table-bordered table-striped mt-5">
                                        <thead class="text-white" style="background-color: #FBC740;">
                                            <tr>
                                                <th>Foto</th>
                                                <th>Nama</th>
                                                <th>Harga</th>
                                                <th>Stok</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($barang_jual as $j) {
                                            ?>
                                                <tr>
                                                    <td align="center"><img src="/assets/images/item/<?= $j['foto'] ?>" style="width: 100px; height: 100px; object-fit:cover;"></td>
                                                    <td align="center"><?= $j['nama_barang'] ?></td>
                                                    <td align="center">Rp. <?= number_format($j['harga']) ?></td>
                                                    <td align="center"><?= $j['stok'] ?></td>
                                                    <td align="center">
                                                        <form action="/barang/<?= $j['id'] ?>" method="POST" class="d-inline">
                                                            <?= csrf_field(); ?>
                                                            <input type="hidden" name="_method" value="DELETE">
                                                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                                        </form>
                                                        <a href="/admin/edit_barang/<?= $j['id'] ?>" class="btn btn-warning"><i class="fa fa-edit"></i></i></i></a>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                        <tfoot class="text-white text-center" style="background-color: #FBC740;">
                                            <tr>
                                                <th>Foto</th>
                                                <th>Nama</th>
                                                <th>Harga</th>
                                                <th>Stok</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                    <br>
                                    <table id="table2" class="table table-bordered table-striped mt-5">
                                        <thead class="text-white" style="background-color: #FBC740;">
                                            <tr>
                                                <th>Foto</th>
                                                <th>Nama</th>
                                                <th>Harga</th>
                                                <th>Stok</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($barang_sewa as $s) {
                                            ?>
                                                <tr>
                                                    <td align="center"><img src="/assets/images/item/<?= $s['foto'] ?>" style="width: 100px; height: 100px; object-fit:cover;"></td>
                                                    <td align="center"><?= $s['nama_barang'] ?></td>
                                                    <td align="center">Rp. <?= number_format($s['harga']) ?></td>
                                                    <td align="center"><?= $s['stok'] ?></td>
                                                    <td align="center">
                                                        <form action="/barang/<?= $s['id'] ?>" method="POST" class="d-inline">
                                                            <?= csrf_field(); ?>
                                                            <input type="hidden" name="_method" value="DELETE">
                                                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                                        </form>
                                                        <a href="/admin/edit_barang/<?= $s['id'] ?>" class="btn btn-warning"><i class="fa fa-edit"></i></i></i></a>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                        <tfoot class="text-white text-center" style="background-color: #FBC740;">
                                            <tr>
                                                <th>Foto</th>
                                                <th>Nama</th>
                                                <th>Harga</th>
                                                <th>Stok</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>

                        </div>
                        <!-- /.card-body -->
                    </div>
                </section>
            </div>
        </div>
    </section>
</div>

<?= $this->endSection(); ?>