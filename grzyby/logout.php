<?php
session_start();

require_once "connect.php";
$mysqli = mysqli_connect($fields["host"],$fields["user"],$fields["pass"], str_replace('/', '',$fields["path"]),$fields["port"]);

$login=$_SESSION["login"];
$pass=$_SESSION["password"];

$sql = "update users set last_logout='".date('Y-m-d H:i:s')."' WHERE login='$login' AND password='$pass'";
$mysqli->query("$sql");

$_SESSION['logged']=false;
header('Location: index.php');
exit();
?>