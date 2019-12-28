<?php
$server="localhost";
$username="root";
$password="";
$nama_db="store";

//menghubungkan database
$koneksi=mysql_connect($server,$username,$password);
$database=mysql_select_db($nama_db);

//pernyataan
if (!$koneksi){
echo "Maaf koneksi ke database gagal..";
}
else{
if(!$database){
echo "Maaf Database tidak ditemukan..";}
}
?>
<?php
// Periksa ada atau tidak variabel Kode pada URL (alamat browser)
if(isset($_GET['Kode'])){
	// Hapus data sesuai Kode yang didapat di URL
	$mySql = "DELETE FROM temp_beli WHERE kd_barang='".$_GET['Kode']."'";
	$myQry = mysql_query($mySql, $koneksi) or die ("Eror hapus data".mysql_error());
	if($myQry){echo "<meta http-equiv='refresh' content='0; url=?page=keranjangbelanja'>";
	}
}else {
	// Jika tidak ada data Kode ditemukan di URL
	echo "<b>Data yang dihapus tidak ada</b>";}
?>