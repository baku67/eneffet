<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8" />
        <title>Eneffet</title>
        <link href="style.css" rel="stylesheet" />
    </head>

    <body style="text-align:center;">
        <h1 id="titre">&nbsp;&nbsp; Eneffet</h1>
        <!-- <h2>Recherche d'emploi</h2> -->

        <h2>Offres d'emploi</h2>

        <!-- Ici un load JS ? -->
        <a href="createjob.php"><button class="inversedButton">Publier une offre d'emploi</button></a>
        <div style="height:1px;width:25%;background-color:grey;margin:20px auto;"></div>


        <!-- Titre en aliceblue sur fond bleu (header de chaque vignette) -->
        <?php
        foreach($jobs as $job) {
        ?>
            <div class="job" style="position:relative; border:2px solid rgba(68, 3, 189, 0.7); border-radius: 6px; padding:10px 20px; width:30%; margin:auto">
                <p id="date">Publication le <?= $job['date_creation'] ?></p>
                <h4><?= htmlspecialchars($job['title']) ?></h4>
                <a href="job.php?id=<?= urlencode($job['identifier']) ?>"><button>Voir détail</button></a>
            </div>

            <div style="height:1px;width:25%;background-color:grey; opacity:0.5; margin:20px auto;"></div>

        <?php
        }
        ?>

        

    </body>



</html>