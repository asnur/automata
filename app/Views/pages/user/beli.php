<?= $this->extend('layout/template_user_1'); ?>

<?= $this->section('content'); ?>


<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-4">
            <div class="slider-for">
                <?php

                use App\Models\Barang;

                foreach ($foto_barang as $f) {
                ?>
                    <div class="slider">
                        <img src="/assets/images/item/<?= $f['nama_foto'] ?>" style="width: 100%;">
                    </div>
                <?php } ?>
            </div>
            <div class="slider-nav mt-3">
                <?php
                foreach ($foto_barang as $f) {
                ?>
                    <div class="slider mr-2">
                        <img src="/assets/images/item/<?= $f['nama_foto'] ?>" style="width: 100%;">
                    </div>
                <?php } ?>
            </div>
        </div>
        <div class="col-md-8">
            <div class="container mt-5">
                <div class="product-details-content quickview-content">
                    <h3 id="nama-barang" class="mb-3"><?= $barang['nama_barang'] ?></h3>
                    <div class="pricing-meta">
                        <ul>
                            <li class="old-price not-cut">
                                <h1><b>Rp. <?= number_format($barang['harga']) ?></b></h1>
                            </li>
                        </ul>
                    </div>
                    <p class="quickview-para" class="mb-3">
                        <?= $barang['deskripsi'] ?>
                    </p>
                    <form action="/home/insert_cart" method="POST">
                        <input type="hidden" name="nama" value="<?= $barang['nama_barang'] ?>" id="nama">
                        <input type="hidden" name="id" value="<?= $barang['id'] ?>" id="id">
                        <input type="hidden" name="harga" value="<?= $barang['harga'] ?>" id="harga">
                        <input type="hidden" name="foto" value="<?= $barang['foto'] ?>" id="foto">
                        <div class="pro-details-quality">
                            <div class="cart-plus-minus">
                                <div class="dec qtybutton">-</div>
                                <input class="cart-plus-minus-box" type="text" name="jumlah" value="1">
                                <div class="inc qtybutton">+</div>
                            </div>
                            <div class="pro-details-cart btn-hover">
                                <button type="submit" class="add-cart btn btn-primary btn-hover-primary ml-4"> Add To
                                    Cart</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<hr>
<br>
<div class="container mt-5 mb-5">
    <div class="col-md-12 text-center mt-5" data-aos="fade-up">
        <div class="section-title mb-0">
            <h2 class="title">More Products</h2>
            <p class="sub-title mb-6">Torem ipsum dolor sit amet, consectetur adipisicing elitsed do eiusmo
                tempor incididunt ut labore</p>
        </div>
    </div>
    <div class="row more-product">
        <?php
        foreach ($barang_lain as $b) {
        ?>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 mb-6 slider mr-3" data-aos="fade-up" data-aos-delay="200">
                <!-- Single Prodect -->
                <div class="product">
                    <div class="thumb">
                        <a href="#" class="image">
                            <span class="badges">
                                <span class="new">New</span>
                            </span>
                            <img src="/assets/images/item/<?= $b['foto'] ?>" alt="Product" />
                            <img class="hover-image" src="/assets/images/item/<?= $b['foto'] ?>" alt="Product" />
                        </a>
                        <div class="actions">
                            <a href="wishlist.html" class="action wishlist" title="Wishlist"><i class="icon-heart"></i></a>
                            <a href="/home/beli/<?= $b['id'] ?>" class="action quickview" data-link-action="quickview"><i class="icon-size-fullscreen"></i></a>
                        </div>
                        <form action="/home/insert_cart" method="POST">
                            <input type="hidden" name="nama" value="<?= $b['nama_barang'] ?>" id="nama">
                            <input type="hidden" name="id" value="<?= $b['id'] ?>" id="id">
                            <input type="hidden" name="harga" value="<?= $b['harga'] ?>" id="harga">
                            <input type="hidden" name="foto" value="<?= $b['foto'] ?>" id="foto">
                            <input type="hidden" name="jumlah" value="1">
                            <button type="submit" title="Add To Cart" class=" add-to-cart">Add To Cart</button>
                        </form>
                    </div>
                    <div class="content">
                        <h5 class="title"><a href="#"><?= $b['nama_barang'] ?> </a>
                        </h5>
                        <span class="price">
                            <span class="new">Rp. <?= number_format($b['harga']) ?></span>
                        </span>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>





<?= $this->endSection(); ?>