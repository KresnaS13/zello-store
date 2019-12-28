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

#jika tombol simpan di klik
if (isset($_POST['kirim'])){
$pesanerror =array();
if (trim($_POST['nama'])==""){
$pesanerror[] = "Silahkan Masukan Nama Anda!";
}
if (trim($_POST['email'])==""){
$pesanerror[] = "Silahkan Masukan Email Anda !";
}
if (trim($_POST['komentar'])==""){
$pesanerror[] = "Silahkan Masukan Tanggapan Anda !";
}


#membaca data dalam form,
$nama=$_POST['nama'];
$email=$_POST['email'];
$komentar=$_POST['komentar'];


#cek SQL
$cekSql="SELECT * FROM tamu WHERE nama='$nama'";
	$cekQry=mysql_query($cekSql, $koneksi) or die ("Eror Query".mysql_error()); 
	if (count($pesanerror)>=1){
echo"<div class='mssgBox'>";
			$noPesan=0;
			foreach ($pesanerror as $indeks=>$pesan_tampil) { 
			$noPesan++;
				echo "&nbsp;&nbsp; $noPesan. $pesan_tampil<br>";	
			} 
		echo "</div> <br>"; 
}else {
		# SIMPAN DATA KE DATABASE. 
		// Jika tidak menemukan error, simpan data ke database
		$kodeBaru	= kdauto("tamu", "T");
		$mySql  	= "INSERT INTO tamu (id_tamu, nama, email, komentar) VALUES ('$kodeBaru','$nama','$email','$komentar')";
		
		$myQry=mysql_query($mySql, $koneksi) or die ("Gagal query".mysql_error());
		if($myQry){
			echo "<meta http-equiv='refresh' content='0; url=?page=Pengunjung'>";
		}
			}
}
#isi Smentara field
$datakode=kdauto("tamu","T");
$nama=isset($_POST['nama']) ?$_POST['nama'] :"";
$email=isset($_POST['email']) ?$_POST['email'] :"";
$komentar=isset($_POST['komentar']) ?$_POST['komentar'] :"";
?>


Selamat Datang di GS Shop Menyediakan Berbagai macam Handphone, Asesories dll<br /><br />
<form action="<?php $_SERVER['PHP_SELF'];?>" method="post">
<input type="hidden" name="id_tamu" value="<?php echo $datakode; ?>"/>
Nama<br />
<input type="text" name="nama" value="<?php echo $nama; ?>"/><br />
E-mail<br />
<input name="email" type="text" value="<?php echo $email; ?>" /><br />
Komentar<br />
<textarea cols="5" rows="4" name="komentar"><?php echo $komentar ; ?></textarea><br />
<input type="submit" name="kirim" value="Kirim" />
</form>