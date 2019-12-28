<?php
$server="localhost";
$user="root";
$pass="";
$nm_db="store";

$koneksi=mysql_connect($server, $user, $pass);
$db=mysql_select_db($nm_db);

if(!$koneksi){
	echo "maaf Koneksi Gagal";
}else{	
if(!$db)
	echo "Database tidak ditemukan";
}
?>

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

#jika tombol simpan di klik
if (isset($_POST['btsimpan'])){
$pesanerror =array();
if (trim($_POST['kd_barang'])==""){
$pesanerror[] = "nama kota Masih kosong !";
}
if (trim($_POST['nm_barang'])==""){
$pesanerror[] = "biaya Anggota Masih kosong !";
}


#membaca data dalam form,
$kd_barang=$_POST['kd_barang'];
$nm_barang=$_POST['nm_barang'];


#cek SQL
$cekSql="SELECT * FROM pemesan_detail WHERE kd_barang='$kd_barang'";
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
		$kodeBaru	= kdauto("pemesan", "PS");
		$mySql  	= "INSERT INTO pemesan_detail (idpemesan, kd_barang, nm_barang) VALUES ('$kodeBaru','$kd_barang','$nm_barang')";
		
		$myQry=mysql_query($mySql, $koneksi) or die ("Gagal query".mysql_error());
		if($myQry){
			echo "<meta http-equiv='refresh' content='0; url=beli.php'>";
		}
			}
}
#isi Smentara field
$datakode=kdauto("pemesan","PS");
$kd_barang=isset($_POST['kd_barang']) ?$_POST['kd_barang'] :"";
$nm_barang=isset($_POST['nm_barang']) ?$_POST['nm_barang'] :"";

?>


<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" name="frmuser">
  <table border=0 >
   <caption><b>TAMBAH DATA BIAYA PENGIRIMAN</b></caption>
        <tr>
            <td>Kode Biaya</td>
            <td> : <input type=text name='idpemesan' size=15  value= <?php echo $datakode; ?> maxlength="6" disabled="disabled">
		                               </td>
        </tr>
		<tr>
            <td>Kode Barang</td>
            <td> : <input name='kd_barang' type=text value="<?php echo $kd_barang; ?>" size=20></td>
        </tr>
		<tr>
            <td>Nama Barang</td>
            <td> : <input name='nm_barang' type=text value="<?php echo $nm_barang; ?>" size=20></td>
        </tr>
		
        <tr>
            <td></td><td>
            <input type="submit" name="btsimpan" value="Simpan" />
           </td>
        </tr>
        </table>
      
</form>

<?php
	$mysql ="SELECT * FROM kategori";
	$query = mysql_query($mysql, $koneksi);
	while ( $data = mysql_fetch_array($query)){
	
	?> 
    <table>
    <tr>
    <td>Nama</td>
    <td><?php echo $data['nm_kategori'];?></td>
    </tr>
    </table>
    
    
<?php
}
?>

<input type="text" name="cc" id="cc" style='font-weight: bold; text-align: right;' onfocus="copascc"  onchange="document.getElementById('copascc').value = this.value;" value="10.000"/><br /><br />
<input type="text" name="copascc" id="copascc" onfocus="cc" onchange="document.getElementById('copascc').value = this.value;" style='font-weight: bold; text-align: right;' />




<table width="454" border="1">
<tr>
<td colspan="4" bgcolor="#9999FF"><div align="center"><b>DATA BARANG</b></div></td>
</tr>
<tr bgcolor="#CCCCCC">
<td width="199"><div align="center"><b>Nama Barang</b></div></td>
<td width="48"><div align="center"><b>Jumlah</b></div></td>
<td width="98"><div align="center"><b>Harga Satuan</b></div></td>
<td width="81"><div align="center"><b>Sub Total</b></div></td>
</tr>
<?php
$query = "SELECT * FROM pemesan_detail order by idpemesan asc";
$myQry = mysql_query($query, $koneksi)  or die ("Query ambil data salah : ".mysql_error());
$row= mysql_fetch_array($myQry);
$Kode = $row["idpemesan"];
?>
<tr>
<td><?php echo $row['nm_barang'];?></td>
<td><div align="center"><?php echo $row['jumlah'];?></div></td>
<td><div align="right">Rp <?php echo $row['harga'];?></div></td>
<td><div align="right">Rp <?php echo $row['subtotal'];?></div></td>
</tr>

<tr>
<td colspan="3"><div align="right">Total Barang</div></td>
<td><div align="right">Rp. xxx</div></td>
</tr>

<tr>
<td colspan="3"><div align="right">Ongkos Kirim</div></td>
<td><div align="right">Rp. xxx</div></td>
</tr>

<tr>
<td colspan="3"><div align="right"><b>Grand Total</b></div></td>
<td><div align="right"><b>Rp. xxx</b></div></td>
</tr>

</table>