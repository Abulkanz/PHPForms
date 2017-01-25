<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link href="../css/template.css" rel="stylesheet" type="text/css"/>
        <title>Consultation</title>
    </head>
    <body>
        <?php
        require_once '../include/executeRequete.php';
        require_once '../include/connexion.php';
        require_once '../include/infoConnexion.php';

        if (isset($_POST['bConsult'])) {
            $id_auteur = $_POST['id'];
            $consult = "<form method='POST' action='../control/formConsult.php'><input type='submit' name='bConsult' value='C'><input type='hidden' name='id' value='".$id_auteur."'></form>";
            $modif = "<form method='POST' action='../control/formModif.php'><input type='submit' name='bModif' value='M'><input type='hidden' name='id' value='".$id_auteur."'></form>";
            $suppr = "<form method='POST' action='../control/formSuppr.php'><input type='submit' name='bSuppr' value='S'><input type='hidden' name='id' value='".$id_auteur."'></form>";
            
            $logIn = connexion(SERVEUR, UTILISATEUR, MOTDEPASSE, BASEDEDONNEES);
            $sql = 'SELECT id_auteur, nom, prenom FROM auteur WHERE id_auteur='.$id_auteur;
            $idRequete = executeR($logIn, $sql);
            $ligne = $idRequete->fetch(PDO::FETCH_ASSOC);
            
                echo '<table><tr><td><em>' . $ligne['nom'] . '</em></td>' . '<td>' . $ligne['prenom'] . '</td>' . '<td>' . $consult, $modif, $suppr . '</td></tr></table>';
        }
        ?>
        <a href="../listeAuteur.php">Accueil</a>
    </body>
</html>
