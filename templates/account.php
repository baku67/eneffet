<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8" />
        <title>Eneffet</title>
        <link href="style.css" rel="stylesheet" />
        <script src="scriptAccount.js"></script>
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



            <form action="account.php" method="post">
                <input type="hidden" name="type" value="saveCv">
                <label class="labelCv" for="cv_first_name">Prénom:</label><br />
                <input class="inputCv" type='text' name="cv_first_name" value="<?= htmlspecialchars($cv['cv_first_name']);?>" disabled>
                <br />
                <label class="labelCv" for="cv_last_name">Nom:</label>
                <input class="inputCv" type='text' name="cv_last_name" value="<?= htmlspecialchars($cv['cv_last_name']);?>" disabled>
                <br />
                <label class="labelCv" for="cv_tel">Tél:</label>
                <input class="inputCv" type='text' name="cv_tel" value="<?= htmlspecialchars($cv['cv_tel']);?>" disabled>
                <br />
                <label class="labelCv" for="cv_email">Email:</label>
                <input class="inputCv" type='text' name="cv_email" value="<?= htmlspecialchars($cv['cv_email']);?>" disabled>
                <br />
                <label class="labelCv" for="cv_driving_licence">Permis B:</label>
                <input class="inputCv" type='text' name="cv_driving_licence" value="<?php if(htmlspecialchars($cv['cv_driving_licence'])==1){
                    echo "Oui";
                }else {
                    echo "Non";
                }?>" disabled>
                <br />
                <label class="labelCv" for="cv_age">Age:</label>
                <input class="inputCv" type='text' name="cv_age" value="<?= htmlspecialchars($cv['cv_age']);?>" disabled>
                <br />
                <label class="labelCv" for="cv_address">Adresse:</label>
                <input class="inputCv" type='text' name="cv_address" value="<?= htmlspecialchars($cv['cv_address']);?>" disabled>
                <br />
                <button type="button" class="inversedButton" id="editCvButton">Éditer</button>

                <input class="saveCv inversedButton" type="submit" value="Sauvegarder">
            </form>
            <br />

            <button>Ajouter une expérience</button>
            <button>Ajouter une formation</button>

            <br />
            <br />
            <h2>Paramètres</h2>

        </div>
    </body>
</html>