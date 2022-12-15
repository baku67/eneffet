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
        <h1 id="titre">&nbsp;&nbsp; <a href="index.php">Eneffet</a></h1>
        <!-- <h2>Recherche d'emploi</h2> -->

        <div id="connexionDiv" style="position:relative;">
            <p id="closeCross">&#10006;</p>
            <p>Créez un compte rapidement et gratuitement pour postuler à une offre d'emploi ou en publier une !</p>
            <button id="connexionButton">Connexion</button><button id="subscribeButton">Inscription</button>
            <div id="connexionSeparator"></div>
        </div>



        <h2 id="pageTitle">Offres d'emploi</h2>

        <!-- Ici un load JS ? -->
        <a href="createjob.php"><button class="inversedButton">Publier une offre d'emploi</button></a>
        <!-- <div style="height:1px;width:25%;background-color:grey;margin:20px auto;"></div> -->


        <!-- Titre en aliceblue sur fond bleu (header de chaque vignette) -->
        <?php
        foreach($jobs as $job) {
        ?>
            <div class="job">
                <p id="date">Publication le <?= $job['date_creation'] ?></p>
                <h4><?= htmlspecialchars($job['title']) ?></h4>
                <a href="job.php?id=<?= urlencode($job['identifier']) ?>"><button>Voir détail</button></a>
            </div>

            <!-- <div style="height:1px;width:25%;background-color:grey; opacity:0.5; margin:20px auto;"></div> -->

        <?php
        }
        ?>

        

    </body>



</html>