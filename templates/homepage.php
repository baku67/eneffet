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

        <div id="connexionDiv" style="position:relative;">
            <p id="closeCross">&times;</p>
            <p>Créez un compte rapidement et <span style="color:rgb(68, 3, 189); font-weight:bold;">gratuitement</span> pour postuler à une offre d'emploi ou en publier une !</p>
            <button id="connexionButton">Connexion</button><button id="subscribeButton">Inscription</button>
            <div id="connexionSeparator"></div>
        </div>

        <h2 id="pageTitle">Offres d'emploi</h2>

        <a href="createjob.php"><button class="inversedButton">Publier une offre d'emploi</button></a>

        <?php
        foreach($jobs as $job) {
        ?>
            <div class="job">
                <p id="test">Test</p>
                <a href="job.php?id=<?= urlencode($job['identifier']) ?>">
                    <h4 class="jobPreviewTitle"><?= htmlspecialchars($job['title']) ?></h4>
                    <p id="date">Publié le <?= $job['date_creation'] ?></p>

                    <p class="jobPreviewLine">Localité &nbsp;<span class="jobPreviewData"><?= ucfirst(htmlspecialchars($job['locality'])) ?></span></p>
                    <p class="jobPreviewLine">Type &nbsp;<span class="jobPreviewData"><?= strtoupper(htmlspecialchars($job['contract_type'])) ?></span></p>
                    <p class="jobPreviewLine">Entreprise &nbsp;<span class="jobPreviewData"><?= ucfirst(htmlspecialchars($job['company'])) ?></span></p>
                    <p class="jobPreviewLine">Experience requise &nbsp;<span class="jobPreviewData"><?= ucfirst(htmlspecialchars($job['exp_years_needed'])) ?></span></p>

                    <!-- <a href="job.php?id=<?= urlencode($job['identifier']) ?>"><button>Voir détail</button></a> -->
                </a>
            </div>
        <?php
        }
        ?>

    </body>
</html>