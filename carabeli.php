<font face="Times New Roman, Times, serif"><table class="table table-bordered table-condensed">
<tr>
<td bgcolor="#CCCCCC"><font color="#FFFFFF"><b><center>Syarat dan Ketentuan Pembelian Produk Kami</center></b></font></td>
</tr>
<tr>
<td></td>
</tr>
<tr>
<td><font color="#0033FF"><b>1. Daftar Member</b></font><br />
<p>Anda harus medaftar sebagai member terlebih dahulu untuk pembelian produk kami. <br />
Isikan data identitas anda dengan benar sesuai dengan (Kartu Pelajar, KTP, SIM dll)</p>
</td>
</tr>
<tr>
<td><font color="#0033FF"><b>2. Login Member</b></font><br />
<p>Anda harus Login terlebih dahulu untuk dapat melakukan transaksi pembelian.</p>
</td>
</tr>
<tr>
<td><font color="#0033FF"><b>3. Pilih Barang</b></font><br />
<p>Anda dapat memilih barang yang ada pada website kami dengan mengklik tombol &nbsp;Detail barang pada masing-masing &nbsp;barang lalu klik beli dengan mencantumkan jumlah yang akan dibeli..</p>
</td>
</tr>
<tr>
<td><font color="#0033FF"><b>4. Keranjang Belanja</b></font><br />
<p>Barang yang anda pilih akan muncul pada halaman Keranjang Belanja. Anda dapat &nbsp;memilih lagi barang yang ada &nbsp;diwebsite kami dengan mengklik link Pilih Barang. Jika &nbsp;anda sudah selesai dalam memilih barang, selanjutnya &nbsp;anda dapat memilih link &nbsp;Selesai Memilih Barang untuk melanjutkan ke form Pengecekan data pemesanan</p></td>
</tr>
<tr>
<td><font color="#0033FF"><b>5. Pembayaran</b></font><br />
<p>Sebelum kami mengirimkan barang yang anda pesan, &nbsp;terlebih dahulu anda harus &nbsp;membayar sebesar pembelian &nbsp;barang anda ditambah biaya kirim</p>
  
<p>Setelah anda mentransfer pembayaran, harap anda menghubungi kami agar kami &nbsp;segera mengecek transaksi &nbsp;dari anda dan untuk selanjutnya memprosesnya.</p></td>
</tr>
<td><font color="#0033FF"><b>7. Pengiriman Barang</b></font><br />
<p>Kami akan segera mengirimkan barang yang anda pesan ke alamat yang tercantum di identitas.</p> 
</td>
</tr>
</table>

<?php
include "config/koneksi.php";

$sql = "SELECT * FROM profil";
$query = mysql_query($sql,$koneksi);
$tampil = mysql_fetch_array($query)

?>
<table class="table table-bordered table-condensed">
<tr>
<td bgcolor="#CCCCCC" colspan="2"><strong><font face="Arial Black">Konfirmasi Pemesanan</font></strong></td>
</tr>
<tr>

<td><div align="center"><strong>Melalui E-mail, Telepon / SMS</strong></div></td>
</tr>
<tr>
<td><p><br />
  	<font color="#FC5F43"><b>Telepon<br />
	<?php echo$tampil['telp']?></b><br /><br />

	<b>E-Mail<br />
	<?php echo$tampil['email']?></b></font>
    <hr />
  	</p>
  	<p></font><br />
	<b>KIRIM SMS:</b><br />
 <font color="#0033FF"><h5>Ketik : No. Rekening (SPASI) Atas Nama Rekening Anda (SPASI) NO. ORDER = Jumlah Kirim</font><br />
  </p><br /></h5>
  <p><font style="font-size:14px"><font color="#0000FF">(<b>Contoh</b>: 9810320696 Fulansari <b>PBL0008</b> = 200.000)</p></font>
  <h5>atau <br /><br />
Foto Bukti Transfer Pembayaran</h5></b></p>
 	<br />
<p><b>KIRIM DATA KE NOMOR DIATAS</b></p>
  </td>
</tr>
</table>

</font>