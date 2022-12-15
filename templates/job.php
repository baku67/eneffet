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

        <!-- <div class="scrollbar" id="style-8">
            <div class="force-overflow"></div>
        </div> -->

        <a href="index.php"><h1 id="titre">&nbsp;&nbsp; Eneffet</h1></a>

        <a href="index.php"><p id="returnArrowButton">&#60;</p></a>
        <h2>Fiche emploi N°<?= htmlspecialchars($job['identifier']) ?></h2>

        <div id="jobDetail">
            
            <h3 id="jobDetailTitle"><?= htmlspecialchars($job['title']) ?></h3>
            <p style="font-style:italic; color:grey; font-size:90%;">Publié le <?= htmlspecialchars($job['date_creation']) ?> par <a href="" style="text-decoration:underline;"><?= htmlspecialchars($job['author']); ?></a></p>

            <p class="leftAlign">Localité: <span class="jobDetailData"><?= ucfirst(htmlspecialchars($job['locality'])) ?></span></p>

            <p class="leftAlign">Entreprise: <span class="jobDetailData"><?= ucfirst(htmlspecialchars($job['company'])) ?></span></p>

            <p class="leftAlign">Contrat: <span class="jobDetailData"><?= strtoupper(htmlspecialchars($job['contract_type'])) ?></span></p>


            <p class="leftAlign">Années d'expérience requises: <span class="jobDetailData"><?= ucfirst(htmlspecialchars($job['exp_years_needed'])) ?></span></p>


            <p class="leftAlign">Permis B <span class="jobDetailData"><?php if($job['driving_licence'] === 1): echo("requis"); else: echo("non requis"); endif;?></span></p>

            <p class="jobDetailContent">&nbsp;&nbsp;&nbsp;&nbsp;<?= htmlspecialchars($job['content']) ?></p>

            <p class="rightAlign">Date de début: <span class="jobDetailData"><?= ucfirst(htmlspecialchars($job['start_date'])) ?></span></p>


            <button class="validateButton">Postuler</button><button>Poser une question</button><button class="alertButton">Ne plus proposer</button>
            <br />
        </div>


        <a href="index.php"><button class="buttonThin">Retour à la liste d'emploi</button></a>

    </body>



</html>