<?php

if (isset($_POST["action"]) && ($_POST["action"] == "read_data")) {
    require_once "connect.php";
    $mysqli = mysqli_connect($conn["host"], $conn["user"], $conn["pass"], $conn["db"]);

    $order = "date_add DESC";
    if (isset($_POST["order"])) {
        $_POST["order"] = htmlspecialchars($_POST["order"]);
        $order = isset($_POST["order"]) ?
            ($_POST["order"] == 'a' ? "title ASC" :
                ($_POST["order"] == 'aa' ? "title DESC" :
                    ($_POST["order"] == 'd' ? "date_add ASC" :
                        ($_POST["order"] == 'dd' ? "date_add DESC" :
                            ($_POST["order"] == 'g' ? "genere ASC" :
                                ($_POST["order"] == 'gg' ? "genere DESC" :
                                    ($_POST["order"] == 'l' ? "likes DESC" :
                                        ($_POST["order"] == 'll' ? "likes ASC" :
                                            ($_POST["order"] == 'r' ? "rate ASC" :
                                                ($_POST["order"] == 'rr' ? "rate DESC" : "date_add DESC"
                                                )))))))))) : "date_add DESC";
    }
    $genere = isset($_POST['genere']) ? htmlentities($_POST['genere']) : "";
    $likes_from = -1000000;
    $likes_to = 1000000;
    if (isset($_POST["likes_from"])) {
        $likes_from = (int) htmlentities($_POST["likes_from"]);
    }
    if (isset($_POST["likes_to"])) {
        $likes_to = 1 + (int) htmlentities($_POST["likes_to"]);
    }
    $search_box = isset($_POST['search_box']) ? htmlentities($_POST['search_box']) : "";

    $sql = "SELECT * FROM articles where allowed=2 and title like '%{$search_box}%' and genere like '%{$genere}%'
    and likes >= {$likes_from} and likes < {$likes_to} ORDER BY {$order}";


    $returned = $mysqli->query($sql);

    if (!mysqli_fetch_row($returned)) {
        echo "<hr><h1>There is no articles with this settings</h1><hr>";
        die();
    }
    foreach ($returned as $col) {
        $sql = "SELECT nick from users where id=" . $col['id_user'];
        $l = $mysqli->query("$sql");
        $nick = mysqli_fetch_array($l);
        $l->free();
        echo
            "<article>
    <div> 
        <p>
           <i>" . $col["genere"] . "<br> </i>" . $col["date_add"] . "
        </p>  
        <h3>
            (" . $col["rate"] . "/10) <br>
            Length: " . $col["length"] . " 
        </h3>
    </div>   
    <div id='div_title'>
            <h1>
                <span id='s_title'>
                    " . $col['title'] . "
                </span>
            </h1>
        </div>
        <hr class='hr_title'>  
    <div>
        <p class='div_p'>
    " . $col["content"] . "
        </p>
    </div>
    
        <div>
            <hr class='hr_fotter'>  
            <p>
            " . $col["likes"] . " ❤ 
            <!--ID #" . $col['id'] . "|-->
             <i>" . $nick['nick'] . "</i>
            <!--ID #" . $col["id_user"] . "|-->
            " . $col["comments"] . " 📝
        
        
        </div>
    </article>    
     ";
    }

    $returned->free();
    $mysqli->close();
} else {
    die();
}