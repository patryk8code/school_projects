<?php
session_start();
$_SESSION['admin_loged'] = false;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fight Club</title>
    <link rel="stylesheet" href="css.css">
</head>

<body>
    <header>
        <h1>Fight Club</h1>
    </header>
    <article>
        <img src="img/banner.png" alt="banner">
    </article>
    <hr>
    <nav>
        <div>
            <a href="index.php">
                <h4>Home</h4>
            </a>
        </div>
        <div>
            <a href="oferta.php">
                <h4>Oferta</h4>
            </a>
        </div>
        <div>
            <a href="kontakt.html">
                <h4>Kontakt</h4>
            </a>
        </div>
        <div>
            <a href="login_page.php">
                <h4>Log in</h4>
            </a>
        </div>
    </nav>
    <hr>

    <article>
        <section id="join-now">
            <h3>Weź udział w bezpłatnym treningu próbnym!</h3>
            <div>
                <!-- ------------------------------------Funny form-------------------------------------------------- -->
                <div id="forma">
                    <form id="contact" action="" method="post">
                        <h3>Dołącz do nas!</h3>
                        <fieldset>
                            <input placeholder="Imie" type="text" tabindex="1" required autofocus>
                        </fieldset>
                        <fieldset>
                            <input placeholder="Nazwisko" type="text" tabindex="2" required>
                        </fieldset>
                        <fieldset>
                            <input placeholder="Adres E-mail" type="email" tabindex="3" required>
                        </fieldset>
                        <fieldset>
                            <input placeholder="Numer telefonu (opcjonalne)" type="tel" tabindex="4">
                        </fieldset>
                        <fieldset>
                            <input placeholder="Wybrana oferta" type="text" tabindex="5"></input>
                        </fieldset>
                        <fieldset>
                            <button name="submit" type="submit" id="contact-submit">Wyślij</button>
                        </fieldset>
                    </form>
                </div><br>
                <!-- --------------------------------------end form------------------------------------------------ -->
                <button id="wypelnij" onclick="form_maker()">
                    <p>Wypełnij formularz!</p>
                </button>
            </div>
        </section>
        <hr>
        <!-- 4 in php like that: -->
        
    </article>
    <hr>
    <footer>
        <p>Autor: patryk8code</p>
    </footer>


    <script src="js.js"></script>
</body>

</html>