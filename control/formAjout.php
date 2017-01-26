<!DOCTYPE html>
<html>
    <head>
        <title>BDD</title>
        <meta charset="UTF-8">
        <link href="css/template.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <form method="POST" action="formAjout.php">
            <input type="text" placeholder="Nom de l'auteur" name="Nom">
            <input type="text" placeholder="Prénom de l'auteur" name="Prenom">
            <input type="submit" name="addAuthor" value="Ajouter un BG">
        </form>   
        <?php
        require_once '../include/executeRequete.php';
        require_once '../include/connexion.php';
        require_once '../include/infoConnexion.php';

        if (isset($_POST['addAuthor'])) {
            $name = $_POST['Nom'];
            $fName = $_POST['Prenom'];
            $logIn = connexion(SERVEUR, UTILISATEUR, MOTDEPASSE, BASEDEDONNEES);
            $sql = 'INSERT INTO auteur (nom, prenom) VALUES (?, ?)';
            $idRequete = executeR($logIn, $sql, array($name, $fName));
        }
        ?>
        <a href="../listeAuteur.php">Accueil</a>
    </body>
</html>



