<h2>Connexion</h2>

<form action="./controllers/Users.php" method="post">
    <!-- Input caché ici qui envoi l'infos qu'il sagit de l'inscription (meme controller pour les 2 actions) -->
    <input type="hidden" name="type" value="login">
    <label for="username">Identifiant</label>
    <input type="text" id="username" name="name/email" placeholder="Entrez votre Email/Identifiant">
    <br />
    <br />
    <label for="password">Mot de passe</label>
    <input type="password" id="password" name="password" placeholder="Entrez votre mot de passe">
    <br />

    <input type="submit" value="Connexion" class="inversedButton inputButton"><a href="index.php"><button type="button">Retour</button></a>
</form>



