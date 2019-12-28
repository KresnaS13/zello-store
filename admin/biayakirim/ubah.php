<?php
include "../config/koneksi.php";

?>


<?php
if(isset($_POST['btsimpan'])){
	# Validasi form, jika kosong sampaikan pesan error
	$pesanError = array();
	if (trim($_POST['nm_kota'])=="") {
		$pesanError[] = "Data <b>Nama Kota</b> masih kosong !";		
	}
	if (trim($_POST['via'])=="") {
		$pesanError[] = "Data <b>Via</b> masih kosong !";		
	}
	if (trim($_POST['biaya'])=="") {
		$pesanError[] = "Data <b>Biaya</b> masih kosong!";		
	}
	
	# Baca Variabel Form
$nm_kota=$_POST['nm_kota'];
$biaya=$_POST['biaya'];
$via=$_POST['via'];


	
	# Validasi Nama user, jika sudah ada akan ditolak
	$sqlCek="SELECT * FROM biaya_kirim WHERE nm_kota='$nm_kota' AND NOT (nm_kota='".$_POST['nm_kotalama']."')";
	
	
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
		# TIDAK ADA ERROR, Jika jumlah error message tidak ada, simpan datanya
		$mySql	= "UPDATE biaya_kirim SET nm_kota='$nm_kota', via='$via', biaya='$biaya'
						WHERE kd_biaya ='".$_POST['kd_biaya']."'";
		$myQry	= mysql_query($mySql, $koneksi) or die ("Gagal query ".mysql_error());
		if($myQry){
			echo "<meta http-equiv='refresh' content='0; url=?index=biayakirim'>";
		
	}	}}
 // Penutup POST

# TAMPILKAN DATA UNTUK DIEDIT
$Kode	 = isset($_GET['Kode']) ?  $_GET['Kode'] : $_POST['kduser']; 
$mySql = "SELECT * FROM biaya_kirim WHERE kd_biaya='$Kode'";
$myQry = mysql_query($mySql, $koneksi)  or die ("Query ambil data salah : ".mysql_error());
$myData= mysql_fetch_array($myQry);

	# MASUKKAN DATA KE VARIABEL
	$dataKode	=  $myData['kd_biaya'];
	$datanm_kota	= isset($_POST['nm_kota']) ? $_POST['nm_kota'] : $myData['nm_kota'];
	$datavia= isset($_POST['via']) ? $_POST['via'] : $myData['via'];
	$databiaya	= isset($_POST['biaya']) ? $_POST['biaya'] : $myData['biaya'];

?>
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" name="frmubah">
   <caption><b>UBAH DATA BIAYA PENGIRIMAN</b></caption>
<hr />
  <table class="table-condensed" >
        <tr>
            <td>Kode Biaya</td>
            <td> :
<input name='textfield' type="text" size=15  value= "<?php echo $dataKode; ?>" maxlength="6" readonly="readonly">
    <input type="hidden" name='kd_biaya' size=15  value= "<?php echo $dataKode; ?>" >
		                               </td>
        </tr>
		<tr>
            <td>Nama Kota</td>
            <td> : <input type="text" name='nm_kota' value="<?php echo $datanm_kota; ?>" size=20>
            <input name='nm_kotalama' type="hidden" value="<?php echo $myData['nm_kota']; ?>" size=20>
            </td>
        </tr>
        <tr>
            <td>Via</td>
            <td> : <input type="text" name='via' value="<?php echo $datavia; ?>" size=20>
            </td>
        </tr>
		<tr>
            <td>Biaya</td>
            <td> : 
       <input name='biaya' type="text"  value="<?php echo $databiaya; ?>"size=20>
          </tr>
		        <tr>
            <td></td><td>
            <input type="submit" name="btsimpan" value="Simpan" />
           </td>
        </tr>
        </table>
      
</form>

