<!DOCTYPE html>
<html>
<head>
	<title>Data harga</title>
</head>
<body>
<?php
include "../config/koneksi.php";

?>

<?php
//fungsi untuk mengkonversi size file
function formatBytes($bytes, $precision = 2) { 
    $units = array('B', 'KB', 'MB', 'GB', 'TB'); 

    $bytes = max($bytes, 0); 
    $pow = floor(($bytes ? log($bytes) : 0) / log(1024)); 
    $pow = min($pow, count($units) - 1); 

    $bytes /= pow(1024, $pow); 

    return round($bytes, $precision) . ' ' . $units[$pow]; 
} 
?>
<font face="Britannic Bold, Century"><h4 align="center">DAFTAR FILE ZELLO STORE</h4>
</font>

<a href="?index=uploadfile">Upload File</a>
<div align="center">
<div class="table-responsive">
              <table width="529" border="1">
                <tr bgcolor="#73B3F2">
                  <th width="46">No.</th>
                  <th width="156">Tanggal Upload</th>
                  <th width="154">Nama File</th>
                  <th width="54">Tipe</th>
                  <th width="85">Ukuran</th>
                  <th width="130">Ket</th>
                  </tr>
         <?php
				$sql = mysql_query("SELECT * FROM download ORDER BY id DESC");
				if(mysql_num_rows($sql) > 0){
					$no = 1;
					while($data = mysql_fetch_assoc($sql)){
						echo '
				<tr bgcolor="#fff">
					<td align="center">'.$no.'</td>
					<td align="center">'.$data['tanggal_upload'].'</td>
					<td><a href="'.$data['file'].'">'.$data['nama_file'].'</a></td>
					<td align="center">'.$data['tipe_file'].'</td>
					<td align="center">'.formatBytes($data['ukuran_file']).'</td>
					<td align="center"><a href=# >Ubah</a> || <a href=?index=hapusfile>Hapus</a> </td>

				</tr>
						';
						$no++;
					}
				}else{
					echo '
					<tr bgcolor="#fff">
						<td align="center" colspan="6" align="center">Tidak ada data!</td>
					</tr>
					';
				}
				?>
                </table></div>
</div></p>
       

</body>
</html>