<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nama Barang</th>
            <th scope="col">Harga</th>
            <th scope="col">Jumlah</th>
            <th scope="col">Subtotal</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        foreach ($keranjang as $k) {
        ?>
            <tr>
                <th scope="row"><?= $no++ ?></th>
                <td><?= $k['name'] ?></td>
                <td><?= $k['price'] ?></td>
                <td><?= $k['qty'] ?></td>
                <td><?= $k['subtotal'] ?></td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>