<?php
//koneksi database
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

$email = (isset($_POST['email'])) ? $_POST['email'] : "";
$password = (isset($_POST['password'])) ? $_POST['password'] : "";
$nama = (isset($_POST['nama'])) ? $_POST['nama'] : "";
$level = (isset($_POST['level'])) ? $_POST['level'] : "";

if(isset($_POST['simpan'])){
	// Buat folder
	$kodeBaru=kdauto("member","PS");
	$query = "INSERT INTO member VALUES ('$kodeBaru','$email',MD5('$password'),'$nama','$level')";
	$Data = mysql_query($query);

echo "<p>Terima kasih telah melakukan pendaftaran, silahkan masuk sebagai member area dan selamat berbelanja.</p><br>
<a href='?page=home'>Kembali</a>";
}
$datakode=kdauto("member","PS");

?>