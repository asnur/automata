<?= $this->extend('layout/template_admin'); ?>

<?= $this->section('content'); ?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3 class="m-0 text-dark">Pendaftar</h3>
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
                                    foreach ($pendaftaran as $p) {
                                    ?>
                                        <tr>
                                            <td align="center"><img src="<?= (empty($p['foto']) ? '/dist/img/find_user.png' : '/dist/img/user/' . $p['foto']); ?>" style="width: 100px; height: 130px; object-fit:cover;"></td>
                                            <td><?= $p['nama'] ?></td>
                                            <td><?= $p['username'] ?></td>
                                            <td><?= $p['perusahaan'] ?></td>
                                            <td><?= $p['alamat'] ?></td>
                                            <td><?= $p['no_hp'] ?></td>
                                            <td>
                                                <form action="/pendaftaran/<?= $p['id'] ?>" method="POST" class="d-inline">
                                                    <?= csrf_field(); ?>
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                                </form>
                                                <a href="#" class="btn btn-success" id="verif" onclick="verif('<?= $p['bukti'] ?>', <?= $p['id'] ?>)" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-eye"></i></i></i></a>
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

<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Bukti Pendaftaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>