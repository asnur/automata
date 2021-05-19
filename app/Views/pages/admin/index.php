<?= $this->extend('layout/template_admin'); ?>

<?= $this->section('content'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3 class="m-0 text-dark">Dashboard</h3>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <!-- small box -->
                <div class="col-lg-6 col-12 small-box text-white" style="background-color: #6BAFCF;">
                    <div class="inner">
                        <div class="text mt-5 mb-5">
                            <h1 style="font-size: 60px;">Rp. <?= number_format($pemasukan_penjualan[0]['total'] + $pemasukan_penyewaan[0]['total']); ?></h1>
                            <h2>Jumlah Pemasukan</h2>
                        </div>
                    </div>
                    <div class="icon">
                        <i class="ion ion-cash" style="font-size: 200px;"></i>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6">
                            <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3><?= $pelanggan ?></h3>

                                    <p>Pelanggan</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-android-person"></i>
                                </div>
                                <a href="/admin/pelanggan" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-md-6">
                            <!-- small box -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3>Rp. <?= number_format($pemasukan_penjualan[0]['total']) ?></h3>

                                    <p>Penjualan</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-ios-book"></i>
                                </div>
                                <a href="/admin/penjualan" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-md-6">
                            <!-- small box -->
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3><?= $pendaftar ?></h3>

                                    <p>Pendaftaran</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                </div>
                                <a href="/admin/pendaftaran" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-md-6">
                            <!-- small box -->
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3>Rp. <?= number_format($pemasukan_penyewaan[0]['total']) ?></h3>

                                    <p>Penyewaan</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-ios-pricetag"></i>
                                </div>
                                <a href="/admin/penyewaan" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                    </div>
                </div>

            </div>
            <!-- /.row -->
            <!-- Main row -->
            <div class="row">
                <!-- Left col -->
                <!-- AREA CHART -->
                <div class="col-md-6">
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Penjualan</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chart">
                                <canvas id="data" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card card-danger">
                        <div class="card-header">
                            <h3 class="card-title">Penyewaan</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chart">
                                <canvas id="data2" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

<script src="<?= base_url('plugins/chart.js/Chart.min.js'); ?>"></script>
<script>
    var pertahun = document.getElementById("data").getContext('2d');
    var myChart = new Chart(pertahun, {
        type: 'bar',
        data: {
            labels: ['Januari', 'Febuari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
            datasets: [{
                label: 'Penjualan Pertahun',
                backgroundColor: ['#55efc4', '#00cec9', '#74b9ff', '#ffeaa7', '#8e44ad', '#d63031', '#0984e3', '#40739e', '#fbc531', '#718093', '#cd84f1', '#ffb8b8'],
                borderColor: ['#55efc4', '#00cec9', '#74b9ff', '#ffeaa7', '#8e44ad', '#d63031', '#0984e3', '#40739e', '#fbc531', '#718093', '#cd84f1', '#ffb8b8'],
                pointRadius: false,
                pointColor: '#3b8bba',
                pointStrokeColor: 'rgba(60,141,188,1)',
                pointHighlightFill: '#fff',
                pointHighlightStroke: 'rgba(60,141,188,1)',
                data: [<?= $pemasukan_penjualan_januari[0]['total'] ?>, <?= $pemasukan_penjualan_febuari[0]['total'] ?>, <?= $pemasukan_penjualan_maret[0]['total'] ?>, <?= $pemasukan_penjualan_april[0]['total'] ?>, <?= $pemasukan_penjualan_mei[0]['total'] ?>, <?= $pemasukan_penjualan_juni[0]['total'] ?>, <?= $pemasukan_penjualan_juli[0]['total'] ?>, <?= $pemasukan_penjualan_agustus[0]['total'] ?>, <?= $pemasukan_penjualan_september[0]['total'] ?>, <?= $pemasukan_penjualan_oktober[0]['total'] ?>, <?= $pemasukan_penjualan_november[0]['total'] ?>, <?= $pemasukan_penjualan_desember[0]['total'] ?>]
            }, ]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>

<script>
    var angkatan = document.getElementById("data2").getContext('2d');
    var myChart = new Chart(angkatan, {
        type: 'pie',
        data: {
            labels: ['Januari', 'Febuari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
            datasets: [{
                label: 'Penyewaan Pertahun',
                backgroundColor: ['#55efc4', '#00cec9', '#74b9ff', '#ffeaa7', '#8e44ad', '#d63031', '#0984e3', '#40739e', '#fbc531', '#718093', '#cd84f1', '#ffb8b8'],
                borderColor: ['#55efc4', '#00cec9', '#74b9ff', '#ffeaa7', '#8e44ad', '#d63031', '#0984e3', '#40739e', '#fbc531', '#718093', '#cd84f1', '#ffb8b8'],
                pointRadius: false,
                pointColor: '#3b8bba',
                pointStrokeColor: 'rgba(60,141,188,1)',
                pointHighlightFill: '#fff',
                pointHighlightStroke: 'rgba(60,141,188,1)',
                data: [<?= $pemasukan_penyewaan_januari[0]['total'] ?>, <?= $pemasukan_penyewaan_febuari[0]['total'] ?>, <?= $pemasukan_penyewaan_maret[0]['total'] ?>, <?= $pemasukan_penyewaan_april[0]['total'] ?>, <?= $pemasukan_penyewaan_mei[0]['total'] ?>, <?= $pemasukan_penyewaan_juni[0]['total'] ?>, <?= $pemasukan_penyewaan_juli[0]['total'] ?>, <?= $pemasukan_penyewaan_agustus[0]['total'] ?>, <?= $pemasukan_penyewaan_september[0]['total'] ?>, <?= $pemasukan_penyewaan_oktober[0]['total'] ?>, <?= $pemasukan_penyewaan_november[0]['total'] ?>, <?= $pemasukan_penyewaan_desember[0]['total'] ?>]
            }, ]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>

<?= $this->endSection(); ?>