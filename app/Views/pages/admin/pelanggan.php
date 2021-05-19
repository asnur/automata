<?= $this->extend('layout/template_admin'); ?>

<?= $this->section('content'); ?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3 class="m-0 text-dark">Pelanggan</h3>
                </div><!-- /.col -->
                <div class="col-md-6">
                    <div class="float-right">
                        <a href="/admin/tambah_pelanggan" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Data</a>
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
                            <table id="table" class="table table-bordered table-striped">
                                <thead class="text-white" style="background-color: #FBC740;">
                                    <tr>
                                        <th>Foto</th>
                                        <th>Nama</th>
                                        <th>Username</th>
                                        <th>Perusahaan</th>
                                        <th>Alamat Perusahaan</th>
                                        <th>No Hp</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($pelanggan as $p) {
                                    ?>
                                        <tr>
                                            <td align="center"><img src="<?= (empty($p['foto']) ? '/dist/img/find_user.png' : '/dist/img/user/' . $p['foto']); ?>" style="width: 100px; height: 130px; object-fit:cover;"></td>
                                            <td><?= $p['nama'] ?></td>
                                            <td><?= $p['username'] ?></td>
                                            <td><?= $p['perusahaan'] ?></td>
                                            <td><?= $p['alamat'] ?></td>
                                            <td><?= $p['no_hp'] ?></td>
                                            <td>
                                                <form action="/pelanggan/<?= $p['id'] ?>" method="POST" class="d-inline">
                                                    <?= csrf_field(); ?>
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                                </form>
                                                <a href="/admin/edit_pelanggan/<?= $p['id'] ?>" class="btn btn-warning"><i class="fa fa-edit"></i></i></i></a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                                <tfoot class="text-white text-center" style="background-color: #FBC740;">
                                    <tr>
                                        <th>Foto</th>
                                        <th>Nama</th>
                                        <th>Username</th>
                                        <th>Perusahaan</th>
                                        <th>Alamat Perusahaan</th>
                                        <th>No Hp</th>
                                        <th>Aksi</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </section>
            </div>
        </div>
    </section>
</div>

<?= $this->endSection(); ?>