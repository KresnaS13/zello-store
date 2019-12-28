<?php
//koneksi database
include "config/koneksi.php";
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
$namapattern = '/^[\ \][a-zA-Z]+$/';
$passpattern = '/^[a-zA-Z0-9]/';
$emailpattern='/^[a-zA-Z0-9._-]+@[a-zA-Z]+\.[a-zA-Z]+$/';
$telppattern = '/^[0-9]{11,12}?$/';
$alamatpattern='/^[\ \][a-zA-Z0-9:_.-]+$/';


$email = (isset($_POST['email'])) ? $_POST['email'] : "";
$password = (isset($_POST['passwords'])) ? $_POST['passwords'] : "";
$nama = (isset($_POST['nama'])) ? $_POST['nama'] : "";
$alamat = (isset($_POST['alamat'])) ? $_POST['alamat'] : "";
$telp = (isset($_POST['telepon'])) ? $_POST['telepon'] : "";
$level = (isset($_POST['level'])) ? $_POST['level'] : "";

if(isset($_POST['simpan'])){
	// Buat folder
	$pesanerror =array();
if (empty($_POST['email'])){
$pesanerror[] = "Data Email Masih Kosong";
}elseif (!preg_match($emailpattern,$email)){
$pesanerror[]="Email Tidak Valid"; 
}
if (empty($_POST['passwords'])){
$pesanerror[] = "Data Password Masih Kosong";
} elseif (!preg_match($passpattern,$password)){
	$pesanerror[]="Password Harus Berisi Angka dan Huruf";
}
if (empty($_POST['nama'])){
$pesanerror[] = "Data Nama Masih Kosong";
} elseif (!preg_match($namapattern,$nama)){
	$pesanerror[]="Nama Hanya berisi huruf";
}
if (empty($_POST['alamat'])){
$pesanerror[] = "Alamat Masih Kosong";
}elseif(!preg_match($alamatpattern,$alamat)){
$pesanerror[]="Alamat Hanya Boleh Menggunakan simbol (: _ . - !)";
}
if(empty($telp)){
$pesanerror[]="Telepon Masih Kosong";
}elseif(!preg_match($telppattern,$telp)){
$pesanerror[]="Telepon Hanya berisi angka antara 11-12 digit";
}
if (empty($_POST['level'])){
$pesanerror[] = "Data Level Masih Kosong";
}
if (empty($_POST['check'])){
$pesanerror[] = "Silahkan Checklist syarat dan ketentuan yang berlaku";
}


	$cekSql="SELECT * FROM member WHERE nama='$nama'";
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
	
	$kodeBaru=kdauto("member","PS");
	$query = "INSERT INTO member VALUES ('$kodeBaru','$email',MD5('$password'),'$nama','$alamat','$telp','$level')";
	$Data = mysql_query($query);

echo '<script language="javascript">  
    alert("Pembuatan Member Berhasil, Silahkan Login Untuk Dapat Membeli Produk");  
    window.location="?page=home";  
    </script>';  
    exit();
}}
$datakode=kdauto("member","PS");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Pendaftaran</title>

</head>

<body>
<h4>Form Pendaftaran Member Zello Store</h4><br />
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" >
<table>
<input type="hidden" name="idpemesan" value="<?php echo $datakode; ?>"/>
<tr>
<td>Nama</td>
<td>:</td>
<td><input type="text" name="nama" value="<?php echo $nama ;?>" /> </td>
<td> *Isikan dengan nama asli anda.</td> 
</tr>
<tr>
<td>Alamat</td>
<td>:</td>
<td><textarea name="alamat"><?php echo $alamat ;?></textarea> </td>
<td> *Isikan alamat anda dengan benar.</td> 
</tr>
<tr>
<td>Telepon</td>
<td>:</td>
<td><input type="text" name="telepon" value="<?php echo $telp ;?>" /> </td>
<td> *Isikan no telp anda dengan benar.</td> 
</tr>
<tr>
<td>Email</td>
<td>:</td>
<td><input type="text" name="email" value="<?php echo $email ;?>"/></td>
</tr>
<tr>
<td>Password</td>
<td>:</td>
<td><input type="password" name="passwords" value="<?php echo $password ;?>"/></td>
</tr>
<tr>
<td><input type="hidden" name="level" value="member"/></td>
</tr>
<tr>
<td colspan="3"><input type="checkbox" name="check"/>Saya sudah membaca dan menyetujui <a href="?page=syaratdanketentuan" target="_blank">Syarat dan Ketentuan</a> dari ZelloStore.
</td>
</tr>

<tr>
<center><td colspan="3"><input type="submit" name="simpan" value="Daftar" />  <input type="reset" name="batal" value="Bersihkan" /></td></center>

</tr>
</table>
</form>

</body>
</html>