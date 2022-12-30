window.onload = function() {

    let cvFirstName = document.getElementById('cvFirstName').getAttribute("value");
    let cvLastName = document.getElementById('cvLastName').getAttribute("value");
    let cvTel = document.getElementById('cvTel').getAttribute("value");
    let cvEmail = document.getElementById('cvEmail').getAttribute("value");
    // Options:
    let cvDrivingLicence = document.getElementById('cvDrivingLicence');
    let cvDrivingLicenceText = cvDrivingLicence.options[cvDrivingLicence.selectedIndex].text;
    //
    let cvAddress = document.getElementById('cvAddress').getAttribute("value");
    let cvAge = document.getElementById('cvAge').getAttribute("value");

    var toggleEditCv = false;


    document.getElementById('editCvButton').addEventListener('click', function() {
        if(document.getElementById('editCvButton').innerText == "Éditer")
        {
            toggleEditCv = true;

            const inputs = document.querySelectorAll(".inputCv");
            inputs.forEach((userItem) => {
                userItem.disabled = false;
                userItem.style.opacity = "0.9";
                userItem.style.border = "2px solid rgba(68, 3, 189, 0.6)";
            });
            cvDrivingLicence.disabled = false;
            cvDrivingLicence.style.opacity = "0.9";


            const labels = document.querySelectorAll(".labelCv");
            labels.forEach((userItem) => {
                userItem.style.opacity = "0.9";
            });
    
            document.getElementById('editCvButton').innerText = "Annuler";
            document.getElementById('editCvButton').classList.remove('inversedButton2');
            document.getElementById('editCvButton').classList.add('alertButton');
            document.getElementById('saveCvButton').classList.add('grisedButton');

        }
        else if (document.getElementById('editCvButton').innerText == "Annuler") 
        {
            toggleEditCv = false;

            const inputs = document.querySelectorAll(".inputCv");
            inputs.forEach((userItem) => {
                userItem.disabled = true;
                userItem.style.opacity = "0.7";
                userItem.style.border = "2px solid rgba(68, 3, 189, 0.3)";
            });
            cvDrivingLicence.disabled = true;
            cvDrivingLicence.style.opacity = "0.7";

            const labels = document.querySelectorAll(".labelCv");
            labels.forEach((userItem) => {
                userItem.style.opacity = "0.7";
            });

            
            // Annuler les changements (non sauvegardés), lors save les valeurs de depart sont maj
            document.getElementById('cvFirstName').value = cvFirstName;
            document.getElementById('cvLastName').value = cvLastName;
            document.getElementById('cvTel').value = cvTel;
            document.getElementById('cvEmail').value = cvEmail;
            document.getElementById('cvDrivingLicence').value = cvDrivingLicenceText;
            document.getElementById('cvAddress').value = cvAddress;
            document.getElementById('cvAge').value = cvAge;


    
            document.getElementById('editCvButton').innerText = "Éditer";
            document.getElementById('editCvButton').classList.remove('alertButton');
            document.getElementById('editCvButton').classList.add('inversedButton2');
            document.getElementById('saveCvButton').disabled = true;
            document.getElementById('saveCvButton').classList.add('grisedButton');
        }
    })

    // Si changement dans les champs, boutons actifs
    document.querySelectorAll(".inputCv").forEach((elem) => {
        elem.addEventListener('change', function() {
            document.getElementById('saveCvButton').classList.remove('grisedButton');
            document.getElementById('saveCvButton').disabled = false;
        })
    });


    // document.querySelectorAll(".fadeInSlide").forEach((elem) => {
    //     setTimeout(function() {
    //         elem.classList.add("animCvSlideFadeIn");
    //     }, 1000);
    // })








    // Bouton "Ajouter une Experience"

    let cancelAddTraining = document.createElement("button");
    cancelAddTraining.setAttribute("type", "button");
    cancelAddTraining.setAttribute("id", "cancelAddTraining");
    cancelAddTraining.classList.add('alertButton');
    cancelAddTraining.innerText = "Annuler";
    cancelAddTraining.addEventListener("click", function() {
        // Remettre les boutons par default
        document.getElementById('addTrainingDiv').classList.add("fadeOut2");
        setTimeout(function() {
            document.getElementById('addTrainingDiv').innerHTML = "";
            document.getElementById('addTrainingDiv').classList.add("minimize");
            setTimeout(function() {
                document.getElementById('addTrainingDiv').classList.remove("minimize");
                document.getElementById('addTrainingDiv').classList.remove("fadeOut2");
                scrollToQuestionNode('trainingsWrapper');
            }, 300)
        }, 500);
    });

    let trainingForm = document.createElement("form");
    trainingForm.setAttribute("id", "trainingForm");
    trainingForm.setAttribute("method", "post");
    trainingForm.setAttribute("action", "account.php");

    let trainingInput0 = document.createElement("input");
    trainingInput0.setAttribute("name", "type");
    trainingInput0.setAttribute("value", "addTrainingCv");
    trainingInput0.setAttribute("type", "hidden");
    // trainingInput0.classList.add("inputCvExp");

    let trainingLabel1 = document.createElement("label");
    trainingLabel1.setAttribute("for", "trainingContent");
    trainingLabel1.innerText = "Description";
    trainingLabel1.classList.add("labelCvExp")
    let trainingInput1 = document.createElement("textarea");
    trainingInput1.setAttribute("name", "trainingContent");
    trainingInput1.required = "true";
    trainingInput1.setAttribute("type", "text");
    trainingInput1.setAttribute("rows", "6");
    trainingInput1.classList.add("inputCvTraining");

    let trainingLabel2 = document.createElement("label");
    trainingLabel2.setAttribute("for", "trainingBeginDate");
    trainingLabel2.innerText = "Date début:";
    trainingLabel2.classList.add("labelCvExp")
    let trainingInput2 = document.createElement("input");
    trainingInput2.required = "true";
    trainingInput2.setAttribute("name", "trainingBeginDate");
    trainingInput2.setAttribute("type", "date");
    trainingInput2.classList.add("inputCvTraining");

    let trainingLabel3 = document.createElement("label");
    trainingLabel3.setAttribute("for", "trainingEndDate");
    trainingLabel3.innerText = "Date fin:";
    trainingLabel3.classList.add("labelCvExp")
    let trainingInput3 = document.createElement("input");
    trainingInput3.setAttribute("name", "trainingEndDate");
    trainingInput3.required = "true";
    trainingInput3.setAttribute("type", "date");
    trainingInput3.classList.add("inputCvTraining");

    let trainingLabel4 = document.createElement("label");
    trainingLabel4.setAttribute("for", "trainingTitle");
    trainingLabel4.innerText = "Titre:";
    trainingLabel4.classList.add("labelCvExp")
    let trainingInput4 = document.createElement("input");
    trainingInput4.setAttribute("name", "trainingTitle");
    trainingInput4.required = "true";
    trainingInput4.setAttribute("type", "text");
    trainingInput4.setAttribute("maxLength", "50");
    trainingInput4.classList.add("inputCvTraining");

    let validateAddTrainingButton = document.createElement("input");
    validateAddTrainingButton.type = "submit";
    validateAddTrainingButton.value = "Ajouter";
    validateAddTrainingButton.classList.add("inversedButton");
    validateAddTrainingButton.classList.add("inputButton");
    trainingForm.appendChild(trainingInput0);
    trainingForm.appendChild(trainingLabel2);
    trainingForm.appendChild(trainingInput2);
    trainingForm.appendChild(document.createElement("br"));
    trainingForm.appendChild(trainingLabel3);
    trainingForm.appendChild(trainingInput3);
    trainingForm.appendChild(document.createElement("br"));
    trainingForm.appendChild(trainingLabel4);
    trainingForm.appendChild(trainingInput4);
    trainingForm.appendChild(document.createElement("br"));
    trainingForm.appendChild(trainingLabel1);
    trainingForm.appendChild(trainingInput1);
    trainingForm.appendChild(document.createElement("br"));
    trainingForm.appendChild(cancelAddTraining);
    trainingForm.appendChild(validateAddTrainingButton);


    // Smooth auto scroll to 'id'
    function scrollToQuestionNode(id) {
        const element = document.getElementById(id);
        element.scrollIntoView({ block: 'end',  behavior: 'smooth' });
    }

    document.getElementById('addTrainingButton').addEventListener("click", function() {
        document.getElementById('addTrainingDiv').innerHTML = "";
        document.getElementById('addTrainingDiv').append(trainingForm);
        // document.getElementById('addTrainingDiv').classList.add('fadeIn');
        scrollToQuestionNode('addTrainingDiv');
        // document.getElementById('addEventDiv').append(cancelAddExp);
    })






























    // let addExpButton = document.createElement("button");
    // addExpButton.id = "addExpButton";
    // addExpButton.innerHTML = "<p class='addExpPlus'>+</p><br/><p class='addExpTxt'>Ajouter une expérience</p>";
    // // addExpButton.innerText = "Ajouter une expérience";
    // addExpButton.addEventListener("click", function() {
    //     document.getElementById('addEventDiv').innerHTML = "";
    //     document.getElementById('addEventDiv').append(expForm);
    //     // document.getElementById('addEventDiv').append(cancelAddExp);
    // });

    let cancelAddExp = document.createElement("button");
    cancelAddExp.setAttribute("type", "button");
    cancelAddExp.setAttribute("id", "cancelAddExp");
    cancelAddExp.classList.add('alertButton');
    cancelAddExp.innerText = "Annuler";
    cancelAddExp.addEventListener("click", function() {
        document.getElementById('addEventDiv').classList.add("fadeOut2");
        setTimeout(function() {
            document.getElementById('addEventDiv').innerHTML = "";
            document.getElementById('addEventDiv').classList.add("minimize");
            setTimeout(function() {
                document.getElementById('addEventDiv').classList.remove("minimize");
                document.getElementById('addEventDiv').classList.remove("fadeOut2");
                scrollToQuestionNode('experiencesWrapper');
            }, 300);
        }, 500);
    });


    let expForm = document.createElement("form");
    expForm.setAttribute("id", "expForm");
    expForm.setAttribute("method", "post");
    expForm.setAttribute("action", "account.php");

    let expInput0 = document.createElement("input");
    expInput0.setAttribute("name", "type");
    expInput0.setAttribute("value", "addExpCv");
    expInput0.setAttribute("type", "hidden");
    expInput0.classList.add("inputCvExp");

    let expLabel1 = document.createElement("label");
    expLabel1.setAttribute("for", "expContent");
    expLabel1.innerText = "Description";
    expLabel1.classList.add("labelCvExp")
    let expInput1 = document.createElement("textarea");
    expInput1.required = "true";
    expInput1.setAttribute("name", "expContent");
    expInput1.setAttribute("type", "text");
    expInput1.setAttribute("rows", "6");
    expInput1.classList.add("inputCvExp");

    let expLabel2 = document.createElement("label");
    expLabel2.setAttribute("for", "expBeginDate");
    expLabel2.innerText = "Date début:";
    expLabel2.classList.add("labelCvExp")
    let expInput2 = document.createElement("input");
    expInput2.setAttribute("name", "expBeginDate");
    expInput2.required = "true";
    expInput2.setAttribute("type", "date");
    expInput2.classList.add("inputCvExp");

    let expLabel3 = document.createElement("label");
    expLabel3.setAttribute("for", "expEndDate");
    expLabel3.innerText = "Date fin:";
    expLabel3.classList.add("labelCvExp")
    let expInput3 = document.createElement("input");
    expInput3.required = "true";
    expInput3.setAttribute("name", "expEndDate");
    expInput3.setAttribute("type", "date");
    expInput3.classList.add("inputCvExp");

    let expLabel4 = document.createElement("label");
    expLabel4.setAttribute("for", "expTitle");
    expLabel4.innerText = "Titre:";
    expLabel4.classList.add("labelCvExp")
    let expInput4 = document.createElement("input");
    expInput4.setAttribute("name", "expTitle");
    expInput4.required = "true";
    expInput4.setAttribute("type", "text");
    expInput4.setAttribute("maxLength", "50");
    expInput4.classList.add("inputCvExp");



    // Ce serait bien que les 2 champs dates soient inline
    let validateAddExpButton = document.createElement("input");
    validateAddExpButton.type = "submit";
    validateAddExpButton.value = "Ajouter";
    validateAddExpButton.classList.add("inversedButton");
    validateAddExpButton.classList.add("inputButton");
    expForm.appendChild(expInput0);
    expForm.appendChild(expLabel2);
    expForm.appendChild(expInput2);
    expForm.appendChild(document.createElement("br"));
    expForm.appendChild(expLabel3);
    expForm.appendChild(expInput3);
    expForm.appendChild(document.createElement("br"));
    expForm.appendChild(expLabel4);
    expForm.appendChild(expInput4);
    expForm.appendChild(document.createElement("br"));
    expForm.appendChild(expLabel1);
    expForm.appendChild(expInput1);
    expForm.appendChild(document.createElement("br"));
    expForm.appendChild(cancelAddExp);
    expForm.appendChild(validateAddExpButton);


    // Smooth auto scroll to 'id'
    function scrollToQuestionNode(id) {
        const element = document.getElementById(id);
        element.scrollIntoView({ block: 'end',  behavior: 'smooth' });
    }

    document.getElementById('addExpButton').addEventListener("click", function() {
        document.getElementById('addEventDiv').innerHTML = "";
        document.getElementById('addEventDiv').append(expForm);
        scrollToQuestionNode('addEventDiv');
        // document.getElementById('addEventDiv').append(cancelAddExp);
    })






























    // Formulaire ajout d'une compétence CV
    let skillForm = document.createElement("form");
    skillForm.id = "skillForm";
    skillForm.method = "post";
    skillForm.action = "account.php";

    let skillInput0 = document.createElement("input");
    skillInput0.type = "hidden";
    skillInput0.name = "type";
    skillInput0.value = "addSkill";

    // Custom fleche psuedo elem
    let selectBox2 = document.createElement("div");
    selectBox2.id = "selectBox2";
    selectBox2.classList.add("select_box");
    selectBox2.style.display = "initial";
    //fin
    
    let skillInput01 = document.createElement("select");
    skillInput01.setAttribute("name", "skillType");
    skillInput01.classList.add("inputSkillType");
    skillInput01.id = "inputSkillType";
    // Options Qualité/Defaut
    let skillType1 = document.createElement("option");
    skillType1.value = "skill";
    skillType1.innerText = "Compétence";
    skillType1.selected = "true";
    let skillType2 = document.createElement("option");
    skillType2.value = "language";
    skillType2.innerText = "Langue";

    skillInput01.append(skillType1, skillType2);
    selectBox2.append(skillInput01);

    let skillInput1 = document.createElement("input");
    skillInput1.setAttribute("name", "skillWord");
    skillInput1.setAttribute("type", "text");
    skillInput1.id = "skillWord";
    skillInput1.placeholder = "Compétence";
    skillInput1.required = "true";
    skillInput1.classList.add("inputSkillKeyword");

    // input étoiles skillLevel
    let skillInput2 = document.createElement("div");
    skillInput2.innerHTML = '<label><input required="true" type="radio" name="skillLevel" value="1" /><span class="icon">★</span></label><label><input type="radio" name="skillLevel" value="2" /><span class="icon">★</span><span class="icon">★</span></label><label><input type="radio" name="skillLevel" value="3" /><span class="icon">★</span><span class="icon">★</span><span class="icon">★</span></label>';
    skillInput2.classList.add("rating");
    skillInput2.name = "skillLevel";
    skillInput2.required = "true";
    skillInput2.id = "skillInputLevel";


    let skillInput3 = document.createElement("input");
    skillInput3.type = "submit";
    skillInput3.value = "Ajouter";
    skillInput3.classList.add("inversedButton", "inputButton");

    let cancelSkillButton = document.createElement("button");
    cancelSkillButton.type = "button";
    cancelSkillButton.id = "cancelAddSkillButton";
    cancelSkillButton.classList.add("alertButton");
    cancelSkillButton.innerText = "Annuler";

    skillForm.append(skillInput0, skillInput01, skillInput1, skillInput2, document.createElement("br"), skillInput3, cancelSkillButton);

    // Changement de style inputs addTrait
    skillInput01.addEventListener('input', function (evt) {
        if (skillType1.selected == true) {
            document.getElementById("skillWord").placeholder = "Entrez une compétence";
        }
        else if (skillType2.selected == true) {
            document.getElementById("skillWord").placeholder = "Entrez une langue";
        }
    })



    $(':radio').change(function() {
        console.log('New star rating: ' + this.value);
      });



      



    // Formulaire ajout de Trait de personalité CV
    let personalityForm = document.createElement("form");
    personalityForm.id = "personalityForm";
    personalityForm.method = "post";
    personalityForm.action = "account.php";

    let persoInput0 = document.createElement("input");
    persoInput0.type = "hidden";
    persoInput0.name = "type";
    persoInput0.value = "addPersonality";

    // Custom fleche psuedo elem
    let selectBox = document.createElement("div");
    selectBox.id = "selectBox";
    selectBox.classList.add("select_box");
    selectBox.style.display = "initial";
    //fin
    
    let persoInput1 = document.createElement("select");
    persoInput1.setAttribute("name", "personalityType");
    persoInput1.classList.add("inputTraitType");
    persoInput1.id = "inputTraitType";
    // Options Qualité/Defaut
    let persoType1 = document.createElement("option");
    persoType1.value = "quality";
    persoType1.innerText = "Qualité";
    persoType1.selected = "true";
    let persoType2 = document.createElement("option");
    persoType2.value = "default";
    persoType2.innerText = "Défaut";

    persoInput1.append(persoType1, persoType2);
    selectBox.append(persoInput1);

    let persoInput2 = document.createElement("input");
    persoInput2.setAttribute("name", "personalityWord");
    persoInput2.setAttribute("type", "text");
    persoInput2.id = "personalityWord";
    persoInput2.placeholder = "Mots-clés";
    persoInput2.required = "true";
    persoInput2.classList.add("inputTraitKeyword");

    let persoInput3 = document.createElement("input");
    persoInput3.type = "submit";
    persoInput3.value = "Ajouter";
    persoInput3.classList.add("inversedButton", "inputButton");

    let cancelButton = document.createElement("button");
    cancelButton.type = "button";
    cancelButton.id = "cancelAddTraitButton";
    cancelButton.classList.add("alertButton");
    cancelButton.innerText = "Annuler";

    personalityForm.append(persoInput0, selectBox, persoInput2, document.createElement("br"), persoInput3, cancelButton);



    // Bouton de génération de form Skill/Personality
    document.getElementById("personalityFormButton").addEventListener("click", function() {
        document.getElementById("addPersonalityDiv").innerHTML = "";
        document.getElementById("addPersonalityDiv").append(personalityForm);
    });

    document.getElementById("skillFormButton").addEventListener("click", function() {
        document.getElementById("addSkillDiv").innerHTML = "";
        document.getElementById("addSkillDiv").append(skillForm);
    });



    // Changement de style inputs addTrait
    persoInput1.addEventListener('input', function (evt) {
        if (persoType1.selected == true) {
            document.getElementById("inputTraitType").style.border = "2px solid #37e137";
            document.getElementById("inputTraitType").style.color = "#37e137";

            // document.getElementById("personalityWord").style.border = "2px solid #37e137";
            document.getElementById("personalityWord").style.border = "2px solid rgb(68, 3, 189)";

        }
        else if (persoType1.selected == false) {
            document.getElementById("inputTraitType").style.border = "2px solid #bb3c8e";
            document.getElementById("inputTraitType").style.color = "#bb3c8e";

            // document.getElementById("personalityWord").style.border = "2px solid #bb3c8e";
            document.getElementById("personalityWord").style.border = "2px solid rgb(68, 3, 189)";

        }
    });

    // FadeIn Elem Cards marche pas comme ça sur forEach (utiliser i)
    document.querySelectorAll(".experienceDiv").forEach((elem) => {
        setTimeout(function() {
            elem.classList.add("fadeInElemCv");
        }, 500)
    });


    document.querySelectorAll(".inputDiv").forEach((elem) => {
        elem.addEventListener("click", function() {
            if(toggleEditCv == false) {
                // Click sur champ alors que disabled
                elem.lastElementChild.classList.add("shakeInput");
                document.getElementById("editCvButton").classList.add("shakeEditButton");

                setTimeout(function() {
                    elem.lastElementChild.classList.remove("shakeInput");
                    document.getElementById("editCvButton").classList.remove("shakeEditButton");
                }, 450);
                
            }
        });
    });








    // Form image upload
    let imgUploadForm = document.createElement("form");
    imgUploadForm.method = "post";
    imgUploadForm.action = "account.php";
    imgUploadForm.enctype = "multipart/form-data";
    imgUploadForm.id = "imgUploadForm";
    let inputUpload0 = document.createElement("input");
    inputUpload0.type = "hidden";
    inputUpload0.name = "type";
    inputUpload0.value = "uploadImg";
    let inputUpload1 = document.createElement("input");
    inputUpload1.type = "file";
    inputUpload1.name = "fileToUpload";
    inputUpload1.required = "true";
    inputUpload1.id = "fileToUpload";
    let inputUpload2 = document.createElement("input");
    inputUpload2.type = "submit";
    inputUpload2.value = "Mettre à jour";
    inputUpload2.name = "submit";
    let cancelUploadButton = document.createElement("button");
    cancelUploadButton.type = "button";
    cancelUploadButton.id = "cancelUploadButton";
    cancelUploadButton.innerText = "Annuler";
    cancelUploadButton.classList.add("alertButton");
    imgUploadForm.append(inputUpload0, inputUpload1, inputUpload2, cancelUploadButton);

    document.getElementById("changePhotoButton").addEventListener("click", function() {
        document.getElementById("changePhotoButton").remove();
        document.getElementById("cvPhotoGrid").append(imgUploadForm);
    });



}