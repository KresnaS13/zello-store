<font face="Times New Roman"><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Konfirmasi Pemesanan</title>
</head>
<body>
<?php
include "../config/fungsi_indotgl.php";
?>
<?php
//menampilkan id pembeli
$idbeliq="SELECT * FROM pemesan_detail order by id_beli desc";
$id= mysql_query ($idbeliq, $koneksi);
$belitemp = mysql_fetch_array($id);
$kodebeli = $belitemp ['id_beli'];
?>

<?php
$sqltemp="SELECT * FROM pemesan order by id desc ";
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
<td>Member ID</td>
<td>: <?php echo "".$_SESSION['idpemesan']."";?></td>
</tr>
<tr>
<td>Nama Pemesan</td>
<td>: <?php echo $datatemp['nm_pemesan'];?></td>
</tr>
<tr>
<td>Alamat</td>
<td>: <?php echo $datatemp['alamat'];?></td>
</tr>
<!--<tr>
<td>Kode Pos</td>
<td>: <?php //echo $datatemp['kd_pos'];?></td>
</tr>-->
<tr>
<td>Telepon</td>
<td>: <?php echo $datatemp['telp'];?></td>
</tr>
<tr>
<td>NO ORDER</td>
<td><font style="font-size:20px">: <?php echo $kodebeli;?></font></td>
</tr>
</table><br />
<font color="#FF0000"><font style="font-size:16px">No. Order Jangan Sampai Lupa Karena Nantinya dipergunakan untuk Konfirmasi Pemesanan
</font></font><br />
<br />
<hr />



<table border="1">
<tr>
<td width="256"><div align="center">Nama Barang</div></td>
<td width="90"><div align="center">Harga</div></td>
<td width="73"><div align="center">Jumlah</div></td>
<td width="100"><div align="center">Sub Total</div></td>
</tr>
<?php
$query = "SELECT * FROM totsem order by id desc";
$myQry = mysql_query($query, $koneksi)  or die ("Query ambil data salah : ".mysql_error());
$tot= mysql_fetch_array($myQry);

?>
<?php
$idpemesan = isset($_SESSION['idpemesan']) ? $_SESSION['idpemesan'] :"";

$query = "SELECT * FROM pemesan_detail where id_beli='$kodebeli'";
$myQry = mysql_query($query, $koneksi)  or die ("Query ambil data salah : ".mysql_error());
while($row= mysql_fetch_array($myQry)){

?>
<tr>
<td width="256"> <?php echo $row['nm_barang'];?></td>
<td width="90"> <div align="right"><?php echo $row['harga'];?></div></td>
<td width="73"><div align="center"><?php echo $row['jumlah'];?></div></td>
<td width="100"><div align="right"><b><?php echo number_format($row['subtotal'],0,',','.');?></b></div></td>
</tr>
<?php
}
?>
<tr>
<td colspan="3"><div align="right"><b>Biaya Kirim </b><i>(via JNE)</i></div></td>
<td><div align="right"><b>Rp. <?php echo number_format ($tot['biayakirim'],0,',','.') ; ?></b></div></td>
</tr>
<tr>
<td colspan="3"><div align="right"><b>Grand Total </b></div></td>
<td><div align="right"><b>Rp. <?php echo number_format ($datatemp['totalbayar'],0,',','.') ; ?></b></div></td>
</tr>

</table>

<hr />
<center><b>Terima Kasih Atas Kepercayaan Anda</b></center>
<div align="center">Barang yang anda pesan akan kami kirim ke alamat di atas setelah Anda melakukan pembayaran.<br />
  Segera lakukan pembayaran ke no rekening dibawah ini, agar pesanan anda dapat diproses.
  <?php
include "../config/koneksi.php";
$sql= "SELECT * FROM profil order by id_perus";
$qry= mysql_query($sql,$koneksi) or die ("Query Salah".mysql_error());
while ($data = mysql_fetch_array($qry)){
	echo " <table width='500'>
  <tr>
  <td>&nbsp;&nbsp;</td>
     <td>Bank</td>
    <td>: $data[bank]</td>
  </tr>
  <tr>
  <td>&nbsp;&nbsp;</td>
    <td>No. Rekening</td>
    <td>: $data[no_rek]</td>
  </tr>
  <tr>
   <td>&nbsp;&nbsp;</td>
    <td>Atas Nama</td>
    <td>: $data[atas_nm] </td>
  </tr>
</table>";
}
  ?><br />
</div>
<h4><font color="#0066FF">Catatan</font></h4>
<font style="font-size:16px"><p> Apabila telah melakukan pembayaran harap konfirmasi ke kami, sesuai prosedure yang terdapat di halaman <b><a href="?hal=CaraBeli" target="_blank"> Cara Beli & Konfirmasi Pemesanan.</a></b></p> 
<p>Perlu kami sampaikan, jika tidak dilakukan pembayaran selama <b>2 Hari</b>, maka Kami akan membatalkan pemesanan yang anda lakukan. <br />
Terima kasih.</p><br /></font>







<!-- Perintah Cetak Konfirmasi Pemesanan 
   <input type="image" src="../img/print.PNG" onClick="print_d()" />
   <script>
		function print_d(){
			window.open("print.php","_blank");
		}
	</script> -->
</body>
</html></font>