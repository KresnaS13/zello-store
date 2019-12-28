<font face="MS Serif, New York, serif"><?php
include "../config/koneksi.php";

?>
<a href="?index=tambah-kategori" class="btn tambah"><i class="icon-plus"></i>Tambah Data</a><br />
<br />
  <table border="1" class="table table-bordered table-condensed">
    
    <tr bgcolor="#CCCCCC">
      <td><div align="center">Kode Kategori</div></td>
      <td><div align="center">Nama Kategori</div></td>
      <td colspan="2"><div align="center">Keterangan</div></td>
    </tr>
    <?php
# UNTUK PAGING (PEMBAGIAN HALAMAN)
$row = 10;
$hal = isset($_GET['hal']) ? $_GET['hal'] : 0;
$pageSql = "SELECT * FROM kategori";
$pageQry = mysql_query($pageSql, $koneksi) or die ("error paging: ".mysql_error());
$jml	 = mysql_num_rows($pageQry);
$max	 = ceil($jml/$row);

?>
    
    <?php

$mysql= "SELECT * FROM kategori order by kd_kategori asc limit $hal, $row ";
$myqry = mysql_query($mysql, $koneksi) or die ("Query Salah ;". mysql_error());

while 
($myData = mysql_fetch_array($myqry)){
	$Kode = $myData["kd_kategori"];
?>
    <tr>
      <td><?php echo $myData['kd_kategori'] ?></td>
      <td><?php echo $myData['nm_kategori'] ?></td>
     </td>
      <td align="center"><div align="center"><a href="?index=ubah-kategori&amp; Kode=<?php echo $Kode; ?>" target="_self" title="Ubah Data">Ubah</a></div></td>
    <td align="center"><div align="center"><a href="?index=hapus-kategori&amp; Kode=<?php echo $Kode; ?>" target="_self" title="hapus data" onclick="return confirm ('Apakah Anda Yakin Ingin Menghapus Data Ini ?')">Hapus</a></div></td>
    </tr>
    
    <?php
}
?>
    
    <tr>
      <td align="pull-right" colspan="4"><div align="right"><b>Halaman ke :</b> 
        <?php
	for ($h = 1; $h <= $max; $h++) {
		$list[$h] = $row * $h - $row;
		echo " <a href='?index=kategori&hal=$list[$h]'>$h</a> ";
	}
	?>
        </div>
    </table>


</font>