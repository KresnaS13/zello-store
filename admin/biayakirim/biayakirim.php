<font face="MS Serif, New York, serif"><?php
include "../config/koneksi.php";

?>
<a href="?index=tambah-biayakirim" class="btn tambah"><i class="icon-plus"></i>Tambah Data</a>
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post"> <div class="input-prepend pull-right">
          <span class="add-on"><i class="icon-search"></i></span>
<input class="span2" id="prependedInput" type="text" name="pencarian" placeholder="Pencarian..">	</div></form><br />
<br />
  <table border="1" class="table table-bordered table-condensed">
    
    <tr bgcolor="#CCCCCC">
      <td><div align="center">Kode Kota</div></td>
      <td><div align="center">Nama Kota</div></td>
       <td><div align="center">Via</div></td>
      <td><div align="center">Biaya</div></td>
      <td colspan="2"><div align="center">Keterangan</div></td>
    </tr>
    <?php
# UNTUK PAGING (PEMBAGIAN HALAMAN)
$row = 10;
$hal = isset($_GET['hal']) ? $_GET['hal'] : 0;
$pageSql = "SELECT * FROM biaya_kirim";
$pageQry = mysql_query($pageSql, $koneksi) or die ("error paging: ".mysql_error());
$jml	 = mysql_num_rows($pageQry);
$max	 = ceil($jml/$row);

?>
 <?php
 //pencarian 
 if(isset($_POST['pencarian'])) {
            $kunci = $_POST['pencarian'];
            echo "Hasil pencarian untuk kata kunci $kunci";
            $query = mysql_query("SELECT * FROM biaya_kirim WHERE nm_kota LIKE '%$kunci%'");
			$tampil = mysql_fetch_array($query);
				$Kode = $tampil["kd_biaya"];

?>			
	<tr>
      <td><?php echo $tampil['kd_biaya'] ?></td>
      <td><?php echo $tampil['nm_kota'] ?></td>
      <td><?php echo $tampil['via'] ?></td>
      <td><div align="right"><?php echo  number_format($tampil['biaya'],2,',','.');?></div></td>
      <td align="center"><div align="center"><a href="?index=ubah-biayakirim&amp; Kode=<?php echo $Kode; ?>" target="_self">Ubah</a></div></td>
    <td align="center"><div align="center"><a href="?index=hapus-biayakirim&amp; Kode=<?php echo $Kode; ?>" target="_self" onclick="return confirm ('Apakah Anda Yakin Ingin Menghapus Data Ini ?')">Hapus</a></div></td>
    </tr>
    
    
 <?php   
 }else{

$mysql= "SELECT * FROM biaya_kirim order by kd_biaya asc limit $hal, $row ";
$myqry = mysql_query($mysql, $koneksi) or die ("Query Salah ;". mysql_error());

while 
($myData = mysql_fetch_array($myqry)){
	$Kode = $myData["kd_biaya"];
?>
    <tr>
      <td><?php echo $myData['kd_biaya'] ?></td>
      <td><?php echo $myData['nm_kota'] ?></td>
      <td><?php echo $myData['via'] ?></td>
       <td><div align="right"><?php echo  number_format($myData['biaya'],2,',','.');?></div></td>
      <td align="center"><div align="center"><a href="?index=ubah-biayakirim&amp; Kode=<?php echo $Kode; ?>" target="_self"> Ubah</a></div></td>
    <td align="center"><div align="center"><a href="?index=hapus-biayakirim&amp; Kode=<?php echo $Kode; ?>" target="_self" onclick="return confirm ('Apakah Anda Yakin Ingin Menghapus Data Ini ?')">Hapus</a></div></td>
    </tr>
    
    <?php
}}
?>
    
    <tr>
      <td align="pull-right" colspan="6"><div align="right"><b>Halaman ke :</b> 
        <?php
	for ($h = 1; $h <= $max; $h++) {
		$list[$h] = $row * $h - $row;
		echo " <a href='?index=biayakirim&hal=$list[$h]'>$h</a> ";
	}
	?>
        </div>
    </table>

</font>