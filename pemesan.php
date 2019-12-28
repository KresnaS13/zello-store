
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
$sqltemp="SELECT * FROM totsem order by id desc";
$qrytemp= mysql_query ($sqltemp, $koneksi);
$datatemp = mysql_fetch_array($qrytemp);

 //mysql_query("truncate table totsem");
?>

<?php
$datakode=kdauto("pemesan","PS");
$nm_pemesan=isset($_POST['nm_pemesan']) ?$_POST['nm_pemesan'] :"";
$alamat=isset($_POST['alamat']) ?$_POST['alamat'] :"";
$kota=isset($_POST['kota']) ?$_POST['kota'] :"";
$email=isset($_POST['email']) ?$_POST['email'] :"";
$telp=isset($_POST['telp']) ?$_POST['telp'] :"";
$tgl_pesan=date('Y-m-d');
$kd_pos=isset($_POST['kd_pos']) ?$_POST['kd_pos'] :"";

$namapattern = '/^[\ \][a-zA-Z]+$/';
$alamatpattern='/^[\ \][a-zA-Z0-9:_.-]+$/';
$kotapattern = '/^[\ \][a-zA-Z]+$/';
$telppattern = '/^[0-9]{11,12}?$/';
$kdpospattern = '/^\d{5}([\-]\d{5})?$/';
$emailpattern='/^[a-zA-Z0-9._-]+@[a-zA-Z]+\.[a-zA-Z]+$/';

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
$pesanerror[]="Alamat tidak boleh menggunakan tanda koma(,) & Hanya Boleh Menggunakan simbol (:_.-!)";
}
if(empty($kota)){
$pesanerror[]="Kota Masih Kosong!"; 
}elseif(!preg_match($kotapattern,$kota)){
$pesanerror[]="Kota Hanya Berisi Huruf!";
}
if(empty($email)){
	$pesanerror[]="Email Masih Kosong !";
}elseif(!preg_match($emailpattern,$email)){
$pesanerror[]="Email Tidak Valid (ex : xxxxxx@xxx.com";
}
if(empty($telp)){
$pesanerror[]="Telepon Masih Kosong";
}elseif(!preg_match($telppattern,$telp)){
$pesanerror[]="Telepon Hanya berisi angka antara 11-12 digit";
}
if(empty($kd_pos)){
	$pesanerror[]="Kode Pos Masih Kosong!";
}elseif(!preg_match($kdpospattern,$kd_pos)){
$pesanerror[]="Kode Pos Hanya Berisi Angka dan maksimal 5 digit";
}

#membaca data dalam form,
$tgl_pesan=$_POST['tgl_pesan'];
$totalbayar=$_POST['totalbayar'];
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
		$kodeBaru	= kdauto("pemesan", "PS");
		$mySql  	= "INSERT INTO pemesan (idpemesan, nm_pemesan, alamat, kota, email, telp, tgl_pesan, kd_pos, totalbayar, status) VALUES ('$kodeBaru','$nm_pemesan','$alamat','$kota','$email','$telp','$tgl_pesan','$kd_pos','$totalbayar','$status')";
		
		$myQry=mysql_query($mySql, $koneksi) or die ("Gagal query".mysql_error());
		if($myQry){
	echo "<meta http-equiv='refresh' content='0; url=?page=Konfirmasi'>";
		}
			}
}
$tgl_pesan=date('Y-m-d');
#isi Smentara field

?>


<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" name="frmuser">
  <table border=0 >
  <h5>Silahkan isi data pemesan dibawah ini dengan benar :</h5>
        <tr>
                <td><input type='hidden' name='idpemesan' size=15  value= <?php echo $datakode; ?> maxlength="6" disabled="disabled">
		                               </td>
        </tr>
		<tr>
            <td>Nama</td>
            <td><input name='nm_pemesan' type=text value="<?php echo $nm_pemesan; ?>" size=20></td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td> <textarea name='alamat' cols='25' rows='5'><?php echo $alamat; ?></textarea></td>
        </tr>
        <tr>
        <td></td>
        <td><font face="Times New Roman, Times, serif" color="#FF0000">*) Alamat pengiriman harus di isi lengkap, termasuk Desa (Rt, Rw), No. Rumah , Kecamatan & Kabupaten</font></td>
        </tr>
		<tr>
            <td>Kota</td>
            <td> <input name='kota' type=text value="<?php echo $kota; ?>" size=20></td>
        </tr>
		<tr>
            <td>Email</td>
            <td> <input name='email' type=text value="<?php echo $email; ?>" size=20></td>
        </tr>
        <tr>
            <td>Telepon</td>
            <td>  <input name='telp' type=text value="<?php echo $telp; ?>" size=20></td>
        </tr>
        <tr>
            <td> <input name='tgl_pesan' type=hidden value="<?php echo $tgl_pesan; ?>" size=20></td>
        </tr>
        <tr>
            <td>Kode Pos</td>
            <td><input name='kd_pos' type=text value="<?php echo $kd_pos; ?>" size=20></td>
        </tr>
        <tr>
            <td><input name='totalbayar' type="hidden" value="<?php echo $datatemp['totalbayar'];?>" size=20></td>
        </tr>
        <tr>
            <td><input name='status' type=hidden value="Baru" size=20></td>
        </tr>
        <tr>
            <td></td><td>
            <input type="submit" name="kirim" value="Kirim" />
           </td>
        </tr>
        </table>
      
</form>
