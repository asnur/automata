<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body>
    <h1 align="center">Barang</h1>
    <div class="container">
        <div class="row">
            <?php foreach ($barang as $b) { ?>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <img src="/assets/images/item/<?= $b['foto'] ?>" style="width: 100%; height: 300px; object-position:center; object-fit:cover;">
                        </div>
                        <div class="card-body">
                            <h3><?= $b['nama_barang'] ?></h3>
                            <a class="btn btn-success view-tambah" onclick="view_item_insert('<?= $b['foto'] ?>', '<?= $b['nama_barang'] ?>', <?= $b['id'] ?>, <?= $b['harga'] ?>)" data-toggle="modal" data-target="#tambahItem"> Tambah</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <div class="container keranjang">

    </div>
    <div class="container">
        <form id="payment-form" method="post" action="/home/finish">
            <input type="hidden" name="result_type" id="result-type" value="">
            <input type="hidden" name="result_data" id="result-data" value="">
        </form>

        <button id="pay-button" class="btn btn-success"> Bayar</button>
    </div>

    <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Large modal</button>

    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                ...
            </div>
        </div>
    </div>
    <!-- Modal Tambah Item -->
    <div class="modal fade" id="tambahItem" tabindex="-1" role="dialog" aria-labelledby="tambahItemLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="/home/insert_cart" id="insert" method="POST">
                    <input type="hidden" name="nama" id="nama">
                    <input type="hidden" name="id" id="id">
                    <input type="hidden" name="harga" id="harga">
                    <input type="hidden" name="foto" id="foto">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <img src="" id="foto_barang" style="width: 100%; height: 200px; object-fit:cover;">
                            </div>
                            <div class="col-md-6">
                                <h3 class="harga"></h3>
                                <h6>Jumlah :</h6>
                                <input type="number" class="form-control" name="jumlah" id="jumlah" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success tambah">Tambahkan Keranjang</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal Ubah Item -->
    <div class="modal fade" id="ubahItem" tabindex="-1" role="dialog" aria-labelledby="ubahItemLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="/home/edit_cart" id="insert" method="POST">
                    <input type="hidden" name="nama" id="nama_ubah">
                    <input type="hidden" name="id" id="id_ubah">
                    <input type="hidden" name="rowid" id="rowid">
                    <input type="hidden" name="harga" id="harga_ubah">
                    <input type="hidden" name="foto" id="foto_ubah">
                    <div class="modal-header">
                        <h5 class="modal-title-ubah" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <img src="" id="foto_barang_ubah" style="width: 100%; height: 200px; object-fit:cover;">
                            </div>
                            <div class="col-md-6">
                                <h3 class="harga_ubah"></h3>
                                <h6>Jumlah :</h6>
                                <input type="number" class="form-control" name="jumlah" id="jumlah_ubah" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success ubah">Ubah Item</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-NsNt6ipz4eLWEUD_"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.keranjang').load('/home/keranjang');
        });

        function remove_item(rowid) {
            $.ajax({
                url: `/home/remove_cart`,
                method: 'POST',
                data: {
                    rowid: rowid
                },
                success: function() {
                    $('.keranjang').load('/home/keranjang');
                }
            });
        }

        $('#pay-button').click(function(event) {
            event.preventDefault();
            // $(this).attr("disabled", "disabled");
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

        //Tambah Item
        function view_item_insert(foto = '', nama = '', id = '', harga = '') {
            $('#foto_barang').attr('src', `/assets/images/item/${foto}`);
            $('.modal-title').text(nama);
            $('.harga').text(`Rp. ${numeral(harga).format('0,0')}`);
            $('#nama').val(nama);
            $('#id').val(id);
            $('#harga').val(harga);
            $('#foto').val(foto);

            // $('.tambah').click(function() {
            //     e.preventDefault();
            //     var jumlah_barang = $('#jumlah').val();
            //     $.ajax({
            //         url: `/home/insert_cart`,
            //         method: 'POST',
            //         data: {
            //             id: id,
            //             nama: nama,
            //             harga: harga,
            //             jumlah: jumlah_barang,
            //             foto: foto
            //         },
            //         success: function() {
            //             $('.keranjang').load('/home/keranjang');
            //             // $('#jumlah').val('');
            //         }
            //     });
            // });
        };


        function view_item_edit(rowid, foto, nama, id, harga, jumlah) {
            $('#foto_barang_ubah').attr('src', `/assets/images/item/${foto}`);
            $('.modal-title-ubah').text(nama);
            $('.harga_ubah').text(`Rp. ${numeral(harga).format('0,0')}`);
            $('#jumlah_ubah').val(jumlah);
            $('#nama_ubah').val(nama);
            $('#id_ubah').val(id);
            $('#rowid').val(rowid);
            $('#harga_ubah').val(harga);
            $('#foto_ubah').val(foto);
            // $('.ubah').click(function() {
            //     var jumlah_barang = $('#jumlah_ubah').val();
            //     $.ajax({
            //         url: `/home/edit_cart/${rowid}`,
            //         method: 'POST',
            //         data: {
            //             id: id,
            //             nama: nama,
            //             harga: harga,
            //             jumlah: jumlah_barang,
            //             foto: foto
            //         },
            //         success: function() {
            //             $('.keranjang').load('/home/keranjang');
            //             $('#jumlah_ubah').val('');
            //         }
            //     });
            // });
        };
    </script>
</body>

</html>