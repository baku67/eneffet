window.onload = function() {

    document.getElementById('editCvButton').addEventListener('click', function() {
        if(document.getElementById('editCvButton').innerText == "Éditer")
        {
            const inputs = document.querySelectorAll(".inputCv");

            inputs.forEach((userItem) => {
                userItem.disabled = false;
            });
    
            document.getElementById('editCvButton').innerText = "Annuler";
            document.getElementById('editCvButton').classList.remove('inversedButton');
            document.getElementById('editCvButton').classList.add('alertButton');
        }
        else if (document.getElementById('editCvButton').innerText == "Annuler") 
        {
            const inputs = document.querySelectorAll(".inputCv");

            inputs.forEach((userItem) => {
                userItem.disabled = true;
            });
    
            document.getElementById('editCvButton').innerText = "Éditer";
            document.getElementById('editCvButton').classList.remove('alertButton');
            document.getElementById('editCvButton').classList.add('inversedButton');

        }

    })


}