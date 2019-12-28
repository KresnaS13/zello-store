<font face="Times New Roman, Times, serif">
<html>
<head>
<title></title>
<script>
		var dtNow = new Date();
		var dtMonth = dtNow.getMonth();
		var dtYear = dtNow.getFullYear();		

		if (dtMonth==0) {
		   var dtMonthNow = "Januari" }
		if (dtMonth==1) {
		   var dtMonthNow = "Februari" }
		if (dtMonth==2) {
		   var dtMonthNow = "Maret" }
		if (dtMonth==3) {
		   var dtMonthNow = "April" }
		if (dtMonth==4) {
		   var dtMonthNow = "Mei" }
		if (dtMonth==5) {
		   var dtMonthNow = "Juni" }
		if (dtMonth==6) {
		   var dtMonthNow = "Juli" }
		if (dtMonth==7) {
		   var dtMonthNow = "Agustus" }
		if (dtMonth==8) {
		   var dtMonthNow = "September" }
		if (dtMonth==9) {
		   var dtMonthNow = "Oktober" }
		if (dtMonth==10) {
		   var dtMonthNow = "November" }
		if (dtMonth==11) {
		   var dtMonthNow = "Desember" }
		if (dtNow.getDay()==0) {
		   var dtDay = "Minggu" }
		if (dtNow.getDay()==1) {
		   var dtDay = "Senin" }
		if (dtNow.getDay()==2) {
		   var dtDay = "Selasa" }
		if (dtNow.getDay()==3) {
		   var dtDay = "Rabu" }
		if (dtNow.getDay()==4) {
		   var dtDay = "Kamis" }
		if (dtNow.getDay()==5) {
		   var dtDay = "Jumat" }
		if (dtNow.getDay()==6) {
		   var dtDay = "Sabtu" }
		var dtDate = dtNow.getDate();
		document.write(dtDay + ", " + dtDate + " " + dtMonthNow + " " + dtYear + " ");
      </script>
      
      <script type="text/javascript">
    //set timezone
    <?php date_default_timezone_set

('Asia/Jakarta'); ?>
    //buat object date berdasarkan waktu 

di server
    var serverTime = new Date(<?php print 

date('Y, m, d, H, i, s, 0'); ?>);
    //buat object date berdasarkan waktu 

di client
    var clientTime = new Date();
    //hitung selisih
    var Diff = serverTime.getTime() - 

clientTime.getTime();    
    //fungsi displayTime yang dipanggil di 

bodyOnLoad dieksekusi tiap 1000ms = 1detik
    function displayServerTime(){
        //buat object date berdasarkan 

waktu di client
        var clientTime = new Date();
        //buat object date dengan 

menghitung selisih waktu client dan server
        var time = new Date

(clientTime.getTime() + Diff);
        //ambil nilai jam
        var sh = time.getHours().toString

();
        //ambil nilai menit
        var sm = time.getMinutes

().toString();
        //ambil nilai detik
        var ss = time.getSeconds

().toString();
        //tampilkan jam:menit:detik dengan 

menambahkan angka 0 jika angkanya cuma 

satu digit (0-9)
        document.getElementById

("clock").innerHTML = 

(sh.length==1?"0"+sh:sh) + ":" + 

(sm.length==1?"0"+sm:sm) + ":" + 

(ss.length==1?"0"+ss:ss);
    }
</script>

<script type="text/javascript">
    //set timezone
    <?php date_default_timezone_set('Asia/Jakarta'); ?>
    //buat object date berdasarkan waktu di server
    var serverTime = new Date(<?php print date('Y, m, d, H, i, s, 0'); ?>);
    //buat object date berdasarkan waktu di client
    var clientTime = new Date();
    //hitung selisih
    var Diff = serverTime.getTime() - clientTime.getTime();    
    //fungsi displayTime yang dipanggil di bodyOnLoad dieksekusi tiap 1000ms = 1detik
    function displayServerTime(){
        //buat object date berdasarkan waktu di client
        var clientTime = new Date();
        //buat object date dengan menghitung selisih waktu client dan server
        var time = new Date(clientTime.getTime() + Diff);
        //ambil nilai jam
        var sh = time.getHours().toString();
        //ambil nilai menit
        var sm = time.getMinutes().toString();
        //ambil nilai detik
        var ss = time.getSeconds().toString();
        //tampilkan jam:menit:detik dengan menambahkan angka 0 jika angkanya cuma satu digit (0-9)
        document.getElementById("clock").innerHTML = (sh.length==1?"0"+sh:sh) + ":" + (sm.length==1?"0"+sm:sm) + ":" + (ss.length==1?"0"+ss:ss);
    }
</script>
</head>
<body onLoad="setInterval('displayServerTime()', 1000);">
<?php date_default_timezone_set('Asia/Jakarta');
$jam=date("H:i:s"); ?>
| <b><span id="clock"><?php print date('H:i:s'); ?></span> WIB</b>
</body>
</html></font>