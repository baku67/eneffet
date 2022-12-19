<h2>Connexion</h2>

<form action="./controllers/Users.php" method="post">
    <!-- Input caché ici qui envoi l'infos qu'il sagit de l'inscription (meme controller pour les 2 actions) -->
    <input type="hidden" name="type" value="login">
    <label for="username">Identifiant</label>
    <input type="text" id="username" name="name/email">
    <br />
    <label for="password">Mot de passe</label>
    <input type="password" id="password" name="password">
    <br />

    <input type="submit" value="Submit">
</form>


<a href="index.php"><button>Retour</button></a>
