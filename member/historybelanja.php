<?php
include "../config/fungsi_indotgl.php";
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
$idpemesan = (isset($_SESSION['idpemesan'] )) ? $_SESSION['idpemesan'] :"";
$sqltemp="SELECT * FROM pemesan where idpemesan = '$idpemesan'";
$qrytemp= mysql_query ($sqltemp, $koneksi);
$datatemp = mysql_fetch_array($qrytemp);
$Kode1	 = $datatemp['idpemesan'];
$tanggal = tgl_indo ($datatemp['tgl_pesan']);
?>
<br />
<table border="1">
<tr>
<td>Tanggal</td>
<td>: <?php echo $tanggal;?></td>
</tr>
<tr>
<td>No. Pemesanan</td>
<td>: <?php echo $datatemp['idpemesan'];?></td>
</tr>
<tr>
<td>Nama Pemesan</td>
<td>: <?php echo $datatemp['nm_pemesan'];?></td>
</tr>
<tr>
<td>Alamat</td>
<td>: <?php echo $datatemp['alamat'];?></td>
</tr>
<tr>
<td>Kode Pos</td>
<td>: <?php echo $datatemp['kd_pos'];?></td>
</tr>
<tr>
<td>Telepon</td>
<td>: <?php echo $datatemp['telp'];?></td>
</tr>
<tr>
<td>Status Pengiriman</td>
<td>:<font color="#0000FF"> <b><?php echo $datatemp['status'];?></b></font></td>
</tr>
</table><br />
<hr />
<?php
$query = "SELECT * FROM pemesan_detail where idpemesan = '$Kode'";
$myQry = mysql_query($query, $koneksi)  or die ("Query ambil data salah : ".mysql_error());
$row= mysql_fetch_array($myQry);

?>

<?php
$query = "SELECT * FROM totsem order by id desc";
$myQry = mysql_query($query, $koneksi)  or die ("Query ambil data salah : ".mysql_error());
$tot= mysql_fetch_array($myQry);

?>
<table border="1">
<tr>
<td width="256"><div align="center">Nama Barang</div></td>
<td width="90"><div align="center">Harga</div></td>
<td width="73"><div align="center">Jumlah</div></td>
<td width="100"><div align="center">Sub Total</div></td>
</tr>

<tr>
<td width="256"> <?php echo $row['nm_barang'];?></td>
<td width="90"> <div align="right"><?php echo $row['harga'];?></div></td>
<td width="73"><div align="center"><?php echo $row['jumlah'];?></div></td>
<td width="100"><div align="right"><?php echo $row['subtotal'];?></div></td>
</tr>
<tr>
<td colspan="3"><div align="right"><b>Biaya Kirim</b><i>(VIA JNE)</i></div></td>
<td><div align="right"><b>Rp. <?php echo number_format ($tot['biayakirim'],0,',','.') ; ?></b></div></td>
</tr>
<tr>
<td colspan="3"><div align="right"><b>Grand Total </b></div></td>
<td><div align="right"><b>Rp. <?php echo number_format ($datatemp['totalbayar'],0,',','.') ; ?></b></div></td>
</tr>
</table>