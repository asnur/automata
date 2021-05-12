<?= $this->extend('layout/template_user_1'); ?>

<?= $this->section('content'); ?>


<!-- OffCanvas Menu End -->


<div class="offcanvas-overlay"></div>

<!-- Hero/Intro Slider Start -->
<div class="section ">
    <div class="hero-slider swiper-container slider-nav-style-1 slider-dot-style-1">
        <!-- Hero slider Active -->
        <div class="swiper-wrapper">
            <!-- Single slider item -->
            <div class="hero-slide-item slider-height swiper-slide d-flex">
                <div class="container align-self-center">
                    <div class="row">
                        <div class="col-xl-6 col-lg-7 col-md-7 col-sm-7 align-self-center">
                            <div class="hero-slide-content slider-animated-1">
                                <span class="category">New Products</span>
                                <h2 class="title-1">Laptop </h2>
                                <p>Torem ipsum dolor sit amet, consectetur adipisicing elitsed do eiusmo tempor
                                    incididunt ut labore et dolore magna</p>
                                <a href="#" class="btn btn-lg btn-primary btn-hover-dark mt-5">Read More</a>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-5 col-md-5 col-sm-5">
                            <div class="hero-slide-image">
                                <img src="/assets/images/slider-image/slider-1.png" alt="" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Single slider item -->
            <div class="hero-slide-item slider-height swiper-slide d-flex">
                <div class="container align-self-center">
                    <div class="row">
                        <div class="col-xl-6 col-lg-7 col-md-7 col-sm-7 align-self-center">
                            <div class="hero-slide-content slider-animated-1">
                                <span class="category">New Products</span>
                                <h2 class="title-1">CCTV </h2>
                                <p>Torem ipsum dolor sit amet, consectetur adipisicing elitsed do eiusmo tempor
                                    incididunt ut labore et dolore magna</p>
                                <a href="#" class="btn btn-lg btn-primary btn-hover-dark mt-5">Read More</a>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-5 col-md-5 col-sm-5">
                            <div class="hero-slide-image">
                                <img src="/assets/images/item/cctv.png" alt="" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination swiper-pagination-white"></div>
        <!-- Add Arrows -->
        <div class="swiper-buttons">
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>
</div>

<!-- Hero/Intro Slider End -->

<!-- Product Category Start -->
<div class="section pt-100px pb-100px">
    <div class="container">
        <div class="category-slider swiper-container" data-aos="fade-up">
            <div class="category-wrapper swiper-wrapper">
                <!-- Single Category -->
                <div class=" swiper-slide">
                    <a href="shop-left-sidebar.html" class="category-inner ">
                        <div class="category-single-item">
                            <img style="width: 85px; height:67px;" src="/assets/images/icons/servers.png" alt="">
                            <span class="title">Server</span>
                        </div>
                    </a>
                </div>
                <!-- Single Category -->
                <div class=" swiper-slide">
                    <a href="shop-left-sidebar.html" class="category-inner ">
                        <div class="category-single-item">
                            <img style="width: 85px; height:67px;" src="/assets/images/icons/cctv.png" alt="">
                            <span class="title">CCTV</span>
                        </div>
                    </a>
                </div>
                <!-- Single Category -->
                <div class=" swiper-slide">
                    <a href="#" class="category-inner ">
                        <div class="category-single-item">
                            <img style="width: 85px; height:67px;" src="/assets/images/icons/desktop.png" alt="">
                            <span class="title">PC</span>
                        </div>
                    </a>
                </div>
                <!-- Single Category -->
                <div class=" swiper-slide">
                    <a href="#" class="category-inner ">
                        <div class="category-single-item">
                            <img style="width: 85px; height:67px;" src="/assets/images/icons/printer.png" alt="">
                            <span class="title">Printer</span>
                        </div>
                    </a>
                </div>
                <!-- Single Category -->
                <div class="swiper-slide">
                    <a href="#" class="category-inner ">
                        <div class="category-single-item">
                            <img style="width: 85px; height:67px;" src="/assets/images/icons/laptop.png" alt="">
                            <span class="title">Laptop</span>
                        </div>
                    </a>
                </div>
                <!-- Single Category -->
            </div>
        </div>
    </div>
</div>

<!-- Product Category End -->

<!-- Product tab Area Start -->
<div class="section product-tab-area" id="product">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center" data-aos="fade-up">
                <div class="section-title mb-0">
                    <h2 class="title">Our Products</h2>
                    <p class="sub-title mb-6">Torem ipsum dolor sit amet, consectetur adipisicing elitsed do eiusmo
                        tempor incididunt ut labore</p>
                </div>
            </div>

            <!-- Tab Start -->
            <div class="col-md-12 text-center mb-8" data-aos="fade-up" data-aos-delay="200">
                <ul class="product-tab-nav nav justify-content-center">
                    <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab" href="#beli">Beli Barang</a></li>
                    <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#sewa">Sewa Barang</a></li>
                </ul>
            </div>
            <!-- Tab End -->
        </div>
        <div class="row">
            <div class="col">
                <div class="tab-content">
                    <!-- 2nd tab start -->
                    <div class="tab-pane fade show active" id="beli">
                        <div class="row">
                            <?php
                            foreach ($barang_jual as $k) {
                            ?>
                                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 mb-6" data-aos="fade-up" data-aos-delay="200">
                                    <!-- Single Prodect -->
                                    <div class="product">
                                        <div class="thumb">
                                            <a href="#" class="image">
                                                <span class="badges">
                                                    <span class="new">New</span>
                                                </span>
                                                <img src="/assets/images/item/<?= $k['foto'] ?>" alt="Product" />
                                                <img class="hover-image" src="/assets/images/item/<?= $k['foto'] ?>" alt="Product" />
                                            </a>
                                            <div class="actions">
                                                <a href="wishlist.html" class="action wishlist" title="Wishlist"><i class="icon-heart"></i></a>
                                                <a href="/home/beli/<?= $k['id'] ?>" class="action quickview"><i class="icon-size-fullscreen"></i></a>
                                            </div>
                                            <form action="/home/insert_cart" method="POST">
                                                <input type="hidden" name="nama" value="<?= $k['nama_barang'] ?>" id="nama">
                                                <input type="hidden" name="id" value="<?= $k['id'] ?>" id="id">
                                                <input type="hidden" name="harga" value="<?= $k['harga'] ?>" id="harga">
                                                <input type="hidden" name="foto" value="<?= $k['foto'] ?>" id="foto">
                                                <input type="hidden" name="jumlah" value="1">
                                                <button type="submit" title="Add To Cart" class=" add-to-cart">Add To Cart</button>
                                            </form>
                                        </div>
                                        <div class="content">
                                            <h5 class="title"><a href="#"><?= $k['nama_barang'] ?> </a>
                                            </h5>
                                            <span class="price">
                                                <span class="new">Rp. <?= number_format($k['harga']) ?></span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <!-- 2nd tab end -->
                    <!-- 3rd tab start -->
                    <div class="tab-pane fade" id="sewa">
                        <div class="row">
                            <?php
                            foreach ($barang_sewa as $l) {
                            ?>
                                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 mb-6" data-aos="fade-up" data-aos-delay="200">
                                    <!-- Single Prodect -->
                                    <div class="product">
                                        <div class="thumb">
                                            <a href="#" class="image">
                                                <span class="badges">
                                                    <span class="new">New</span>
                                                </span>
                                                <img src="/assets/images/item/<?= $l['foto'] ?>" alt="Product" />
                                                <img class="hover-image" src="/assets/images/item/<?= $l['foto'] ?>" alt="Product" />
                                            </a>
                                            <div class="actions">
                                                <a href="wishlist.html" class="action wishlist" title="Wishlist"><i class="icon-heart"></i></a>
                                                <a href="/home/sewa/<?= $l['id'] ?>" class="action quickview"><i class="icon-size-fullscreen"></i></a>
                                            </div>
                                            <a href="/home/sewa/<?= $l['id'] ?>" title="Add To Cart" class=" add-to-cart">Add To Cart</a>
                                        </div>
                                        <div class="content">
                                            <h5 class="title"><a href="#"><?= $l['nama_barang'] ?> </a>
                                            </h5>
                                            <span class="price">
                                                <span class="new">Rp. <?= number_format($l['harga']) ?></span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <!-- 3rd tab end -->
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<br>
<br>
<div class="container" id="project">
    <div class="section-title mb-5 text-center">
        <h2 class="title">Our Project</h2>
    </div>
    <div class="row">
        <div class="col-md-12 mb-5" data-aos="fade-up">
            <div class="row">
                <div class="col-md-6 text-center"><img style="width:200px;height:200px;" src="/assets/images/project/hw.png"></div>
                <div class="col-md-6">
                    <h3>Pengadaan Hardware</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem accusantium provident placeat! Expedita deserunt accusamus molestiae minima ratione at distinctio nobis architecto, voluptas, mollitia laborum error accusantium ipsum! Nihil, sit.</p>
                </div>
            </div>
        </div>
        <div class="col-md-12 mb-5" data-aos="fade-right">
            <div class="row">
                <div class="col-md-6">
                    <h3>Pembangunan & Pengembangan Sistem Aplikasi</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem accusantium provident placeat! Expedita deserunt accusamus molestiae minima ratione at distinctio nobis architecto, voluptas, mollitia laborum error accusantium ipsum! Nihil, sit.</p>
                </div>
                <div class="col-md-6 text-center"><img style="width:200px;height:200px;" src="/assets/images/project/SI.png"></div>
            </div>
        </div>
        <div class="col-md-12 mb-5" data-aos="fade-up">
            <div class="row">
                <div class="col-md-6 text-center"><img style="width:200px;height:200px;" src="/assets/images/project/rental.png"></div>
                <div class="col-md-6">
                    <h3>Penyewaan Komputer</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem accusantium provident placeat! Expedita deserunt accusamus molestiae minima ratione at distinctio nobis architecto, voluptas, mollitia laborum error accusantium ipsum! Nihil, sit.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4">
                        <!-- <img class="d-block w-100" src="/assets/images/product-image/5.jpg" alt="First slide"> -->
                        <section class="foto-produk">
                            <!-- <div class="slide">
                                <img src="/assets/images/item/1.png" style="width: 100%;">
                            </div>
                            <div class="slide">
                                <img src="/assets/images/item/2.png" style="width: 100%;">
                            </div>
                            <div class="slide">
                                <img src="/assets/images/item/3.png" style="width: 100%;">
                            </div>
                            <div class="slide">
                                <img src="/assets/images/item/4.png" style="width: 100%;">
                            </div>
                            <div class="slide">
                                <img src="/assets/images/item/5.png" style="width: 100%;">
                            </div> -->
                        </section>
                    </div>
                    <div class="col-md-8">
                        <div class="product-details-content quickview-content">
                            <h2 id="nama-barang">Komputer</h2>
                            <div class="pricing-meta">
                                <ul>
                                    <li class="old-price not-cut">Rp. 200000</li>
                                </ul>
                            </div>
                            <p class="quickview-para"></p>
                            <div class="pro-details-quality">
                                <div class="cart-plus-minus">
                                    <div class="dec qtybutton">-</div>
                                    <input class="cart-plus-minus-box" type="text" name="qtybutton" value="1">
                                    <div class="inc qtybutton">+</div>
                                </div>
                                <div class="pro-details-cart btn-hover">
                                    <button class="add-cart btn btn-primary btn-hover-primary ml-4"> Add To
                                        Cart</button>
                                </div>
                            </div>
                            <div class="pro-details-wish-com">
                                <div class="pro-details-wishlist">
                                    <a href="wishlist.html"><i class="ion-android-favorite-outline"></i>Add to
                                        wishlist</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Product tab Area End -->


<?= $this->endSection(); ?>