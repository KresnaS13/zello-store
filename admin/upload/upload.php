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
<!DOCTYPE html>
<html>
<head>
	<title>Upload File</title>
</head>
<body>

<font face="Britannic Bold, Century"><h3>Halaman Upload File</h3>
</font>            <p>Upload file Anda dengan melengkapi form di bawah ini. <br>
          File yang bisa di Upload hanya file dengan ekstensi <b>.doc, .xls, .ppt, .pdf, .rar</b> dan besar file (file size) maksimal hanya 1 MB.</p>
            
            <?php
		
			if(isset($_POST['upload'])){
				
//$dir_file = 'C:\xampp\htdocs\store\admin\upload\files\\';
if ( !file_exists("files")){
		mkdir("files");
	}

				$allowed_ext	= array('doc', 'docx', 'xls', 'xlsx', 'ppt', 'pptx', 'pdf', 'rar', 'zip');
				$file_name		= $_FILES['file']['name'];
				$file_ext		= strtolower(end(explode('.', $file_name)));
				$file_size		= $_FILES['file']['size'];
				$file_tmp		= $_FILES['file']['tmp_name'];
				
				$nama			= $_POST['nama_file'];
				$tgl			= date("Y-m-d");
				
				if(in_array($file_ext, $allowed_ext) === true){
					if($file_size < 1044070){
						$lokasi = 'upload/files/'.$nama.'.'.$file_ext;
						move_uploaded_file($file_tmp, $lokasi);
						$in = mysql_query("INSERT INTO download VALUES('', '$tgl', '$nama', '$file_ext', '$file_size', '$lokasi')");
						if($in){
							echo "<meta http-equiv='refresh' content='0; url=?index=data' ";
						}else{
							echo 'ERROR: Gagal upload file!';
						}
					}else{
						echo 'ERROR: Besar ukuran file (file size) maksimal 1 Mb!';
					}
				}else{
					echo 'ERROR: Ekstensi file tidak di izinkan!';
				}
			}
			
			?>
            
            <p>
            <form action="" method="post" enctype="multipart/form-data">
            <table width="100%" align="center" border="0" bgcolor="#eee" cellpadding="2" cellspacing="0" class="table-condensed">
            <tr>
            <td width="40%" align="right"><b>Nama File</b></td><td><b>:</b></td><td><input type="text" name="nama_file" size="40" required /></td></tr>
            <tr>
             <td width="40%" align="right"><b>Pilih File</b></td><td><b>:</b></td><td><input type="file" name="file" required /></td>
             </tr>
             <tr>
             <td>&nbsp;</td><td>&nbsp;</td><td><input type="submit" name="upload" value="Upload" /></td>
             </tr>
            </table>
            </form>
            </p>

</body>
</html>