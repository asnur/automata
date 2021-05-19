<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/plugins/fontawesome-free/css/font-awesome.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="/plugins/css/style_admin.css">
    <link rel="stylesheet" href="/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <link rel="stylesheet" href="/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="/plugins/jqvmap/jqvmap.min.css">
    <link rel="stylesheet" href="/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="/plugins/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <link rel="stylesheet" href="/plugins/summernote/summernote-bs4.css">
    <link rel="stylesheet" href="/plugins/fullcalendar/fullcalendar.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <?php
    if (session()->getFlashdata('pesan')) :
    ?>
        <div class="flash-data" data-flashdata="<?= session()->getFlashdata('pesan'); ?>"></div>
    <?php endif ?>
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light" style="background-color: #FBC740;">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-white" data-widget="pushmenu" href="#" role="button"><i class="fa fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Messages Dropdown Menu -->
                <a href="/login/logout" class="btn btn-danger"><i class="fa fa-sign-out"></i> Logout</a>

            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-light-maroon elevation-4" style="background-color: #FBC740;">
            <!-- Brand Logo -->
            <a href="/admin/index" class="brand-link">
                <img src="/assets/images/icons/logo.png" alt="" class="brand-image img-circle">
                <span class="brand-text text-white">PT. Automata</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar bg-light">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="/dist/img/<?= $_SESSION['admin'][0]['foto'] ?>" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block" style="font-weight:bold;"><?= $_SESSION['admin'][0]['nama']; ?></a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item has-treeview">
                            <a href="/admin/" class="nav-link text-white" style="background-color: #FBC740;">
                                <i class="nav-icon fa fa-tachometer"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/pelanggan" class="nav-link text-white" style="background-color: #FBC740;">
                                <i class="nav-icon fa fa-users"></i>
                                <p>
                                    Pelanggan
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/pendaftaran" class="nav-link text-white" style="background-color: #FBC740;">
                                <i class="nav-icon fa fa-id-card"></i>
                                <p>
                                    Pendaftaran
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/barang" class="nav-link text-white" style="background-color: #FBC740;">
                                <i class="nav-icon fa fa-cubes"></i>
                                <p>
                                    Barang
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/penjualan" class="nav-link text-white" style="background-color: #FBC740;">
                                <i class="nav-icon fa fa-book"></i>
                                <p>
                                    Penjualan
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/donasi" class="nav-link text-white" style="background-color: #FBC740;">
                                <i class="nav-icon fa fa-money"></i>
                                <p>
                                    Penyewaan
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <?= $this->renderSection('content'); ?>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <script src="/plugins/jquery/jquery.min.js"></script>
    <script src="/plugins/jquery-ui/jquery-ui.min.js"></script>
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/plugins/moment/moment.min.js"></script>
    <script src="/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
    <script src="/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="/plugins/summernote/summernote-bs4.min.js"></script>
    <script src="/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <script src="/dist/js/adminlte.js"></script>
    <script src="/dist/js/demo.js"></script>
    <script src="/plugins/bootstrap-show-password-master/src/bootstrap-show-password.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script src="/plugins/select2/js/select2.full.min.js"></script>
    <script src="/plugins/moment/moment.min.js"></script>
    <script src="/plugins/fullcalendar/fullcalendar.min.js"></script>
    <script>
        $('#summernote').summernote({
            height: 300
        });

        function verif(bukti, id) {
            console.log(bukti);
            $('.modal-body').html('');
            $('.modal-footer').html('');
            $('.modal-body').html(`<img src="/dist/img/bukti/${bukti}" style="width:100%; height: 200px; object-fit:cover;">`);
            $('.modal-footer').html(`
            <form action="verif_pendaftaran" method="POST">
            <?= csrf_field() ?>
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="id" value="${id}">
                <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Verifikasi</button>
            </form>
            `);
        };
    </script>
    <script>
        $('#table2').DataTable({
            "responsive": true,
            "autoWidth": false
        });
        $('#table').DataTable({
            "responsive": true,
            "autoWidth": false
        });
        $("#rekap")
            .change(function() {
                $("#rekap option:selected");
                var isi = $('#rekap').val();
                if (isi == "Semua") {
                    str = "";
                } else if (isi == "Periodik") {
                    str = `
                <div class="col-md-6">
                    <label>Dari Tanggal</label>
                    <input class="form-control" type="date" name="from" required>
                </div>
                <div class="col-md-6">
                    <label>Sampai Tanggal</label>
                    <input class="form-control" type="date" name="to" required>
                </div>
                `
                }
                $("#periodik").html(str);
            })
            .trigger("change");
    </script>
    <script>
        $(function() {
            var oTable = $('#tableAbsen').DataTable({
                "responsive": true,
                "autoWidth": false
            });


            // $('#min').keyup(function(){
            //     console.log($('#min').val());
            // });


            $("#min").datepicker({
                dateFormat: "dd-mm-yy",
                "onSelect": function(date) {
                    minDateFilter = new Date(date).getTime();
                    oTable.draw();
                }
            }).keyup(function() {
                minDateFilter = new Date(this.value).getTime();
                oTable.draw();
            });

            $("#max").datepicker({
                dateFormat: "dd-mm-yy",
                "onSelect": function(date) {
                    maxDateFilter = new Date(date).getTime();
                    oTable.draw();
                }
            }).keyup(function() {
                maxDateFilter = new Date(this.value).getTime();
                oTable.draw();
            });

        });

        // Date range filter
        minDateFilter = "";
        maxDateFilter = "";

        $.fn.dataTable.ext.search.push(
            function(oSettings, aData, iDataIndex) {
                if (typeof aData._date == 'undefined') {
                    aData._date = new Date(aData[2]).getTime();
                }

                if (minDateFilter && !isNaN(minDateFilter)) {
                    if (aData._date < minDateFilter) {
                        return false;
                    }
                }

                if (maxDateFilter && !isNaN(maxDateFilter)) {
                    if (aData._date > maxDateFilter) {
                        return false;
                    }
                }

                return true;
            }
        );

        $(document).ready(function() {
            var calendar = $('#calendar').fullCalendar({
                editable: true,
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay,listMonth'
                },
                events: '/admin/load_agenda',
                selectable: true,
                selectHelper: true,
                select: function(start, end, allDay) {
                    var title = prompt("Masukan Nama Agenda");
                    if (title) {
                        var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
                        var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
                        let baseUrl = 'http://localhost:8080/admin/tambah_agenda';
                        $.ajax({
                            url: baseUrl,
                            type: 'POST',
                            data: {
                                title: title,
                                start: start,
                                end: end
                            },
                            success: function(data) {
                                console.log(data);
                                calendar.fullCalendar('refetchEvents');
                                alert('Agenda Ditambahkan');
                            }
                        })
                    }
                },
                editable: true,
                eventResize: function(event) {
                    var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
                    var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
                    var title = event.title;
                    var id = event.id;
                    let baseUrl = "http://localhost:8080/admin/ubah_agenda";
                    $.ajax({
                        url: baseUrl,
                        type: "POST",
                        data: {
                            title: title,
                            start: start,
                            end: end,
                            id: id
                        },
                        success: function() {
                            calendar.fullCalendar('refetchEvents');
                            alert('Agenda diubah');
                        }
                    })
                },

                eventClick: function(event) {
                    if (confirm("Apakah Anda Ingin Menghapus Agenda?")) {
                        var id = event.id;
                        let baseUrl = "http://localhost:8080/admin/hapus_agenda";
                        $.ajax({
                            url: baseUrl,
                            type: "POST",
                            data: {
                                id: id
                            },
                            success: function() {
                                calendar.fullCalendar('refetchEvents');
                                alert("Agenda diHapus");
                            }
                        })
                    }
                }
            });
        });
    </script>
    <script>
        const flashdata = $('.flash-data').data('flashdata');
        if (flashdata == 'Data Pelanggan Berhasil diTambahkan') {
            Swal.fire(
                'Berhasil!',
                flashdata,
                'success'
            );
        }
        if (flashdata == 'Data Pelanggan Berhasil diUbah') {
            Swal.fire(
                'Berhasil!',
                flashdata,
                'success'
            );
        }
        if (flashdata == 'Data Pelanggan Berhasil diHapus') {
            Swal.fire(
                'Berhasil!',
                flashdata,
                'success'
            );
        }
        if (flashdata == 'Data Pendaftaran Berhasil diHapus') {
            Swal.fire(
                'Berhasil!',
                flashdata,
                'success'
            );
        }
        if (flashdata == 'Data Barang Berhasil diHapus') {
            Swal.fire(
                'Berhasil!',
                flashdata,
                'success'
            );
        }
        if (flashdata == 'Verifikasi Pendaftaran Berhasil') {
            Swal.fire(
                'Berhasil!',
                flashdata,
                'success'
            );
        }
        if (flashdata == 'Data Barang Berhasil diTambahkan') {
            Swal.fire(
                'Berhasil!',
                flashdata,
                'success'
            );
        }
    </script>
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#blah').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
        }

        $("#imgInp").change(function() {
            readURL(this);
        });
    </script>
</body>

</html>