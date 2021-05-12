<?php

namespace App\Controllers;

use App\Models\Barang;

use App\Models\Pesanan;

use App\Models\PesananBarang;

use App\Models\FotoBarang;

use App\Libraries\Midtrans;



class Home extends BaseController
{
	protected $barang;
	protected $cart;
	protected $cartSewa;
	protected $midtrans;
	protected $pesanan;
	protected $pesananBarang;
	protected $id_pesanan;
	protected $fotoBarang;

	public function __construct()
	{
		$this->barang = new Barang();
		$this->cart = \Config\Services::cart();
		$this->cartSewa = \Config\Services::cartsewa();
		$this->midtrans = new Midtrans();
		$params = array('server_key' => 'SB-Mid-server-mnKUQ0BIrsfC2_5azYXTisEU', 'production' => false);
		$this->midtrans->config($params);
		$this->pesanan = new Pesanan();
		$this->pesananBarang = new PesananBarang();
		$this->id_pesanan = rand();
		$this->fotoBarang = new FotoBarang();
		$keranjang = $this->cart->contents();
	}

	public function index()
	{
		$data = [
			'barang' => $this->barang->findAll(),
			'barang_jual' => $this->barang->where(['kategori' => 'jual'])->findAll(),
			'barang_sewa' => $this->barang->where(['kategori' => 'sewa'])->findAll(),
			'keranjang' => $this->cart->contents(),
			'keranjang_sewa' => $this->cartSewa->contents(),
			'total_item' => count($this->cart->contents()),
			'total_item_sewa' => count($this->cartSewa->contents()),
			'gallery' => $this->fotoBarang
		];
		return view('pages/user/home', $data);
	}

	public function keranjang()
	{
		if (!isset($_SESSION['user'])) {
			return redirect()->to('/login');
		}
		$data = [
			'keranjang' => $this->cart->contents(),
			'keranjang_sewa' => $this->cartSewa->contents(),
			'total_item' => count($this->cart->contents()),
			'total_item_sewa' => count($this->cartSewa->contents()),
			'barang' => $this->barang->where(['kategori' => 'jual'])->findAll()
		];
		return view('pages/user/keranjang', $data);
	}

	public function keranjang_sewa()
	{
		if (!isset($_SESSION['user'])) {
			return redirect()->to('/login');
		}
		$data = [
			'keranjang' => $this->cart->contents(),
			'keranjang_sewa' => $this->cartSewa->contents(),
			'total_item' => count($this->cart->contents()),
			'total_item_sewa' => count($this->cartSewa->contents()),
			'barang' => $this->barang->where(['kategori' => 'sewa'])->findAll()
		];
		return view('pages/user/keranjang_sewa', $data);
	}

	public function insert_cart()
	{
		if (!isset($_SESSION['user'])) {
			return redirect()->to('/login');
		}
		$id = $this->request->getVar('id');
		$nama = $this->request->getVar('nama');
		$harga = $this->request->getVar('harga');
		$jumlah = $this->request->getVar('jumlah');
		$foto = $this->request->getVar('foto');
		// d($id, $nama, $harga, $jumlah, $foto);
		$this->cart->insert(array(
			'id'      => $id,
			'image'	  => $foto,
			'quantity' => $jumlah,
			'price'   => $harga,
			'name'    => $nama
		));
		session()->setFlashdata('pesan', 'Barang Berhasil di Tambahkan ke Keranjang');
		return redirect()->to('/home/keranjang');
	}

	public function insert_cart_sewa()
	{
		if (!isset($_SESSION['user'])) {
			return redirect()->to('/login');
		}
		$id = $this->request->getVar('id');
		$nama = $this->request->getVar('nama');
		$harga = $this->request->getVar('harga');
		$jumlah = $this->request->getVar('jumlah');
		$foto = $this->request->getVar('foto');
		$peminjaman = date_create($this->request->getVar('peminjaman'));
		$pengembalian = date_create($this->request->getVar('pengembalian'));
		$interval = date_diff($peminjaman, $pengembalian);
		$jumlah_hari = $interval->days;
		$this->cartSewa->insert(array(
			'id'      => $id,
			'image'	  => $foto,
			'harga'	=> $harga * $jumlah * $jumlah_hari,
			'pengembalian'	=> $this->request->getVar('pengembalian'),
			'peminjaman'	=> $this->request->getVar('peminjaman'),
			'jumlah_hari' => $jumlah_hari,
			'quantity' => $jumlah,
			'price'   => $harga,
			'name'    => $nama
		));
		session()->setFlashdata('pesan', 'Barang Berhasil di Tambahkan ke Keranjang');
		return redirect()->to('/home/keranjang_sewa');
	}

	public function edit_cart()
	{
		if (!isset($_SESSION['user'])) {
			return redirect()->to('/login');
		}
		$rowid = $this->request->getVar('rowid');
		$id = $this->request->getVar('id');
		$nama = $this->request->getVar('nama');
		$harga = $this->request->getVar('harga');
		$jumlah = $this->request->getVar('jumlah');
		$foto = $this->request->getVar('foto');
		$this->cart->update(array(
			'rowid'	  => $rowid,
			'id'      => $id,
			'image'	  => $foto,
			'quantity' => $jumlah,
			'price'   => $harga,
			'name'    => $nama,
		));

		return redirect()->to('/');
	}

	public function remove_cart($rowid = '')
	{
		if (!isset($_SESSION['user'])) {
			return redirect()->to('/login');
		}
		$this->cart->remove($rowid);

		return redirect()->to('/home/keranjang');
	}

	public function remove_cart_sewa($rowid = '')
	{
		if (!isset($_SESSION['user'])) {
			return redirect()->to('/login');
		}
		$this->cartSewa->remove($rowid);

		return redirect()->to('/home/keranjang_sewa');
	}

	public function token()
	{
		if (!isset($_SESSION['user'])) {
			return redirect()->to('/login');
		}
		// Required
		$item_cart = $this->cart->contents();
		// d($item_cart);
		$total_price = 0;
		foreach ($item_cart as $ic) {
			$total_price += $ic['subtotal'];
			$item = array(
				'id' => $ic['id'],
				'price' => $ic['price'],
				'quantity' => $ic['quantity'],
				'name' => $ic['name']
			);
			$item_array[] = $item;
		}
		$ppn = $total_price * (10 / 100);
		$item_array[] = [
			'id' => rand(),
			'price' => $ppn,
			'quantity' => 1,
			'name' => 'PPN'
		];
		// dd($item_array);

		$transaction_details = array(
			'order_id' => $this->id_pesanan,
			'gross_amount' => $total_price + $ppn, // no decimal allowed for creditcard
		);

		// Optional
		$item_details = $item_array;


		// // Optional
		$customer_details = array(
			'first_name'    => $_SESSION['user'][0]['username'],
			'email'         => $_SESSION['user'][0]['email'],
			'phone'         => $_SESSION['user'][0]['no_hp'],
			'billing_address'  => 'Gg. Rambutan No.1A, RT.006/RW.004, Jatimurni, Kec. Pd. Melati, Kota Bks, Jawa Barat 17431',
			'shipping_address' => $_SESSION['user'][0]['alamat']
		);

		// Data yang akan dikirim untuk request redirect_url.
		$credit_card['secure'] = true;
		//ser save_card true to enable oneclick or 2click
		//$credit_card['save_card'] = true;

		$time = time();
		$custom_expiry = array(
			'start_time' => date("Y-m-d H:i:s O", $time),
			'unit' => 'minute',
			'duration'  => 2
		);

		$transaction_data = array(
			'transaction_details' => $transaction_details,
			'item_details'       => $item_details,
			'customer_details'   => $customer_details,
			'credit_card'        => $credit_card,
			'expiry'             => $custom_expiry
		);

		error_log(json_encode($transaction_data));
		$snapToken = $this->midtrans->getSnapToken($transaction_data);
		error_log($snapToken);
		echo $snapToken;
	}

	public function finish()
	{
		if (!isset($_SESSION['user'])) {
			return redirect()->to('/login');
		}
		foreach ($this->cart->contents() as $item) {
			$this->pesananBarang->save([
				'id_pesanan' => $this->id_pesanan,
				'id_barang' => $item['id'],
				'foto' => $item['image'],
				'harga_barang' => $item['price'],
				'jumlah_barang' => $item['quantity'],
				'subtotal' => $item['subtotal']
			]);
		}
		$this->cart->destroy();
		$result = json_decode($this->request->getVar('result_data'), true);
		$this->pesanan->insert_data($this->id_pesanan, $_SESSION['user'][0]['id'], substr($result['gross_amount'], 0, -3), 'jual', $result['transaction_status']);
		session()->setFlashdata('pesan', 'Silahkan Selesaikan Pembayaran');
		return redirect()->to('/home/riwayat_pembelian');
	}

	public function riwayat_pembelian()
	{
		if (!isset($_SESSION['user'])) {
			return redirect()->to('/login');
		}
		$data = [
			'riwayat_pembelian' => $this->pesanan->riwayat_pembelian($_SESSION['user'][0]['id']),
			'barang' => $this->barang->where(['kategori' => 'jual'])->findAll(),
			'keranjang' => $this->cart->contents(),
			'keranjang_sewa' => $this->cartSewa->contents(),
			'total_item' => count($this->cart->contents()),
			'total_item_sewa' => count($this->cartSewa->contents())
		];

		return view('pages/user/riwayat_pembelian', $data);
	}

	public function surat_pembelian($id_pesanan = '')
	{
		if (!isset($_SESSION['user'])) {
			return redirect()->to('/login');
		}
		$data = [
			'user' => $_SESSION['user'],
			'riwayat_pembelian' => $this->pesanan->detail_riwayat_pembelian($_SESSION['user'][0]['id'], $id_pesanan)
		];
		return view('pages/user/surat_pembelian', $data);
	}

	public function surat_penyewaan($id_pesanan = '')
	{
		if (!isset($_SESSION['user'])) {
			return redirect()->to('/login');
		}
		$data = [
			'user' => $_SESSION['user'],
			'riwayat_penyewaan' => $this->pesanan->detail_riwayat_penyewaan($_SESSION['user'][0]['id'], $id_pesanan)
		];
		return view('pages/user/surat_penyewaan', $data);
	}

	public function riwayat_sewa()
	{
		if (!isset($_SESSION['user'])) {
			return redirect()->to('/login');
		}
		$data = [
			'riwayat_sewa' => $this->pesanan->riwayat_sewa($_SESSION['user'][0]['id']),
			'barang' => $this->barang->where(['kategori' => 'sewa'])->findAll(),
			'keranjang' => $this->cart->contents(),
			'keranjang_sewa' => $this->cartSewa->contents(),
			'total_item' => count($this->cart->contents()),
			'total_item_sewa' => count($this->cartSewa->contents())
		];

		return view('pages/user/riwayat_sewa', $data);
	}

	public function token_sewa()
	{
		if (!isset($_SESSION['user'])) {
			return redirect()->to('/login');
		}
		// Required
		$item_cart = $this->cartSewa->contents();
		// d($item_cart);
		$total_price = 0;
		foreach ($item_cart as $ic) {
			$total_price += $ic['harga'];
		}

		$item_array[] = array(
			'id' => rand(),
			'price' => $total_price,
			'quantity' => 1,
			'name' => 'Harga Sewa'
		);

		$ppn = $total_price * (10 / 100);
		$item_array[] = [
			'id' => rand(),
			'price' => $ppn,
			'quantity' => 1,
			'name' => 'PPN'
		];
		// dd($item_array);

		$transaction_details = array(
			'order_id' => $this->id_pesanan,
			'gross_amount' => $total_price + $ppn, // no decimal allowed for creditcard
		);

		// Optional
		$item_details = $item_array;


		// Optional
		$customer_details = array(
			'first_name'    => $_SESSION['user'][0]['username'],
			'email'         => $_SESSION['user'][0]['email'],
			'phone'         => $_SESSION['user'][0]['no_hp'],
			'billing_address'  => 'Gg. Rambutan No.1A, RT.006/RW.004, Jatimurni, Kec. Pd. Melati, Kota Bks, Jawa Barat 17431',
			'shipping_address' => $_SESSION['user'][0]['alamat']
		);

		// Data yang akan dikirim untuk request redirect_url.
		$credit_card['secure'] = true;
		//ser save_card true to enable oneclick or 2click
		//$credit_card['save_card'] = true;

		$time = time();
		$custom_expiry = array(
			'start_time' => date("Y-m-d H:i:s O", $time),
			'unit' => 'minute',
			'duration'  => 2
		);

		$transaction_data = array(
			'transaction_details' => $transaction_details,
			'item_details'       => $item_details,
			'customer_details'   => $customer_details,
			'credit_card'        => $credit_card,
			'expiry'             => $custom_expiry
		);

		error_log(json_encode($transaction_data));
		$snapToken = $this->midtrans->getSnapToken($transaction_data);
		error_log($snapToken);
		echo $snapToken;
	}

	public function finish_sewa()
	{
		if (!isset($_SESSION['user'])) {
			return redirect()->to('/login');
		}
		foreach ($this->cartSewa->contents() as $item) {
			$this->pesananBarang->save([
				'id_pesanan' => $this->id_pesanan,
				'id_barang' => $item['id'],
				'foto' => $item['image'],
				'harga_barang' => $item['price'],
				'jumlah_barang' => $item['quantity'],
				'subtotal' => $item['subtotal'],
				'peminjaman' => $item['peminjaman'],
				'pengembalian' => $item['pengembalian'],
				'jumlah_hari' => $item['jumlah_hari']
			]);
		}
		$result = json_decode($this->request->getVar('result_data'), true);
		$this->pesanan->insert_data($this->id_pesanan, $_SESSION['user'][0]['id'], substr($result['gross_amount'], 0, -3), 'sewa');
		$this->cartSewa->destroy();
		session()->setFlashdata('pesan', 'Silahkan Selesaikan Pembayaran');
		return redirect()->to('/home/riwayat_sewa');
	}

	public function beli($id = '')
	{
		$data = [
			'barang' => $this->barang->find($id),
			'barang_lain' => $this->barang->where(['kategori' => 'jual'])->findAll(),
			'keranjang' => $this->cart->contents(),
			'keranjang_sewa' => $this->cartSewa->contents(),
			'total_item' => count($this->cart->contents()),
			'total_item_sewa' => count($this->cartSewa->contents()),
			'foto_barang' => $this->fotoBarang->where(['id_barang' => $id])->findAll()
		];

		return view('pages/user/beli', $data);
	}

	public function sewa($id = '')
	{
		$data = [
			'barang' => $this->barang->find($id),
			'barang_lain' => $this->barang->where(['kategori' => 'sewa'])->findAll(),
			'keranjang' => $this->cart->contents(),
			'keranjang_sewa' => $this->cartSewa->contents(),
			'total_item' => count($this->cart->contents()),
			'total_item_sewa' => count($this->cartSewa->contents()),
			'foto_barang' => $this->fotoBarang->where(['id_barang' => $id])->findAll()
		];

		return view('pages/user/sewa', $data);
	}


	//--------------------------------------------------------------------

}
