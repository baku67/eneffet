window.onload = function() {


    document.getElementById("connexionButton").addEventListener("click", function() {
        $("#connexionDiv").load("./templates/connexionForm.php");
    })

    document.getElementById("subscribeButton").addEventListener("click", function() {
        $("#connexionDiv").load("./templates/subscribeForm.php");
    })

    document.getElementById("closeCross").addEventListener("click", function() {
        document.getElementById("connexionDiv").classList.add("fadeOut");
        setTimeout(function() {
            $("#connexionDiv").remove();
        }, 1000)

    })


}