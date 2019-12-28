 <br /><?php
include "../config/koneksi.php";
?>
<form action="<?php $_SERVER['PHP_SELF'];?>" method="post"> 
 	<div class="input-prepend pull-right">
          <div align="right"><span class="add-on"><i class="icon-search"></i></span>
            <input class="span2" id="prependedInput" type="text" name="pencarian" placeholder="Pencarian.." style="width:100%">
          </div>
    </div>
  
    </form><br /><br />

   <hr />
<font face="Times New Roman, Times, serif">
<link rel="stylesheet" href="css/style.css"/>

 <?php
# UNTUK PAGING (PEMBAGIAN HALAMAN)
$row = 6;
$halaman 		= isset($_GET['halaman']) ? $_GET['halaman'] : 0;
$pageSql = "SELECT * FROM barang";
$pageQry = mysql_query($pageSql, $koneksi) or die ("error paging: ".mysql_error());
$jml	 = mysql_num_rows($pageQry);
$max	 = ceil($jml/$row);

?>

<?php
if(isset($_POST['pencarian'])){
	$cari = $_POST['pencarian'];
	
$query = mysql_query("SELECT * FROM barang WHERE nm_barang LIKE '%$cari%'");
$tampil = mysql_fetch_array($query);
		$Kode = $tampil["kd_barang"];

?>

  <div class="data"><a href='#'><center><img src="../admin/<?php echo $tampil['name'];?>" width="200" height="200" /></center></a><br />
      <b><center><?php echo  $tampil['nm_barang'] ;?></center></b>
      <b><font color="#0033FF">Harga : Rp <?php echo number_format ($tampil['harga'],0,',','.');?></font></b><br />
	  <b><a href="?hal=detail&amp; Kode=<?php echo $Kode;?>" ><font color="#FF6600">Detail Barang</font></a> &nbsp;</b>
      </div>


<?php
include "../config/koneksi.php";

}else{
$query = "SELECT * FROM barang order by kd_barang desc limit $halaman, $row";
$query = mysql_query( $query );

while( $rows = mysql_fetch_array($query) ){
	$Kode = $rows["kd_barang"];
	?>
 
   <!--Menampilkan Foto-->
  
   <div class="data"><a href='#'><center><img src="../admin/<?php echo $rows['name'];?>" width="200" height="200" /></center></a><br />
      <b><center><?php echo  $rows['nm_barang'] ;?></center></b>
      <b><font color="#0033FF">Harga : Rp <?php echo number_format ($rows['harga'],0,',','.');?></font></b><br />
	  <b><a href="?hal=detail&amp; Kode=<?php echo $Kode;?>" ><font color="#FF6600">Detail Barang</font></a> &nbsp;</b>
      </div>

   <?php
}}
?> 
</font><br />
<div align="left"><b>Halaman ke :</b> 
        <?php
	for ($h = 1; $h <= $max; $h++) {
		$list[$h] = $row * $h - $row;
		echo " <a href='?hal=beranda&halaman=$list[$h]'>$h</a> ";
	}
	?>
</div></font>