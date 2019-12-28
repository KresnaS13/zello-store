<?php
include "../config/koneksi.php";

?>


<?php
if(isset($_POST['btsimpan'])){
	# Validasi form, jika kosong sampaikan pesan error
	$pesanError = array();
	if (trim($_POST['nm_kategori'])=="") {
		$pesanError[] = "Data <b>Nama Kota</b> masih kosong !";		
	}

	
	# Baca Variabel Form
$nm_kategori=$_POST['nm_kategori'];



	
	# Validasi Nama user, jika sudah ada akan ditolak
	$sqlCek="SELECT * FROM kategori WHERE nm_kategori='$nm_kategori' AND NOT (nm_kategori='".$_POST['nm_kategorilama']."')";
	
	
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
		$mySql	= "UPDATE kategori SET nm_kategori='$nm_kategori'
						WHERE kd_kategori ='".$_POST['kd_kategori']."'";
		$myQry	= mysql_query($mySql, $koneksi) or die ("Gagal query ".mysql_error());
		if($myQry){
			echo "<meta http-equiv='refresh' content='0; url=?index=kategori'>";
		}
	}	}
 // Penutup POST

# TAMPILKAN DATA UNTUK DIEDIT
$Kode	 = isset($_GET['Kode']) ?  $_GET['Kode'] : $_POST['kduser']; 
$mySql = "SELECT * FROM kategori WHERE kd_kategori='$Kode'";
$myQry = mysql_query($mySql, $koneksi)  or die ("Query ambil data salah : ".mysql_error());
$myData= mysql_fetch_array($myQry);

	# MASUKKAN DATA KE VARIABEL
	$dataKode	=  $myData['kd_kategori'];
	$datanm_kategori	= isset($_POST['nm_kategori']) ? $_POST['nm_kategori'] : $myData['nm_kategori'];

?>
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" name="frmubah">
   <caption><b>UBAH DATA KATEGORI</b></caption>
   <hr />
  <table class="tanle-condensed">
        <tr>
            <td>Kode Kategori</td>
            <td> :
<input name='textfield' type="text" size=15  value= "<?php echo $dataKode; ?>" maxlength="6" readonly="readonly">
    <input type="hidden" name='kd_kategori' size=15  value= "<?php echo $dataKode; ?>" >
		                               </td>
        </tr>
		<tr>
            <td>Nama Kategori</td>
            <td> : <input type="text" name='nm_kategori' value="<?php echo $datanm_kategori; ?>" size=20>
            <input name='nm_kategorilama' type="hidden" value="<?php echo $myData['nm_kategori']; ?>" size=20>
            </td>
        </tr>
		        <tr>
            <td></td><td>
            <input type="submit" name="btsimpan" value="Simpan" />
           </td>
        </tr>
        </table>
      
</form>

