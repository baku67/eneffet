window.onload = function() {

    // ScrollIntoView (vers le bas de la conv), du lastMessage Conv (OK!)
    var messageArray = document.querySelectorAll(".msgBubble");
        // console.log("Nombre de messages: " + messageArray.length);
        // console.log(messageArray);
    messageArray[(messageArray.length - 1)].scrollIntoView({ block: 'end',  behavior: 'smooth' });

}