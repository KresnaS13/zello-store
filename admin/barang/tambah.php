<?php
include "../config/koneksi.php";

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
$datakode=kdauto("barang","BR");

?>


 <caption><b>TAMBAH DATA BARANG</b></caption>
 <hr />
 <form method="post" action="?index=upload" enctype="multipart/form-data">
<table class="table-condensed">
        <tr>
            <td>Kode Barang</td>
            <td><input type="text" name="kd_barang" value=<?php echo $datakode ; ?>  disabled="disabled" style="width:120px"></td>
        </tr>
		<tr>
            <td>Kode Kategori</td>
            <td><select name="kd_kategori">
                  <option value="kosong">-Pilih Kategori-</option>
                    <?php
			$mysql = "SELECT * FROM kategori order by kd_kategori asc";
					$myqry = mysql_query($mysql, $koneksi) or die ("Query Salah:".mysql_error());
					while($myData = mysql_fetch_array($myqry)){
					if ($nm_kategori==$myData['nm_kategori']){
					$cek="selected";
					}
					else { $cek="";}
					echo "<option value='$myData[kd_kategori]' $cek>$myData[kd_kategori]</option>";
										}
										?>
                    </select></td>
        </tr>
        <tr>
            <td>Nama Barang</td>
            <td><input name="nm_barang" type="text"  size=20></td>
        </tr>
        <tr>
            <td>Harga</td>
            <td><input name="harga" type="text"  size=20></td>
        </tr>
        <tr>
            <td>Stock Barang</td>
            <td><input name="stock" type="text"  size=20></td>
        </tr>
        <tr>
            <td>Gambar</td>
            <td><input name="gmb" type=file  size=20></td>
        </tr>
        <tr>
            <td>Detail</td>
            <td><textarea cols="25" rows="4" name="detail"></textarea></td>
        </tr>
        <tr>
            <td></td><td>
            <input type="submit" name="btsimpan" value="Simpan" />
           </td>
        </tr>
        </table>
      
</form>
<font face="Times New Roman, Times, serif"><font color="#FF0000">
*)  KB001 = Accesories Komputer<br />
*)  KB002 = Accesories Handphone<br />
*)  KB003 = Accesories Lain<br />

</font></font>