<!DOCTYPE html>
<html>
    <head>
        <title>BDD</title>
        <meta charset="UTF-8">
        <link href="../css/template.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div class="conteneur">
            <header>
                <div id='banner'><h1>LISTE D'AUTEURS</h1></div>
                <br>
            </header>
            <form id="fAjout" method="POST" action="formAjout.php">
                <input type="text" placeholder="Nom de l'auteur" name="Nom">
                <input type="text" placeholder="Prénom de l'auteur" name="Prenom">
                <input type="text" placeholder="Année de naissance" name="Date">
                <input type="submit" name="addAuthor" value="Ajouter un BG">
            </form>   
            <?php
            require_once '../include/executeRequete.php';
            require_once '../include/connexion.php';
            require_once '../include/infoConnexion.php';

            if (isset($_POST['addAuthor'])) {
                $name = $_POST['Nom'];
                $fName = $_POST['Prenom'];
                $fDate = $_POST['Date'];
                $logIn = connexion(SERVEUR, UTILISATEUR, MOTDEPASSE, BASEDEDONNEES);
                $sql = 'INSERT INTO auteur (nom, prenom, date_naissance) VALUES (?, ?, ?)';
                $idRequete = executeR($logIn, $sql, array($name, $fName, $fDate));
            }
            ?>
            <a class="lienAcc" href="../index.php">Accueil</a>
        </div>
    </body>
</html>



