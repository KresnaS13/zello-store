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
$namapattern = '/^[\ \][a-zA-Z_-]+$/';
$biayapattern= '/^[0-9]+$/';
$viapattern= '/^[\ \][a-zA-Z-]+$/';

$nm_kota = (isset($_POST['nm_kota'])) ? $_POST['nm_kota']: "";
$biaya = (isset($_POST['biaya'])) ? $_POST['biaya']: "";
$via = (isset($_POST['via'])) ? $_POST['via'] : "";

#jika tombol simpan di klik
if (isset($_POST['btsimpan'])){
$pesanerror =array();
if(empty($nm_kota)){
$pesanerror[]= "Data Nama Kota masih Kosong!";
}
elseif (!preg_match($namapattern,$nm_kota)){
$pesanerror[] = "Data nama kota hanya berisi huruf";
}
if(empty($via)){
$pesanerror[] = "Data Via Masih Kosong";
}
elseif (!preg_match($viapattern, $via)){
$pesanerror[]="Data Via hanya boleh berisi huruf dan strip (-)";
}
if(empty($biaya)){
	$pesanerror[]="Data Biaya Masih Kosong!";
}
elseif (!preg_match($biayapattern,$biaya)){
$pesanerror[]= "Data Biaya Hanya berisi angka";
}


#cek SQL
$cekSql="SELECT * FROM biaya_kirim WHERE nm_kota='$nm_kota'";
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
		$kodeBaru	= kdauto("biaya_kirim", "B");
		$mySql  	= "INSERT INTO biaya_kirim (kd_biaya, nm_kota, via, biaya) VALUES ('$kodeBaru','$nm_kota','$via','$biaya')";
		
		$myQry=mysql_query($mySql, $koneksi) or die ("Gagal query".mysql_error());
		if($myQry){
			echo "<meta http-equiv='refresh' content='0; url=?index=biayakirim'>";
		}
			}
}
#isi Smentara field
$datakode=kdauto("biaya_kirim","B");


?>


<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" name="frmuser">
   <caption><b>TAMBAH DATA BIAYA PENGIRIMAN</b></caption>
<hr />
  <table class="table-condensed" >
        <tr>
            <td>Kode Biaya</td>
            <td> : <input type=text name='kd_biaya' size=15  value= <?php echo $datakode; ?> maxlength="6" disabled="disabled">
		                               </td>
        </tr>
		<tr>
            <td>Nama Kota</td>
            <td> : <input name='nm_kota' type=text value="<?php echo $nm_kota; ?>" size=20></td>
        </tr>
        <tr>
            <td>Via</td>
            <td> : <input name='via' type=text value="JNE-OKE" size=20 readonly="readonly"></td>
        </tr>
		<tr>
            <td>Biaya</td>
            <td> : <input name='biaya' type=text value="<?php echo $biaya; ?>" size=20></td>
        </tr>
		
        <tr>
            <td></td><td>
            <input type="submit" name="btsimpan" value="Simpan" />
           </td>
        </tr>
        </table>
      
</form>
