<?php
// if not logget -> get out!!!
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Read articles</title>
    <link rel="stylesheet" href="css/black.css">
    <link rel="stylesheet" href="css/read.css">
    <script type="text/javascript">
        function yes(id) {
            article = document.getElementById("a" + id);
            article.style.height = "1.1em";
            article.innerHTML =
                "<section id='a" + id + "' class='add_1'>" +
                "<span>article ID: #" + id + " ALLOWED succesful</span>" +
                "</section>";
        }
        function no(id) {
            article = document.getElementById("a" + id);
            article.style.height = "1.1em";
            article.innerHTML =
                "<section id='a" + id + "' class='add_0'>" +
                "<span>article ID: #" + id + " DENIED succesful</span>" +
                "</section>";
        }
    </script>
</head>

<body>
    <header>
        <h1>Waiting articles: </h1>
    </header>
    <div id="container">
        <div id="nav">
            <div id="search">
                <hr>
                <h3>Sort by:</h3>
                <div id="sort">
                    <select name="sort" id="sort" onchange="location = this.value;">
                        <option disabled selected value> -- select an option -- </option>
                        <option value="r_admin.php?order=a" <?php echo isset($_GET["order"]) ? (htmlentities($_GET["order"]) == 'a' ? 'selected' : '') : ''; ?>>Alphabet ⬇
                        </option>
                        <option value="r_admin.php?order=aa" <?php echo isset($_GET["order"]) ? (htmlentities($_GET["order"]) == 'aa' ? 'selected' : '') : ''; ?>>Alphabet ⬆
                        </option>
                        <option value="r_admin.php?order=dd" <?php echo isset($_GET["order"]) ? (htmlentities($_GET["order"]) == 'dd' ? 'selected' : '') : ''; ?>>Date ⬇
                        </option>
                        <option value="r_admin.php?order=d" <?php echo isset($_GET["order"]) ? (htmlentities($_GET["order"]) == 'd' ? 'selected' : '') : ''; ?>>Date ⬆
                        </option>
                        <option value="r_admin.php?order=r" <?php echo isset($_GET["order"]) ? (htmlentities($_GET["order"]) == 'r' ? 'selected' : '') : ''; ?>>Rate ⬇
                        </option>
                        <option value="r_admin.php?order=rr" <?php echo isset($_GET["order"]) ? (htmlentities($_GET["order"]) == 'rr' ? 'selected' : '') : ''; ?>>Rate ⬆
                        </option>
                        <option value="r_admin.php?order=g" <?php echo isset($_GET["order"]) ? (htmlentities($_GET["order"]) == 'g' ? 'selected' : '') : ''; ?>>Genere ⬇
                        </option>
                        <option value="r_admin.php?order=gg" <?php echo isset($_GET["order"]) ? (htmlentities($_GET["order"]) == 'gg' ? 'selected' : '') : ''; ?>>Genere ⬆
                        </option>
                    </select>
                </div>
                <hr>
            </div>
            <div id="filter">
                <h3>Filter by:</h3>
                xxx stars from y to x
                oryginal lang
                likes
                comments
                <label for="check_0"></label>
                <input type="checkbox" name="check_0" id="check_0">
            </div>
            <div id="search">sort by likes or comments</div>
        </div>
        <main>
            <?php
            session_start();
            $order = "'date_add' asc";
            if (isset($_GET["order"])) {
                $_GET["order"] = htmlspecialchars($_GET["order"]);
                $order = isset($_GET["order"]) ?
                    ($_GET["order"] == 'a' ? "title ASC" :
                        ($_GET["order"] == 'aa' ? "title DESC" :
                            ($_GET["order"] == 'd' ? "date_add ASC" :
                                ($_GET["order"] == 'dd' ? "date_add DESC" :
                                    ($_GET["order"] == 'g' ? "genere ASC" :
                                        ($_GET["order"] == 'gg' ? "genere DESC" :
                                            ($_GET["order"] == 'r' ? "rate ASC" :
                                                ($_GET["order"] == 'rr' ? "rate DESC" : "date_add ASC"
                                                )))))))) : "date_add ASC";
            }
            require_once "connect.php";
            $mysqli = mysqli_connect($conn["host"], $conn["user"], $conn["pass"], $conn["db"]);

            $sql = "SELECT * FROM articles where allowed=false ORDER BY {$order}";
            $returned = $mysqli->query($sql);

            foreach ($returned as $col) {
                $sql = "SELECT nick from users where id=" . $col['id_user'];
                $l = $mysqli->query("$sql");
                $nick = mysqli_fetch_array($l);
                $l->free();
                echo (
                    "<hr>
<article id='a" . $col['id'] . "'>
    <div> 
        <p>
           <i>" . $col["genere"] . "</i> added: " . $col["date_add"] . "
        </p>    
        <h1>
            " . $col['title'] . "
        </h1>
        <h3>
        (" . $col["rate"] . "/10) 
        len: " . $col["length"] . " chars
        </h3>
        </div>
        <div>
        " . $col["content"] . "
        </div>
        <div>
        <p>
        #" . $col['id'] . "
        writted by <i>" . $nick['nick'] . "</i>
        #" . $col["id_user"] . "
        
        
        </div>
        <div>
        <p>Allow this post?</p>
        <form method='get'>
        <button type='submit' name='yes'  value='" . $col['id'] . "' >YES</button>
        <button type='submit' name='no'  value='" . $col['id'] . "' >NO</button>
        </form>
        
        </div>
        </article>    
        ");
            }
            $returned->free();

            if (isset($_GET['no'])) {
                $id=htmlentities($_GET['no']);
                echo '<script type="text/javascript">', 'no(' . $id . ');', '</script>';
                $sql = "update articles set allowed=1 where id=".$id;
                $mysqli->query($sql);
            } else if (isset($_GET['yes'])) {
                $id=htmlentities($_GET['yes']);
                echo '<script type="text/javascript">', 'yes(' .$id . ');', '</script>';
                $sql = "update articles set allowed=2 where id=".$id;
                $mysqli->query($sql);
            }
            $mysqli->close();
            ?>
        </main>
        <div id="author_info">if click into article here will show some info about him</div>
    </div>
    <footer>all privileges restricted @2024 author: Patryk Marzęda</footer>
</body>

</html>