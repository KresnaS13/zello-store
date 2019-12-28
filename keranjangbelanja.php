<link rel="stylesheet" href="css/style.css" />
<font face="Times New Roman, Times, serif"><font color="#0000FF"><h3>Keranjang Belanja</h3></font>

<table width="696" height="55" border="1">
<tr bgcolor="#CCCCCC">
<td width="37"><div align="center">No</div></td>
<td width="49"><div align="center">Kode</div></td>
<td width="256"><div align="center">Nama Barang</div></td>
<td width="90"><div align="center">Harga</div></td>
<td width="73"><div align="center">Jumlah</div></td>
<td width="100"><div align="center">Sub Total</div></td>
<td width="45"><div align="center">Tools</div></td>
</tr>

<?php
include "config/koneksi.php";
$query = "SELECT * FROM temp_beli";

$query = mysql_query( $query );
 $ketemu=mysql_num_rows($query);
  if($ketemu < 1){
	  echo "<script>window.alert('Keranjang belanja anda masih kosong');
        window.location=('?page=home')</script>";
		exit();
   }
$nomor  = 0; 
if(!$query){
	die( mysql_error() );
}
while( $rows = mysql_fetch_array($query) ){
	$Kode = $rows['kd_barang'];
	$nomor++;
	$jumlah= ($rows['harga']*$rows['jumlah']);
	$subtotal=mysql_fetch_array(mysql_query("select sum(subtotal) as jml from temp_beli")); 
	$totalbarang=$subtotal['jml'];	
	?>
  
    <tr>
    <td height="26"><?php echo $nomor;?></td>
    <td height="26"><?php echo $rows['kd_barang']?></td>
    <td><?php echo $rows['nm_barang'];	?></td>
    <td><div align="right">
      <?php	echo number_format ($rows['harga'],0,',','.'); ?>
    </div></td>
    <td><div align="center">
   <?php echo $rows['jumlah'];?>
    </div></td>
    <td><div align="right"> <?php echo number_format ($jumlah,0,',','.'); ?></div></td>
      <td width="45" align="center"><div align="center"><a href="?page=hapuskeranjang&amp; Kode=<?php echo $Kode; ?>" target="_self" onclick="return confirm ('Barang ini akan dihapus ?')"><img src="img/remove.png" /></a></div></td>
  </tr>
<?php
}
?>

<script>
function startCalc(){ 
interval = setInterval("calc()",1); 
} 
function calc(){ 
totalbarang = document.form.totalbarang.value; 
biaya = document.getElementById('biaya').value; 
document.form.totalbayar.value = (totalbarang * 1) + (biaya * 1); //penjumlahan total barang dan kota tujuan
totalbayar = document.form.totalbayar.value; 
} 
function stopCalc(){ 
clearInterval(interval); 
} 
window.setTimeout(function() { 
document.getElementById("totalbarang").focus(); 
},0);
</script>


<?php
#Kode Otomatis
function kdauto($tabel, $inisial){
	$struktur	= mysql_query("SELECT * FROM $tabel");
	$field		= mysql_field_name($struktur,0);
	$panjang	= mysql_field_len($struktur,0);

 	$qry	= mysql_query("SELECT MAX(".$field.") FROM ".$tabel);
 	$row	= mysql_fetch_array($qry); 
 	if ($row[0]=="") {
 		$angka=0;
		}
 	else {
 		$angka		= substr($row[0], strlen($inisial));
 	}
 	$angka++;
 	$angka	=strval($angka); 
 	$tmp	="";
 	for($i=1; $i<=($panjang-strlen($inisial)-strlen($angka)); $i++) {
		$tmp=$tmp."0";	
	}
 	return $inisial.$tmp.$angka;
}
?>

<?php
$totalbayar = (isset($_POST['totalbayar']))?$_POST['totalbayar']:"";

#jika tombol simpan di klik
if (isset($_POST['btsimpan'])){
$kodeBaru	= kdauto("pemesan", "PS");


$simpan="insert into totsem (idpemesan, totalbayar) VALUES ('$kodeBaru','$totalbayar')";
$myQry=mysql_query($simpan, $koneksi) or die ("Gagal query".mysql_error());
#cek SQL		
		$query=mysql_query("select * from temp_beli");
        while($r=mysql_fetch_array($query)){
			$kd_barang	=$r['kd_barang'];
			$nm_barang	=$r['nm_barang'];
			$harga		=$r['harga'];
			$jumlah		=$r['jumlah'];
			$subtotal	=$r['subtotal'];	
	if($simpan){			
			$mysql="insert into pemesan_detail (idpemesan,kd_barang,nm_barang,harga,jumlah,subtotal) VALUES ('$kodeBaru','$kd_barang','$nm_barang','$harga','$jumlah','$subtotal')";
			mysql_query($mysql, $koneksi) or die ("Gagal Query".mysql_error());
			
			mysql_query("update barang set stock=stock-'$jumlah' where kd_barang='$kd_barang'");	
        }
	}	
    //hapus seluruh isi tabel temp_beli
    mysql_query("truncate table temp_beli");
    echo "<meta http-equiv='refresh' content='0; url=?page=Pemesan'>";   
}
?>

<!--Biaya Keranjang Belanja -->
<form name="form" method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
<tr>
<td colspan="5"><div align="right"><b>Total </b><i>(biaya barang)</i></div></td>
<td><div align="right"><b><input type="text" name="totalbarang" id="totalbarang" onfocus="startCalc();" onblur="stopCalc();" value="<?php echo $totalbarang;?>" disabled="disabled" style="width:100px; font-size:16px; text-align:right"/></b></div></td>
</tr>
<tr>
<td colspan="6"><div align="right"><b>Pilih Kota Tujuan</b>
 
<!-- -->
<?php
$result = mysql_query("select * from biaya_kirim");  
    $jsArray = "var vbiaya = new Array();\n";  
    echo '<select name="nm_kota" style="width:150px" onfocus="startCalc();" onchange="document.getElementById(\'biaya\').value = vbiaya[this.value]">';  
    echo '<option value="">Pilih Tujuan</option>';  
    while ($row = mysql_fetch_array($result)) {  
        echo '<option value="' . $row['nm_kota'] . '">' . $row['nm_kota'] . '</option>';  
        $jsArray .= "vbiaya['" . $row['nm_kota'] . "'] = '" . addslashes($row['biaya']) . "';\n";  
    }  
    echo '</select>';  
    ?>  
    <input type="text" name="biaya" id="biaya" onfocus="startCalc();" onblur="stopCalc();" style="width:100px; text-align:right"/>  
    <script type="text/javascript">  
    <?php echo $jsArray; ?>  
    </script>  

</div></td></tr>
<tr>
<td colspan="5"><div align="right"><b>Total Belanja</b><i>(Biaya Barang + Biaya Kirim)</i></div></td>
<td><div align="right"><b><input name="totalbayar" type="text" style="width:100px; text-align:right; font-size:20px; font-weight:bold">
</b></div></td>
</tr>
 <!--Perhitungan Biaya kirim dan biaya barang-->
<tr>
<td colspan="7"><a href="?page=home"><img src="img/keranjang-belanja.jpeg"/></a> || <input type="submit" name="btsimpan" value="Selesai Belanja"/>
</td>
</tr>
</form>
</table>
</font>