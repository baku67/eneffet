window.onload = function() {

    let cvFirstName = document.getElementById('cvFirstName').getAttribute("value");
    let cvLastName = document.getElementById('cvLastName').getAttribute("value");
    let cvTel = document.getElementById('cvTel').getAttribute("value");
    let cvEmail = document.getElementById('cvEmail').getAttribute("value");
    let cvDrivingLicence = document.getElementById('cvDrivingLicence').getAttribute("value");
    let cvAddress = document.getElementById('cvAddress').getAttribute("value");
    let cvAge = document.getElementById('cvAge').getAttribute("value");


    document.getElementById('editCvButton').addEventListener('click', function() {
        if(document.getElementById('editCvButton').innerText == "Éditer")
        {
            const inputs = document.querySelectorAll(".inputCv");
            inputs.forEach((userItem) => {
                userItem.disabled = false;
                userItem.style.opacity = "0.9";
            });

            const labels = document.querySelectorAll(".labelCv");
            labels.forEach((userItem) => {
                userItem.style.opacity = "0.9";
            });
    
            document.getElementById('editCvButton').innerText = "Annuler";
            document.getElementById('editCvButton').classList.remove('inversedButton');
            document.getElementById('editCvButton').classList.add('alertButton');
            document.getElementById('saveCvButton').classList.add('grisedButton');
        }
        else if (document.getElementById('editCvButton').innerText == "Annuler") 
        {
            const inputs = document.querySelectorAll(".inputCv");
            inputs.forEach((userItem) => {
                userItem.disabled = true;
                userItem.style.opacity = "0.7";
            });

            const labels = document.querySelectorAll(".labelCv");
            labels.forEach((userItem) => {
                userItem.style.opacity = "0.7";
            });

            
            // Annuler les changements (non sauvegardés), lors save les valeurs de depart sont maj
            document.getElementById('cvFirstName').value = cvFirstName;
            document.getElementById('cvLastName').value = cvLastName;
            document.getElementById('cvTel').value = cvTel;
            document.getElementById('cvEmail').value = cvEmail;
            document.getElementById('cvDrivingLicence').value = cvDrivingLicence;
            document.getElementById('cvAddress').value = cvAddress;
            document.getElementById('cvAge').value = cvAge;


    
            document.getElementById('editCvButton').innerText = "Éditer";
            document.getElementById('editCvButton').classList.remove('alertButton');
            document.getElementById('editCvButton').classList.add('inversedButton');
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









    // Bouton "Ajouter une Experience"

    let addFormationButton = document.createElement("button");
    addFormationButton.id = "addFormationButton";
    addFormationButton.innerText = "Ajouter une formation";
    addFormationButton.addEventListener("click", function() {
        // ajouter le form pour ajout de formation
    });

    let addExpButton = document.createElement("button");
    addExpButton.id = "addExpButton";
    addExpButton.innerText = "Ajouter une expérience";
    addExpButton.addEventListener("click", function() {
        document.getElementById('addEventDiv').innerHTML = "";
        document.getElementById('addEventDiv').append(expForm);
        // document.getElementById('addEventDiv').append(cancelAddExp);
    });

    let cancelAddExp = document.createElement("button");
    cancelAddExp.setAttribute("type", "button");
    cancelAddExp.setAttribute("id", "cancelAddExp");
    cancelAddExp.innerText = "Annuler";
    cancelAddExp.addEventListener("click", function() {
        // Remettre les boutons par default
        document.getElementById('addEventDiv').innerHTML = "";
        document.getElementById('addEventDiv').append(addExpButton);
        document.getElementById('addEventDiv').append(addFormationButton);
    })


    let expForm = document.createElement("form");
    expForm.setAttribute("id", "expForm");
    expForm.setAttribute("method", "post");
    expForm.setAttribute("action", "");
    let expLabel1 = document.createElement("label");
    expLabel1.setAttribute("for", "expContent");
    expLabel1.innerText = "Contenu";
    let expInput1 = document.createElement("input");
    expInput1.setAttribute("name", "expContent");
    expInput1.setAttribute("type", "text");
    let validateAddExpButton = document.createElement("input");
    validateAddExpButton.type = "submit";
    validateAddExpButton.value = "Ajouter";
    validateAddExpButton.classList.add("inversedButton");
    validateAddExpButton.classList.add("Button2");
    expForm.appendChild(expLabel1);
    expForm.appendChild(expInput1);
    expForm.appendChild(document.createElement("br"));
    expForm.appendChild(cancelAddExp);
    expForm.appendChild(validateAddExpButton);


    document.getElementById('addExpButton').addEventListener("click", function() {
        document.getElementById('addEventDiv').innerHTML = "";
        document.getElementById('addEventDiv').append(expForm);
        // document.getElementById('addEventDiv').append(cancelAddExp);
    })




}