<font face="Times New Roman"><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
</font>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>
<font face="Times New Roman"><br />
<br />
</font><font face="Britannic Bold, Century"><center>
<b>DAFTAR HARGA ASSESORIES HANDPHONE DAN KOMPUTER ZELLO</b>
</center>
</font><HR />
<font face="Trebuchet MS, Arial, Helvetica, sans-serif">File-File dibawah ini bisa anda download, dengan mengklik Nama File yang anda inginkan..<br />
Terima Kasih atas kunjungan anda ke <b>Zello Store</b></font><br />
<br />
<font face="Times New Roman, Times, serif">
<div align="center">
  <table width="507" border="1">
    <tr bgcolor="#CCCCCC">
      <td width="45"><div align="center"><font face="Times New Roman"><b>No</b></font></div></td>
      <td width="123"><div align="center"><font face="Times New Roman"><b>Tanggal Upload</b></font></div></td>
      <td width="179"><div align="center"><font face="Times New Roman"><b>Nama File</b></font></div></td>
      <td width="47"><div align="center"><font face="Times New Roman"><b>Tipe</b></font></div></td>
      <td width="79"><div align="center"><font face="Times New Roman"><b>Ukuran</b></font></div></td>
    </tr>
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
      <?php
	  include"../config/koneksi.php";

	  include"../config/fungsi_indotgl.php";
	  
  
				$sql = mysql_query("SELECT * FROM download ORDER BY id DESC");				
				while($data = mysql_fetch_array($sql)){
						$no = 0;
						$no++;
				$tanggal=tgl_indo($data['tanggal_upload']);

						echo '
						<tr bgcolor="#fff">
							<td align="center">'.$no.'</td>
							<td align="center">'.$tanggal.'</td>
							<td><a href="../admin/'.$data['file'].'">'.$data['nama_file'].'</a></td>
							<td align="center">'.$data['tipe_file'].'</td>
							<td align="center">'.formatBytes($data['ukuran_file']).'</td>
						</tr>
						';
						
					}
				?>

  </table>
</div></font>
</body>
</html>