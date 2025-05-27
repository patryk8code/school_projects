<?php

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Read articles</title>
    <link rel="stylesheet" href="css/black.css">
    <link rel="stylesheet" href="css/read.css">
</head>

<body>
    <header id="header">
        <h1>HOME - last added articles</h1>
    </header>
    <div id="container">
        <div id="nav">

            <div id="search">
                <div>
                    search title, author, id
                    <label for="search">Search: </label><br>
                    <input type="text" name="search" id="search_box" onkeyup="read_data()">
                </div>
                <hr>
                <h3>Sort by:</h3>
                <div id="sort">
                    <select name="sort" id="select_sort" onchange="read_data()">
                        <option disabled selected value> -- select an option -- </option>
                        <option value="a" id="sort_a">Alphabet ⬇
                        </option>
                        <option value="aa" id="sort_aa">Alphabet ⬆
                        </option>
                        <option value="dd" id="sort_dd">Date ⬇
                        </option>
                        <option value="d" id="sort_d">Date ⬆
                        </option>
                        <option value="r" id="sort_r">Rate ⬇
                        </option>
                        <option value="rr" id="sort_rr">Rate ⬆
                        </option>
                        <option value="g" id="sort_g">Genere ⬇
                        </option>
                        <option value="gg" id="sort_gg">Genere ⬆
                        </option>
                        <option value="ll" id="sort_ll">Likes ⬆
                        </option>
                        <option value="l" id="sort_l">Likes ⬇
                        </option>
                    </select>
                </div>
                <hr>
            </div>
            <div id="filter">
                <h3>Show only:</h3>
                <div>
                    <select name="filter" id="filter_genere" onchange="read_data()">
                        <option disabled selected value="">-- select genere --</option>
                        <option value="Action">Action</option>
                        <option value="Adult">Adult</option>
                        <option value="Adventure">Adventure</option>
                        <option value="Animal Movies">Animal Movies</option>
                        <option value="Animation">Animation</option>
                        <option value="Biopics">Biopics</option>
                        <option value="Childrens Movies">Children's Movies</option>
                        <option value="Comedy">Comedy</option>
                        <option value="Comedy/Dark Comedy">Comedy/Dark Comedy</option>
                        <option value="Coming-of-Age">Coming-of-Age</option>
                        <option value="Crime Drama">Crime Drama</option>
                        <option value="Crime">Crime</option>
                        <option value="Disaster">Disaster</option>
                        <option value="Documentary">Documentary</option>
                        <option value="Drama">Drama</option>
                        <option value="Fairy Tale">Fairy Tale</option>
                        <option value="Family Comedies">Family Comedies</option>
                        <option value="Family">Family</option>
                        <option value="Fantasy">Fantasy</option>
                        <option value="Heist">Heist</option>
                        <option value="Historical Fiction">Historical Fiction</option>
                        <option value="History">History</option>
                        <option value="Horror">Horror</option>
                        <option value="Horror/Slasher">Horror/Slasher</option>
                        <option value="Martial Arts">Martial Arts</option>
                        <option value="Musical">Musical</option>
                        <option value="Mystery">Mystery</option>
                        <option value="Noir">Noir</option>
                        <option value="Period Films">Period Films</option>
                        <option value="Psychological">Psychological</option>
                        <option value="Road Trip">Road Trip</option>
                        <option value="Romance">Romance</option>
                        <option value="Romantic Comedy">Romantic Comedy</option>
                        <option value="Satire">Satire</option>
                        <option value="Sci-Fi">Sci-Fi</option>
                        <option value="Space Operas">Space Operas</option>
                        <option value="Sports">Sports</option>
                        <option value="Superhero">Superhero</option>
                        <option value="Suspense">Suspense</option>
                        <option value="Thriller">Thriller</option>
                        <option value="War Drama">War Drama</option>
                        <option value="War">War</option>
                        <option value="Western">Western</option>
                        <option value="Westerns">Westerns</option>

                    </select>

                </div>
                <hr>
            </div>
            <div id="likes">
                <h3>Other Options</h3>
                <div id="options">
                    <label for="options_likes">Likes range:</label><br>
                    <input type="number" name="options_likes" id="options_likes_from"  onchange="read_data()" min=-1000000 max=1000000>
                    -
                    <input type="number" name="options_likes" id="options_likes_to"  onchange="read_data()" min=-1000000 max=1000000>
                </div>  
            </div>
        </div>
        <main id="main">


        </main>
        <div id="author_info">if click into article here will show some info about him

        </div>
    </div>
    <footer>all privileges restricted @2024 author: Patryk Marzęda</footer>

    <!-- <script src="js/jquery-3.7.1.min.js"></script> -->
    <script src="js/read_ajax.js"></script>

</body>

</html>