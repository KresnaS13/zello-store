
<?php 
include_once "config/koneksi.php";

#Hapus Barang
if(isset($_GET['Act'])){
	if(trim($_GET['Act'])=="Hapus"){
		$sqlhapus="delete from temp_beli where idpemesan='".$_GET['idpemesan']."' and kode='".$dataku1['kode']."'";
		$qryhapus=mysql_query($sqlhapus,$koneksidb) or die ("Hapus TMP Gagal : ".mysql_error());
	}
	if(trim($_GET['Act'])=="Sucsess"){
	echo "Data Berhasil Disimpan";
	}
}
#Tombol Tambah
if(isset($_POST['bttambah'])) {
	$pesanError = array();
	if (trim($_POST['txtkode']) =="") {
	$pesanError[]= " Data Kode Barang / Barcode belum terisi. harus Anda isi !"; }
	if(trim($_POST['txthrgbeli']) =="" or ! is_numeric(trim($_POST['txthrgbeli']))) {
		$pesanError []= " Data Harga Beli Belum diisi, silahkan <b> isi dengan angka </b> !"; }
	if(trim($_POST['txtjumlah']) =="" or ! is_numeric(trim($_POST['txtjumlah']))) {
		$pesanError []= " Data <b> jumlah (QTY) belum diisi </b>, Silahkan <b> isi dengan angka </b> !"; }
	
	$cmbsupplier = $_POST['cmbsupplier'];
	$txtkode = $_POST['txtkode'];
	$txtkode = str_replace("'","&acute;",$txtkode);
	$txthrgbeli = $_POST['txthrgbeli'];
	$txthrgbeli = str_replace("'","&acute;",$txthrgbeli);
	$txthrgbeli = str_replace("'","",$txthrgbeli);
	$txtjumlah = $_POST['txtjumlah'];
	#cek Supplier
	$cekSql1	= "SELECT tabelsupplier.* FROM tabelbarang, tabelsupplier WHERE tabelbarang.kodesupplier=tabelsupplier.kodesupplier
				AND ( kodebarang='$txtkode' OR barcode='$txtkode' )";
	$cekQry1 = mysql_query($cekSql1, $koneksidb) or die ("Gagal Query : ".mysql_error());
	$cekRow1 = mysql_fetch_array($cekQry1);
	if ($cekRow1['kodesupplier'] != $cmbsupplier) {
		$pesanError[] = "<b> SALAH MEMILIH SUPPLIER</b>, untuk Barang dengan kode <b>$txtkode</b> 
						 suppliernya <b> $cekRow1[kodesupplier] | $cekRow1[namasupplier]</b>!";
	}
	
	if (count($pesanError) >= 1 ) {
		echo "<div class='alert-box'>";
		$noPesan=0;
		foreach ($pesanError as $indeks=>$pesan_tampil) {
			$noPesan++;
			echo " $noPesan. $pesan_tampil <br>";
		}
		echo "</div> <br>";
	}else{
		$ceksql2="select *from temp_beli as tmp, tabelbarang as tabelbarang where
		tabelbarang.kodebarang =tmp.kodebarang and (tmp.kodebarang='$txtkode') or tabelbarang.barcode='$txtkode' 
		and tmp.kode='".$dataku1['kode']."'";
		$cekqry2=mysql_query($ceksql2,$koneksidb) or die ("Gagal Query 2 : ".mysql_error());
		if(mysql_num_rows($cekqry2)>=1){
		#baca Kode Barang
		$cekrow1=mysql_fetch_array($cekqry2);
		$kodebarang=$cekrow1['kodebarang'];
		#update jumlah
		$tmpSql = "UPDATE temp_beli SET jumlah=jumlah + $txtjumlah WHERE kodebarang='$txtkode' AND kode='".$dataku1['kode']."'";
			mysql_query($tmpSql, $koneksidb) or die ("Gagal Query : ".mysql_error());
		}else{
		$mySql =" SELECT * From tabelbarang WHERE kodebarang='$txtkode' or barcode='$txtkode'";
	$myQry = mysql_query($mySql, $koneksidb) or die (" Gagal Query 1 : ".mysql_error());
	$myRow = mysql_fetch_array($myQry);
	$myQty = mysql_num_rows($myQry);
	if ($myQty >=1 ) {
		// membaca Kode barang / barang
		$kodebarang = $myRow['kodebarang'];
		
		// Data yang ditemukan dimasukan ke keranjang transaksi
		$tmpSql1 = "INSERT INTO temp_beli (kode,kodesupplier, kodebarang, hargabeli, jumlah)
		VALUES ('".$dataku1['kode']."','$cmbsupplier','$kodebarang','$txthrgbeli','$txtjumlah')";
		mysql_query($tmpSql1, $koneksidb) or die ("Gagal query tmp : ".mysql_error());
				}

			}
		}
	}

if(isset($_POST['btsimpan']))  {
		$pesanerror=array();
		
		if(trim($_POST['cmbtanggal']) =="") {
		$pesanerror[]= " Masukan Tanggal"; 
		}
		
		#cek jumlah Barang
	$sqlsimpan="SELECT COUNT(*) As jumlah From temp_beli WHERE kode='".$dataku1['kode']."'";
	$qrysimpan=mysql_query($sqlsimpan,$koneksidb) or die ("Query Simpan Gagal : ".mysql_error());
	$simpandata=mysql_fetch_array($qrysimpan);
	if($simpandata['jumlah']<1){
		$pesanerror[]="Jumlah Barang Tidak Ada, Masukan MInimal 1 Barang !";
	}
	#Validasi Jika Supplier Tidak Sama
	$sqlsimpan2="SELECT tabelsupplier.* From temp_beli, tabelsupplier WHERE tabelsupplier.kodesupplier=temp_beli.kodesupplier
	AND kode='".$dataku1['kode']."'";
	$qrysimpan2=mysql_query($sqlsimpan2,$koneksidb) or die ("Gagal Cek Supplier : ".mysql_error());
	$simpandata2=mysql_fetch_array($qrysimpan2);
	if (trim($_POST['cmbsupplier']) =="kosong") {
		$pesanerror[]= " Harap Pilih Supplier!"; 
		}else if($simpandata2['kodesupplier'] !=$_POST['cmbsupplier']){
		$pesanerror[]="Data Tidak Sama, Barang yang Dimasukan Adalah Milik $simpandata2[kodesupplier] | $simpandata2[namasupplier]";
		}
	#Baca Variabel
	$cmbsupplier = $_POST['cmbsupplier'];
	$txttanggal=$_POST['cmbtanggal'];
	$txtketerangan=$_POST['txtket'];
	
	#validasi pesan error
	if(count($pesanerror) >= 1 ) {
		echo "<div class='alert-box'>";
		$noPesan=0;
		foreach ($pesanerror as $indeks=>$pesan_tampil) {
			$noPesan++;
			echo " $noPesan. $pesan_tampil <br>";
		}
		echo "</div> <br>";
		}
		else
		{
		#simpan Transakasi
		$notransaksi=buatkode("tabelpembelian","NP-");
		$sqlsimpan3="INSERT INTO tabelpembelian SET 
		nobeli='$notransaksi',
		tglbeli='".inggrisTgl($_POST['cmbtanggal'])."',
		kodesupplier='$cmbsupplier',
		keterangan='$txtketerangan',
		kode='".$dataku1['kode']."'";
		$datasimpan3=mysql_query($sqlsimpan3,$koneksidb) or die ("Gagal Simpan 2 : ".mysql_error());
		#ambil semua data dari user yang login
		$sqlsimpan4="select *from temp_beli where kode='".$dataku1['kode']."'";
		$qrysimpan4=mysql_query($sqlsimpan4,$koneksidb) or die ("Gagal Simpan 3 : ".mysql_error());
		while($datasimpan4 = mysql_fetch_array($qrysimpan4)){
		$datakode =$datasimpan4['kodebarang'];
		$dataharga=$datasimpan4['hargabeli'];
		$datajumlah=$datasimpan4['jumlah'];
		#masukan semua barang ke tabelbeli_item
		$itemsql="insert into tabelbeli_item set nobeli='$notransaksi',kodebarang='$datakode',hargabeli='$dataharga',jumlah='$datajumlah'";
		mysql_query($itemsql,$koneksidb) or die ("Gagal Simpan 4 : ".mysql_error());
		#update stok
		$sqlstok="Update tabelbarang set stok= stok + $datajumlah, hargabeli='$dataharga' where kodebarang='$datakode'";
		mysql_query($sqlstok,$koneksidb) or die ("Gagal Query Update Stok".mysql_error());
		}
		$sqlhapus="delete from temp_beli where kode ='".$dataku1['kode']."'";
		mysql_query($sqlhapus, $koneksidb) or die ("Gagal Query Update Stok".mysql_error());
		}
}
$datakode=buatkode("tabelpembelian","NP-");
$datatanggal=isset($_POST['cmbtanggal']) ? $_POST['cmbtanggal']:date("d-m-Y");
$dataket=isset($_POST['txtket']) ? $_POST['txtket']:"";
$datasupplier=isset($_POST['cmbsupplier']) ? $_POST['cmbsupplier']:"kosong";

?>
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" target="_self">
<table class="table-common" cellpadding="2" cellspacing="0">
<tr>
	<th colspan="2">Pembelian</th>
</tr>
<tr>
	<td width="112">No Pembelian</td>
    <td width="539"><input name="txtnobeli" type="text" disabled="disabled" value="<?php echo $datakode; ?> " size="20" maxlength="20" style="height:25px"></td>
</tr>
<tr>

	<td>Tgl Pembelian</td>
    <td><input name="cmbtanggal" id="cmbtanggal" type="text" class="tcal" value="<?php echo $datatanggal; ?>" style="height:25px" /></td>
</tr>
<tr>
	<td>Supplier</td>
    <td>
      <select name="cmbsupplier" style= "height:25px" >
      <option value="kosong">--Pilih--</option>
      <?php 
	  $sqlsup = "SELECT *from tabelsupplier order by kodesupplier";
	  $qrysup=mysql_query($sqlsup,$koneksidb) or die ("Gagal Query Supplier: ".mysql_error());
	  while($dataku=mysql_fetch_array($qrysup)){
	  if($datasupplier==$dataku['kodesupplier']){
	  $cek="selected";
	  }else{
	  $cek="";
	  }
	  echo "<option value='$dataku[kodesupplier]'$cek>$dataku[kodesupplier] > $dataku[namasupplier]</option>";
	  }
	  ?>
      </select>    </td>
</tr>
<tr>
	<td>Keterangan</td>
    <td><input name="txtket" type="text" style="height:25px" value="<?php echo $dataket; ?>" size="50" maxlength="50"/></td>
</tr>
<tr>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
</tr>
<tr>
<script type="text/javascript">
function buka_popup(){  
 window.open('caribarang.php', '', 'width=900, height=400, menubar=yes,location=yes,scrollbars=yes, resizeable=yes, status=yes, copyhistory=no,toolbar=no,urledit=no');  
} 
</script>
  <td>Kode Barang</td>
  <td><input name="txtkode" type=text size="15" maxlength="15" style="height:25px"  />
        <a href="javascript:buka_popup();">Cari Barang</a>
</tr>
<tr>
  <td>Harga Beli</td>
  <td><input name="txthrgbeli" type=text size="15" maxlength="12" style="height:25px" /></td>
</tr>
<tr>
  <td>Jumlah</td>
  <td ><input onBlur="if (value=='') {value='10'}" onFocus="if (value=='10') {value =''}"name="txtjumlah" type=text value="10" size="6" maxlength="6" style="height:25px" /> <input class="btn btn-primary btn-lg" type="submit" name="bttambah" id="bttambah" value="Tambah" style="cursor:pointer" /></td>
</tr>
<tr>
  <td>&nbsp;</td>
  <td><input class="btn btn-primary btn-lg" type="submit" name="btsimpan" id="btsimpan" value="Simpan Transaksi" style="cursor:pointer"  /></td>
</tr>
</table>

<table width="100%" class="table-list">
<tr>
<td colspan="7">&nbsp;</td>
</tr>
<tr>
<th width="3%" bgcolor="#CCCCCC">No</th>
<th width="12%" bgcolor="#CCCCCC">Kode</th>
<th width="33%"bgcolor="#CCCCCC">Nama Barang</th>
<th width="17%"bgcolor="#CCCCCC">Harga Beli</th>
<th width="7%"bgcolor="#CCCCCC">Jumlah</th>
<th width="20%"bgcolor="#CCCCCC">Harga Total</th>
<th width="8%"bgcolor="#CCCCCC">Ket</th>
</tr>


<?php 
$tmpsql="SELECT temp_beli.*,tabelbarang.namabarang FROM temp_beli,tabelbarang WHERE temp_beli.kodebarang=tabelbarang.kodebarang
AND temp_beli.kode='".$dataku1['kode']."' ORDER BY id";
$tmpqry=mysql_query($tmpsql,$koneksidb) or die ("Ambil Tmp Error : ".mysql_error());
$nomor=0; $subtotal=0; $totalbelanja=0; $jumlahbarang=0;
while ($datatmpku = mysql_fetch_array($tmpqry)){
$nomor++;
$id=$datatmpku['id'];
$jumlahbarang=($jumlahbarang + $datatmpku['jumlah']); 
$subtotal=($datatmpku['hargabeli']*$datatmpku['jumlah']);
$totalbelanja=$totalbelanja+$subtotal;

?>
<tr>
<td> <?php echo $nomor; ?> </td>
<td> <?php echo $datatmpku['kodebarang']; ?></td>
<td> <?php echo $datatmpku['namabarang']; ?></td>
<td> <?php echo format_angka($datatmpku['hargabeli']); ?></td>
<td> <?php echo $datatmpku ['jumlah']; ?></td>
<td> <?php echo format_angka($subtotal); ?></td>
<td align="center"><a href="?Act=Hapus&id=<?php echo $id; ?>" target="_self"> Hapus</a></td>
</tr>
<?php }?> 
<tr>
<td colspan="4" bgcolor="#CCCCCC" align="right"><b>Total Beli</b></td>
<td bgcolor="#CCCCCC"> <strong> <?php echo $jumlahbarang ; ?> </strong></td>
<td bgcolor="#CCCCCC"> Rp. <?php echo format_angka($totalbelanja); ?></td>
<td bgcolor="#CCCCCC">&nbsp;</td>
</tr>
</table>
</form>