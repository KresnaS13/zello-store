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
$namapattern='/^[\ \][a-zA-Z]+$/';
$nm_kategori=(isset($_POST['nm_kategori'])) ? $_POST['nm_kategori'] : "";

#jika tombol simpan di klik
if (isset($_POST['btsimpan'])){
$pesanerror =array(); 
if(empty($nm_kategori)){ $pesanerror[] = "Data Nama Kategori Masih Kosong"; 
} elseif (!preg_match($namapattern, $nm_kategori)){ $pesanerror[]= "Format Nama Kategori Salah, Tidak Boleh Mengandung Angka dan Simbol"; 
}
#membaca data dalam form,
$nm_kategori=$_POST['nm_kategori'];
#cek SQL
$cekSql="SELECT * FROM kategori WHERE nm_kategori='$nm_kategori'";
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
		$kodeBaru	= kdauto("kategori", "KB");
		$mySql  	= "INSERT INTO kategori (kd_kategori, nm_kategori) VALUES ('$kodeBaru','$nm_kategori')";
		
		$myQry=mysql_query($mySql, $koneksi) or die ("Gagal query".mysql_error());
		if($myQry){
			echo "<meta http-equiv='refresh' content='0; url=?index=kategori'>";
		}
			}
}
#isi Smentara field
$datakode=kdauto("kategori","KB");
$nm_kategori=isset($_POST['nm_kategori']) ?$_POST['nm_kategori'] :"";
?>
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" name="frmuser">

   <caption><b>TAMBAH DATA KATEGORI</b></caption>
   <hr />
  <table class="table-condensed">
        <tr>
            <td>Kode Kategori</td>
            <td> : <input type=text name='kd_kategori' size=15  value= <?php echo $datakode; ?> maxlength="6" disabled="disabled">
		                               </td>
        </tr>
		<tr>
            <td>Nama Kategori</td>
            <td> : <input name='nm_kategori' type=text value="<?php echo $nm_kategori; ?>" size=20></td>
        </tr>
        <tr>
            <td></td><td>
            <input type="submit" name="btsimpan" value="Simpan" />
           </td>
        </tr>
        </table>
      
</form>
