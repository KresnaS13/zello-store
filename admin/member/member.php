<font face="Times New Roman, Times, serif">
<?php
include "../config/koneksi.php";
?>


<br />
<table border="1" class="table table-condensed table-bordered">
 
    <tr bgcolor="#CCCCCC">
      <td><div align="center">ID Member</div></td>
      <td><div align="center">Nama</div></td>
      <td><div align="center">Email</div></td>
      <td><div align="center">Password</div></td>
      <td><div align="center">Level</div></td>
      <td colspan="2"><div align="center">Keterangan</div></td>
    </tr>
   
     
    <?php
$mysql= "SELECT * FROM member order by idpemesan asc";
$myqry = mysql_query($mysql, $koneksi) or die ("Query Salah ;". mysql_error());

while 
($myData = mysql_fetch_array($myqry)){
	$Kode = $myData["idpemesan"];
?>
    <tr>
      <td><?php echo $myData['idpemesan'] ?></td>
      <td><?php echo $myData['nama'] ?></td>
      <td><?php echo $myData['email'] ?></td>
      <td><?php echo $myData['passwords'] ?></td>
        <td><?php echo $myData['level'] ?></td>
      <td align="center"><div align="center"><a href="?index=ubah-member&amp; Kode=<?php echo $Kode; ?>" target="_self">Ubah</a>  | 
      <a href="?index=hapus-member&amp; Kode=<?php echo $Kode; ?>" target="_self" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data ini?')">Hapus</a></div></td> </tr>
    
    <?php
}
?>
    </table>
</font>