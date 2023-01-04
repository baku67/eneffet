<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8" />
        <title>Eneffet</title>
        <link href="style.css" rel="stylesheet" />
        <script src="script.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <link rel="icon" type="image/x-icon" href="./images/favicon.ico">
        <style>
            html, body {
                margin: 0;
                height: 100%;
                overflow: hidden
            }
        </style>
    </head>

    <body style="text-align:center;position:relative; overflow:hidden;">

        

        <img src="./images/5559852.jpg" style="opacity:0.35; position:absolute; left:0; top:0; width:100%; height:100%">


        <div>
            <h1 id="titre"><a href="index.php"> Eneffet</a></h1>
            <?php if(isset($_SESSION['usersName'])) {
                    echo '<ul id="navList">
                    <a href="index.php"><li class="navLink navButton">Recherche</li></a>
                    <a href="account.php"><li class="navLink navButton">Profil</li></a>
                    <a href="messages.php"><li class="navLink navButton navActive">Courrier</li></a>
                    <a href="./controllers/Users.php?q=logout"><li id="decoButton" class="navLink">Déconnexion</li></a>
                    </ul>';
            }
            ?>
        </div>

        <div id="mainCourrier">

            <div id="convContainer">
                <?php
                if(empty($convs)) {
                ?>
                    <h1 style="font-size:3em;">Pas de conversations en cours</h1>
                <?php
                }
                foreach($convs as $conv) {
                ?>
                    <a href="convdetail.php?action=convdetail&id=<?= urlencode($conv['convId']); ?>">
                        <div class="convDiv">
                            <!-- <textarea rows="3" cols="33" disabled><?= htmlspecialchars_decode($conv['lastMessage']); ?></textarea> -->
                            <p><?= htmlspecialchars_decode($conv['lastMessage']); ?></p>
                        </div>      
                    </a>
                <?php
                }
                ?>
            </div>      
        </div>

    </body>
</html>