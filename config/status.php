<?php
$id = $_GET['id'];

header("Content-Type: image/png");

$cURL = curl_init();
curl_setopt($cURL, CURLOPT_URL, "http://opi.yahoo.com/online?u=$id&m=s");
curl_setopt($cURL, CURLOPT_RETURNTRANSFER, 1);
$strPage = curl_exec($cURL);
curl_close($cURL);

if ($strPage=="$id is ONLINE")
{readfile("../img/status ym on.gif");}

else
{readfile("../img/status ym off.gif");}
?>
