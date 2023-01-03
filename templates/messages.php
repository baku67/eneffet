<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8" />
        <title>Eneffet</title>
        <link href="style.css" rel="stylesheet" />
        <script src="script.js"></script>
        <script src="scriptJobDetail.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <link rel="icon" type="image/x-icon" href="./images/favicon.ico">
        <style>
            html, body {
                margin: 0;
                height: 100%;
                overflow: hidden
            }
        </style>
    </head>

    <body style="text-align:center;position:relative; overflow:hidden;">

    <img src="./images/5559852.jpg" style="opacity:0.35; position:absolute; left:0; top:0; width:100%; height:100%">

            <div id="convContainer">
                <?php
                foreach($conv as $message) {
                ?>
                    <div>
                        <p><?= htmlspecialchars_decode($message['message']); ?></p>
                    </div>      

                <?php
                }
                ?>
            </div>      

    </body>
</html>