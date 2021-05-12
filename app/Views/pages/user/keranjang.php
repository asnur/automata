<?= $this->extend('layout/template_user_1'); ?>

<?= $this->section('content'); ?>
<br><br>
<div class="container">
    <h1>Keranjang Belanja</h1>
    <table class="table table-striped mt-5 mb-5">
        <thead>
            <tr>
                <th class="text-center" scope="col">No</th>
                <th class="text-center" scope="col">Nama Barang</th>
                <th class="text-center" scope="col">Foto</th>
                <th class="text-center" scope="col">Jumlah</th>
                <th class="text-center" scope="col">Harga</th>
                <th class="text-center" scope="col">Subtotal</th>
                <th class="text-center" scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            $total = 0;
            foreach ($keranjang as $k) {
            ?>
                <tr>
                    <th class="text-center" style="vertical-align: middle;" scope="row"><?= $no++; ?></th>
                    <td class="text-center" style="vertical-align: middle;"><?= $k['name']; ?></td>
                    <td class="text-center" style="vertical-align: middle;"><img src="/assets/images/item/<?= $k['image']; ?>" style="width: 120px; height: 120px; object-fit: cover;"></td>
                    <td class="text-center" style="vertical-align: middle;"><?= $k['quantity']; ?></td>
                    <td class="text-center" style="vertical-align: middle;">Rp. <?= number_format($k['price']); ?></td>
                    <td class="text-center" style="vertical-align: middle;">Rp. <?= number_format($k['subtotal']); ?></td>
                    <td class="text-center" style="vertical-align: middle;"><a class="btn btn-danger" id="hapus" href="/home/remove_cart/<?= $k['rowid'] ?>"> Hapus</a>
                    </td>
                </tr>
            <?php
                $total += $k['subtotal'];
            }
            $ppn = $total * (10 / 100);
            ?>
            <tr>
                <td colspan="6" style="font-size: 30px">PPN (10%)</td>
                <td class="text-center"><b style="font-size: 30px">Rp. <?= number_format($ppn); ?></b></td>
            </tr>
            <tr>
                <td colspan="6" style="font-size: 30px">Total Harga</td>
                <td class="text-center"><b style="font-size: 30px">Rp. <?= number_format($total + $ppn); ?></b></td>
            </tr>
        </tbody>
    </table>
</div>
<br>
<br>
<hr>
<br>
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
        foreach ($barang as $b) {
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