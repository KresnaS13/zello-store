<?php
include "../config/koneksi.php";

?>


<?php
if(isset($_POST['btsimpan'])){
	# Validasi form, jika kosong sampaikan pesan error
	$pesanError = array();
	if (trim($_POST['email'])=="") {
		$pesanError[] = "<b>Username</b> masih kosong !";		
	}
	if (trim($_POST['nama'])=="") {
		$pesanError[] = "<b>Nama</b> masih kosong !";		
	}
	
	# Baca Variabel Form
$email		= $_POST['email'];
$passlama	= $_POST['passlama'];
$password	= $_POST['passwords'];
$nama		= $_POST['nama'];
$level		= $_POST['level'];

	# Validasi Nama user, jika sudah ada akan ditolak
	$sqlCek="SELECT * FROM member WHERE email='$email' AND NOT (email='".$_POST['emaillama']."')";
	$qryCek=mysql_query($sqlCek, $koneksi) or die ("Eror Query".mysql_error()); 
	if(mysql_num_rows($qryCek)>=1){
		$pesanError[] = "Maaf, Nama Member dengan Email<b> $email </b> sudah dipakai, ganti dengan yang lain";
	}
		
	# JIKA ADA PESAN ERROR DARI VALIDASI
	if (count($pesanError)>=1 ){
		echo "<div class='mssgBox'>";
		echo "<br><hr>";
			$noPesan=0;
			foreach ($pesanError as $indeks=>$pesan_tampil) { 
			$noPesan++;
				echo "&nbsp;&nbsp; $noPesan. $pesan_tampil<br>";	
			} 
		echo "</div> <br>"; 
	}else{
		
		#cek password 
		if (trim ($password)==""){
			$sqlpassword = ", passwords ='$passlama'";
		}
		else{
			$sqlpassword =", passwords ='".md5($password)."'";
		}
		
		# TIDAK ADA ERROR, Jika jumlah error message tidak ada, simpan datanya
		$mySql	= "UPDATE member SET email='$email' $sqlpassword, nama='$nama', level='$level' WHERE idpemesan ='".$_POST['idpemesan']."'";
		$myQry	= mysql_query($mySql, $koneksi) or die ("Gagal query ".mysql_error());
		if($myQry){
			echo "<meta http-equiv='refresh' content='0; url=?index=member'>";
		}}
	}	
 // Penutup POST

# TAMPILKAN DATA UNTUK DIEDIT
$Kode	 = isset($_GET['Kode']) ?  $_GET['Kode'] : $_POST['idpemesan']; 
$mySql = "SELECT * FROM member WHERE idpemesan='$Kode'";
$myQry = mysql_query($mySql, $koneksi)  or die ("Query ambil data salah : ".mysql_error());
$myData= mysql_fetch_array($myQry);

	# MASUKKAN DATA KE VARIABEL
	$dataKode	=  $myData['idpemesan'];
	$dataemail	= isset($_POST['email']) ? $_POST['email'] : $myData['email'];
	$datapassword	= isset($_POST['passwords']) ? $_POST['passwords'] : $myData['passwords'];
	$datanama	= isset($_POST['nama']) ? $_POST['nama'] : $myData['nama'];
	$datalevel	= isset($_POST['level']) ? $_POST['level'] : $myData['level'];

?>
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" name="frmubah">
   <caption><b>UBAH DATA MEMBER</b><br>
<br>
  <table class="table-condensed">
      <tr>
            <td>Kode User</td>
            <td><input name='textfield' type="text" size=15  value= "<?php echo $dataKode; ?>" maxlength="6" readonly="readonly">
    <input type="hidden" name='idpemesan' size=15  value= "<?php echo $dataKode; ?>" >
		                               </td>
        </tr>
		<tr>
            <td>Email</td>
            <td><input type="text" name='email' value="<?php echo $dataemail; ?>" size=20>
            <input name='emaillama' type="hidden" value="<?php echo $myData['email']; ?>" size=20>
            </td>
        </tr>
		<tr>
            <td>Password</td>
            <td>
      <input name='passwords' type="text"  size=20>
       <input name='passlama' type="hidden" value="<?php echo $myData['passwords']; ?>" size=20></td>
    </tr>
<tr>
            <td>Nama</td>
            <td><input type="text" name="nama" size="20" value="<?php echo $myData['nama']; ?>""><input type="hidden" name="level" value="member" size="20"> 
    </tr>
		        <tr>
            <td></td><td>
            <input type="submit" name="btsimpan" value="Simpan" />
           </td>
        </tr>
        </table>
      
</form>

