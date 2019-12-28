<?php
session_start();
include ("config/koneksi.php");

//daftar list string data yang digunakan
$username	= ($_POST['username']);
$pass		= (md5($_POST['password']));
$op 			= $_GET['op'];

if($op=="in"){ // menyatakan sesi active user dan password login
    $cek = mysql_query("SELECT * FROM login WHERE username='$username' AND password='$pass'");
    if(mysql_num_rows($cek)==1){//jika berhasil akan bernilai 1
	
        //Fungsi untuk menambah dan mengurutkan data string
		$c = mysql_fetch_array($cek);
	    $_SESSION['id'] 		= $c['id'];
		$_SESSION['username'] 	= $c['username'];
		$_SESSION['level'] 		= $c['level'];
		
       // pernyataan untuk membuat dan memutuskan jenis level pengguna
	   if($c['level']=="Admin"){ 
            header("location:admin/index.php?index=homeadmin");
               }
    }else{
         die("Cek Kembali Username dan Password Anda!! <a href=\"javascript:history.back()\">kembali</a>");
    }
}else if($op=="out"){  // menyatakan inactive sesi user dan password logout
    unset($_SESSION['username']);
    unset($_SESSION['level']);
    header("location:index.php");
}
?>