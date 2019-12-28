<?php
if (isset($_POST['cari'])){
	$cari = $_POST['cari'];
$mysql = mysql_query("SELECT * FROM barang where nm_barang LIKE '%$cari%'");
		$tampil = mysql_fetch_array($mysql);
			$Kode = $rows["kd_barang"];
	
		
  ?>
  
 <div class="data"><a href='#'><center><img src="../admin/<?php echo $tampil['name'];?>" width="200" height="200" /></center></a><br />
      <b><center><?php echo  $tampil['nm_barang'] ;?></center></b>
      <b><font color="#0033FF">Harga : Rp <?php echo number_format ($tampil['harga'],0,',','.');?></b></font><br />
	  <b><a href="?hal=detail&amp; Kode=<?php echo $Kode;?>" ><font color="#FF6600">Detail Barang</font></a> &nbsp;</b>
      </div> 
      
      <?php
	  }
	  else {
	  echo "<br /><br /><h3>
<font color='#FF0000'>Data yang anda cari tidak ditemukan !</font></h3>";
	  }
	  ?>