<?php
include "../config/koneksi.php";
include "../config/fungsi_indotgl.php";
?>

<style>
.barang {
	float: left;
	width: 500px;
	padding-bottom: 10px;
}
.pemesan {
	width: 430px;
	float: left;
	padding-left:5px;
}
</style>
<font face="Times New Roman, Times, serif"><font color="#0000FF"><h3>Detail Pemesanan</h3></font>
<hr>

<?php
$Kode	 = isset($_GET['Kode']) ?  $_GET['Kode'] : $_POST['idpemesan']; 
$query = "SELECT * FROM pemesan WHERE idpemesan='$Kode'";
$myQry = mysql_query($query, $koneksi)  or die ("Query ambil data salah : ".mysql_error());
$data= mysql_fetch_array($myQry);
$tanggal=tgl_indo($data['tgl_pesan']);

?>

<?php
if (isset($_POST['ubahstatus'])){
$pesanError = array();
if (trim($_POST['status'])==""){
$pesanError[]= "Status kosong";
}
$status = $_POST['status'];
$sqlcek = "SELECT * FROM pemesan where idpemesan=$Kode";
if (count ($pesanError)>=1){
echo "<div class='mssgBox'>";
$noPesan =0;
foreach ($pesanError as $indeks=>$pesan_tampil){
$noPesan++;
echo "&nbsp; &nbsp; $noPesan. $pesan_tampil<br>";
}
echo "</div> <br>";
}
mysql_query("UPDATE pemesan SET status='$status' where idpemesan='$Kode'");
echo "<meta http-equiv='refresh' content='0; url=?index=pesanan'>";
}
?>

<table width="402" border="1">
<tr>
<td width="158">Kode Pesan</td>
<td width="167">: <?php echo $Kode?></td>
</tr>
<tr>
<td width="158">Tanggal Pesan</td>
<td width="167">: <?php echo $tanggal;?></td>
</tr>
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
<tr>
<td width="158">Status Pesan</td>
<td width="167">: &nbsp;<select name="status" id="status" style="width:80px; height:25px">
<option value="">--Pilih Status--</option>
<option value="Lunas">Lunas</option>
<option value="Batal">Batal</option>
</select> 
&nbsp;&nbsp;<input type="submit" name="ubahstatus" value="Ubah Status" style="width:95px;">
<br>
<font color="#FF0000" style="font-size:13px">* Ubah Status Pengiriman</font></td>
</tr></form>
</table>

<hr>
<div class="barang">
<table width="454" border="1">
<tr>
<td colspan="4" bgcolor="#9999FF"><div align="center"><b>DATA BARANG</b></div></td>
</tr>
<tr bgcolor="#CCCCCC">
<td width="199"><div align="center"><b>Nama Barang</b></div></td>
<td width="48"><div align="center"><b>Jumlah</b></div></td>
<td width="98"><div align="center"><b>Harga Satuan</b></div></td>
<td width="81"><div align="center"><b>Sub Total</b></div></td>
</tr>
<?php
//$idpemesan = isset($_SESSION['idpemesan']) ? $_SESSION['idpemesan'] :"";

$query = "SELECT * FROM pemesan_detail WHERE idpemesan='$Kode'";
$myQry = mysql_query($query, $koneksi)  or die ("Query ambil data salah : ".mysql_error());
while(
$row= mysql_fetch_array($myQry)){
?>
<tr>
<td><?php echo $row['nm_barang'];?></td>
<td><div align="center"><?php echo $row['jumlah'];?></div></td>
<td><div align="right"><?php echo number_format($row['harga'],0,',','.');?></div></td>
<td><div align="right"><?php echo number_format($row['subtotal'],0,',','.');?></div></td>
</tr>
<?php
}
?>
<tr>
<td colspan="3"><div align="right">Biaya Kirim (JNE)</div></td>
<td><div align="right"><?php echo number_format($data['biayakirim'],0,',','.');?></div></td>
</tr>
<tr>
<td colspan="3"><div align="right"><b>Grand Total</b></div></td>
<td><div align="right"><b>Rp. <?php echo  number_format($data ['totalbayar'],0,',','.' );?></b></div></td>
</tr>

</table>
</div>
 
<div class="pemesan">
<table width="418" border="1">
<tr>
<td colspan="4" bgcolor="#9999FF"><div align="center"><b>DATA PEMESAN</b></div></td>
</tr>
<tr>
<td width="159">Nama Pemesan</td>
<td width="231"><?php echo $data ['nm_pemesan'];?></td>
</tr>
<tr>
<td>Alamat Pemesan</td>
<td><?php echo $data ['alamat'];?></td>
</tr>
<tr>
<td>No. Telepon/HP</td>
<td><?php echo $data ['telp'];?></td>
</tr>
</table>
</div>