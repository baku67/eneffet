window.onload = function() {

    let messageForm = document.createElement("form");
    messageForm.id = "messageForm";
    messageForm.method = "post";
    messageForm.action = "messages.php";
    let inputMessage0 = document.createElement("input");
    inputMessage0.setAttribute("name", "type");
    inputMessage0.setAttribute("value", "startConv");
    inputMessage0.setAttribute("type", "hidden");
    let inputMessage = document.createElement("textarea");
    inputMessage.id = "inputMessage";
    inputMessage.name = "inputMessage";
    inputMessage.placeholder = "Entrez votre message";
    let sendMsgButton = document.createElement("button");
    sendMsgButton.id = "sendMsgButton";
    sendMsgButton.type = "submit";
    sendMsgButton.innerText = "Envoyer";
    sendMsgButton.classList.add("validateButton");
    let publisherIdInput = document.createElement("input");
    publisherIdInput.type = "hidden";
    publisherIdInput.name = "jobPublisherId";
    // publisherId récupéré via script dans le templates/job.php:
    publisherIdInput.value = publisherId;
    

    messageForm.append(inputMessage0, inputMessage, sendMsgButton, publisherIdInput);

    document.getElementById("askQuestionButton").addEventListener("click", function() {
        document.getElementById("mainJobDetail").insertBefore(messageForm, document.getElementById("backButton"));
    });


    console.log(publisherId);

}