<?php
include "../config/koneksi.php";
include "../config/fungsi_indotgl.php";

?>
<style>
.container {
width: 100%;
max-width: 1260px;
min-width: 780px;
background: #FFF;
margin: 0 auto;
}
.sidebar1 {
	float: left;
	width: 50%;
	padding-bottom: 10px;
}
.sidebar2 {
	padding: 10px 0;
	width: 50%;
	float: left;
}
</style>
<font face="Times New Roman"><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Konfirmasi Pesanan</title>
</head>
<body>
<table >
<tr>
<td><!--Judul -->
<center><b><font style="font-size:35px">Zello Store</font></b><br />
<font style="font-size:25px">Accesories Komputer</font><br />
Jl. Dr Soeparno No.199 Karangwangkal, Purwokerto, Jawa Tengah. Telp : 0896 5865 8738 
<br />
<hr /></center>

<b>Terima Kasih Sudah Belanja Di Zello Store</b>
<div align="center">Barang yang anda pesan akan kami kirim ke alamat yang tertera di bawah setelah Anda melakukan pembayaran, ke no rekening dibawah ini,<br />
  
  
  <?php
$sql= "SELECT * FROM profil order by id_perus";
$qry= mysql_query($sql,$koneksi) or die ("Query Salah".mysql_error());
while ($data = mysql_fetch_array($qry)){
	echo " <table width='500'>
  <tr>
  
     <td>Bank</td>
    <td>: $data[bank]</td>
  </tr>
  <tr>
 
    <td>No. Rekening</td>
    <td>: $data[no_rek]</td>
  </tr>
  <tr>
   
    <td>Atas Nama</td>
    <td>: $data[atas_nm] </td>
  </tr>
</table>";
}
  ?>
  
Mohon lakukan pembayaran dalam jangka waktu kurang dari 24 jam, Jika tidak pesanan anda akan dibatalkan.
  <br />
  <div class="container">
<div class="sidebar1">
  <?php
$sqltemp="SELECT * FROM pemesan order by id desc";
$qrytemp= mysql_query ($sqltemp, $koneksi);
$datatemp = mysql_fetch_array($qrytemp);

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
<!--<tr>
<td>Kode Pos</td>
<td>: <?php //echo $datatemp['kd_pos'];?></td>
</tr>-->
<tr>
<td>Telepon</td>
<td>: <?php echo $datatemp['telp'];?></td>
</tr>
</table></div>

<?php
$query = "SELECT * FROM pemesan_detail order by idpemesan desc";
$myQry = mysql_query($query, $koneksi)  or die ("Query ambil data salah : ".mysql_error());
$row= mysql_fetch_array($myQry);

?>
<?php
$query = "SELECT * FROM totsem order by id desc";
$myQry = mysql_query($query, $koneksi)  or die ("Query ambil data salah : ".mysql_error());
$tot= mysql_fetch_array($myQry);

?>
<br />
<div class="sidebar2">
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
<td colspan="3"><div align="right"><b>Biaya Kirim </b><i>(via JNE)</i></div></td>
<td><div align="right"><b>Rp. <?php echo number_format ($tot['biayakirim'],0,',','.') ; ?></b></div></td>
</tr>
<tr>
<td colspan="3"><div align="right"><b>Grand Total</b></div></td>
<td><div align="right"><b>Rp. <?php echo number_format ($datatemp['totalbayar'],0,',','.') ; ?></b></div></td>
</tr>
</table></div>
</div>
</div>
</table>
<h4><font color="#0066FF">Catatan</font></h4>
<p> Apabila telah melakukan pembayaran harap konfirmasi ke kami, sesuai prosedure yang terdapat di halaman <b> <a href="?page=CaraBeli" target="_blank"> Cara Beli & Konfirmasi Pemesanan.</a></b></p> 
<b>Terima kasih</b>.</p>

<script>
		window.load = print_d();
		function print_d(){
			window.print();
		}
	</script>
</body>
</html></font>