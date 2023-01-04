window.onload = function() {

    // ScrollIntoView() last message Conv (OK)
    var messageArray = document.querySelectorAll(".msgBubble");
        // console.log("Nombre de messages: " + messageArray.length);
        // console.log(messageArray);
    messageArray[(messageArray.length - 1)].scrollIntoView({ block: 'end',  behavior: 'smooth' });

}