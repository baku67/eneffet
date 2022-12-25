<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8" />
        <title>Eneffet</title>
        <link href="style.css" rel="stylesheet" />
        <script src="script.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <link rel="icon" type="image/x-icon" href="./images/favicon.ico">
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
                </div>';
            }
            ?>

            <!-- <h2 id="pageTitle">Offres d'emploi</h2> -->

            <a href="createjob.php"><button class="inversedButton">Publier une offre d'emploi</button></a>
            <br/>

            <form method="post" action="searchList.php">
                <input type="hidden" name="type" value="filterJobList">                
                <label for="searchFilter1" class="labelCv" style="left:35%;">Catégorie</label>
                <select name="searchFilter1" placeholder="Filtrer la recherche" class="inputBgColorBlue inputFilter">
                    <option value="default">Toutes</option>
                    <option value="informatique">Informatique</option>
                    <option value="aeronautique">Aéronautique</option>
                    <option value="administratif">Administratif</option>
                    <option value="graphisme">Graphisme</option>
                </select>
                <label for="searchFilter2" class="labelCv" style="left:50.2%;">Localité</label>
                <input type="text" name="searchFilter2" placeholder="Strasbourg, Lyon,..." class="inputBgColorBlue inputFilter">
                <input type="submit" class="inversedButton inputButton" value="Chercher">
            </form>

            <div id="jobsContainer">
                <?php
                if (empty($jobsFiltered)) {
                ?>
                    <p>Aucune offre d'emploi ne correspond aux critères de recherche :/</p>
                <?php
                }
                else {
                ?>
                    <p><?= count($jobsFiltered); ?> offres disponibles (<span class="filters"><?= htmlspecialchars($filters[0]) ?></span>, <span class="filters"><?= htmlspecialchars($filters[1]) ?></span>)</p>

                <?php
                    foreach($jobsFiltered as $job) {
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
                }
                ?>
            </div>
        
        </div>

    </body>
</html>