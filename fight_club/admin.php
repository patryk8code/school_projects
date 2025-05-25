<?php
session_start();
if (!((isset($_SESSION['admin_loged'])) && $_SESSION['admin_loged'] == true)) {
    header('Location: login_page.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN</title>
    <link rel="stylesheet" href="css_form.css">
</head>

<body>

    <h1>Add article</h1>
    <h2><a href="logout.php">return</a></h2>
    <!-- ------------------------------START FORM----------------------------------- -->
    <form name="my_form" action="save.php" method="POST">
        <div class="wrapper">
            <div class="container">
                <div class="column">
                    <h3>Dodaj zajęcia</h3>
                    <input id="nazwa" name="nazwa" type="text" placeholder="nazwa zajęć" required>
                    <input id="cena" name="cena" type="text" placeholder="cena zajęć" required>
                    <input id="imie" name="imie" type="text" placeholder="imie i nazwisko trenera" required>
                    <p id="alert_imie" style="color:red;display: none;">PROSZĘ WPISAĆ PRAWIDŁOWE DANE</p>
                    <div class="main_row">

                        <h3>data startu</h3>
                        <div class="row">
                            <input id="start_DD" name="start_DD" min="1" max="31" type="number" placeholder="DD"
                                required>
                            <input id="start_MM" name="start_MM" min="1" max="12" type="number" placeholder="MM"
                                required>
                            <input id="start_YYY" name="start_YYY" min="2020" max="2050" type="number" placeholder="YYY"
                                required>
                            <input id="start_HH" name="start_HH" min="0" max="23" type="number" placeholder="HH"
                                required>
                            <input id="start_MI" name="start_MI" min="0" max="59" type="number" placeholder="MI"
                                required>
                            <input id="start_SS" name="start_SS" min="0" max="60" type="number" placeholder="SS"
                                required>
                        </div>
                        <p id="alert_start" style="color:red;display: none;">PROSZĘ WPISAĆ PRAWIDŁOWE DANE</p>
                        <h3>data zakończenia</h3>
                        <div class="row">
                            <input id="end_DD" name="end_DD" min="1" max="31" type="number" placeholder="DD" required>
                            <input id="end_MM" name="end_MM" min="1" max="12" type="number" placeholder="MM" required>
                            <input id="end_YYY" name="end_YYY" min="2020" max="2050" type="number" placeholder="YYY"
                                required>
                            <input id="end_HH" name="end_HH" min="0" max="23" type="number" placeholder="HH" required>
                            <input id="end_MI" name="end_MI" min="0" max="59" type="number" placeholder="MI" required>
                            <input id="end_SS" name="end_SS" min="0" max="60" type="number" placeholder="SS" required>
                        </div>
                        <p id="alert_end" style="color:red;display: none;">PROSZĘ WPISAĆ PRAWIDŁOWE DANE</p>
                    </div>
                    <div class="down">
                        <h3>Opis zajęć</h3>
                        <textarea id="opis_text" name="opis_text" rows="4" cols="50" placeholder="Opis zajęć..."
                            required></textarea>
                        <p id="alert_text" style="color:red;display: none;">PROSZĘ WPISAĆ PRAWIDŁOWE DANE</p>
                    </div>


                    <button type="button" onclick="ch_data()">Submit</button>
                </div>
            </div>
        </div>
    </form>
    <!-- ------------------------------END FORM----------------------------------- -->
    <script src="check_data.js"></script>
</body>

</html>