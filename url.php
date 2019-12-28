<?php
if($_GET){	
	switch($_GET['page']){
	case'home':
	if(!file_exists("home.php")) die ("Halaman Kosong !");
	include "home.php"; break;
	
	case'syaratdanketentuan':
	if(!file_exists("carabeli.php")) die ("Halaman Kosong !");
	include "carabeli.php"; break;
	
	case'DaftarBiaya':
	if(!file_exists("biaya.php")) die ("Halaman Kosong !");
	include "biaya.php"; break;
	
	case'TentangPerusahaan':
	if(!file_exists("tentang.php")) die ("Halaman Kosong !");
	include "tentang.php"; break;
	
	case'kategori':
	if(!file_exists("kategori.php")) die ("Halaman Kosong !");
	include "kategori.php"; break;
	
	case'Pengunjung':
	if(!file_exists("bukutamu.php")) die ("Halaman Kosong !");
	include "bukutamu.php"; break;
	
	case'Pemesan':
	if(!file_exists("pemesan.php")) die ("Halaman Kosong !");
	include "pemesan.php"; break;
	
	case'Konfirmasi':
	if(!file_exists("konfirmasi_pemesanan.php")) die ("Halaman Kosong !");
	include "konfirmasi_pemesanan.php"; break;
	
	case'detail':
	if(!file_exists("detail.php")) die ("Halaman Kosong !");
	include "detail.php"; break;
	
	case'keranjangbelanja':
	if(!file_exists("keranjangbelanja.php")) die ("Halaman Kosong");
	include "keranjangbelanja.php"; break;
	
	case'hapuskeranjang':
	if(!file_exists("hapuskeranjang.php")) die ("Halaman Kosong");
	include "hapuskeranjang.php"; break;
	
	//kategori-kategori
		
	case'HomeAdmin':
	if(!file_exists("admin/home.php")) die ("Halaman Kosong !");
	include "admin/homr.php"; break;
	
	// brosure harga
	case'brosur';
	if(!file_exists("brosur.php")) die ("Halaman Kosong !");
	include "brosur.php"; break;

	case'pencarian';
	if(!file_exists("pencarian.php")) die ("Halaman Kosong !");
	include "pencarian.php"; break;
	
	case'pendaftaran';
	if(!file_exists("member/pendaftaran.php")) die ("Halaman Kosong !");
	include "member/pendaftaran.php"; break;
	
	case'proses';
	if(!file_exists("member/proses_daftar.php")) die ("Halaman Kosong !");
	include "member/proses_daftar.php"; break;
	
	}
}
	else {
	if(!file_exists("home.php")) die ("Halaman Kosong !");
	include "home.php";
	}
?>
