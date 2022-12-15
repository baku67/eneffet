window.onload = function() {

    // const connexionFormElem = document.createElement("form");

    document.getElementById("connexionButton").addEventListener("click", function() {
        // document.getElementById("connexionDiv").innerHTML = connexionFormElem;
        $("#connexionDiv").load("./templates/connexionForm.php");
    })

    document.getElementById("subscribeButton").addEventListener("click", function() {
    })

    document.getElementById("closeCross").addEventListener("click", function() {
        document.getElementById("connexionDiv").classList.add("fadeOut");
        setTimeout(function() {
            $("#connexionDiv").remove();
        }, 1000)

    })

}