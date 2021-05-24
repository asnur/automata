<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Automata Info Nusantara</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Structured Data  -->
    <script type="application/ld+json">
        {
            "@context": "http://schema.org",
            "@type": "WebSite",
            "name": "Replace_with_your_site_title",
            "url": "Replace_with_your_site_URL"
        }
    </script>

    <!-- vendor css (Bootstrap & Icon Font) -->
    <!-- <link rel="stylesheet" href="/assets/css/vendor/simple-line-icons.css" />
    <link rel="stylesheet" href="/assets/css/vendor/ionicons.min.css" /> -->

    <!-- plugins css (All Plugins Files) -->
    <!-- <link rel="stylesheet" href="/assets/css/plugins/animate.css" />
    <link rel="stylesheet" href="/assets/css/plugins/swiper-bundle.min.css" />
    <link rel="stylesheet" href="/assets/css/plugins/jquery-ui.min.css" />
    <link rel="stylesheet" href="/assets/css/plugins/jquery.lineProgressbar.css">
    <link rel="stylesheet" href="/assets/css/plugins/nice-select.css" />
    <link rel="stylesheet" href="/assets/css/plugins/venobox.css" /> -->

    <!-- Use the minified version files listed below for better performance and remove the files listed above -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" href="/assets/css/vendor/vendor.min.css" />
    <link rel="stylesheet" href="/assets/css/plugins/plugins.min.css" />
    <link rel="stylesheet" href="/assets/css/style.min.css">
    <style>
        body {
            scroll-behavior: smooth;
        }
    </style>

    <!-- Main Style -->
    <!-- <link rel="stylesheet" href="assets/css/style.css" /> -->

</head>

<body>
    <?php
    if (session()->getFlashdata('pesan')) :
    ?>
        <div class="flash-data" data-flashdata="<?= session()->getFlashdata('pesan'); ?>"></div>
    <?php endif ?>
    <!-- Header Area start  -->
    <div class="header section">
        <!-- Header Bottom  Start -->
        <div class="header-bottom d-none d-lg-block">
            <div class="container position-relative">
                <div class="row align-self-center">
                    <!-- Header Logo Start -->
                    <div class="col-auto align-self-center">
                        <div class="header-logo">
                            <a href="/" style="color: black; font-weight:bold; font-size:25px;"><img src="/assets/images/icons/logo.png" alt="Site Logo" /> Automata Info Nusantara</a>
                        </div>
                    </div>
                    <!-- Header Logo End -->

                    <!-- Header Action Start -->
                    <div class="col align-self-center">
                        <div class="header-actions">
                            <div class="header_account_list">
                                <a href="javascript:void(0)" class="header-action-btn search-btn"><i class="icon-magnifier"></i></a>
                                <div class="dropdown_search">
                                    <form class="action-form" action="/home/search" method="POST">
                                        <?= csrf_field(); ?>
                                        <input class="form-control" name="keyword" placeholder="Enter your search key" type="text">
                                        <button class="submit" type="submit"><i class="icon-magnifier"></i></button>
                                    </form>
                                </div>
                            </div>
                            <!-- Single Wedge Start -->
                            <div class="header-bottom-set dropdown">
                                <button class="dropdown-toggle header-action-btn" data-bs-toggle="dropdown"><i class="icon-user"></i></button>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <?php
                                    if (!isset($_SESSION['user'])) {
                                    ?>
                                        <li><a class="dropdown-item" href="/login">Sign in</a></li>
                                    <?php
                                    } else {
                                    ?>
                                        <li><a class="dropdown-item" href="/home/akun">Akun Saya</a></li>
                                        <li><a class="dropdown-item" href="/home/riwayat_pembelian">Riwayat Pembelian</a></li>
                                        <li><a class="dropdown-item" href="/home/riwayat_sewa">Riwayat Penyewaan</a></li>
                                        <li><a class="dropdown-item" href="/login/logout">Sign out</a></li>
                                    <?php
                                    }
                                    ?>
                                </ul>
                            </div>
                            <!-- Single Wedge End -->
                            <a href="#offcanvas-cart" class="header-action-btn header-action-btn-cart offcanvas-toggle pr-0">
                                <i class="icon-handbag"></i>
                                <span class="header-action-num"><?= $total_item ?></span>
                                <span class="header-action-num-sec"><?= $total_item_sewa ?></span>
                                <!-- <span class="cart-amount">€30.00</span> -->
                            </a>
                            <a href="#offcanvas-mobile-menu" class="header-action-btn header-action-btn-menu offcanvas-toggle d-lg-none">
                                <i class="icon-menu"></i>
                            </a>
                        </div>
                    </div>
                    <!-- Header Action End -->
                </div>
            </div>
        </div>
        <!-- Header Bottom  End -->
        <!-- Header Bottom  Start -->
        <div class="header-bottom d-lg-none sticky-nav bg-white">
            <div class="container position-relative">
                <div class="row align-self-center">
                    <!-- Header Logo Start -->
                    <div class="col-auto align-self-center">
                        <div class="header-logo">
                            <a href="/" style="color: black; font-weight:bold; font-size:10px;"><img src="/assets/images/icons/logo.png" alt="Site Logo" /></a>
                        </div>
                    </div>
                    <!-- Header Logo End -->

                    <!-- Header Action Start -->
                    <div class="col align-self-center">
                        <div class="header-actions">
                            <div class="header_account_list">
                                <a href="javascript:void(0)" class="header-action-btn search-btn"><i class="icon-magnifier"></i></a>
                                <div class="dropdown_search">
                                    <form class="action-form" action="/home/search" method="POST">
                                        <?= csrf_field(); ?>
                                        <input class="form-control" name="keyword" placeholder="Enter your search key" type="text">
                                        <button class="submit" type="submit"><i class="icon-magnifier"></i></button>
                                    </form>
                                </div>
                            </div>
                            <!-- Single Wedge Start -->
                            <div class="header-bottom-set dropdown">
                                <button class="dropdown-toggle header-action-btn" data-bs-toggle="dropdown"><i class="icon-user"></i></button>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <?php
                                    if (!isset($_SESSION['user'])) {
                                    ?>
                                        <li><a class="dropdown-item" href="/login">Sign in</a></li>
                                    <?php
                                    } else {
                                    ?>
                                        <li><a class="dropdown-item" href="/home/akun">Akun Saya</a></li>
                                        <li><a class="dropdown-item" href="/home/riwayat_pembelian">Riwayat Pembelian</a></li>
                                        <li><a class="dropdown-item" href="/home/riwayat_sewa">Riwayat Penyewaan</a></li>
                                        <li><a class="dropdown-item" href="/login/logout">Sign out</a></li>
                                    <?php
                                    }
                                    ?>
                                </ul>
                            </div>
                            <!-- Single Wedge End -->
                            <a href="#offcanvas-cart" class="header-action-btn header-action-btn-cart offcanvas-toggle pr-0">
                                <i class="icon-handbag"></i>
                                <span class="header-action-num"><?= $total_item ?></span>
                                <span class="header-action-num-sec"><?= $total_item_sewa ?></span>
                                <!-- <span class="cart-amount">€30.00</span> -->
                            </a>
                            <a href="#offcanvas-mobile-menu" class="header-action-btn header-action-btn-menu offcanvas-toggle d-lg-none">
                                <i class="icon-menu"></i>
                            </a>
                        </div>
                    </div>
                    <!-- Header Action End -->
                </div>
            </div>
        </div>
        <!-- Header Bottom  End -->
        <!-- Main Menu Start -->
        <div class="bg-black d-none d-lg-block sticky-nav">
            <div class="container position-relative">
                <div class="row">
                    <div class="col-md-12 align-self-center">
                        <div class="main-menu">
                            <ul>
                                <li><a href="/">Home</a>

                                </li>
                                <li><a href="/home/#product">Product</a></li>
                                <li><a href="/home/#project">Project</a></li>
                                <li><a href="/home/#about">About</a></li>
                                <li><a href="#footer">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main Menu End -->
    </div>
    <!-- Header Area End  -->

    <!-- OffCanvas Cart Start -->
    <div id="offcanvas-cart" class="offcanvas offcanvas-cart">
        <div class="inner">
            <div class="head">
                <span class="title">Keranjang</span>
                <button class="offcanvas-close">×</button>
            </div>
            <div class="alert alert-success" role="alert">
                Pilih Jenis <b>Keranjang</b> & <b>Sales</b> Anda Terlebih Dahulu!
            </div>
            <div class="form mb-5">
                <label>Pilih Keranjang</label>
                <select id="cart" class="form-control">
                    <option value="belanja">Belanja</option>
                    <option value="sewa">Sewa</option>
                </select>
                <label class="mt-3">Pilih Sales</label>
                <select id="sales-list" class="form-control" required>
                    <?php
                    foreach ($sales as $s) {
                    ?>
                        <option value="<?= $s['nama'] ?>"><?= $s['nama'] ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <div class="belanja">
                <div class="body customScroll">
                    <ul class="minicart-product-list">
                        <?php
                        $total = 0;
                        foreach ($keranjang as $k) {
                        ?>
                            <li>
                                <a href="single-product.html" class="image"><img src="/assets/images/item/<?= $k['image'] ?>" alt="Cart product Image"></a>
                                <div class="content">
                                    <a href="single-product.html" class="title"><?= $k['name'] ?></a>
                                    <span class="quantity-price"><?= $k['quantity'] ?> x <span class="amount">Rp. <?= number_format($k['subtotal']) ?></span></span>
                                    <a href="/home/remove_cart/<?= $k['rowid'] ?>" class="remove">×</a>
                                </div>
                            </li>

                        <?php
                            $total += $k['subtotal'];
                        }
                        $ppn = $total * (10 / 100);
                        ?>
                    </ul>
                </div>
                <div class="foot">
                    <div class="sub-total">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td class="text-left">Sub-Total :</td>
                                    <td class="text-right">Rp. <?= number_format($total); ?></td>
                                </tr>
                                <tr>
                                    <td class="text-left">PPN (10%) :</td>
                                    <td class="text-right">Rp. <?= number_format($ppn); ?></td>
                                </tr>
                                <tr>
                                    <td class="text-left">Total :</td>
                                    <td class="text-right theme-color">Rp. <?= number_format($ppn + $total) ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="buttons">
                        <a href="/home/keranjang" class="btn btn-dark btn-hover-primary mb-6">view cart</a>
                        <form id="payment-form" method="post" action="/home/finish">
                            <input type="hidden" name="result_type" id="result-type" value="">
                            <input type="hidden" name="result_data" id="result-data" value="">
                            <input type="hidden" name="sales" id="sales" value="">
                        </form>
                        <a id="pay-button" class="btn btn-outline-dark current-btn">checkout</a>
                    </div>
                </div>
            </div>
            <div class="sewa">
                <div class="body customScroll">
                    <ul class="minicart-product-list">
                        <?php
                        $total = 0;
                        foreach ($keranjang_sewa as $ks) {
                        ?>
                            <li>
                                <a href="single-product.html" class="image"><img src="/assets/images/item/<?= $ks['image'] ?>" alt="Cart product Image"></a>
                                <div class="content">
                                    <a href="single-product.html" class="title"><?= $ks['name'] ?></a>
                                    <span class="quantity-price"><?= $ks['quantity'] ?> x <?= number_format($ks['price']) ?> x <?= $ks['jumlah_hari'] ?> <br><span class="amount">Rp. <?= number_format($ks['harga']) ?></span></span>
                                    <a href="/home/remove_cart_sewa/<?= $ks['rowid'] ?>" class="remove">×</a>
                                </div>
                            </li>

                        <?php
                            $total += $ks['harga'];
                        }
                        $ppn = $total * (10 / 100);
                        ?>
                    </ul>
                </div>
                <div class="foot">
                    <div class="sub-total">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td class="text-left">Sub-Total :</td>
                                    <td class="text-right">Rp. <?= number_format($total); ?></td>
                                </tr>
                                <tr>
                                    <td class="text-left">PPN (10%) :</td>
                                    <td class="text-right">Rp. <?= number_format($ppn); ?></td>
                                </tr>
                                <tr>
                                    <td class="text-left">Total :</td>
                                    <td class="text-right theme-color">Rp. <?= number_format($ppn + $total) ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="buttons">
                        <a href="/home/keranjang_sewa" class="btn btn-dark btn-hover-primary mb-6">view cart</a>
                        <form id="payment-form-sewa" method="post" action="/home/finish_sewa">
                            <input type="hidden" name="result_type" id="result-type-sewa" value="">
                            <input type="hidden" name="result_data" id="result-data-sewa" value="">
                            <input type="hidden" name="sales" id="sales-sewa" value="">
                        </form>
                        <a id="pay-sewa" class="btn btn-outline-dark current-btn">checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- OffCanvas Cart End -->

    <!-- OffCanvas Menu Start -->
    <div id="offcanvas-mobile-menu" class="offcanvas offcanvas-mobile-menu">
        <button class="offcanvas-close"></button>
        <div class="inner customScroll">

            <div class="offcanvas-menu mb-4">
                <ul>
                    <li><a href="/">Home</span></a>

                    </li>
                    <li><a href="/home/#product">Product</a></li>
                    <li><a href="/home/#project">Project</a>
                    <li><a href="/home/#about">About</a>
                    <li><a href="#footer">Contact</a></li>
                </ul>
            </div>
            <!-- OffCanvas Menu End -->


            <div class="offcanvas-social mt-auto">
                <ul>
                    <li>
                        <a href="#"><i class="ion-social-facebook"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="ion-social-twitter"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="ion-social-google"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="ion-social-youtube"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="ion-social-instagram"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <?= $this->renderSection('content'); ?>

    <!-- Footer Area Start -->
    <div class="footer-area" id="footer">
        <div class="footer-container">
            <div class="footer-top">
                <div class="container">
                    <div class="row">
                        <!-- Start single blog -->
                        <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                            <div class="single-wedge">
                                <!-- <h4 class="footer-herading">about us</h4> -->
                                <p style="color: white; font-weight:bold; font-size:15px;"><img src="/assets/images/icons/logo.png" alt="Site Logo" /> Automata Info Nusantara</p>
                                <ul class="link-follow">
                                    <li class="li">
                                        <a class="paypal icon-paypal m-0" title="Paypal" href="#"></a>
                                    </li>
                                    <li class="li">
                                        <a class="tumblr icon-social-tumblr" title="Tumblr" href="#"></a>
                                    </li>
                                    <li class="li">
                                        <a class="twitter icon-social-twitter" title="Twitter" href="#"></a>
                                    </li>
                                    <li class="li">
                                        <a class="pinterest icon-social-pinterest" title="Pinterest" href="#"></a>
                                    </li>
                                    <li class="li">
                                        <a class="linkedin icon-social-linkedin" title="Linkedin" href="#"></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- End single blog -->
                        <!-- Start single blog -->
                        <div class="col-md-4" data-aos="fade-up" data-aos-delay="400">
                            <div class="single-wedge">
                                <h4 class="footer-herading">Project</h4>
                                <div class="footer-links">
                                    <div class="footer-row">
                                        <ul class="align-items-center">
                                            <li class="li"><a href="#" class="single-link">Pengadaan Hardware</a></li>
                                            <li class="li"><a href="#" class="single-link">Pembangunan & Pengembangan</a></li>
                                            <li class="li"><a href="#" class="single-link">Sistem Aplikasi</a></li>
                                            <li class="li"><a href="#" class="single-link">Penyewaan Komputer</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End single blog -->
                        <!-- Start single blog -->
                        <div class="col-md-4" data-aos="fade-up" data-aos-delay="600">
                            <div class="single-wedge">
                                <h4 class="footer-herading">Lokasi</h4>
                                <div class="footer-links">
                                    <div class="footer-row">
                                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.5357532710823!2d106.92334641425927!3d-6.324539063645709!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69933091d0c425%3A0xead89313c636f4fe!2sPT.%20Automata%20Info%20Nusantara!5e0!3m2!1sid!2sid!4v1617789610051!5m2!1sid!2sid" width="100%" height="200px" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End single blog -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer Area End -->



    <!-- Modal -->

    <!-- Modal end -->







    <!-- Global Vendor, plugins JS -->

    <!-- Vendor JS -->
    <!-- <scrip src="assets/js/vendor/jquery-3.5.1.min.js"></scrip>
    <scrip src="assets/js/vendor/popper.min.js"></scrip>
    <script src="assets/js/vendor/bootstrap.min.js"></script>
    <script src="assets/js/vendor/jquery-migrate-3.3.0.min.js"></script>
    <script src="assets/js/vendor/modernizr-3.11.2.min.js"></script> -->

    <!--Plugins JS-->
    <!-- <script src="assets/js/plugins/swiper-bundle.min.js"></script>
    <script src="assets/js/plugins/jquery-ui.min.js"></script>
    <script src="assets/js/plugins/jquery.nice-select.min.js"></script>
    <script src="assets/js/plugins/countdown.js"></script>
    <script src="assets/js/plugins/scrollup.js"></script>
    <script src="assets/js/plugins/jquery.waypoints.js"></script>
    <script src="assets/js/plugins/jquery.lineProgressbar.js"></script>
    <script src="assets/js/plugins/jquery.zoom.min.js"></script>
    <script src="assets/js/plugins/venobox.min.js"></script>
    <script src="assets/js/plugins/ajax-mail.js"></script> -->

    <!-- Use the minified version files listed below for better performance and remove the files listed above -->
    <script src="/assets/js/vendor/vendor.min.js"></script>
    <script src="/assets/js/plugins/plugins.min.js"></script>

    <!-- Main Js -->
    <script src="/assets/js/main.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-NsNt6ipz4eLWEUD_"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <!-- <script src="/assets/js/script.js"></script> -->
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
        //Sweet Alert
        const flashdata = $('.flash-data').data('flashdata');
        if (flashdata == 'Anda Berhasil Login') {
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
        if (flashdata == 'Anda Gagal Login') {
            Swal.fire(
                'Gagal!',
                flashdata,
                'error'
            );
        }
        if (flashdata == 'Stok Tidak Cukup') {
            Swal.fire(
                'Gagal!',
                flashdata,
                'error'
            );
        }
        if (flashdata == 'Keyword Wajib di Isi') {
            Swal.fire(
                'Gagal!',
                flashdata,
                'error'
            );
        }
        if (flashdata == 'Anda Berhasil Register Silahkan Tunggu Konfirmasi dari Admin & Akan di Infokan Melalui Email yang tercantum') {
            Swal.fire(
                'Berhasil!',
                flashdata,
                'success'
            );
        }
        if (flashdata == 'Barang Berhasil di Tambahkan ke Keranjang') {
            Swal.fire(
                'Berhasil!',
                flashdata,
                'success'
            );
        }
        if (flashdata == 'Silahkan Selesaikan Pembayaran') {
            Swal.fire(
                'Berhasil Checkout!',
                flashdata,
                'success'
            );
        }
        //Detail Pesanan
        function detail_pembelian(iduser, idpesanan, total) {
            $.ajax({
                type: 'GET',
                url: `/api/index/${iduser}/${idpesanan}`,
                success: function(result) {
                    // console.log(result);
                    $('#detail_barang').html('');
                    let item = result;
                    let total_harga = 0;
                    $.each(item, (i, data) => {
                        $('#detail_barang').append(`
                            <tr>
                                <td class="text-center" style="vertical-align: middle;"><img src="/assets/images/item/${data.foto}" style="width: 150px; height: 150px"></td>
                                <td class="text-center" style="vertical-align: middle;">${data.jumlah_barang}</td>
                                <td class="text-center" style="vertical-align: middle;">Rp. ${numeral(data.harga_barang).format('0,0')}</td>
                                <td class="text-center" style="vertical-align: middle;">Rp. ${numeral(data.subtotal).format('0,0')}</td>
                            </tr>
                        `);
                    });
                    $('#detail_barang').append(`
                        <tr>
                            <td class="text-left" colspan="3"><b>Total Harga</b></td>
                            <td class="text-center"><b>Rp. ${numeral(total).format('0,0')}</b></td>
                        </tr>
                    `)
                }
            });
        }

        //Detail Pesanan
        function detail_penyewaan(iduser, idpesanan, total) {
            $.ajax({
                type: 'GET',
                url: `/api/penyewaan/${iduser}/${idpesanan}`,
                success: function(result) {
                    console.log(result);
                    $('#detail_barang').html('');
                    let item = result;
                    let total_harga = 0;
                    $.each(item, (i, data) => {
                        $('#detail_barang').append(`
                            <tr>
                                <td class="text-center" style="vertical-align: middle;"><img src="/assets/images/item/${data.foto}" style="width: 150px; height: 150px"></td>
                                <td class="text-center" style="vertical-align: middle;">${data.jumlah_barang}</td>
                                <td class="text-center" style="vertical-align: middle;">${data.jumlah_hari}</td>
                                <td class="text-center" style="vertical-align: middle;">${data.peminjaman}</td>
                                <td class="text-center" style="vertical-align: middle;">${data.pengembalian}</td>
                                <td class="text-center" style="vertical-align: middle;">Rp. ${numeral(data.harga_barang).format('0,0')}</td>
                                <td class="text-center" style="vertical-align: middle;">Rp. ${numeral(data.jumlah_barang * data.harga_barang * data.jumlah_hari).format('0,0')}</td>
                            </tr>
                        `);
                    });
                    $('#detail_barang').append(`
                        <tr>
                            <td class="text-left" colspan="6"><b>Total Harga</b></td>
                            <td class="text-center"><b>Rp. ${numeral(total).format('0,0')}</b></td>
                        </tr>
                    `)
                }
            });
        }
        $(document).ready(function() {

            //Slider Image Product
            $('.slider-for').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false,
                fade: true,
                asNavFor: '.slider-nav'
            });
            $('.slider-nav').slick({
                slidesToShow: 3,
                slidesToScroll: 1,
                asNavFor: '.slider-for',
                focusOnSelect: true,
                arrows: false,
            });
            $('.more-product').slick({
                slidesToShow: 4,
                slidesToScroll: 1,
                focusOnSelect: true,
                arrows: false,
            });

            //Cart
            $('.sewa').hide();
            $('.belanja').show();
            $('#cart').change(function() {
                $('.sewa').hide();
                $('.belanja').hide();
                $('.' + $(this).val()).show();
            });

            //Checkout With Midtrans
            $('#pay-button').click(function(event) {
                event.preventDefault();
                // $(this).attr("disabled", "disabled");
                var sales = $('#sales-list').val();
                $('#sales').val(sales);
                console.log($('#sales').val());
                $.ajax({
                    type: 'POST',
                    url: '<?= site_url() ?>/home/token',
                    cache: false,

                    success: function(data) {
                        //location = data;

                        console.log('token = ' + data);

                        var resultType = document.getElementById('result-type');
                        var resultData = document.getElementById('result-data');

                        function changeResult(type, data) {
                            $("#result-type").val(type);
                            $("#result-data").val(JSON.stringify(data));
                            // resultType.innerHTML = type;
                            // resultData.innerHTML = JSON.stringify(data);
                        }

                        snap.pay(data, {

                            onSuccess: function(result) {
                                changeResult('success', result);
                                console.log(result.status_message);
                                console.log(result);
                                $("#payment-form").submit();
                            },
                            onPending: function(result) {
                                changeResult('pending', result);
                                console.log(result.status_message);
                                $("#payment-form").submit();
                            },
                            onError: function(result) {
                                changeResult('error', result);
                                console.log(result.status_message);
                                $("#payment-form").submit();
                            }
                        });
                    }
                });
            });
            $('#pay-sewa').click(function(event) {
                event.preventDefault();
                // $(this).attr("disabled", "disabled");
                var sales = $('#sales-list').val();
                $('#sales-sewa').val(sales);
                console.log($('#sales-sewa').val());
                $.ajax({
                    type: 'POST',
                    url: '<?= site_url() ?>/home/token_sewa',
                    cache: false,

                    success: function(data) {
                        //location = data;

                        console.log('token = ' + data);

                        var resultType = document.getElementById('result-type-sewa');
                        var resultData = document.getElementById('result-data-sewa');

                        function changeResult(type, data) {
                            $("#result-type-sewa").val(type);
                            $("#result-data-sewa").val(JSON.stringify(data));
                            // resultType.innerHTML = type;
                            // resultData.innerHTML = JSON.stringify(data);
                        }

                        snap.pay(data, {

                            onSuccess: function(result) {
                                changeResult('success', result);
                                console.log(result.status_message);
                                console.log(result);
                                $("#payment-form-sewa").submit();
                            },
                            onPending: function(result) {
                                changeResult('pending', result);
                                console.log(result.status_message);
                                $("#payment-form-sewa").submit();
                            },
                            onError: function(result) {
                                changeResult('error', result);
                                console.log(result.status_message);
                                $("#payment-form-sewa").submit();
                            }
                        });
                    }
                });
            });
        });
    </script>
</body>



</html>