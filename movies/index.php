<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movies</title>
    <link rel="stylesheet" href="css/black.css">
    <style>
        nav {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-content: center;
            width: 100%;
            height: 100%;
        }

        nav>div {
            flex: 1 0 48%;
            margin: 0;
            min-height: 50vh;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            font-size: 5vw;

        }

        nav>div:nth-child(0n+2),
        nav>div:nth-child(0n+3) {
            background-color: #f000ff;
            color: #74ee15;
        }

        nav>div:hover {
            animation: index_anim 2s alternate infinite;
        }

        @keyframes index_anim {

            to {
                color: whitesmoke;
                background-color: black;
            }
        }
    </style>
</head>

<body>
    <nav>
        <div onclick="window.location = 'read.php'">Read</div>
        <div onclick="window.location = 'write.php'">Write</div>
        <div onclick="window.location = 'index.php'">Czat <i>(not working yet)</i></div>
        <div onclick="window.location = 'account_settings.php'">Account Settings
        </div>
    </nav>
    <footer>do not copy!</footer>
</body>

</html>