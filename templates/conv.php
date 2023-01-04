<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8" />
        <title>Eneffet</title>
        <link href="style.css" rel="stylesheet" />
        <script src="script.js"></script>
        <script src="scriptConv.js"></script>
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

        <div id="mainConv">

            <div id="conv">
                <?php foreach($convDetail as $message) 
                {
                    if($message["senderId"] !== $_SESSION["usersId"]) {
                    ?>
                    <p style="display:none; transition:all 0.3s;">DATE TEST</p>
                    <div class="msgBubble contact">
                            <p class="msgBubbleText"><?= $message["message"]; ?></p>
                        </div> 
                    <?php
                    }
                    else {
                    ?>
                    <p style="display:none; transition:all 0.3s;">DATE TEST</p>
                    <div class="msgBubble user">
                            <p class="msgBubbleText"><?= $message["message"]; ?></p>
                        </div>
                    <?php
                    }
                }
                ?>
            </div>

            <div id="sendMessageDiv">
                <form action="convdetail.php" method="post">
                    <input type="hidden" name="type" value="sendMessage">
                    <!-- <input type="hidden" name="contactId" value=""> -->
                    <input type="hidden" name="convId" value="<?= $convId; ?>">
                    <textarea id="messageTextInput" name="message" placeholder="Entrez un message..." rows="5" cols="33"></textarea>
                    <input type="submit" value="Envoyer">
                </form>
            </div>

        </div>


    </body>
</html>

