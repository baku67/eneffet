<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8" />
        <title>Eneffet</title>
        <link href="style.css" rel="stylesheet" />
        <script src="script.js"></script>
        <script src="scriptJobDetail.js"></script>
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
                    <a href="index.php"><li class="navLink navButton navActive">Recherche</li></a>
                    <a href="account.php"><li class="navLink navButton">Profil</li></a>
                    <a href="messages.php"><li class="navLink navButton">Courrier</li></a>
                    <a href="./controllers/Users.php?q=logout"><li id="decoButton" class="navLink">Déconnexion</li></a>
                    </ul>';
            }
            ?>
        </div>

        <div id="mainJobDetail">
            <a href="index.php"><p id="returnArrowButton">&#60;</p></a>
            <h2 id="jobDetailPageTitle">Fiche emploi N°<?= $job['identifier'] ?></h2>

            <div id="jobDetail">
                
                <h3 id="jobDetailTitle"><?= htmlspecialchars_decode($job['title']) ?></h3>
                <script>
                    var jobId = <?= ($job['identifier']); ?>
                    // TEST avec id=11 en dur car pas de publisher pour l'instant:
                    // Ce publisherId est envoyé dans le form messages (scriptJobDetail)
                    var publisherId = <?= ($job['publisherId']); ?>
                </script>
                <p style="font-style:italic; color:grey; font-size:90%;">Publié le <?= $job['date_creation'] ?> par <a href="" style="text-decoration:underline;"><?= htmlspecialchars_decode($job['author']); ?></a></p>

                <p class="leftAlign">Localité: <span class="jobDetailData"><?= ucfirst(htmlspecialchars_decode($job['locality'])) ?></span></p>

                <p class="leftAlign">Entreprise: <span class="jobDetailData"><?= ucfirst(htmlspecialchars_decode($job['company'])) ?></span></p>

                <p class="leftAlign">Contrat: <span class="jobDetailData"><?= strtoupper(htmlspecialchars_decode($job['contract_type'])) ?></span></p>


                <p class="leftAlign">Années d'expérience requises: <span class="jobDetailData"><?= ucfirst(htmlspecialchars_decode($job['exp_years_needed'])) ?></span></p>


                <p class="leftAlign">Permis B <span class="jobDetailData"><?php if($job['driving_licence'] === 1): echo("requis"); else: echo("non requis"); endif;?></span></p>

                <p class="jobDetailContent">&nbsp;&nbsp;&nbsp;&nbsp;<?= htmlspecialchars_decode($job['content']) ?></p>

                <p class="rightAlign">Date de début: <span class="jobDetailData"><?= ucfirst(htmlspecialchars_decode($job['start_date'])) ?></span></p>


                <button class="postulateButton">Postuler</button><button id="askQuestionButton">Poser une question</button><button class="alertButton">Ne plus proposer</button>
                <br />
            </div>


            <a href="index.php" id="backButton"><button class="buttonThin">Retour à la liste d'emploi</button></a>
        </div>

    </body>



</html>