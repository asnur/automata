<?= $this->extend('layout/template_admin'); ?>

<?= $this->section('content'); ?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3 class="m-0 text-dark">Penyewaan</h3>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-6 mb-3">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text text-white" style="background-color: #FBC740;"><i class="fa fa-calendar"></i></span>
                        </div>
                        <input type="text" class="form-control" id="min" placeholder="Mulai Dari Tanggal">
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text text-white" style="background-color: #FBC740;"><i class="fa fa-calendar"></i></span>
                        </div>
                        <input type="text" class="form-control" id="max" placeholder="Sampai Dengan Tanggal">
                    </div>
                </div>

                <section class="col-lg-12 connectedSortable">
                    <div class="card">
                        <div class="card-body">
                            <table id="tablePenjualan" class="table table-bordered table-striped">
                                <thead class="text-white" style="background-color: #FBC740;">
                                    <tr>
                                        <th>Nama</th>
                                        <th>Waktu</th>
                                        <th>Sales</th>
                                        <th>Status</th>
                                        <th>Total</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($riwayat_penyewaan as $k) {
                                    ?>
                                        <tr>
                                            <td class="text-center" style="vertical-align: middle;"><?= $k['nama']; ?></td>
                                            <td class="text-center" style="vertical-align: middle;"><?= date('Y/m/d', strtotime($k['waktu'])); ?></td>
                                            <td class="text-center" style="vertical-align: middle;"><?= $k['sales']; ?></td>
                                            <td class="text-center" style="vertical-align: middle;">
                                                <?php
                                                if ($k['status'] == 'pending') {
                                                    echo "<p class='btn-warning text-white rounded-pill'>Pending</p>";
                                                } else if ($k['status'] == 'settlement') {
                                                    echo "<p class='btn-success text-white rounded-pill'>Sukses</p>";
                                                } else if ($k['status'] == 'failure') {
                                                    echo "<p class='btn-danger text-white rounded-pill' style='background: red'>Gagal</p>";
                                                }
                                                ?>
                                            </td>
                                            <td class="text-center" style="vertical-align: middle;">Rp. <?= number_format($k['total']); ?></td>
                                            <td class="text-center" style="vertical-align: middle;">
                                                <a class="btn btn-warning" id="detail_pesanan" href="#" title="Quick view" data-toggle="modal" data-target="#exampleModal2" onclick="detail_penyewaan(<?= $k['id_user'] ?>, <?= $k['id'] ?>, <?= $k['total'] ?>)"><i class="fa fa-eye"></i></a>
                                                <a class="btn btn-primary" href="/home/surat_penyewaan/<?= $k['id'] ?>"><i class="fa fa-print"></i></a> </a>
                                                <form action="/penyewaan/<?= $k['id'] ?>" method="POST" class="d-inline">
                                                    <?= csrf_field() ?>
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                                <tfoot class="text-white text-center" style="background-color: #FBC740;">
                                    <tr>
                                        <th>Nama</th>
                                        <th>Waktu</th>
                                        <th>Sales</th>
                                        <th>Status</th>
                                        <th>Total</th>
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

<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="text-right" style="left:30px; position:absolute;">
                    <h2>Detail Pembelian</h2>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-success" role="alert">
                    <b>Perhatian!!!</b> Total Harga Sudah Termasuk PPN 10%
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center" scope="col">Foto</th>
                            <th class="text-center" scope="col">Jumlah</th>
                            <th class="text-center" scope="col">Jumlah Hari</th>
                            <th class="text-center" scope="col">Peminjaman</th>
                            <th class="text-center" scope="col">Pengembalian</th>
                            <th class="text-center" scope="col">Harga</th>
                            <th class="text-center" scope="col">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody id="detail_barang">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>