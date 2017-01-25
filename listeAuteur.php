<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Liste auteurs</title>
        <link href="css/template.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <?php
        require_once 'include/executeRequete.php';
        require_once 'include/connexion.php';
        require_once 'include/infoConnexion.php';

        $logIn = connexion(SERVEUR, UTILISATEUR, MOTDEPASSE, BASEDEDONNEES);
        $sql = 'SELECT * FROM auteur';
        $idRequete = executeR($logIn, $sql);

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
        ?>

        <a href="control/formAjout.php">Ajouter un auteur à la liste</a>

    </body>
</html>
