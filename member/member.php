
<?php
require "../config/koneksi.php";
?>
<link rel="stylesheet" href="../admin/font-awesome-4.1.0/css/font-awesome.min.css" />
<table>
<font style="font-size:18px"><font face="Monotype Corsiva">Selamat Datang,<br />
<b><?php echo "".$_SESSION['nama'].""; ?></b></font></font></td>
<br />
<br />
<tr>
<td><h6><i class="fa fa-edit"></i>&nbsp;&nbsp;<a href="?hal=ubah-member&amp;Kode=<?php echo "".$_SESSION['idpemesan'].""; ?>">Ubah Data Member</a></h6></td>
<td></td>
</tr>
</tr>
<tr>
<td><h6><i class="fa fa-shopping-cart"></i>&nbsp;&nbsp;<a href="?hal=keranjangbelanja">Keranjang Belanja</a></h6></td>
<td></td>
</tr>
<!--<tr>
<td><img src="../img/history.png"><a href="?hal=history-member">&nbsp;Histori Transaksi</a></td>
<td></td>
</tr>-->
<tr>
<td><h6><i class="fa fa-sign-out"></i>&nbsp;&nbsp;<a href="../log_member.php?op=out">&nbsp;Logout</a></h6></td>
<td></td>
</tr>
</table>
