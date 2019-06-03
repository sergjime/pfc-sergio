<?php
require 'config.php';

$pdo = new PDO("mysql:host=".HOST."; dbname=" . DBNAME, USER, PASS);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo->exec("SET CHARACTER SET UTF8");
?>