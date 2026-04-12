<?php
$jari = 4.2;
$tinggi = 5.4;

$volume = pi() * pow($jari, 2) * $tinggi;

echo"Jari-jari : $jari <br>";
echo"Tinggi : $tinggi <br>";
echo number_format($volume, 3) . " m3"; 
?>