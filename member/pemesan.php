
<?php
require "../config/koneksi.php";
?>

<?php
//menampilkan id pembeli
$idbeliq="SELECT * FROM pemesan_detail order by id_beli desc";
$id= mysql_query ($idbeliq, $koneksi);
$belitemp = mysql_fetch_array($id);
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
$namapemesan=(isset($_SESSION['nama'])) ? $_SESSION['nama'] :"";
?>
<?php
$sqltemp="SELECT * FROM totsem order by id desc";
$qrytemp= mysql_query ($sqltemp, $koneksi);
$datatemp = mysql_fetch_array($qrytemp);

 //mysql_query("truncate table totsem");
?>

<?php
$nm_pemesan=isset($_POST['nm_pemesan']) ?$_POST['nm_pemesan'] :"";
$alamat=isset($_POST['alamat']) ?$_POST['alamat'] :"";
$telp=isset($_POST['telp']) ?$_POST['telp'] :"";
$tgl_pesan=date('Y-m-d');
//$kd_pos=isset($_POST['kd_pos']) ?$_POST['kd_pos'] :"";

$namapattern = '/^[\ \][a-zA-Z]+$/';
$alamatpattern='/^[\ \][a-zA-Z0-9:_.-]+$/';
$kotapattern = '/^[\ \][a-zA-Z]+$/';
$telppattern = '/^[0-9]{11,12}?$/';
//$kdpospattern = '/^\d{5}([\-]\d{5})?$/';

#jika tombol simpan di klik
if (isset($_POST['kirim'])){
$pesanerror = array();
if (empty($nm_pemesan)){
$pesanerror[]="Nama Pemesan Masih Kosong!";
}elseif(!preg_match($namapattern,$nm_pemesan)){
$pesanerror[]="Nama Harus diisi Huruf!";
}
if(empty($alamat)){
$pesanerror[]="Alamat Masih Kosong!";
}elseif(!preg_match($alamatpattern,$alamat)){
$pesanerror[]="Alamat Hanya Boleh Menggunakan simbol (: _ . - !)";
}

if(empty($telp)){
$pesanerror[]="Telepon Masih Kosong";
}elseif(!preg_match($telppattern,$telp)){
$pesanerror[]="Telepon Hanya berisi angka antara 11-12 digit";
}
/*if(empty($kd_pos)){
	$pesanerror[]="Kode Pos Masih Kosong!";
}elseif(!preg_match($kdpospattern,$kd_pos)){
$pesanerror[]="Kode Pos Hanya Berisi Angka dan maksimal 5 digit";
}*/

#membaca data dalam form,
$tgl_pesan=$_POST['tgl_pesan'];
$totalbayar=$_POST['totalbayar'];
$biayakirim=$_POST['biayakirim'];
$status=$_POST['status'];


#cek SQL
$cekSql="SELECT * FROM pemesan WHERE nm_pemesan='$nm_pemesan'";
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
$idpemesan = (isset($_SESSION['idpemesan'])) ? $_SESSION['idpemesan'] : "";

		$mySql  	= "INSERT INTO pemesan (idpemesan, id_beli, nm_pemesan, alamat, telp, tgl_pesan, biayakirim, totalbayar, status) VALUES ('$idpemesan','$_POST[id_beli]','$nm_pemesan','$alamat','$telp','$tgl_pesan','$biayakirim','$totalbayar','$status')";
		
		$myQry=mysql_query($mySql, $koneksi) or die ("Gagal query".mysql_error());
		if($myQry){
	echo "<meta http-equiv='refresh' content='0; url=?hal=Konfirmasi'>";
		}
			}
}
$tgl_pesan=date('Y-m-d');
#isi Smentara field

?>


<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" name="frmuser">
  <table border=0 >
  <h5>Silahkan Cek data pemesan dibawah ini dengan benar :</h5><br />
        <input type='hidden' name='idpemesan' size=15  value= <?php echo "".$_SESSION['idpemesan'].""; ?> maxlength="6" readonly="readonly"> 
        <tr>
        <td>NO ORDER</td>
        <td><strong><input type="text" name="id_beli" value="<?php echo $belitemp['id_beli'];?>" readonly="readonly"/></strong></td>
         </tr>
        <tr>
        <td></td>
        <td colspan="2"><font color="#FF0000"> No. Order Jangan Sampai Lupa Karena Nantinya dipergunakan untuk Konfirmasi Pemesanan</font></td>
        </tr>            
		<tr>
            <td>Nama</td>
            <td><input name='nm_pemesan' type=text  value="<?php echo $namapemesan ?>" size=20 readonly="readonly"></td>
        </tr>
        <tr>
               <td>Alamat</td>
            <td> <textarea name='alamat' cols='25' rows='5' placeholder="Contoh : Jl. Dr. Soeparno No.18, Karangwangkal, Purwokerto Utara, Banyumas"><?php echo "".$_SESSION['alamat'].""; ?></textarea></td>
            <td><font color="#FF0000"> *Pastikan Alamat Anda dengan benar dan lengkap</font></td>
        </tr>
     	<tr>
            <td>Telepon</td>
            <td>  <input name='telp' type=text value="<?php echo "".$_SESSION['telepon'].""; ?>" size=20></td>
        </tr>
        <input name='tgl_pesan' type=hidden value="<?php echo $tgl_pesan; ?>" size=20>
      <!--  <tr>
            <td>Kode Pos</td>
            <td><input name='kd_pos' type=text value="<?php echo $kd_pos; ?>" size=20></td>
        </tr>-->
        <input name='biayakirim' type="hidden" value="<?php echo $datatemp['biayakirim'];?>" size=20>
        <input name='totalbayar' type="hidden" value="<?php echo $datatemp['totalbayar'];?>" size=20><input name='status' type=hidden value="Baru" size=20>
        <tr>
            <td></td><td>
            <input type="submit" name="kirim" value="Kirim" />
           </td>
        </tr>
        </table>
      
</form>
<?php /*?><?php
include "datapemesan_cek.php";
?><?php */?>