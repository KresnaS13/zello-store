
<font face="Times New Roman, Times, serif">
<link rel="stylesheet" href="../css/style.css" />

     
<?php
include "../config/koneksi.php";
	
# Pilih data dari tabel barang
$Kode	 = isset($_GET['Kode']) ?  $_GET['Kode'] : $_POST['kd_kategori'];
$query = "SELECT * FROM barang WHERE kd_kategori='$Kode'";
$myQry = mysql_query($query, $koneksi)  or die ("Query ambil data salah : ".mysql_error());
while($tampil= mysql_fetch_array($myQry)){

	?>

   <!--Menampilkan Foto-->

   <div class="data"><a href='#'><center><img src="../admin/<?php echo $tampil['name'];?>" width="200" height="200" /></center></a><br />
      <b><center><?php echo  $tampil['nm_barang'] ;?></center></b>
      <b><font color="#0033FF">Harga : Rp <?php echo number_format ($tampil['harga'],0,',','.');?></font></b><br />
	  <b><a href="?hal=detail&amp; Kode=<?php echo $tampil['kd_barang'];?>" ><font color="#FF6600">Detail Barang</font></a> &nbsp;</b>
      </div>
  
   <?php
} 
   ?>
  
 </font>