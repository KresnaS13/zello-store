<br /><br />
<h4>Gunakan Alamat Yang Sudah Terdaftar</h4><br />
<table>
<tr>
<td><div align="center"><strong>Alamat</strong></div></td>
<td><div align="center"><strong>Telepon</strong></div></td>
<td><div align="center"><strong>Kode Pos</strong></div></td>
<td><div align="center"><strong>Aksi</strong></div></td>
</tr>


   <?php
$idpemesantampil = (isset($_SESSION['idpemesan'])) ? $_SESSION['idpemesan'] : "";
$tampilquery = "SELECT * FROM pemesan where idpemesan ='$idpemesantampil'";
$tampilkan = mysql_query($tampilquery);
while ($tampil = mysql_fetch_array($tampilkan)){

?>
<form action="<?php $_SERVER['PHP_SELF'];?>" method="post">
<tr>
<input name='tgl_pesan' type=hidden value="<?php echo $tgl_pesan; ?>" size=20>
<input name='status' type=hidden value="Baru" size=20>
<td><textarea name="alamat" readonly="readonly"><?php echo $tampil['alamat'] ;?></textarea></td>
<td><input type="text" name="telp" value="<?php echo $tampil['telp'] ;?>" readonly="readonly"/></td>
<td><input type="text" name="kd_pos" value="<?php echo $tampil['kd_pos'] ;?>" readonly="readonly"/></td>
<input type="hidden" name="totalbayar" value="<?php echo $datatemp['totalbayar'];?>" readonly="readonly"/>
<td><input type="checkbox" name="chkpemesan"/> |  <input type="submit" name="simpan" value="Simpan" /><br />
</td> 
</tr>
<?php
include "../config/koneksi.php";
$tgl_pesan=date('Y-m-d');
if(isset($_POST['simpan'])){

$idpemesan		= (isset($_SESSION['idpemesan'])) ? $_SESSION['idpemesan'] : "";
$nm_pemesan		= (isset($_SESSION['nama'])) ? $_SESSION['nama'] : "";
$tgl_pesan		= $_POST['tgl_pesan'];
$totalbayar	= isset($_POST['totalbayar']) ? $_POST['totalbayar'] : "";
$alamat	= isset($_POST['alamat']) ? $_POST['alamat'] : "";
$telp	= isset($_POST['telp']) ? $_POST['telp'] : "";
$kd_pos	= isset($_POST['kd_pos']) ? $_POST['kd_pos'] :"";


$status			= $_POST['status'];
$chkpemesan		= (isset($_POST['chkpemesan'])) ? $_POST['chkpemesan'] : "";

$Sqlsimpan = "INSERT INTO pemesan(idpemesan, nm_pemesan, alamat, telp, tgl_pesan, kd_pos, totalbayar, status) VALUES ('$idpemesantampil','$nm_pemesan','$alamat','$telp','$tgl_pesan','$kd_pos','$totalbayar','$status')";
	$myQry=mysql_query($Sqlsimpan, $koneksi) or die ("Gagal query".mysql_error());
		if($myQry){
	echo "<meta http-equiv='refresh' content='0; url=?hal=Konfirmasi'>";
		}
?>

<?php
}}
?></form>
</table>
<font style="font-size:12px"><i>*(Jika Ingin Memilih alamat pengiriman sebelumnya maka tinggal di ceklist dan pilih Simpan).</i></font>

