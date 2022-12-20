<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8" />
        <title>Eneffet</title>
        <link href="style.css" rel="stylesheet" />
        <script src="script.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    </head>

    <body style="text-align:center;">
    <a href="index.php"><h1 id="titre"> Eneffet</h1></a>
        <!-- <h2>Recherche d'emploi</h2> -->

        <h2>Publier une offre d'emploi</h2>

        <form>
            <!-- Mettre des select pour locality, company, .../ Radio pour contract Type, toogle Permis B -->
            <label for="jobTitle">Intitulé du poste</label>
            <input type="text" id="jobTitle" name="jobTitle">
            <br />
            <label for="jobLocality">Localité</label>
            <input type="text" id="jobLocality" name="jobLocality">
            <br />
            <label for="jobCompany">Entreprise</label>
            <input type="text" id="jobCompany" name="jobCompany">
            <br />
            <label for="jobContractType">Type de contrat</label>
            <input type="text" id="jobContractType" name="jobContractType">
            <br />
            <label for="jobCategory">Catégorie</label>
            <input type="text" id="jobCategory" name="jobCategory">
            <br />
            <!-- <label for="jobDrivingLicence">Permis B requis</label>
            <input type="text" id="jobDrivingLicence" name="jobDrivingLicence">
            <br /> -->
            <label class="switch" for="jobDrivingLicence">
                <input type="checkbox" id="jobDrivingLicence" name="jobDrivingLicence">
                <span class="slider round">Permis B requis</span>
            </label>
            <br />
            <label for="jobExpNeeded">Années d'expérience</label>
            <input type="text" id="jobExpNeeded" name="jobExpNeeded">
            <br />
            <label for="jobStartDate">Début</label>
            <input type="text" id="jobStartDate" name="jobStartDate">
            <br />
            <label for="jobDescription">Description</label>
            <input type="text" id="jobDescription" name="jobDescription">

            <br />
            <input type="submit" value="Submit">
        </form>


        <a href="index.php"><button>Retour à la liste d'emploi</button></a>


        

    </body>



</html>