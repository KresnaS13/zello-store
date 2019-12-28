<?php
include "../config/koneksi.php";

?>
<?php
// Periksa ada atau tidak variabel Kode pada URL (alamat browser)
if(isset($_GET['Kode'])){
	// Hapus data sesuai Kode yang didapat di URL
	$mySql = "DELETE FROM member WHERE idpemesan='".$_GET['Kode']."'";
	$myQry = mysql_query($mySql, $koneksi) or die ("Eror hapus data".mysql_error());
	if($myQry){echo "<meta http-equiv='refresh' content='0; url=?index=member'>";
	}
}else {
	// Jika tidak ada data Kode ditemukan di URL
	echo "<b>Data yang dihapus tidak ada</b>";}
?>