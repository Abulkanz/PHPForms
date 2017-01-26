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
            $objetRech = "%".$_POST['objRech']."%";
           
            $sql = 'SELECT * FROM auteur WHERE nom LIKE ? OR prenom LIKE ?';
            $idRequete = executeR($logIn, $sql, array($objetRech, $objetRech));
            
            echo '<table>';
            echo '<tr><th>Nom</th><th>Prénom</th><th>Actions</th></tr>';
            while ($ligne = $idRequete->fetch(PDO::FETCH_ASSOC)) {
                $idAut = $ligne['id_auteur'];
                $consult = "<form method='POST' action='control/formConsult.php'><input type='submit' name='bConsult' value='C'><input type='hidden' name='id' value='" . $idAut . "'></form>";
                $modif = "<form method='POST' action='control/formModif.php'><input type='submit' name='bModif' value='M'><input type='hidden' name='id' value='" . $idAut . "'></form>";
                $suppr = "<form method='POST' action='control/formSuppr.php'><input type='submit' name='bSuppr' value='S'><input type='hidden' name='id' value='" . $idAut . "'></form>";
                echo '<tr>' . '<td><em>' . $ligne['nom'] . '</em></td>' . '<td>' . $ligne['prenom'] . '</td>' . '<td>' . $consult, $modif, $suppr . '</td>' . '</tr>';
            }
            echo '</table>';
        }
            ?>
    </body>
</html>

