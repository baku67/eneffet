<!-- <?php 
    include_once '../helpers/session_helper.php';
?> -->

<h2>Inscription</h2>

<!-- <?php flash('register') ?> -->

<form action="./controllers/Users.php" method="post">
    <!-- Input caché ici qui envoi l'infos qu'il sagit de l'inscription (meme controller pour les 2 actions) -->
    <input type="hidden" name="type" value="register">
    <label><b class="modalText">E-mail</b></label><input type="text" placeholder="Entrez votre adresse mail" name="mail" required>
    <br />
    <label><b class="modalText">Identifiant</b></label><input type="text" placeholder="Entrer un identifiant" name="username" required>
    <br />
    <label><b class="modalText">Mot de passe</b></label><input type="password" placeholder="Entrer un mot de passe" name="password" required>
    <br />
    <label><b class="modalText">Confirmer le mot de passe</b></label><input type="password" placeholder="Réécrivez le mot de passe" name="passwordRepeat" required>
    <br />
    <button type="submit" value="S'inscrire">S'inscrire</button>
    <!-- <input class="w3-check w3-margin-top" type="checkbox"> J'accepte les termes et conditions d'utilisation -->
</form>

<a href="index.php"><button>Retour</button></a>
