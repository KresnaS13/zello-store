<font face="Times New Roman, Times, serif"><?php
include "../config/koneksi.php";

?>

<font color="#0000FF"><h3>Daftar Komentar Kunjungan</h3></font>
<hr />
  <table border="1" class="table table-bordered table-condensed">
  
    <tr bgcolor="#CCCCCC">
      <td><div align="center">Id Tamu</div></td>
      <td><div align="center">Nama</div></td>
      <td><div align="center">Email</div></td>
      <td><div align="center">Komentar</div></td>
      <td colspan="2"><div align="center">Keterangan</div></td>
    </tr>
    <?php
# UNTUK PAGING (PEMBAGIAN HALAMAN)
$row = 10;
$hal = isset($_GET['hal']) ? $_GET['hal'] : 0;
$pageSql = "SELECT * FROM tamu";
$pageQry = mysql_query($pageSql, $koneksi) or die ("error paging: ".mysql_error());
$jml	 = mysql_num_rows($pageQry);
$max	 = ceil($jml/$row);

?>
    
    <?php

$mysql= "SELECT * FROM tamu order by id_tamu asc limit $hal, $row ";
$myqry = mysql_query($mysql, $koneksi) or die ("Query Salah ;". mysql_error());

while 
($myData = mysql_fetch_array($myqry)){
	$Kode = $myData["id_tamu"];
?>
    <tr>
      <td><?php echo $myData['id_tamu'] ?></td>
      <td><?php echo $myData['nama'] ?></td>
      <td><font color="#0033FF"><?php echo $myData['email'] ?></font></td>
      <td><?php echo $myData['komentar'] ?></td>
      <td align="center"><div align="center"><a href="?index=hapus-bukutamu&amp; Kode=<?php echo $Kode; ?>" target="_self" title="hapus komentar" onclick="return confirm ('Apakah Anda Yakin Ingin Menghapus Data Ini ?')">Hapus</a></div></td>
    </tr>
    <?php
}
?>
    
    <tr>
      <td align="pull-right" colspan="6"><div align="right"><b>Halaman ke :</b> 
        <?php
	for ($h = 1; $h <= $max; $h++) {
		$list[$h] = $row * $h - $row;
		echo " <a href='?index=bukutamu&hal=$list[$h]'>$h</a> ";
	}
	?>
        </div>
    </table>
</font>