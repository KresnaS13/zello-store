<font face="Times New Roman, Times, serif"><?php
include_once "config/koneksi.php";
?>
<?php
$mysql = "SELECT * FROM profil order by id_perus asc";
$myqry = mysql_query ($mysql, $koneksi) or die ("Query Error !".mysql_error());
$myData = mysql_fetch_array($myqry);
?>
<table width="486" border="0" class="table table-bordered table-condensed">
<tr bgcolor="#EEEEEE">
<td colspan="2"><font color="#00CCFF"><h2><?php echo $myData['nm_perus']?></h2></font></td>
</tr>
<tr>
<td width="81">Profil</td>
<td width="395"><?php echo $myData['profil']?></td>
</tr>
<tr>
<td>Alamat </td>
<td><?php echo $myData['almt_perus']?></td>
</tr>
<tr>
<td>Telepon</td>
<td><?php echo $myData['telp']?></td>
</tr>
<tr>
<td>E-mail | FB </td>
<td><?php echo $myData['email']?></td>
</tr>
<tr>
<td>Bank</td>
<td><?php echo $myData['bank']?></td>
</tr>
<tr>
<td>No Rekening</td>
<td><?php echo $myData['no_rek']?></td>
</tr>
<tr>
<td>Atas Nama</td>
<td><?php echo $myData['atas_nm']?></td>
</tr>
</table></font>
<br />
<br />
<strong>Jam Kerja :</strong> <br />
<p>SENIN - SABTU = 08.00 - 21.00 WIB</p>
<p>MINGGU 		 = LIBUR</p>