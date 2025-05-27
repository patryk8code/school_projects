<?php
session_start();

if ((!isset($_REQUEST["f"])) || (!isset($_REQUEST["q"])) || (!isset($_SESSION['login'])) || (!isset($_SESSION['password'])) || (!isset($_SESSION['name'])) || (!isset($_SESSION['surrname']))) {
    header('Location: login_page.php');
    exit();
}

require_once "connect.php";
// get the q parameter from URL
$q = $_REQUEST["q"];
$f = $_REQUEST["f"];

$login = $_SESSION["login"];
$pass = $_SESSION["password"];
$mysqli = mysqli_connect($fields["host"], $fields["user"], $fields["pass"], str_replace('/', '', $fields["path"]), $fields["port"]);

$items = ["i_sword", "i_shield", "i_helmet", "i_gloves", "i_armor", "i_pants", "i_shoes"];
function item_no_zero(){
    global $login,$pass,$mysqli,$items,$q;
    $sql = "SELECT * FROM users WHERE login='$login' AND password='$pass'";
    $result = $mysqli->query("$sql");

    foreach ($result as $row) {
        if ($row[$items[$q]] >= 0) {
            return 0;
        } else {
            return 1;
        }
    }

}

if ($f == 'sell') {
    // only check smallest values; if bought then i--; not empty, can be naked i think :)
    if (item_no_zero()){
        $sql = "update users set " . $items[$q] . "=" . $items[$q] . "-1 WHERE login='$login' AND password='$pass'";
        $mysqli->query("$sql");
    }
    // same for buy
    if (item_no_zero()){
        $sql = "update users set " . $items[$q] . "=" . $items[$q] . "-1 WHERE login='$login' AND password='$pass'";
        $mysqli->query("$sql");
    }
}
if ($f == 'buy') {

}
if ($f == 'switch') {
    switch ($q) {
        case 0:
            // --------------del
            $sql = "update users set money=money+'" . 5 . "' WHERE login='$login' AND password='$pass'";
            $mysqli->query("$sql");
            // --------------del
            $sql = "SELECT * FROM users WHERE login='$login' AND password='$pass'";
            $result = $mysqli->query("$sql");

            foreach ($result as $row) {
                echo $row['money'];
            }

            break;
        case 1:
            //code block;
            break;
        case 3:
            //code block
            break;
        default:
            echo "not working!!!";
    }
}

//update all session things
// $sql = "select money from users  WHERE login='$login' AND password='$pass'";
// $mysqli->query("$sql");
// $result = $mysqli->query("$sql");
// $_SESSION["good"] = false;
// foreach ($result as $row) {
//     $_SESSION['money'] = $row['money'];
//     echo $row['money'];
// }

// $sql = "SELECT * FROM users WHERE login='$login' AND password='$pass'";
// $result = $mysqli->query("$sql");

// foreach ($result as $row) {
//     if ($row) {
//         $_SESSION["good"] = true;
//         $_SESSION["logged"] = true;

//         $_SESSION['name'] = $row['name'];
//         $_SESSION['surrname'] = $row['surrname'];
//         $_SESSION['login'] = $row['login'];
//         $_SESSION['password'] = $row['password'];
//         $_SESSION['date_come'] = $row['date_come'];
//         $_SESSION['last_login'] = $row['last_login'];
//         $_SESSION['money'] = $row['money'];
//         $_SESSION['exp'] = $row['exp'];

//         $_SESSION['i_helmet'] = $row['i_helmet'];
//         $_SESSION['i_gloves'] = $row['i_gloves'];
//         $_SESSION['i_armor'] = $row['i_armor'];
//         $_SESSION['i_pants'] = $row['i_pants'];
//         $_SESSION['i_shoes'] = $row['i_shoes'];
//         $_SESSION['i_sword'] = $row['i_sword'];
//         $_SESSION['i_shield'] = $row['i_shield'];
//     }
// }

