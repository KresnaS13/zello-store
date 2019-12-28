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
$namapattern = '/^[\ \][a-zA-Z]+$/';
$passpattern = '/^[a-zA-Z0-9]/';

$username = (isset($_POST['username'])) ? $_POST['username']: "";
$password = (isset($_POST['password'])) ? $_POST['password']: "";
$level= (isset($_POST['level'])) ? $_POST['level'] :"";

#jika tombol simpan di klik
if (isset($_POST['btsimpan'])){
$pesanerror =array();
if (empty($_POST['username'])){
$pesanerror[] = "Data Username Masih Kosong";
}elseif (!preg_match($namapattern,$username)){
$pesanerror[]="Username Harus Berisi Huruf"; 
}
if (empty($_POST['password'])){
$pesanerror[] = "Data Password Masih Kosong";
} elseif (!preg_match($passpattern,$password)){
	$pesanerror[]="Password Harus Berisi Angka dan Huruf";
}
if (empty($_POST['level'])){
$pesanerror[] = "Data Level Masih Kosong";
}


#cek SQL
$cekSql="SELECT * FROM login WHERE username='$username'";
	$cekQry=mysql_query($cekSql, $koneksi) or die ("Eror Query".mysql_error()); 
	if(mysql_num_rows($cekQry)>=1){
			$pesanerror[] = "USERNAME <b> $username </b> sudah ada, ganti dengan yang lain";
	}
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
		$kodeBaru	= kdauto("login", "US");
		$mySql  	= "INSERT INTO login (id, username, password, level) VALUES ('$kodeBaru','$username',MD5('$password'),'$level')";
		
		$myQry=mysql_query($mySql, $koneksi) or die ("Gagal query".mysql_error());
		if($myQry){
			echo "<meta http-equiv='refresh' content='0; url=?index=user'>";
		}
			}
}
#isi Smentara field
$datakode=kdauto("login","US");

?>

                        <div class="panel-heading">
                            <i class="fa fa-fw fa-desktop"></i>TAMBAH USER
                        </div><!-- /.panel-heading -->
                        <div class="panel-body">
                       <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" name="form" onsubmit="return validasi(this)">

  <table class="table-condensed">
        <tr>
            <td>Kode Pengguna</td>
            <td> : <input type=text name='id' size=15  value= <?php echo $datakode; ?> maxlength="6" disabled="disabled"></td>
        </tr>
		<tr>
            <td>Username</td>
            <td> : <input name='username' type=text  size=20></td>
        </tr>
		<tr>
            <td>Password</td>
            <td> : <input name='password' type=text  size=20></td>
        </tr>
      <tr>
            <td>Level</td>
            <td> : 
            <select name="level">
            <option value="">--Pilih--</option>
            <option value="Admin">Admin</option>
            </select>
          </tr>		
        <tr>
            <td></td>
         	<td>
            <input type="submit" name="btsimpan" value="Simpan" />
           	</td>
        </tr>
        </table>
      
</form>

                        </div><!-- /.panel-body -->
          

