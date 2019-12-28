<?php
include "../config/koneksi.php";

?>
<?php

if (!isset($_SESSION['id'])){
	die ("Anda Harus Login");
}
if ($_SESSION['level']=="Admin"){
	die ("Anda Harus Login");
}
// Periksa ada atau tidak variabel Kode pada URL (alamat browser)
if(isset($_GET['Kode'])){
	// Hapus data sesuai Kode yang didapat di URL
	$mySql = "DELETE FROM login WHERE id='".$_GET['Kode']."' AND id !='".$_SESSION['id']."'";
	$myQry = mysql_query($mySql, $koneksi) or die ("Eror hapus data".mysql_error());
	if($myQry){echo "<meta http-equiv='refresh' content='0; url=?index=user'>";
	}
}else {
	// Jika tidak ada data Kode ditemukan di URL
	echo "<b>Data yang dihapus tidak ada</b>";}
?>