<?php
session_start();
include ("config/koneksi.php");

//daftar list string data yang digunakan
$email		= ($_POST['email']);
$pass		= (md5($_POST['password']));
$op 			= $_GET['op'];

if($op=="in"){ // menyatakan sesi active user dan password login
    $cek = mysql_query("SELECT * FROM member WHERE email='$email' AND passwords='$pass'");
    if(mysql_num_rows($cek)==1){//jika berhasil akan bernilai 1
	
        //Fungsi untuk menambah dan mengurutkan data string
		$c = mysql_fetch_array($cek);
	    $_SESSION['idpemesan'] 	= $c['idpemesan'];
		$_SESSION['nama'] 		= $c['nama'];
		$_SESSION['alamat']		= $c['alamat'];
		$_SESSION['telepon'] 	= $c['telepon'];
		$_SESSION['level'] 		= $c['level'];
		
       // pernyataan untuk membuat dan memutuskan jenis level pengguna
	   if($c['level']=="member"){ 
            header("location:member/index.php");
               }
    }else{
         die("Cek Kembali Email dan Password Anda!! <a href=\"javascript:history.back()\">kembali</a>") ;
    }
}else if($op=="out"){  // menyatakan inactive sesi user dan password logout
    unset($_SESSION['username']);
    unset($_SESSION['level']);
    header("location:index.php");
}
?>