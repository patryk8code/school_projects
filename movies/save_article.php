<?php
session_start();

$_SESSION['user_id']=1;
$current_date = date('Y/m/d G:i:s', time());

// if(!isset($_SESSION["logged"]) || $_SESSION["logged"]==0){
//     header('Location: index.php');
//     die();
// }else{
    $title=htmlentities($_POST["title"], ENT_QUOTES, "UTF-8");
    $rate=htmlentities($_POST["rate"], ENT_QUOTES, "UTF-8");
    $genere=htmlentities($_POST["generes"], ENT_QUOTES, "UTF-8");
    $content=htmlentities($_POST["content"], ENT_QUOTES, "UTF-8");
    $privileges=htmlentities($_POST["privilages"], ENT_QUOTES, "UTF-8");

    
   
    $sql="INSERT INTO 
    articles(id_user,title,rate,genere,privileges,date_add,date_last_edit,likes,comments,length,content)
    VALUES
    (
    '".$_SESSION['user_id']."',
    '".$title."',
    ".$rate.",
    '".$genere."',
    ".$privileges.",
    '".$current_date."',
    '".$current_date."',
    0,
    0,
    ".strlen($content).",
    '".$content."'
    )
    ";

    require_once "connect.php";
    $mysqli = mysqli_connect($conn["host"], $conn["user"],$conn["pass"], $conn["db"]);

    $returned = $mysqli->query("$sql");
    echo("<hr>");
    echo($returned);
    echo("<hr>");
    echo($current_date);

   $mysqli->close();
// }