<?php

// var_dump($_POST);
// exit();

$shiten = $_POST["shiten"];
$reqNo = $_POST["reqNo"];
$cause = $_POST["cause"];
$name = $_POST["name"];
$kana = $_POST["kana"];
$birth = $_POST["birth"];
$tel = $_POST["tel"];
$item = $_POST["item"];
$fieldAdd = $_POST["fieldAdd"];
$area = $_POST["area"];
$levels = $_POST["levels"];
$damages = $_POST["damages"];
$amounts = $_POST["amounts"];
$memo = $_POST["memo"];

$write_data = "{$shiten} {$reqNo} {$cause} {$name} {$kana} {$birth} {$tel} {$item} {$fieldAdd} {$area} {$levels} {$damages} {$amounts} {$memo}\n";
$file = fopen('shinsei.txt', 'a');
flock($file, LOCK_EX);
fwrite($file, $write_data);
flock($file, LOCK_UN);
fclose($file);
header("Location:shinsei_input.php");
