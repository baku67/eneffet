<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8" />
        <title>Eneffet</title>
        <link href="style.css" rel="stylesheet" />
        <script src="scriptAccount.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="icon" type="image/x-icon" href="./images/favicon.ico">
    </head>

    <body style="text-align:center;">
        <div>
            <h1 id="titre"><a href="index.php"> Eneffet</a></h1>
            <?php if(isset($_SESSION['usersName'])) {
                echo '<ul id="navList">
                <a href="index.php"><li class="navLink navButton">Recherche</li></a>
                <a href="account.php"><li class="navLink navButton navActiveAccount">Profil</li></a>
                <a href="messages.php"><li class="navLink navButton">Courrier</li></a>
                <a href="./controllers/Users.php?q=logout"><li id="decoButton" class="navLink">Déconnexion</li></a>
                </ul>';
            }
            ?>
        </div>

        <div id="main" style="background:linear-gradient(129deg, rgba(172,250,255,0.6161827279740021) 0%, rgba(172,250,255,0.6161827279740021) 15%, rgba(47,71,255,0.6722051369375875) 100%);" >

            <div id="cvScrollContainer">
                <h1 class="titleBg">C V</h2>

                <?php flash('saveCv'); ?>

                <div id="gridCvPhotoContainer">
                    <div id="cvPhotoGrid">
                        <div id="cvPhotoContainer">
                        <!-- <img src="./<?= $cvPhotoPath[0] ?>" alt="image_cv" id="cvPhoto"> -->
                        <img src="./<?php
                            if ($cvPhotoPath[0] == "") {
                                echo("uploads/default.jpg");
                            }
                            else {
                                echo($cvPhotoPath[0]);
                            }
                        ?>" alt="image_cv" id="cvPhoto">

                        <br />
                        <button id="changePhotoButton">Changer</button>
                        </div>

                        <div>
                        <br />
                        <form>
                            <textarea id="resumeInput" type="text" placeholder="Entrez un résumé..."></textarea>
                            
                        </form>
                        </div>
                    </div>

                    <div id="cvFormGrid">

                        <div id="cvGraph"></div>

                        <form action="account.php" method="post">
                            <br /><br />
                            <input type="hidden" name="type" value="saveCv">
                            <div id="firstNameDiv" class="fadeInSlide inputDiv">
                                <label class="labelCv" for="cv_first_name">Prénom:</label>
                                <input class="inputCv" type='text' id="cvFirstName" name="cv_first_name" value="<?= ucfirst(htmlspecialchars_decode($cv['cv_first_name']));?>" placeholder="Entrez votre prénom" disabled required>
                            </div>
                            <br />
                            <div id="lastNameDiv" class="fadeInSlide inputDiv">
                                <label class="labelCv" for="cv_last_name">Nom:</label>
                                <input class="inputCv" type='text' id="cvLastName" name="cv_last_name" value="<?= strtoupper(htmlspecialchars_decode($cv['cv_last_name']));?>" placeholder="Entrez votre nom" disabled required>
                            </div>
                            <br />
                            <div id="telDiv" class="fadeInSlide inputDiv">
                                <label class="labelCv" for="cv_tel">Tél:</label>
                                <input class="inputCv" type='text' id="cvTel" name="cv_tel" value="<?= htmlspecialchars_decode($cv['cv_tel']);?>" placeholder="Entrez un numéro de téléphone" disabled>
                            </div>
                            <br />
                            <div id="emaiDiv" class="fadeInSlide inputDiv">
                                <label class="labelCv" for="cv_email">Email:</label>
                                <input class="inputCv" type='text' id="cvEmail" name="cv_email" value="<?= htmlspecialchars_decode($cv['cv_email']);?>" placeholder="Entrez une adresse mail de contact" disabled required>
                            </div>
                            <br />
                            <div id="drivingLicenceDiv" class="fadeInSlide inputDiv">
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
                            </div>
                            <br />
                            <div id="ageDiv" class="fadeInSlide inputDiv">
                                <label class="labelCv" for="cv_age">Date de naissance:</label>
                                <input class="inputCv" type='date' id="cvAge" name="cv_age" value="<?= htmlspecialchars_decode($cv['cv_age']);?>" placeholder="Entrez votre date de naissance" disabled>
                            </div>
                            <br />
                            <div id="addressDiv" class="fadeInSlide inputDiv">
                                <label class="labelCv" for="cv_address">Localité:</label>
                                <input class="inputCv" type='text' id="cvAddress" name="cv_address" value="<?= htmlspecialchars_decode($cv['cv_address']);?>" placeholder="Entrez votre localité" disabled>
                            </div>
                            <br />
                            <button id="editCvButton" type="button" class="inversedButton2">Éditer</button>
                            <input id="saveCvButton" class="saveCv inversedButton grisedButton" type="submit" value="Sauvegarder" disabled>
                        </form>
                    </div>
                </div>
                <br />

                


                <!-- Separateur -->

                <br />
                <br />

                <h2 class="titleBg">Expériences / Formations</h2><br />

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
                                <p class="expId" type="hidden" style="display:none;" ><?= $exp['exp_id']; ?></p>
                                <div style="position:relative;"><a href="account.php?action=delete-experience&id=<?= urlencode($exp['exp_id']); ?>" class="deleteExperienceOrTraining">&times;</a><a href="account.php?action=modifyEvent&type=exp&id=<?= urlencode($exp['exp_id']); ?>" class="fa fa-pencil"></a></div>
                                <br /><br />
                                <h3 class="experienceTitle"><?= htmlspecialchars_decode($exp['exp_title']); ?></h3>
                                <p class="experienceDateLine">Du <?= $exp['exp_begin_date']; ?> au <?= $exp['exp_end_date']; ?></p>
                                <p class="experienceContent"><?= htmlspecialchars_decode($exp['exp_content']); ?></p>
                            </div>
                    <?php
                        }
                    ?>
                    <button id="addExpButton"><p class="addExpPlus">+</p><br/><p class='addExpTxt'>Ajouter une expérience</p></button>
                </div>


                <!-- Separateur -->
                <br /><br /><br />


                <!-- <h2 class="titleBg">Formations</h2><br /> -->
                <div style="position:relative; height:1px; background-color:#0068e5; width:15%; text-align:center; margin:0px auto 25px auto"></div>

                <div id="addTrainingDiv">
                    <?php flash('addTrainingCv'); ?>

                </div>

                <div id="trainingsWrapper">
                    <?php 
                        foreach ($trainings as $training) {
                    ?>
                            <div class="trainingDiv">
                                <div style="position:relative;"><a href="account.php?action=delete-training&id=<?= urlencode($training['training_id']); ?>" class="deleteExperienceOrTraining">&times;</a><i class="fa fa-pencil"></i></div>
                                <br /><br />
                                <h3 class="trainingTitle"><?= htmlspecialchars_decode($training['training_title']); ?></h3>
                                <p class="trainingDateLine">Du <?= $training['training_begin_date']; ?> au <?= $training['training_end_date']; ?></p>
                                <p class="trainingContent"><?= htmlspecialchars_decode($training['training_content']); ?></p>
                            </div>
                    <?php
                        }
                    ?>
                    <button id="addTrainingButton"><p class="addTrainingPlus">+</p><br /><p class="addTrainingTxt">Ajouter une formation</button>
                </div>



                <!-- Separateur -->
                <br /><br /><br />


                <h2 class="titleBg">Compétences / Personalité</h2><br />
                <!-- Grid 2 colonnes:   
                    1ere colonne: Compétences
                    2ème colonne: Grid 2 colonnes :Qualités (cyan/vert?) / Défauts (rouge?) -->

                    <div class="skillsPersoGrid">
                        <div class="personality">
                            <div class="qualities">
                                <h3 id="qualitiesTitle">Qualités</h3>
                                <div class="qualitiesList">
                                    <?php
                                    foreach($qualities as $quality) {
                                    ?>
                                        <div class="qualityDiv">
                                            <p class="qualityKeyword"><?= ucfirst(htmlspecialchars($quality['traitKeyword'])) ?></p><a href="account.php?action=deleteTrait&id=<?= urlencode($quality['traitId']); ?>" class="deleteTraitCross">&times;</a>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="defaults">
                                <h3 id="defaultsTitle">Défauts</h3>
                                <div class="defaultsList">
                                    <?php
                                    foreach($defaults as $default) {
                                    ?>
                                        <div class="defaultDiv">
                                            <p class="defaultKeyword"><?= ucfirst(htmlspecialchars($default['traitKeyword'])) ?></p><a href="account.php?action=deleteTrait&id=<?= urlencode($default['traitId']); ?>" class="deleteTraitCross">&times;</a>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>

                        <!-- <h3>Compétences</h3> -->

                        <div class="skills">

                            
                                <div style="position:relative; display:flex; flex-direction:column; margin-bottom:25px;">
                                    <h3 id="skillsTitle">Compétences</h3>
                                    <?php
                                        foreach($skills as $skill) {
                                    ?>
                                        <p class="skillLine"><span class="skillWord"><a href="account.php?action=deleteSkill&id=<?= urlencode($skill['skillId']); ?>" class="deleteSkillCross">&#10005;</a><span class="skillWord2"><?= ucfirst(htmlspecialchars($skill['skillWord'])) ?></span></span><span class="skillLevel"><?php
                                            if($skill['skillLevel'] == "1") {
                                                echo("&#9733;<span style='color:#9b9b9b'>&#9733;&#9733;</span>");
                                            }
                                            else if($skill['skillLevel'] == "2") {
                                                echo("&#9733;&#9733;<span style='color:#9b9b9b'>&#9733;</span>");
                                            }
                                            else if ($skill['skillLevel'] == "3") {
                                                echo("&#9733;&#9733;&#9733;");
                                            }
                                        ?>
                                        </span></p><br />
                                    <?php
                                        }
                                    ?>
                                    <div id="separatorSkill"></div>
                                </div>
                                

                                <div style="display:flex; flex-direction:column;">
                                    <h3 id="langsTitle">Langues</h3>
                                    <?php
                                        foreach($languages as $lang) {
                                    ?>
                                        <p class="langLine"><span class="langWord"><a href="account.php?action=deleteLang&id=<?= urlencode($lang['langId']); ?>" class="deleteLangCross">&#10005;</a><span class="langWord2"><?= ucfirst(htmlspecialchars($lang['langWord'])) ?></span></span><span class="langLevel"><?php
                                            if($lang['langLevel'] == "1") {
                                                echo("&#9733;<span style='color:#9b9b9b'>&#9733;&#9733;</span>");
                                            }
                                            else if($lang['langLevel'] == "2") {
                                                echo("&#9733;&#9733;<span style='color:#9b9b9b'>&#9733;</span>");
                                            }
                                            else if ($lang['langLevel'] == "3") {
                                                echo("&#9733;&#9733;&#9733;");
                                            }
                                        ?>
                                        </span></p><br />
                                    <?php
                                        }
                                    ?>
                                </div>
                                

                        </div>
                        <div class="addSkillDiv" id="addSkillDiv">
                            <!--  Onclick load le form dans la div (et cancel: load le button) -->
                            <button id="skillFormButton">Ajouter un élément</button>
                        </div>
                        <div class="addPersonalityDiv" id="addPersonalityDiv">
                            <!--  Onclick load le form dans la div (et cancel: load le button) -->
                            <button id="personalityFormButton">Ajouter un élément</button>
                        </div>
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