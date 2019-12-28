<?php
$server="localhost";
$user="root";
$pass="";
$nm_db="store";

$koneksi=mysql_connect($server, $user, $pass);
$db=mysql_select_db($nm_db);

if(!$koneksi){
	echo "maaf Koneksi Gagal";
}else{	
if(!$db)
	echo "Database tidak ditemukan";
}
?>