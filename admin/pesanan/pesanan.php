<font face="Times New Roman">
<?php
include "../config/koneksi.php";
include "../config/fungsi_indotgl.php";
?>
<caption><h4>Daftar Pemesan Barang</h4>
<hr />
<form action="<?php $_SERVER['PHP_SELF'];?>" method="post"> <div class="input-prepend pull-right">
          <span class="add-on"><i class="icon-search"></i></span>
        <input class="span2" id="prependedInput" type="text" name="pencarian" placeholder="Pencarian..">	</div></form><br />
<br />
 <table class="table table-bordered table-condensed">
<tr bgcolor="#CCCCCC">
<td><div align="center">No</div></td>
<td><div align="center">Id Pesan</div></td>
<td><div align="center">Nama Pemesan</div></td>
<td><div align="center">Alamat Pemesan</div></td>
<td><div align="center">Tgl Pesan</div></td>
<td><div align="center">Status Pengiriman</div></td>
<td colspan="2"><div align="center">Aksi</div></td>
</tr>
    <?php
# UNTUK PAGING (PEMBAGIAN HALAMAN)
$row = 10;
$hal = isset($_GET['hal']) ? $_GET['hal'] : 0;
$pageSql = "SELECT * FROM pemesan";
$pageQry = mysql_query($pageSql, $koneksi) or die ("error paging: ".mysql_error());
$jml	 = mysql_num_rows($pageQry);
$max	 = ceil($jml/$row);

?>
<?php
if (isset($_POST['pencarian'])){
	$kunci= $_POST['pencarian'];
	echo "Data yang anda cari $kunci";
	$quer = mysql_query("SELECT * FROM pemesan WHERE idpemesan LIKE '%$kunci%' 
OR nm_pemesan LIKE '%$kunci%'
OR email LIKE '%$kunci%'
OR tgl_pesan LIKE '%$kunci%'");
	$tampil = mysql_fetch_array($quer);
	
	$Kode = $tampil["idpemesan"];
$tanggal=tgl_indo($tampil['tgl_pesan']);
?>

<tr>
<td><?php ?></td>
<td><?php echo $Kode;?></td>
<td><?php echo $tampil['nm_pemesan'];?></td>
<td><?php echo $tampil['alamat'];?></td>
<td><?php echo $tanggal;?></td>
<td><div align="center"><font color="#0000FF"><b><?php echo $tampil ['status'] ; ?></b></font></div></td>
<td width="13" align="center"><div align="center"><a href="?index=detail-pemesan&amp; Kode=<?php echo $Kode; ?>" target="_self" title="detail pemesan">Detail</a></div></td>
    <td width="13" align="center"><div align="center"><a href="?index=hapus-pemesan&amp; Kode=<?php echo $Kode; ?>" target="_self" title="hapus pemesan" onclick="return confirm ('Apakah Anda Yakin Ingin Menghapus Data Ini ?')">Hapus</a></div></td>
</tr>

<?php
}else{
$mysql= "SELECT * FROM pemesan order by idpemesan desc limit $hal, $row";
$query= mysql_query($mysql, $koneksi) or die ("Query Salah ;".mysql_error());
$nomor  = 0; 
while
($data=mysql_fetch_array($query)){
	$Kode = $data["idpemesan"];
	$nomor++;
	$tanggal=tgl_indo($data['tgl_pesan']);
?>

<tr>
<td><?php echo $nomor;?></td>
<td><?php echo $Kode;?></td>
<td><?php echo $data['nm_pemesan'];?></td>
<td><?php echo $data['alamat'];?></td>
<td><?php echo $tanggal;?></td>
<td><div align="center"><font color="#0000FF"><b><?php echo $data ['status'] ; ?></b></font></div></td>
<td width="13" align="center"><div align="center"><a href="?index=detail-pemesan&amp; Kode=<?php echo $Kode; ?>" target="_self" title="detail pemesan">Detail</a></div></td>
    <td width="13" align="center"><div align="center"><a href="?index=hapus-pemesan&amp; Kode=<?php echo $Kode; ?>" target="_self" title="hapus pemesan" onclick="return confirm ('Apakah Anda Yakin Ingin Menghapus Data Ini ?')">Hapus</a></div></td>
</tr>

<?php
}}
?>
</table>
<tr>
      <td align="pull-right" colspan="6"><div align="right"><b>Halaman ke :</b> 
        <?php
	for ($h = 1; $h <= $max; $h++) {
		$list[$h] = $row * $h - $row;
		echo " <a href='?index=pesanan&hal=$list[$h]'>$h</a> ";
	}
	?>
	</font>