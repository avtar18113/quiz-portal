<?php 
$host = "localhost";
 $user = "onlinequiz_aocr";
 $pass = "}Kg!UKxwywPs";
 $db   = "onlinequiz_aocr";

$user = "root";
$pass = "";
$db   = "onlinequiz_aocr";

$conn = null;

try { $conn = new PDO("mysql:host={$host};dbname={$db};",$user,$pass);} catch (Exception $e) {}
 ?>