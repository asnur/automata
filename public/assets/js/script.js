// function view_item(foto = '', nama = '', id = '', harga = '', deskripsi = '') {
//     $('#nama-barang').text(nama);
//     $('.old-price').text(`Rp. ${harga}`);
//     $('.quickview-para').text(deskripsi);
//     $.ajax({
//         url: `/api/index/${id}`,
//         type: 'GET',
//         success: function (result) {
//             let foto = result;
//             console.log(foto);
//             // $('.foto-produk').remove('.slider');
//             $('.foto-produk').html('');
//             // $('.foto-produk').slick('');
//             $.each(foto, (i, data) => {
//                 $('.foto-produk').append(`
//                 <div class="slider">
//                 <img src="/assets/images/item/${data.nama_foto}" style="width: 100%;">
//                 </div>
//                 `);
//             });
//             $('.foto-produk').slick({
//                 infinite: true,
//                 speed: 300,
//                 slidesToShow: 1,
//                 adaptiveHeight: true,
//                 arrows: false,
//             });
//         }
//     });


// }

$('.quickview').on('click', function () {
    var id = $(this).data('id');
    var foto = $(this).data('foto');
    var harga = $(this).data('harga');
    var deskripsi = $(this).data('deskripsi');
    var nama_barang = $(this).data('nama');
    $('#nama-barang').text(nama_barang);
    $('.old-price').text(`Rp. ${harga}`);
    $('.quickview-para').text(deskripsi);
    console.log(foto);
    // $.each(foto, (i, data) => {
    //     $('.foto-produk').append(`
    //             <div class="slider">
    //             <img src="/assets/images/item/${data.nama_foto}" style="width: 100%;">
    //             </div>
    //             `);
    // })
    // $.getJSON(`/api/index/${id}`, (event) => {
    //     $.each(event, (i, data) => {
    //         $('.foto-produk').append(`
    //             <div class="slider">
    //             <img src="/assets/images/item/${data.nama_foto}" style="width: 100%;">
    //             </div>
    //             `);
    //     });
    //     $('.foto-produk').slick({
    //         infinite: true,
    //         speed: 300,
    //         slidesToShow: 1,
    //         adaptiveHeight: true,
    //         arrows: false,
    //     });
    // });
})




// 
// $.each(foto, (i, data) => {
//     $('.foto-produk').append(`
//         <div class="slider">
//         <img src="/assets/images/item/${data.nama_foto}" style="width: 100%;">
//         </div>
//         `);
// });



// $.ajax({
//     url: `/api/index/${id}`,
//     type: 'GET',
//     success: function (result) {
//         let foto = result;
//         $.each(foto, (i, data) => {
//             $('.foto-produk').append(`
//             <div class="slider">
//             <img src="/assets/images/item/${data.nama_foto}" style="width: 100%;">
//             </div>
//             `);
//         });
//         $('.foto-produk').slick({
//             infinite: true,
//             speed: 300,
//             slidesToShow: 1,
//             adaptiveHeight: true,
//             arrows: false,
//         });
//     }
// });