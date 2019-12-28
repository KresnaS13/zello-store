<?php
include "../config/koneksi.php";

?>


<?php
if(isset($_POST['btsimpan'])){
	# Validasi form, jika kosong sampaikan pesan error
	$pesanError = array();
	if (trim($_POST['nm_perus'])=="") {
		$pesanError[] = "Data <b>Nama Perusahaan</b> masih kosong !";		
	}
	if (trim($_POST['almt_perus'])=="") {
		$pesanError[] = "Data <b>Alamat</b> masih kosong!";		
	}
	if (trim($_POST['telp'])=="") {
		$pesanError[] = "Data <b>No Telepon</b> masih kosong !";		
	}
	if (trim($_POST['email'])=="") {
		$pesanError[] = "Data <b>Email</b> masih kosong!";		
	}
	if (trim($_POST['bank'])=="") {
		$pesanError[] = "Data <b>Nama Bank</b> masih kosong !";		
	}
	if (trim($_POST['no_rek'])=="") {
		$pesanError[] = "Data <b>No rekening</b> masih kosong!";		
	}
	if (trim($_POST['atas_nm'])=="") {
		$pesanError[] = "Data <b>Atas Nama</b> masih kosong !";		
	}
	if (trim($_POST['profil'])=="") {
		$pesanError[] = "Data <b>Profil</b> masih kosong!";		
	}
		
	# Baca Variabel Form
$nm_perus=$_POST['nm_perus'];
$almt_perus=$_POST['almt_perus'];
$telp=$_POST['telp'];
$email=$_POST['email'];
$bank=$_POST['bank'];
$no_rek=$_POST['no_rek'];
$atas_nm=$_POST['atas_nm'];
$profil=$_POST['profil'];


	
	# Validasi Nama user, jika sudah ada akan ditolak
	$sqlCek="SELECT * FROM profil WHERE nm_perus='$nm_perus' AND NOT (nm_perus='".$_POST['nm_peruslama']."')";
	
	
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
	}
		
		# TIDAK ADA ERROR, Jika jumlah error message tidak ada, simpan datanya
		$mySql	= "UPDATE profil SET nm_perus='$nm_perus', almt_perus='$almt_perus', telp='$telp', email='$email', bank='$bank', no_rek='$no_rek', atas_nm='$atas_nm', profil='$profil'
						WHERE id_perus ='".$_POST['id_perus']."'";
		$myQry	= mysql_query($mySql, $koneksi) or die ("Gagal query ".mysql_error());
		if($myQry){
			echo "<meta http-equiv='refresh' content='0; url=?index=perusahaan'>";
		}
	}	
 // Penutup POST

# TAMPILKAN DATA UNTUK DIEDIT
$Kode	 = isset($_GET['Kode']) ?  $_GET['Kode'] : $_POST['id_perus']; 
$mySql = "SELECT * FROM profil WHERE id_perus='$Kode'";
$myQry = mysql_query($mySql, $koneksi)  or die ("Query ambil data salah : ".mysql_error());
$myData= mysql_fetch_array($myQry);

	# MASUKKAN DATA KE VARIABEL
	$dataKode	=  $myData['id_perus'];
	$datanm_perus	= isset($_POST['nm_perus']) ? $_POST['nm_perus'] : $myData['nm_perus'];
	$dataalmt_perus	= isset($_POST['almt_perus']) ? $_POST['almt_perus'] : $myData['almt_perus'];
	$datatelp	= isset($_POST['telp']) ? $_POST['telp'] : $myData['telp'];
	$dataemail	= isset($_POST['email']) ? $_POST['email'] : $myData['email'];
	$databank	= isset($_POST['bank']) ? $_POST['bank'] : $myData['bank'];
	$datano_rek	= isset($_POST['no_rek']) ? $_POST['no_rek'] : $myData['no_rek'];
	$dataatas_nm	= isset($_POST['atas_nm']) ? $_POST['atas_nm'] : $myData['atas_nm'];
		$dataprofil	= isset($_POST['profil']) ? $_POST['profil'] : $myData['profil'];


?>
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" name="frmubah">
   <caption><b>UBAH DATA PERUSAHAAN</b></caption>
   <hr />
  <table class="table-condensed">
        <tr>
            <td>Kode Biaya</td>
            <td> :
<input name='textfield' type="text" size=15  value= "<?php echo $dataKode; ?>" style="width:70px" readonly="readonly">
    <input type="hidden" name='id_perus' size=15  value= "<?php echo $dataKode; ?>" >
		                               </td>
        </tr>
		<tr>
            <td>Nama Perusahaan</td>
            <td> : <input type="text" name='nm_perus' value="<?php echo $datanm_perus; ?>" style="width:250px">
            <input name='nm_peruslama' type="hidden" value="<?php echo $myData['nm_perus']; ?>" >
            </td>
        </tr>
		<tr>
            <td>Alamat Perusahaan</td>
            <td> : 
       <input name='almt_perus' type="text"  value="<?php echo $dataalmt_perus; ?>" style="width:350px">
          </tr>
          <tr>
            <td>Telepon</td>
            <td> : 
       <input name='telp' type="text"  value="<?php echo $datatelp; ?>"style="width:350px">
          </tr>
          <tr>
            <td>Email</td>
            <td> : 
       <input name='email' type="text"  value="<?php echo $dataemail; ?>"style="width:350px">
          </tr>
          <tr>
            <td>Nama Bank</td>
            <td> : 
       <input name='bank' type="text"  value="<?php echo $databank; ?>"style="width:350px">
          </tr>
          <tr>
            <td>No Rekening</td>
            <td> : 
       <input name='no_rek' type="text"  value="<?php echo $datano_rek; ?>"style="width:350px">
          </tr><tr>
            <td>Atas Nama</td>
            <td> : 
       <input name='atas_nm' type="text"  value="<?php echo $dataatas_nm; ?>"style="width:350px">
          </tr><tr>
            <td>Profil</td>
            <td> : 
            <textarea name="profil" rows="8" cols="47"><?php echo $dataprofil; ?></textarea>
          </tr>
		        <tr>
            <td></td><td>
            <input type="submit" name="btsimpan" value="Simpan" />
           </td>
        </tr>
        </table>
      
</form>

