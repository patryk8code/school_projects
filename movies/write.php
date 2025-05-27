<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movies</title>
    <link rel="stylesheet" href="css/black.css">
    <link rel="stylesheet" href="css/stuff.css">
</head>

<body>
    <nav>
        <div onclick="window.location = 'home.php'"><a>Read</a></div>
        <div onclick="window.location = 'index.php'">Czat <i>(not working yet)</i></div>
        <div onclick="window.location = ''">log out</div>
        <div onclick="window.location = 'account_settings.php'">Account Settings
        </div>
    </nav>
    <main>
        <h1>Here you create an article !</h1>
        <div id="form">
            <form action="save_article.php" method="POST">
                <div class="form_div">
                    <span>
                        <input class="write_in" id="state" type="text" placeholder="Title.." /><label
                            for="state">Movie Title</label>
                    </span>
                    <br>
                    <span>
                    <select class="write_in" id="state" name="rate">
                         <option value="0">0</option>
                         <option value="1">1</option>
                         <option value="2">2</option>
                         <option value="3">3</option>
                         <option value="4">4</option>
                         <option value="5">5</option>
                         <option value="6">6</option>
                         <option value="7">7</option>
                         <option value="8">8</option>
                         <option value="9">9</option>
                         <option value="10">10</option>
                         </select>
                         
                         <!-- <input class="write_in" id="state" type="" placeholder="1..10" /> -->
                         <label
                         for="state">Your rate <i>(0-10)</i></label>
                        </span>
                        <br>
                        <span>
                            <select class="write_in" id="state" name="genere" placeholder="Genere">
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
                            <label
                            for="state">Movie genere</label>
                        </span>
                    <br>
                    <span>
                        <input class="write_in" id="state" type="text" placeholder="Liquid, solid, gaseous..." /><label
                        for="state">What do you think about this..?</label>
                    </span>
                    <!-- <br>
                    <textarea placeholder="What do u think about this..?" id="content" name="content"></textarea> -->

                    <!-- <div>
                        <label for="content">Make it :</label>
                        <div>
                            <input type="radio" id="form_pub" name="privilages" value="0">
                            <label for="html">Public</label>
                        </div>
                        <div>
                            <input type="radio" id="form_f" name="privilages" value="1">
                            <label for="css">For Followers</label>
                        </div>
                        <div>
                            <input type="radio" id="form_priv" name="privilages" value="JavaScript">
                            <label for="javascript">Private</label>
                        </div>
                    </div> -->

                    <button type="submit">Save article</button>

                </div>
            </form>
        </div>
    </main>
    <footer>do not copy!</footer>
</body>

</html>