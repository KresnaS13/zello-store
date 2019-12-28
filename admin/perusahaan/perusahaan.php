<font face="MS Serif, New York, serif"><?php
include "../config/koneksi.php";

?>
 <?php

$mysql= "SELECT * FROM profil order by id_perus asc ";
$myqry = mysql_query($mysql, $koneksi) or die ("Query Salah ;". mysql_error());

while 
($myData = mysql_fetch_array($myqry)){
	$Kode = $myData["id_perus"];
?>
<caption><center><font color="#0000FF"><b>PROFIL PERUSAHAAN<b></center></font></caption>
<hr />
  <table border="1" class="table table-bordered table-condensed">
       <tr>
      <td>Id Perusahaan</td>
      <td><?php echo $myData['id_perus'] ?></td>
      </tr>
      <tr>
      <td>Nama Perusahaan</td>
      <td><?php echo $myData['nm_perus'] ?></td>
      </tr>
      <tr>
      <td>Alamat</td>
      <td><?php echo $myData['almt_perus'] ?></td>
      </tr>
      <tr>
      <td>Telepon</td>
      <td><?php echo $myData['telp'] ?></td>
      </tr>
      <tr>
      <td>E-mail</td>
      <td><?php echo $myData['email'] ?></td>
      </tr>
      <tr>
      <td>Nama Bank</td>
      <td><?php echo $myData['bank'] ?></td>
      </tr>
      <tr>
      <td>No Rekening</td>
      <td><?php echo $myData['no_rek'] ?></td>
      </tr>
      <tr>
      <td>Atas Nama</td>
      <td><?php echo $myData['atas_nm'] ?></td>
      </tr>
      <tr>
      <td>Profil</td>
      <td><?php echo $myData['profil'] ?></td>
      </tr>
          <tr>
      <td colspan="2"><div align="right"><a href="?index=ubah-perusahaan&amp; Kode=<?php echo $Kode; ?>" target="_self"> <font color="#0000FF"> <i class="icon-pencil"></i>Edit</font></a> ||
<a href="?index=hapus-perusahaan&amp; Kode=<?php echo $Kode; ?>" target="_self" onclick="return confirm ('Apakah Anda Yakin Ingin Menghapus Data Ini ?')"><font color="#0000FF"><i class="icon-trash"></i>Hapus</font></a></div></td>
    </tr>
    
    <?php
}
?>
 </div>
    </table>

</font>