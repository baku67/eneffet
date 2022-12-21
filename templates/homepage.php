<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8" />
        <title>Eneffet</title>
        <link href="style.css" rel="stylesheet" />
        <script src="script.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <?php include_once 'helpers\session_helper.php'; ?>
        <style>
            html, body {
                margin: 0;
                height: 100%;
                overflow: hidden
            }
        </style>
    </head>

    <body style="text-align:center;" class="wrap" style="position:relative; overflow:hidden;">

    <img src="./images/5559852.jpg" class="backgroundImage" style="opacity:0.35; position:absolute; left:0; top:0; width:100%; height:100%">

        <div>
            <h1 id="titre"><a href="index.php"> Eneffet</a></h1>
            <?php if(isset($_SESSION['usersName'])) {
                echo '<ul id="navList">
                <a href="index.php"><li class="navLink navButton navActive">Recherche</li></a>
                <a href="account.php"><li class="navLink navButton">Profil</li></a>
                <a href="./controllers/Users.php?q=logout"><li id="decoButton" class="navLink">Déconnexion</li></a>
                </ul>';
            }
            ?>
        </div>

        <div id="main" style="position:relative;">

            <h1 id="titlePage">Bienvenue, <?php if(isset($_SESSION['usersId'])){
                echo explode(" ", $_SESSION['usersName'])[0];
                echo $_SESSION['usersId'];
            }else{
                echo 'Guest';
            }
            ?> </h1>
            

            <?php flash('register') ?>
            <?php flash('login') ?>

            <?php if(!isset($_SESSION['usersName'])){
                echo '<div id="connexionDiv" style="position:relative;">
                <p id="closeCross">&times;</p>
                <p>Créez un compte rapidement et <span style="color:rgb(68, 3, 189); font-weight:bold;">gratuitement</span> pour postuler à une offre d\'emploi ou en publier une !</p>
                <button id="connexionButton">Connexion</button><button id="subscribeButton">Inscription</button>
                <div id="connexionSeparator"></div>
                </div>';
            }
            ?>

            <!-- <h2 id="pageTitle">Offres d'emploi</h2> -->

            <a href="createjob.php"><button class="inversedButton">Publier une offre d'emploi</button></a>
            <br/>
            <label for="searchFilter1" class="labelCv" style="left:35%;">Catégorie</label>
            <select name="searchFilter1" placeholder="Filtrer la recherche" class="inputBgColorBlue inputFilter">
                <option value="informatique">Informatique</option>
                <option value="informatique">Aéronautique</option>
                <option value="informatique">Administratif</option>
                <option value="informatique">Graphisme</option>
            </select>
            <label for="searchFilter2" class="labelCv" style="left:50.2%;">Location</label>
            <input type="select" name="searchFilter2" placeholder="Filtrer la recherche" class="inputBgColorBlue inputFilter">

            <div id="jobsContainer">
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
            </div>
        
        </div>

    </body>
</html>