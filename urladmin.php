<?php
$mod = $_GET['index'];
if ($mod=='homeadmin'){
	include "admin/home.php";
}
elseif ($mod=='kategori'){
    include "admin/kategori/kategori.php";
}
elseif ($mod=='barang'){
    include "admin/barang/barang.php";
}
elseif ($mod=='biayakirim'){
    include "admin/biayakirim/biayakirim.php";
}
elseif ($mod=='pesanan'){
    include "admin/pesanan/pesanan.php";
}
elseif ($mod=='perusahaan'){
    include "admin/perusahaan/perusahaan.php";
}
elseif ($mod=='bukutamu'){
    include "admin/bukutamu/bukutamu.php";
}
//biaya pengiriman
elseif ($mod=='hapus-biayakirim'){
    include "admin/biayakirim/hapus.php";
}
elseif ($mod=='tambah-biayakirim'){
    include "admin/biayakirim/tambah.php";
}
elseif ($mod=='ubah-biayakirim'){
    include "admin/biayakirim/ubah.php";
}
//kategori
elseif ($mod=='hapus-kategori'){
    include "admin/kategori/hapus.php";
}
elseif ($mod=='tambah-kategori'){
    include "admin/kategori/tambah.php";
}
elseif ($mod=='ubah-kategori'){
    include "admin/kategori/ubah.php";
}
//Profil Perusahaan
elseif ($mod=='hapus-perusahaan'){
    include "admin/perusahaan/hapus.php";
}
elseif ($mod=='ubah-perusahaan'){
    include "admin/perusahaan/ubah.php";
}
//Barang
elseif ($mod=='hapus-barang'){
    include "admin/barang/hapus.php";
}
elseif ($mod=='tambah-barang'){
    include "admin/barang/tambah.php";
}
elseif ($mod=='ubah-barang'){
    include "admin/barang/ubah.php";
}
elseif ($mod=='upload'){
    include "admin/barang/aksiupload.php";
}
//biaya pengiriman
elseif ($mod=='user'){
    include "admin/user/user.php";
}
elseif ($mod=='hapus-user'){
    include "admin/user/hapus.php";
}
elseif ($mod=='tambah-user'){
    include "admin/user/tambah.php";
}
elseif ($mod=='ubah-user'){
    include "admin/user/ubah.php";
}

//buku tamu
elseif ($mod=='hapus-bukutamu'){
    include "admin/bukutamu/hapus.php";
}
elseif ($mod=='balas-bukutamu'){
    include "admin/bukutamu/balastamu.php";
}

//pesanan
elseif ($mod=='detail-pemesan'){
    include "admin/pesanan/detailpesan.php";
}
elseif ($mod=='hapus-pemesan'){
    include "admin/pesanan/hapus.php";
}

//member
elseif ($mod=='member'){
    include "admin/member/member.php";
}
elseif ($mod=='hapus-member'){
    include "admin/member/hapus.php";
}
elseif ($mod=='ubah-member'){
    include "admin/member/ubah.php";
}

//upload file
elseif($mod=='data'){
include "admin/upload/data.php";
}
elseif($mod=='uploadfile'){
include "admin/upload/upload.php";
}
elseif($mod=='hapusfile'){
include "admin/upload/hapus.php";
}
else{
  echo "<b>MODUL BELUM ADA ATAU BELUM LENGKAP SILAHKAN BUAT SENDIRI</b>";
}
?>
