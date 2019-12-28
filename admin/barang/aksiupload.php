<?php
include "../config/koneksi.php";

?>
<?php
#Kode Otomatis
function kdauto($tabel, $inisial){
	$struktur	= mysql_query("SELECT * FROM $tabel");
	$field		= mysql_field_name($struktur,0);
	$panjang	= mysql_field_len($struktur,0);

 	$qry	= mysql_query("SELECT MAX(".$field.") FROM ".$tabel);
 	$row	= mysql_fetch_array($qry); 
 	if ($row[0]=="") {
 		$angka=0;
	}
 	else {
 		$angka		= substr($row[0], strlen($inisial));
 	}
	
 	$angka++;
 	$angka	=strval($angka); 
 	$tmp	="";
 	for($i=1; $i<=($panjang-strlen($inisial)-strlen($angka)); $i++) {
		$tmp=$tmp."0";	
	}
 	return $inisial.$tmp.$angka;
}
?>
<?php
//koneksi ke MySQL

$kd_barang = isset($_POST['kd_barang']) ?$_POST['kd_barang']:"";
$kd_kategori = isset($_POST['kd_kategori']) ?$_POST['kd_kategori']:"";
$nm_barang = isset($_POST['nm_barang']) ?$_POST['nm_barang']:"";
$harga = isset($_POST['harga']) ?$_POST['harga']:"";
$stock =isset($_POST['stock']) ?$_POST['stock']:"";
$detail = isset($_POST['detail']) ?$_POST['detail']:"";

 if(isset($_POST['btsimpan'])){

	if ( !file_exists("gambar")){
		mkdir("gambar");
	}
	$asal = $_FILES['gmb']['tmp_name'];
	$tujuan = "barang/gambar/".$_FILES['gmb']['name'];
	move_uploaded_file ($asal,$tujuan);


//masukkan datanya ke database

$kodeBaru	= kdauto("barang", "BR");
$input = mysql_query("INSERT INTO barang VALUES('$kodeBaru','$kd_kategori','$nm_barang','$harga','$stock','$tujuan','$detail')");

 echo "<meta http-equiv='refresh' content='0; url=?index=barang'>";
 }
?>