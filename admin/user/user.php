<font face="MS Serif, New York, serif">
<?php
include "../config/koneksi.php";
?>

<?php
if (!isset($_SESSION['id'])){
	die ("Anda Harus Login");
}

?>

<a href="?index=tambah-user" class="btn tambah"><i class="icon-plus"></i>Tambah Data</a>
<br />
<table border="1" class="table table-condensed table-bordered">
 
    <tr bgcolor="#CCCCCC">
      <td><div align="center">Kode Pengguna</div></td>
      <td><div align="center">Username</div></td>
      <td><div align="center">Level</div></td>
      <td><div align="center">Keterangan</div></td>
    </tr>
   
     
    <?php
$mysql= "SELECT * FROM login order by id asc";
$myqry = mysql_query($mysql, $koneksi) or die ("Query Salah ;". mysql_error());

while 
($myData = mysql_fetch_array($myqry)){
	$Kode = $myData["id"];
?>
    <tr>
      <td><?php echo $myData['id'] ?></td>
      <td><?php echo $myData['username'] ?></td>
        <td><?php echo $myData['level'] ?></td>
      <td align="center"><div align="center"><a href="?index=ubah-user&amp; Kode=<?php echo $Kode; ?>" target="_self">Ubah</a></div></td> </tr>
    
    <?php
}
?>
    </table>
</font>