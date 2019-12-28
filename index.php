<?php
include "config/koneksi.php";
?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>
    <meta charset="utf-8">
    <title>Zello Store</title>
    <meta name="viewport" content="initial-scale = 1.0, maximum-scale = 1.0, user-scalable = no, width = device-width">

    <link rel="stylesheet" href="css/style.css" media="screen">
    <link rel="stylesheet" href="css/style.responsive.css" media="all">
    <link rel="stylesheet" href="admin/font-awesome-4.1.0/css/font-awesome.min.css" media="all">


    <script src="jquery.js"></script>
    <script src="script.js"></script>
    <script src="script.responsive.js"></script>




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
<!-- Tulisan di Header
    <div class="art-shapes">
<h1 class="art-headline" data-left="13.29%">
    <a href="#">Enter Site Title</a>
</h1>
<h2 class="art-slogan" data-left="11.35%">Enter Site Slogan</h2>
</div>     -->          
</header>
<nav class="art-nav clearfix">
    <ul class="art-hmenu">
    <li><a href="?page=home" class="active"><i class="fa fa-home"></i>&nbsp;Beranda</a></li>
    <li><a href="?page=brosur">Brosur Harga</a></li> 
    <li><a href="?page=TentangPerusahaan">Tentang Kami</a></li>
    <li><a href="?page=syaratdanketentuan">Syarat Dan Ketentuan</a></li> 

<!--   <li><a href="?page=Pengunjung">Buku Tamu</a></li>
-->    </ul> 
   </nav>
<div class="art-sheet clearfix">
      <div class="art-layout-wrapper clearfix">
         <div class="art-content-layout">
            <div class="art-content-layout-row">
               
 <!--Sidebar-->
 <div class="art-layout-cell art-sidebar1 clearfix"><div class="art-block clearfix">
        <div class="art-blockheader">
            <h3 class="t">Login Member</h3>
        </div>
        <div class="art-blockcontent">
        
        <div><br>
<form action="log_member.php?op=in" method="post">
   <p><input type="text" name="email" placeholder ="email"style="width:90%"></p> <br>
  <p> <input type="password" name="password" placeholder ="password" style="width:90%"></p><br>
<input type="submit" name="login" value="Login" style="width:30%">&nbsp;&nbsp;<a href="?page=pendaftaran"><b>DAFTAR MEMBER</b></a>   
</form>
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
    <td><h6><i class="fa fa-folder"></i>&nbsp;&nbsp;<a href='?page=kategori&amp; Kode=<?php echo $Kode;?>'><?php echo $data['nm_kategori'];?></a></h6></td>
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
      	<?php include "config/calendar.php"; ?>

</div></div>
</div>

<div class="art-block clearfix">
        <div class="art-blockheader">
            <h3 class="t">Mitra Kerjasama</h3>
        </div>
        <div class="art-blockcontent"><div>
<center><a href="http://www.jne.co.id" target="_blank"><img src="img/jne.png"></a></center>
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
	include 'url.php';
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