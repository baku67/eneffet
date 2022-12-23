<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8" />
        <title>Eneffet</title>
        <link href="style.css" rel="stylesheet" />
        <script src="scriptAccount.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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

        <div id="main" style="background: linear-gradient(129deg, rgba(172,250,255,0.6161827279740021) 0%, rgba(47,71,255,0.6722051369375875) 100%);" >

            <div id="cvScrollContainer">
                <h1 class="titleBg">C V</h2>

                <?php flash('saveCv'); ?>

                
                <img src="./cv_photo/bg.jpg" alt="image_cv" id="cvPhoto">

                <form action="account.php" method="post">
                    <input type="hidden" name="type" value="saveCv">
                    <label class="labelCv" for="cv_first_name" style="margin-top:19px;">Prénom:</label><br />
                    <input class="inputCv" type='text' id="cvFirstName" name="cv_first_name" value="<?= ucfirst(htmlspecialchars($cv['cv_first_name']));?>" disabled required>
                    <br />
                    <label class="labelCv" for="cv_last_name">Nom:</label>
                    <input class="inputCv" type='text' id="cvLastName" name="cv_last_name" value="<?= strtoupper(htmlspecialchars($cv['cv_last_name']));?>" disabled required>
                    <br />
                    <label class="labelCv" for="cv_tel">Tél:</label>
                    <input class="inputCv" type='text' id="cvTel" name="cv_tel" value="<?= htmlspecialchars($cv['cv_tel']);?>" disabled>
                    <br />
                    <label class="labelCv" for="cv_email">Email:</label>
                    <input class="inputCv" type='text' id="cvEmail" name="cv_email" value="<?= htmlspecialchars($cv['cv_email']);?>" disabled>
                    <br />
                    <label class="labelCv" for="cv_driving_licence">Permis B:</label>
                    <!-- <input class="inputCv" type='text' id="cvDrivingLicence" name="cv_driving_licence" value="<?php if(htmlspecialchars($cv['cv_driving_licence'])==1){
                        echo "Oui";
                    }else {
                        echo "Non";
                    }?>" disabled> -->
                    <select class="inputCv" type='text' id="cvDrivingLicence" name="cv_driving_licence" disabled>
                        <option <?php if(htmlspecialchars($cv['cv_driving_licence'])==1) {echo "selected";}?>>Oui</option>
                        <option <?php if(htmlspecialchars($cv['cv_driving_licence'])==0) {echo "selected";}?>>Non</option>
                    </select>
                    <br />
                    <label class="labelCv" for="cv_age">Date de naissance:</label>
                    <input class="inputCv" type='date' id="cvAge" name="cv_age" value="<?= htmlspecialchars($cv['cv_age']);?>" disabled>
                    <br />
                    <label class="labelCv" for="cv_address">Localité:</label>
                    <input class="inputCv" type='text' id="cvAddress" name="cv_address" value="<?= htmlspecialchars($cv['cv_address']);?>" disabled>
                    <br />
                    <button id="editCvButton" type="button" class="inversedButton">Éditer</button>
                    <input id="saveCvButton" class="saveCv inversedButton grisedButton" type="submit" value="Sauvegarder" disabled>
                </form>
                <br />

                


                <!-- Separateur -->

                <br />
                <br />

                <h2 class="titleBg">Expériences</h2><br />

                <div id="addEventDiv">
                    <?php flash('addExpCv'); ?>
                    <!-- <button id="addExpButton">Ajouter une expérience</button> -->
                    <!-- <button id="addFormationButton">Ajouter une formation</button> -->
                </div>

                <div id="experiencesWrapper">
                    <?php 
                        foreach ($exps as $exp) {
                    ?>
                            <div class="experienceDiv">
                                <div style="position:relative;"><a href="account.php?action=delete&id=<?= urlencode($exp['exp_id']); ?>" class="deleteExperienceOrTraining">&times;</a><a href="" class="fa fa-pencil"></a></div>
                                <br /><br />
                                <h3 class="experienceTitle"><?= htmlspecialchars($exp['exp_title']); ?></h3>
                                <p class="experienceDateLine">Du <?= $exp['exp_begin_date']; ?> au <?= $exp['exp_end_date']; ?></p>
                                <p class="experienceContent"><?= htmlspecialchars($exp['exp_content']); ?></p>
                            </div>
                    <?php
                        }
                    ?>
                    <button id="addExpButton"><p class="addExpPlus">+</p><br/><p class='addExpTxt'>Ajouter une expérience</p></button>
                </div>


                <!-- Separateur -->
                <br /><br /><br />


                <h2 class="titleBg">Formations</h2><br />
                <div id="trainingsWrapper">
                    <?php 
                        foreach ($trainings as $training) {
                    ?>
                            <div class="trainingDiv">
                                <div style="position:relative;"><p class="deleteExperienceOrTraining">&times;</p><i class="fa fa-pencil"></i></div>
                                <br />
                                <h3 class="trainingTitle"><?= htmlspecialchars($training['training_title']); ?></h3>
                                <p class="trainingDateLine">Du <?= $training['training_begin_date']; ?> au <?= $exp['training_end_date']; ?></p>
                                <p class="trainingContent"><?= htmlspecialchars($training['training_content']); ?></p>
                            </div>
                    <?php
                        }
                    ?>
                    <button id="addFormationButton">Ajouter une formation</button>
                </div>

                

                <br />
                <br />
                <h2 class="titleBg">Paramètres</h2>

                <label for="visibleToggle">Se rendre visible auprès des recruteurs:</label>
                <input type="checkbox">
            </div>
        </div>
    </body>
</html>