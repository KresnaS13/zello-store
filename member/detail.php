<font face="Times New Roman, Times, serif">
<link rel="stylesheet" href="css/style.css" />   
<?php

include "../config/koneksi.php";
# Pilih data dari tabel barang
$Kode	 = isset($_GET['Kode']) ?  $_GET['Kode'] : $_POST['kd_barang']; 
$query = "SELECT * FROM barang WHERE kd_barang='$Kode'";
$myQry = mysql_query($query, $koneksi)  or die ("Query ambil data salah : ".mysql_error());

$rows= mysql_fetch_array($myQry);
	?>
    
<?php
# Pilih data dari tabel barang
$idpemesan = (isset($_SESSION['idpemesan'])) ? $_SESSION['idpemesan'] :"";

$querypesan = "SELECT * FROM pemesan";
$myQryp = mysql_query($querypesan, $koneksi)  or die ("Query ambil data salah : ".mysql_error());
$pemesan= mysql_fetch_array($myQryp);

	?>
   
   <!--Menampilkan Foto-->
  <img src="../admin/<?php echo $rows['name'];?>" width="250" height="250" /><br /><br />

  <table width="650"  class="table table-condensed table-bordered">
  <tr>
  <td width="105"><b>Kode Barang</b></td>
  <td width="21"><b>&nbsp;&nbsp;:&nbsp;&nbsp;</b></td>
  <td width="508"><?php echo  $rows['kd_barang'] ;?></td>
  </tr>
  <tr>
  <td width="105"><b>Nama Barang</b></td>
  <td width="21"><b>&nbsp;&nbsp;:&nbsp;&nbsp;</b></td>
  <td width="508"><?php echo  $rows['nm_barang'] ;?></td>
  </tr>
  <tr>
  <td><b>Stock </b></td>
  <td><b>&nbsp;&nbsp;:&nbsp;&nbsp;</b></td>
  <td><font color="#FF0000"><h3><?php echo  $rows['stock'] ;?></h3></font></td>
  </tr>
  <tr>
  <td><b>Detail</b></td>
  <td><b>&nbsp;&nbsp;:&nbsp;&nbsp;</b></td>
  <td><?php echo  $rows['detail'] ;?></td>
  </tr>
  </table>
      	     <blink> <b><font color="#0033FF"><h3>Harga : Rp. <?php echo number_format ($rows['harga'],0,',','.');?></h3></font></b></blink><br />
   
    <?php

#jika tombol simpan di klik
if (isset($_POST['btsimpan'])){
$pesanerror =array();
if (trim($_POST['jumlah'])==""){
$pesanerror[] = "<font color='#FF0000'>Jumlah barang yang ingin dibeli Masih kosong !</font>";
}

if ($_POST['jumlah']>$rows['stock']){
echo " <script>window.alert('Stock Barang yang anda beli Habis');
	window.location=('index.php')</script>";	
	exit();
}
if ($_SESSION['idpemesan'] == $pemesan['status']="Baru"){
echo " <script>window.alert('Mohon Maaf Anda Tidak Bisa Membeli Barang Kami, Sebelum Anda Lunasi Pemesanan Yang Kemarin');
	window.location=('index.php')</script>";	
	exit();
}

#membaca data dalam form,
$kd_barang=$_POST['kd_barang'];
$nm_barang=$_POST['nm_barang'];
$harga=$_POST['harga'];
$jumlah=$_POST['jumlah'];
$subtotal= $harga*$jumlah;
$idpemesan = (isset($_SESSION['idpemesan'])) ? $_SESSION['idpemesan'] : "";
#cek SQL
$cekSql="SELECT * FROM temp_beli";
	$cekQry=mysql_query($cekSql, $koneksi) or die ("Eror Query".mysql_error()); 
	if (count($pesanerror)>=1){
echo"<div class='mssgBox'>";
			$noPesan=0;
			foreach ($pesanerror as $indeks=>$pesan_tampil) { 
			$noPesan++;
				echo "&nbsp;&nbsp; $noPesan. $pesan_tampil<br>";	
			} 
		echo "</div> <br>"; 
}else {
		# SIMPAN DATA KE DATABASE. 
		// Jika tidak menemukan error, simpan data ke database
				
		$mySql  	= "INSERT INTO temp_beli (idpemesan, kd_barang, nm_barang,harga, jumlah,subtotal) VALUES ('$idpemesan','$kd_barang','$nm_barang','$harga','$jumlah','$subtotal')";

		$myQry=mysql_query($mySql, $koneksi) or die ("Gagal query".mysql_error());
		if($myQry){
			echo "<meta http-equiv='refresh' content='0; url=?hal=keranjangbelanja'>";
		}
	}
}
?>

<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" name="frmuser">

  
           <input name='idpemesan' type=hidden  size=20 value=<?php echo "".$_SESSION['idpemesan'].""; ?>>
            <input name='kd_barang' type=hidden  size=20 value="<?php echo $rows ['kd_barang'] ?>"><input name='nm_barang' type=hidden  size=20 value="<?php echo $rows ['nm_barang'] ?>"> <input name='harga' type=hidden  size=20 value="<?php echo $rows ['harga'] ?>">
        <table border=0 >
           <tr>
            <td>  <b>Jumlah Beli :</b><input name='jumlah' type=text style="width:25px">&nbsp;&nbsp;&nbsp; <input type="submit" name="btsimpan" value="Beli" /> &nbsp;<a href="index.php"><input type="button" value="Kembali"/></a></td>
                </tr>
        </table>
      
</form>         
