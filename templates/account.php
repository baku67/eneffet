<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8" />
        <title>Eneffet</title>
        <link href="style.css" rel="stylesheet" />
        <script src="script.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    </head>

    <body style="text-align:center;">
        <div>
            <h1 id="titre"><a href="index.php"> Eneffet</a></h1>
            <?php if(isset($_SESSION['usersName'])) {
                echo '<ul id="navList">
                <a href="index.php"><li class="navLink navButton">Recherche</li></a>
                <a href="account.php"><li class="navLink navButton navActive">Profil</li></a>
                <a href="./controllers/Users.php?q=logout"><li id="decoButton" class="navLink">Déconnexion</li></a>
                </ul>';
            }
            ?>
        </div>

        <div id="main">
            <h2>CVs</h2>

            <p><?= htmlspecialchars($cv['cv_first_name']); ?></p>

            <form action="account.php" method="post">
                <label for="cv_first_name">Prénom:</label>
                <input type='text' name="cv_first_name">
                <br />
                <label for="cv_last_name">Nom:</label>
                <input type='text' name="cv_last_name">
                <br />
                <input type="submit">
            </form>
            <br />
            <h2>Paramètres</h2>

        </div>
    </body>
</html>