<?= $this->extend('layout/template_user_1'); ?>

<?= $this->section('content'); ?>
<br><br>
<div class="container">
    <h1>Riwayat Pembelian</h1>
    <table class="table table-striped mt-5 mb-5">
        <thead>
            <tr>
                <th class="text-center" scope="col">No</th>
                <th class="text-center" scope="col">Waktu</th>
                <th class="text-center" scope="col">Status</th>
                <th class="text-center" scope="col">Total</th>
                <th class="text-center" scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            $total = 0;
            foreach ($riwayat_pembelian as $k) {
            ?>
                <tr>
                    <th class="text-center" style="vertical-align: middle;" scope="row"><?= $no++; ?></th>
                    <td class="text-center" style="vertical-align: middle;"><?= $k['waktu']; ?></td>
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
                        <a class="btn btn-warning rounded-pill" id="detail_pesanan" href="#" title="Quick view" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="detail_pembelian(<?= $_SESSION['user'][0]['id'] ?>, <?= $k['id'] ?>, <?= $k['total'] ?>)"> Detail</a>
                        <a class="btn btn-primary rounded-pill" href="/home/surat_pembelian/<?= $k['id'] ?>"> Cetak</a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="text-right" style="left:30px; position:absolute;">
                        <h2>Detail Pembelian</h2>
                    </div>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
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
                            <?= csrf_field(); ?>
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