<?php
session_start();

//cek apakah user sudah login
if(!isset($_SESSION['username'])){
    die("<div align='center'>
			<h1 style='color:red;'>Access Denied !</h1>
			<p>Maaf... Anda belum melakukan login, silahkan login dahulu :</p>
			<a href='../login.php'><button type='button'>LOGIN</button>
		</div>
		");
}
//cek level user
if ($_SESSION['level']!=="Admin"){
	 die ("Anda bukan Bagian Admin");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin &trade; Zello Store</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/sb-admin-2.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
              <a class="navbar-brand" href="?index=homeadmin">Selamat Datang Admin Zello Store</a>
            </div><!-- /.navbar-header -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                       <li>
                            <a class="active" href="?index=homeadmin"><i class="fa fa-dashboard fa-fw"></i> Beranda</a>
                        </li>
                        <li>
                            <a href="?index=user"><i class="fa fa-user fa-fw"></i> User</a>
                        </li>
                         <li>
                            <a href="?index=member"><i class="fa fa-fw fa-users"></i> Member</a>
                        </li>
                        <li>
                            <a href="?index=kategori"><i class="fa fa-fw fa-check-square"></i> Kategori</a>
                        </li>
                        <li>
                            <a href="?index=barang"><i class="fa fa-edit fa-fw"></i> Barang</a>
                        </li>
                        <li>
                            <a href="?index=biayakirim"><i class="fa fa-fw fa-dollar"></i> Biaya Kirim</a>
                        </li>
                        <li>
                            <a href="?index=pesanan"><i class="fa fa-fw fa-envelope-o"></i> Data Pemesan</a>
                        </li>
                        <li>
                            <a href="?index=perusahaan"><i class="fa fa-fw fa-building"></i> Perusahaan</a>
                        </li>
                        <li>
                            <a href="?index=data"><i class="fa fa-fw fa-upload"></i> Upload Brosur</a>
                        </li>
                         <li>
                            <a href="http://localhost/Zello-store/" target="_blank"><i class="fa fa-fw fa-desktop"></i>Lihat Web</a>
                        </li>
                         <li>
                            <a href="../logout.php"><i class="fa fa-sign-out fa-fw"></i> Keluar</a>
                        </li>
                    </ul>
                </div><!-- /.sidebar-collapse -->
            </div><!-- /.navbar-static-side -->
        </nav>
        
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
<font face="serif"></font>
<div class="page-header">
  <h2 align="center"><font face="serif" color="#0000FF"><strong>ZELLO STORE</strong></font></h2>
  <h6 align="center"><font face="serif" color="#0000FF"><strong><i>Pusat Aksesories Komputer dan Handphone</i></strong></font></h6>
  <div align="center"><font face="serif"><strong> Jl. Dr. Soeparno No.199 Karangwangkal Telp. 0896 5865 8738 , Purwokerto</strong></font></div>
  <font face="serif"></font></div>
</div><!-- /.col-lg-12 -->
            </div><!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                    <div class="table-responsive">
                    	
                       <?php 
					   include "../urladmin.php";
					   ?>
                      
                       </div> <!-- /.Responsive tabel -->
                    </div><!-- /.panel -->
                </div><!-- /.col-lg-12 -->
            </div><!-- /.row -->
        </div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="js/sb-admin-2.js"></script>

</body>
</html>
