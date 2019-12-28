<?php
include "../config/koneksi.php";

?>


<?php
if(isset($_POST['btsimpan'])){
	# Validasi form, jika kosong sampaikan pesan error
	$pesanError = array();
	if (trim($_POST['username'])=="") {
		$pesanError[] = "<b>Username</b> masih kosong !";		
	}
	if (trim($_POST['level'])=="") {
		$pesanError[] = "<b>Level</b> masih kosong !";		
	}
	
	# Baca Variabel Form
$username	=$_POST['username'];
$passlama	= $_POST['passlama'];
$password	= $_POST['password'];
$level=$_POST['level'];

	# Validasi Nama user, jika sudah ada akan ditolak
	$sqlCek="SELECT * FROM login WHERE username='$username' AND NOT (username='".$_POST['usernamelama']."')";
	$qryCek=mysql_query($sqlCek, $koneksi) or die ("Eror Query".mysql_error()); 
	if(mysql_num_rows($qryCek)>=1){
		$pesanError[] = "Maaf, Nama User <b> $username </b> sudah dipakai, ganti dengan yang lain";
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
			$sqlpassword = ", password ='$passlama'";
		}
		else{
			$sqlpassword =", password ='".md5($password)."'";
		}
		
		# TIDAK ADA ERROR, Jika jumlah error message tidak ada, simpan datanya
		$mySql	= "UPDATE login SET username='$username' $sqlpassword, level='$level'	WHERE id ='".$_POST['id']."'";
		$myQry	= mysql_query($mySql, $koneksi) or die ("Gagal query ".mysql_error());
		if($myQry){
			echo "<meta http-equiv='refresh' content='0; url=?index=user'>";
		}}
	}	
 // Penutup POST

# TAMPILKAN DATA UNTUK DIEDIT
$Kode	 = isset($_GET['Kode']) ?  $_GET['Kode'] : $_POST['id']; 
$mySql = "SELECT * FROM login WHERE id='$Kode'";
$myQry = mysql_query($mySql, $koneksi)  or die ("Query ambil data salah : ".mysql_error());
$myData= mysql_fetch_array($myQry);

	# MASUKKAN DATA KE VARIABEL
	$dataKode	=  $myData['id'];
	$datausername	= isset($_POST['username']) ? $_POST['username'] : $myData['username'];
	$datapassword	= isset($_POST['password']) ? $_POST['password'] : $myData['password'];
	$datalevel	= isset($_POST['level']) ? $_POST['level'] : $myData['level'];

?>
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" name="frmubah">
   <caption><b>UBAH DATA PENGGUNA</b></caption>

  <table class="table-condensed">
        <tr>
            <td>Kode User</td>
            <td> :
<input name='textfield' type="text" size=15  value= "<?php echo $dataKode; ?>" maxlength="6" readonly="readonly">
    <input type="hidden" name='id' size=15  value= "<?php echo $dataKode; ?>" >
		                               </td>
        </tr>
		<tr>
            <td>Username</td>
            <td> : <input type="text" name='username' value="<?php echo $datausername; ?>" size=20>
            <input name='usernamelama' type="hidden" value="<?php echo $myData['username']; ?>" size=20>
            </td>
        </tr>
		<tr>
            <td>Password</td>
            <td> : 
      <input name='password' type="text"  size=20>
       <input name='passlama' type="hidden" value="<?php echo $myData['password']; ?>" size=20></td>
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
            <td></td><td>
            <input type="submit" name="btsimpan" value="Simpan" />
           </td>
        </tr>
        </table>
      
</form>

