<?php
session_start();

if ((!isset($_POST['login'])) || (!isset($_POST['password'])) || (!isset($_POST['name'])) || (!isset($_POST['surrname']))) {
    header('Location: login_page.php');
    exit();
}
if (((isset($_SESSION['login'])) && (isset($_SESSION['password'])))) {
    header('Location: game.php');
    exit();
}

require_once "connect.php";

try {
    $user_existing = false;

    $name = $_POST['name'];
    $surrname = $_POST['surrname'];
    $login = $_POST['login'];
    $pass = $_POST['password'];

    $name = htmlentities($login, ENT_QUOTES, "UTF-8");
    $surrname = htmlentities($login, ENT_QUOTES, "UTF-8");
    $login = htmlentities($login, ENT_QUOTES, "UTF-8");
    $pass = htmlentities($pass, ENT_QUOTES, "UTF-8");

    $mysqli = mysqli_connect($fields["host"], $fields["user"], $fields["pass"], str_replace('/', '', $fields["path"]), $fields["port"]);

    $sql = 'SELECT count(login)as a from users where login like \'' . $login . '\'';
    $returned = $mysqli->query("$sql");
    foreach ($returned as $roq) {
        if ($roq['a']) {
            $user_existing = true;
        }
    }

    if ($user_existing) {
        $_SESSION["error_login"] = '<i style="color:red;">choose another name</i >';
        $mysqli->close();
        header('Location: signin_page.php');
        exit();
    } else {

        $sql = "INSERT INTO users(name,surrname,login,password,date_come,money,exp) 
        VALUES('$name','$surrname','$login','$pass','" . date('Y-m-d H:i:s') . "',1,0)";

        $mysqli->query("$sql");
        unset($_SESSION['error']);
        unset($_SESSION['error_login']);
        $_SESSION['success_signin'] = "<i style=\"color:green!important;\">Account created successfully, now log in</i>";
        header('Location: login_page.php');
        exit();
    }

    if (!$_SESSION["good"]) {
        $_SESSION['error'] = '<i style="color:red;">Sorry something is wrong with our website :(</i >';
        $mysqli->close();
        header('Location: signin_page.php');
        exit();
    }



} catch (Exception $e) {
    $mysqli->close();
    $_SESSION['error'] = '<i style="color:red;">SO SORRY! <br>( ' . $e . ' )</i >';
    // header('Location: signin_page.php');
}
