<?php

// łączenie z bazą na localhost,  
$conn["host"]="localhost";
$conn["user"]="root";
$conn["pass"]="";
$conn["db"]="movies";

// working ask:

// require_once "connect.php";

// $connection=mysqli_connect($conn["host"],$conn["user"],$conn["pass"],$conn["db"]);

// $sql_ask="SELECT * from users";

// $users=$connection->query($sql_ask);
// foreach($users as $user){
//     echo $user["id"];
//     echo $user["name"];
//     echo $user["surrname"];
//     echo $user["mail"];
//     echo $user["nick"];
//     echo $user["age"];
//     echo $user["date_join"];
//     echo $user["date_last_visit"];
//     echo $user["privileges_lvl"];
// }

// $connection->close();


?>