<font face="Times New Roman">
<?php
include "../config/koneksi.php";

?>
<br />
<br />
<a href="?index=tambah-barang" class="btn tambah"><i class="icon-plus"></i>Tambah Data</a>
<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post"> <div class="input-prepend pull-right">
          <span class="add-on"><i class="icon-search"></i></span>
        <input class="span2" id="prependedInput" type="text" name="pencarian" placeholder="Pencarian..">	</div></form><br />
<br />

<table border="1" class="table table-condensed table-bordered">
    <tr bgcolor="#CCCCCC">
    <td width="20"><div align="center">No</div></td>
    <td width="60"><div align="center">Foto Produk</div></td>
    <td width="43"><div align="center">Kode Barang</div></td>
    <td width="72"><div align="center">Nama Barang</div></td>
    <td width="27"><div align="center">Harga</div></td>
    <td width="26"><div align="center">Stock</div></td>
    <td width="250"><div align="center">Detail Barang</div></td>
    <td colspan="2"><div align="center">Aksi</div></td>
    </tr>

  <?php
# UNTUK PAGING (PEMBAGIAN HALAMAN)
$row = 5;
$hal = isset($_GET['hal']) ? $_GET['hal'] : 0;
$pageSql = "SELECT * FROM barang";
$pageQry = mysql_query($pageSql, $koneksi) or die ("error paging: ".mysql_error());
$jml	 = mysql_num_rows($pageQry);
$max	 = ceil($jml/$row);

?>

<?php

if (isset($_POST['pencarian'])){
	$kunci =$_POST['pencarian'];
	echo "Kata Kunci yang anda cari $kunci";
	$query = mysql_query("SELECT * FROM barang WHERE nm_barang LIKE '%$kunci%'");
	$tampil = mysql_fetch_array($query);
	
?>

<!--Tampilkan Pencarian -->

 <tr>
    <td><?php ?></td>
    <td><img src="<?php echo $tampil['name'];?>" width="50" height="50"/></td>
    <td><?php echo $tampil['kd_barang'];	?></td>
    <td><?php echo $tampil['nm_barang'];	?></td>
    <td><div align="right">
      <?php	echo number_format ($tampil['harga'],2,',','.'); ?>
    </div></td>
    <td><div align="center">
      <?php	echo $tampil['stock'];	?>
    </div></td>
    <td><?php	echo $tampil['detail'];	?></td>
   <td width="25" align="center"><div align="center"><a href="?index=ubah-barang&amp; Kode=<?php echo $Kode; ?>" target="_self">Ubah</a></div></td>
    <td width="28" align="center"><div align="center"><a href="?index=hapus-barang&amp; Kode=<?php echo $Kode; ?>" target="_self" onclick="return confirm ('Apakah Anda Yakin Ingin Menghapus Data Ini ?')">Hapus</a></div></td>
    </tr>
    <!--SELESAI PENCARIAN -->

<?php
}else{

$query = "SELECT * FROM barang order by kd_barang asc limit $hal , $row";
$query = mysql_query( $query );
$nomor  = 0; 
if(!$query){
	die( mysql_error() );
}
while( $rows = mysql_fetch_array($query) ){
	$Kode = $rows['kd_barang'];
	$nomor++;
	?>
    <tr>
    <td><?php echo $nomor;?></td>
    <td><img src="<?php echo $rows['name'] ;?>" width="100" height="100"/></td>
    <td><?php echo $rows['kd_barang'];	?></td>
    <td><?php echo $rows['nm_barang'];	?></td>
    <td><div align="right">
      <?php	echo number_format ($rows['harga'],2,',','.'); ?>
    </div></td>
    <td><div align="center">
      <?php	echo $rows['stock'];	?>
    </div></td>
    <td><?php	echo $rows['detail'];	?></td>
   <td width="25" align="center"><div align="center"><a href="?index=ubah-barang&amp; Kode=<?php echo $Kode; ?>" target="_self">Ubah</a></div></td>
    <td width="28" align="center"><div align="center"><a href="?index=hapus-barang&amp; Kode=<?php echo $Kode; ?>" target="_self" onclick="return confirm ('Apakah Anda Yakin Ingin Menghapus Data Ini ?')">Hapus</a></div></td>
    </tr>
   <?php
}}
?>
  <tr>
      <td align="pull-right" colspan="9"><div align="right"><b>Halaman ke :</b> 
        <?php
	for ($h = 1; $h <= $max; $h++) {
		$list[$h] = $row * $h - $row;
		echo " <a href='?index=barang&hal=$list[$h]'>$h</a> ";
	}
	?>
        </table>

</font>