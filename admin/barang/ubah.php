<?php
include "../config/koneksi.php";

?>


<?php
if(isset($_POST['btsimpan'])){
	# Validasi form, jika kosong sampaikan pesan error
	$pesanError = array();
	if (trim($_POST['kd_kategori'])=="") {
		$pesanError[] = "Data <b>Kode Kategori</b> masih kosong !";		
	}
	if (trim($_POST['nm_barang'])=="") {
		$pesanError[] = "Data <b>Nama Barang</b> masih kosong!";		
	}
	if (trim($_POST['harga'])=="") {
		$pesanError[] = "Data <b>Harga</b> masih kosong!";		
	}
	if (trim($_POST['stock'])=="") {
		$pesanError[] = "Data <b>Stock</b> masih kosong!";		
	}
	if (trim($_POST['detail'])=="") {
		$pesanError[] = "Data <b>Detail</b> masih kosong!";		
	}
	
	
	# Baca Variabel Form
$kd_kategori=$_POST['kd_kategori'];
$nm_barang=$_POST['nm_barang'];
$harga=$_POST['harga'];
$stock=$_POST['stock'];
$detail=$_POST['detail'];


	
	# Validasi Nama user, jika sudah ada akan ditolak
	$sqlCek="SELECT * FROM barang WHERE nm_barang='$nm_barang' AND NOT (nm_barang='".$_POST['nm_baranglama']."')";
	
	
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
	}else {
		
		# TIDAK ADA ERROR, Jika jumlah error message tidak ada, simpan datanya
		$mySql	= "UPDATE barang SET kd_kategori='$kd_kategori', nm_barang='$nm_barang', harga='$harga', stock='$stock', detail='$detail' WHERE kd_barang ='".$_POST['kd_barang']."'";
		$myQry	= mysql_query($mySql, $koneksi) or die ("Gagal query ".mysql_error());
		if($myQry){
			echo "<meta http-equiv='refresh' content='0; url=?index=barang'>";
		}
	}	}
 // Penutup POST

# TAMPILKAN DATA UNTUK DIEDIT
$Kode	 = isset($_GET['Kode']) ?  $_GET['Kode'] : $_POST['kd_barang'];
 
$mySql = "SELECT * FROM barang WHERE kd_barang='$Kode'";
$myQry = mysql_query($mySql, $koneksi)  or die ("Query ambil data salah : ".mysql_error());
$myData= mysql_fetch_array($myQry);

	# MASUKKAN DATA KE VARIABEL
	$dataKode	=  $myData['kd_barang'];
	$datakd_kategori	= isset($_POST['kd_kategori']) ? $_POST['kd_kategori'] : $myData['kd_kategori'];
	$datanm_barang	= isset($_POST['nm_barang']) ? $_POST['nm_barang'] : $myData['nm_barang'];
	$dataharga	= isset($_POST['harga']) ? $_POST['harga'] : $myData['harga'];
	$datastock	= isset($_POST['stock']) ? $_POST['stock'] : $myData['stock'];
	$datadetail	= isset($_POST['detail']) ? $_POST['detail'] : $myData['detail'];

?>
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" name="frmubah" enctype="multipart/form-data">
    <caption><b>UBAH DATA BARANG</b></caption>
<hr />
  <table class="table-condensed" >
        <tr>
            <td>Kode Barang</td>
            <td><input name='textfield' type="text" size=15  value= "<?php echo $dataKode; ?>" maxlength="6" readonly="readonly">
            <input type="hidden" name="kd_barang" value=<?php echo $dataKode ; ?> size=15 >
		                               </td>
        </tr>
		<tr>
            <td>Kode Kategori</td>
            <td><select name="kd_kategori">
                  <option value="">-Pilih Kategori-</option>
                    <?php
			$mysql = "SELECT * FROM kategori order by kd_kategori asc";
					$myqry = mysql_query($mysql, $koneksi) or die ("Query Salah:".mysql_error());
					while($myData = mysql_fetch_array($myqry)){
					if ($nm_kategori==$myData['nm_kategori']){
					$cek="selected";
					}
					else { $cek="";}
					echo "<option value='$myData[kd_kategori]' $cek>$myData[kd_kategori]</option>";
										}
										?>
                    </select></td>
        </tr>
        <tr>
            <td>Nama Barang</td>
            <td><input type="text" name='nm_barang' value="<?php echo $datanm_barang; ?>" size=20>
            <input name="nm_baranglama" type="hidden" value="<?php echo $rows['nm_barang']; ?>" size=20></td>
        </tr>
        <tr>
            <td>Harga</td>
            <td><input name="harga" type="text" value="<?php echo $dataharga; ?>" size=20></td>
        </tr>
        <tr>
            <td>Stock Barang</td>
            <td><input name="stock" type="text" value="<?php echo $datastock ?>" size=20></td>
        </tr> 
        <tr>
            <td>Detail</td>
            <td><textarea cols="20" rows="4" name="detail" ><?php echo $datadetail; ?></textarea></td>
        </tr>
		        <tr>
            <td></td><td>
            <input type="submit" name="btsimpan" value="Simpan" />
           </td>
        </tr>
        </table>
      
</form>

<font face="Times New Roman, Times, serif"><font color="#FF0000">
*)  KB001 = Accesories Komputer<br />
*)  KB002 = Accesories Handphone<br />
*)  KB003 = Accesories Lain<br />

</font></font>