<?php
session_start();

//cek apakah user sudah login
if(!isset($_SESSION['idpemesan'])){
    die("
		<div align='center'>
			<p>Maaf... Anda belum melakukan login, silahkan kembali login dahulu :</p>
			<button type='reset' onclick='history.back(-1)'>Kembali</button>
		</div>
		");//jika belum login jangan lanjut..
}

//cek level user
if($_SESSION['level']!="member"){
    die("Anda bukan Member Zello Store");//jika bukan marketing jangan lanjut
}
?>
<?php
require "../config/koneksi.php";

?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>
    <meta charset="utf-8">
    <title>Zello Store</title>
    <meta name="viewport" content="initial-scale = 1.0, maximum-scale = 1.0, user-scalable = no, width = device-width">

    <link rel="stylesheet" href="../css/style.css" media="screen">
    <link rel="stylesheet" href="../css/style.responsive.css" media="all">


    <script src="../jquery.js"></script>
    <script src="../script.js"></script>
    <script src="../script.responsive.js"></script>




<style>.art-content .art-postcontent-0 
.layout-item-0 { margin-bottom: 1px;  }
.art-content .art-postcontent-0 
.layout-item-1 { border-right-style:solid;border-right-width:1px;border-right-color:#DDE6F3; padding-right: 10px;padding-left: 10px;  }
.ie7 .post .layout-cell {border:none !important; padding:0 !important; }
.ie6 .post .layout-cell {border:none !important; padding:0 !important; }

</style>
</head>
<body>
<div id="art-main">
<header class="art-header clearfix">
          
</header>
<nav class="art-nav clearfix">
    <ul class="art-hmenu">
    <li><a href="?hal=beranda" class="active">Beranda</a></li>
    <li><a href="?hal=CaraBeli">Syarat dan Ketentuan</a></li> 
    <li><a href="?hal=brosur">Brosur Harga</a></li> 
     </ul> 
   </nav>
<div class="art-sheet clearfix">
      <div class="art-layout-wrapper clearfix">
         <div class="art-content-layout">
            <div class="art-content-layout-row">
               
 <!--Sidebar-->
 <div class="art-layout-cell art-sidebar1 clearfix"><div class="art-block clearfix">
        <div class="art-blockheader">
            <h3 class="t">Member Zello Store</h3>
        </div>
        <div class="art-blockcontent">
        
        <div><br>
<?php include "member.php"?>
</div></div>
</div>

<div class="art-block clearfix">
        <div class="art-blockheader">
            <h3 class="t">Kategori</h3>
        </div>
        <div class="art-blockcontent"><div>
  <font face="Britannic Bold"><?php
	$mysql ="SELECT * FROM kategori order by kd_kategori asc";
	$query = mysql_query($mysql, $koneksi);
	while ( $data = mysql_fetch_array($query)){
	$Kode = $data['kd_kategori'];
	
	?> 
    <table>
    <tr>
    <td><h6><p><b>* <a href='?hal=kategori&amp; Kode=<?php echo $Kode;?>'><?php echo $data['nm_kategori'];?></a></b></p></h6></td>
    </tr>
    </table>
    <?php
	}
	?></font>
</div></div>
</div>

<div class="art-block clearfix">
        <div class="art-blockheader">
            <h3 class="t">Kalender</h3>
        </div>
        <div class="art-blockcontent"><div>
      	<?php include "../config/calendar.php"; ?>

</div></div>
</div>

<div class="art-block clearfix">
        <div class="art-blockheader">
            <h3 class="t">Mitra Kerjasama</h3>
        </div>
        <div class="art-blockcontent"><div>
<center><a href="http://www.jne.co.id" target="_blank"><img src="../img/jne.png"></a></center>
</div></div>
</div>

</div>
    		<div class="art-layout-cell layout-item-1" style="width: 100%" >
            
<!-- Konten-->
 <div class="art-layout-cell art-content clearfix">
               		<article class="art-post art-article">
                                
               <div class="art-postcontent art-postcontent-0 clearfix">
               		<div class="art-content-layout-wrapper layout-item-0">
						<div class="art-content-layout">
    				<div class="art-content-layout-row">
         <?php
	include 'urlmember.php';
	?>
    		</div>
   		 </div>
		</div>
	</div>
</div>
<div style="margin-left: 2em"> </div></div>
<!--/Kontent -->

                    </div>
                </div>
            </div>

<footer class="art-footer clearfix">
<p style="text-align: center;"><h3>Zello Store Accesories &copy; 2015</h3></p>
</footer>

</body>
</html>