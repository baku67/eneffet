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
    
            document.getElementById('editCvButton').innerText = "Annuler";
            // document.getElementById('editCvButton').disabled = true;
            document.getElementById('editCvButton').classList.remove('inversedButton');
            document.getElementById('editCvButton').classList.add('alertButton');
            // document.getElementById('editCvButton').classList.add('grisedButton');
            document.getElementById('editCvButton').style.cursor = "default";
            document.getElementById('saveCvButton').classList.add('grisedButton');
        }
        else if (document.getElementById('editCvButton').innerText == "Annuler") 
        {
            const inputs = document.querySelectorAll(".inputCv");

            inputs.forEach((userItem) => {
                userItem.disabled = true;
                userItem.style.opacity = "0.5";
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
            // document.getElementById('editCvButton').classList.remove('grisedButton');

            document.getElementById('editCvButton').style.cursor = "pointer";
            document.getElementById('saveCvButton').disabled = false;
            // document.getElementById('editCvButton').disabled = false;
        })
    });




}