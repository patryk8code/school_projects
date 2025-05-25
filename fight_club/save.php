<?php
session_start();
if (!((isset($_SESSION['admin_loged'])) && $_SESSION['admin_loged'] == true)) {
    header('Location: login_page.php');
    exit();
}

require_once "connect.php";


$nazwa = htmlentities($_POST['nazwa'], ENT_QUOTES, "UTF-8");
$cena=htmlentities($_POST['cena'], ENT_QUOTES, "UTF-8");
$imie=htmlentities($_POST['imie'], ENT_QUOTES, "UTF-8");
$start_DD=htmlentities($_POST['start_DD'], ENT_QUOTES, "UTF-8");
$start_MM=htmlentities($_POST['start_MM'], ENT_QUOTES, "UTF-8");
$start_YYY=htmlentities($_POST['start_YYY'], ENT_QUOTES, "UTF-8");
$start_HH=htmlentities($_POST['start_HH'], ENT_QUOTES, "UTF-8");
$start_MI=htmlentities($_POST['start_MI'], ENT_QUOTES, "UTF-8");
$start_SS=htmlentities($_POST['start_SS'], ENT_QUOTES, "UTF-8");
$end_DD=htmlentities($_POST['end_DD'], ENT_QUOTES, "UTF-8");
$end_MM=htmlentities($_POST['end_MM'], ENT_QUOTES, "UTF-8");
$end_YYY=htmlentities($_POST['end_YYY'], ENT_QUOTES, "UTF-8");
$end_HH=htmlentities($_POST['end_HH'], ENT_QUOTES, "UTF-8");
$end_MI=htmlentities($_POST['end_MI'], ENT_QUOTES, "UTF-8");
$end_SS=htmlentities($_POST['end_SS'], ENT_QUOTES, "UTF-8");
$opis_text=htmlentities($_POST['opis_text'], ENT_QUOTES, "UTF-8");
// dmr hms
$start_date=$start_YYY.'-'.$start_MM.'-'.$start_DD." ".$start_HH.':'.$start_MI.':'.$start_SS;
$end_date=$end_YYY.'-'.$end_MM.'-'.$end_DD." ".$end_HH.':'.$end_MI.':'.$end_SS;

//  not working in hosting, on localhost work delete if u want, no need it any more!!
// $db = new PDO($conn, $fields["user"], $fields["pass"]);
// $db->query($sql);

$all_data="'".$opis_text."','".$start_date."','".$end_date."',".$cena.",'".$nazwa."','".$imie."'";

$mysqli = mysqli_connect($fields["host"],$fields["user"],$fields["pass"], str_replace('/', '',$fields["path"]),$fields["port"]);
$sql="select * from articles";

$sql = 'insert into articles(id,opis,data_start,data_end,cena,nazwa,dane_trenera) values(10,'.$all_data.')';

$result = $mysqli->query("$sql");

$result -> free_result();

$mysqli -> close();

header('Location: admin.php');
?>
