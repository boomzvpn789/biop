<?php 
$host = 'localhost'; 
$user = 'id4190951_0874542610';  // ตั้งค่า User ให้ตรงกับ MYSQL
$pass = '0874542610';// ตั้งค่า passให้ตรงกับ MYSQL
$db = 'id4190951_0874542610'; // ตั้งค่า db ให้ตรงกับ MYSQL
$con = mysqli_connect($host,$user,$pass,$db); 
mysqli_set_charset($con,'utf8');
?>