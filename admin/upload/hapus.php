<?php
include "../config/koneksi.php";

?>

<?php
$query = "Delete from download where id='id'";
$del=mysql_query($query, $koneksi) or die ("Error Hapus Data".mysql_error());
if ($del) {
	echo "<meta http-equiv='refresh' content='0; url=?index=data'";
} else {
	echo "Tidak Ada Data Yang Dihapus !!!";
}
?>