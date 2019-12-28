<?php
if($_GET){	
	switch($_GET['hal']){
	case'beranda':
	if(!file_exists("beranda.php")) die ("Halaman Kosong !");
	include "beranda.php"; break;
	
	case'CaraBeli':
	if(!file_exists("../carabeli.php")) die ("Halaman Kosong !");
	include "../carabeli.php"; break;
	
	case'DaftarBiaya':
	if(!file_exists("../biaya.php")) die ("Halaman Kosong !");
	include "../biaya.php"; break;
	
	case'kategori':
	if(!file_exists("kategori.php")) die ("Halaman Kosong !");
	include "kategori.php"; break;
	
	case'Pemesan':
	if(!file_exists("pemesan.php")) die ("Halaman Kosong !");
	include "pemesan.php"; break;
	
	case'datapemesan':
	if(!file_exists("datapemesan_cek.php")) die ("Halaman Kosong !");
	include "datapemesan_cek.php"; break;
	
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
	
	// brosure harga
	case'brosur';
	if(!file_exists("brosur.php")) die ("Halaman Kosong !");
	include "brosur.php"; break;

	case'pencarian';
	if(!file_exists("pencarian.php")) die ("Halaman Kosong !");
	include "pencarian.php"; break;
	
	case'ubah-member';
	if(!file_exists("ubah_member.php")) die ("Halaman Kosong !");
	include "ubah_member.php"; break;
	
	case'history-member';
	if(!file_exists("historybelanja.php")) die ("Halaman Kosong !");
	include "historybelanja.php"; break;
	
		}
}
	else {
	if(!file_exists("beranda.php")) die ("Halaman Kosong !");
	include "beranda.php";
	}
?>
