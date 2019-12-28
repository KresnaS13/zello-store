<html>
<head>
<title>Buku Tamu</title>
<script src="js/validasi.js" language="javascript" type="text/javascript"></script>

<script language="javascript" type='text/javascript'>
 
function validasi(){
    var nama = document.getElementById('nama');
    var email = document.getElementById('email');
    var komentar = document.getElementById('komentar');
	
	  if (notEmpty(nama,"Data Tidak Boleh Kosong")){
	    if(isAlphabet(nama, "Nama hanya berisi huruf!")){
                        if(emailValidator(email, "Email anda tidak valid!")){
                    if(lengthRestriction(komentar, 5, 500)){

                            return true;
                        }
						} 
						}}
	             
    return false;
}

</script>

</head>
<body>

<?php
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

#jika tombol simpan di klik
if (isset($_POST['kirim'])){
//validasi data yang kosong  
    if (empty($_POST['nama']) || empty($_POST['email']) || empty($_POST['komentar'])) {  
        echo "<font color='#FF0000'><h4>Data harus Diisi Semua</h4></font>";  
    }  
//Jalankan query Insert Data  
    else {  
      		$kodeBaru	= kdauto("tamu", "T");
    $simpan="INSERT INTO tamu SET id_tamu='$kodeBaru',
								  nama='$_POST[nama]',  
                                  email='$_POST[email]',  
                                  komentar='$_POST[komentar]'";  
                            mysql_query($simpan);  
    echo '<script language="javascript">  
    alert("Buku Tamu Berhasil Di Kirim");  
    window.location="?page=home";  
    </script>';  
    exit();  
	}
        }  ?>

<br />
<br />
<center><font color="#0000FF" style="font-family:'Comic Sans MS'; font-size:30px; font-weight:bold">ZELLO STORE</font></center>
<center><i><font style="font-family:'Century'">( Pusat Accesoriess Laptop dan Handphone)</font></i></center> <br />

<font style="font-size:17px"; face="Times New Roman, Times, serif">Terima kasih sudah mempercayai kami...<br />
Silahkan masukan komentar atau saran anda sebagai masukan untuk <font color="#0000FF" style="font-family:'Times New Roman', Times, serif; font-size:12px; font-weight:bold">ZELLO STORE</font> , Sehingga nantinya dapat lebih baik lagi.</font> <br /><br />

<form action="<?php $_SERVER['PHP_SELF'];?>" method="post" onsubmit='return validasi()'>
<input type="hidden" name="id_tamu" value="<?php echo $datakode; ?>"/>
<b>Nama</b><br />
<input type="text" name="nama" id="nama" style="width:200px"/><br />
<b>E-mail</b><br />
<input name="email" type="text" id="email" style="width:250px"/><br />
<b>Komentar</b><br />
<textarea cols="5" rows="4" name="komentar" id="komentar" style="width:300px;"></textarea><br />
<input type="submit" name="kirim" value="Kirim" />
</form>

</body>
</html>
