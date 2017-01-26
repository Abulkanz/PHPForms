<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Liste auteurs</title>
        <link href="../css/template.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <?php
        require_once '../include/executeRequete.php';
        require_once '../include/connexion.php';
        require_once '../include/infoConnexion.php';
        $logIn = connexion(SERVEUR, UTILISATEUR, MOTDEPASSE, BASEDEDONNEES);

        if (isset($_POST['goRech'])) {
            $objetRech = "%" . $_POST['objRech'] . "%";

            $sql = 'SELECT * FROM auteur WHERE nom LIKE ? OR prenom LIKE ?';
            $idRequete = executeR($logIn, $sql, array($objetRech, $objetRech));


            echo '<table><tr><th>Identifiant</th><th>Nom</th><th>Prénom</th><th>Année de naissance</th></tr>';
            while ($ligne = $idRequete->fetch(PDO::FETCH_ASSOC)) {
                echo '<tr><td>' . $ligne['id_auteur'] . '</td><td><em>' . $ligne['nom'] . '</em></td>' . '<td>' . $ligne['prenom'] . '</td>' . '<td>' . $ligne['date_naissance'] . '</td></tr></table>';
            }
            echo '</table>';
        }
        ?>
        <a class='lienAcc' href="../listeAuteur.php">Accueil</a>
    </body>
</html>

