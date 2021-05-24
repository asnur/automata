<?php


// require  'plugins/html2pdf/vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;

include 'plugins/phpqrcode/qrlib.php';
$nama = $user[0]['username'] . '-' . $user[0]['id'];
$cek = 'cek-' . $riwayat_pembelian[0]['id_pesanan'] . '-' . $riwayat_pembelian[0]['sales'];
$tempdir = 'plugins/phpqrcode/temp/';
// $logopath = 'dist/img/icon.png';
$codeContents = $user[0]['username'] . '-' . $user[0]['id'];
$codeContents2 = base_url() . '/cek/' . $riwayat_pembelian[0]['id_pesanan'];
QRcode::png($codeContents, $tempdir . $nama . ".png", QR_ECLEVEL_H);
QRcode::png($codeContents2, $tempdir . $cek . ".png", QR_ECLEVEL_H);

$timesamp = strtotime($riwayat_pembelian[0]['waktu']);

$content = '
<div style="width: 100%; display: grid; grid-template-cloum: 2 auto">
<div>
<h2 style="line-height:0;">PT. Automata Info Nusantara</h2><br>
<h1 style="line-height:0;">Faktur Pembelian</h1>
</div>
<div style="margin-left: 920px; margin-top: -93px; width:auto;">
<img src="assets/images/icons/logo.png" style="width: 50px; height: 50px; margin-left:40px;"><br>
<h3 style="line-height:0;">No.' . $riwayat_pembelian[0]['id_pesanan'] . '</h3>
</div>
<hr>
<div>
<br>
<table style="font-size: 16px; line-height: 3;">
<tr>
    <td><p>Nama Lengkap</p></td>
    <td><p>: ' . $user[0]['username'] . '</p></td>
</tr>
<tr>
    <td><p>Nama Perusahaan</p></td>
    <td><p>: ' . $user[0]['perusahaan'] . '</p></td>
</tr>
<tr>
    <td><p>Tanggal Pembelian</p></td>
    <td><p>: ' . date('Y-m-d', $timesamp) . '</p></td>
</tr>
</table>
<br>
<table cellpading="0" cellspacing="0" border="1" style="font-size: 16px; ">
<tr>
    <td align="center" cellpading="0" cellspacing="0" style=" width:250px;"><p style="margin-top:5px;">Nama</p></td>
    <td align="center" cellpading="0" cellspacing="0" style=" width:250px;"><p style="margin-top:5px;">Jumlah</p></td>
    <td align="center" cellpading="0" cellspacing="0" style=" width:250px;"><p style="margin-top:5px;">Harga</p></td>
    <td align="center" cellpading="0" cellspacing="0" style=" width:250px;"><p style="margin-top:5px;">Subtotal</p></td>
</tr>';

$total = 0;
foreach ($riwayat_pembelian as $r) {
    $content .=
        '<tr>
    <td cellpading="0" cellspacing="0" ><p style="margin-top:5px;">' . $r['nama_barang'] . '</p></td>
    <td align="center" cellpading="0" cellspacing="0" ><p style="margin-top:5px;">' . $r['jumlah_barang'] . '</p></td>
    <td align="center" cellpading="0" cellspacing="0" ><p style="margin-top:5px;">Rp. ' . number_format($r['harga']) . '</p></td>
    <td align="center" cellpading="0" cellspacing="0" ><p style="margin-top:5px;">Rp. ' . number_format($r['subtotal']) . '</p></td>
</tr>';
    $total += $r['subtotal'];
    $ppn = $total * (10 / 100);
    $total_keseluruhan = $total + $ppn;
}

$content .= '
<tr>
    <td cellpading="0" cellspacing="0" colspan="3" ><p style="margin-top:5px;"><b>PPN</b></p></td>
    <td align="center" cellpading="0" cellspacing="0" ><p style="margin-top:5px;">Rp. ' . number_format($ppn) . '</p></td>
</tr>
<tr>
    <td cellpading="0" cellspacing="0" colspan="3" ><p style="margin-top:5px;"><b>Total Harga</b></p></td>
    <td align="center" cellpading="0" cellspacing="0" ><p style="margin-top:5px;">Rp. ' . number_format($total_keseluruhan) . '</p></td>
</tr>
</table>
</div>
</div>
<br>
<br>
<br>
<br>
<br>
<div>
Di Terima Oleh
<br style="text-center">
<img src="plugins/phpqrcode/temp/' . $user[0]['username'] . '-' . $user[0]['id'] . '.png"><br>
<p><b><u>' . strtoupper($user[0]['username']) . '</u></b></p>
</div>
<div style="position: absolute; right:0; top: 435px;">
Pihak Penjual
<br>
<img src="plugins/phpqrcode/temp/' . $cek . '.png" style="width: 90px; height: 90px;"><br>
<p><b><u>' . $riwayat_pembelian[0]['sales'] . '</u></b></p>
</div>
';

$html2pdf = new HTML2PDF('L', 'A4', 'en', true, 'UTF-8', array(10, 5, 10, 0));
$html2pdf->WriteHTML($content);
$html2pdf->Output('Surat-Pembelian-' . $riwayat_pembelian[0]['id_pesanan'] . '.pdf');
exit();
