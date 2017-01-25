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

        $min = 1500;
        $max = 1800;
        $logIn = connexion(SERVEUR, UTILISATEUR, MOTDEPASSE, BASEDEDONNEES);
        $sql = 'SELECT nom, prenom FROM auteur WHERE date_naissance BETWEEN ? AND ?';
        $idRequete = executeR($logIn, $sql, array($min, $max));
        echo '<table>';
        echo '<tr><th>Nom</th><th>Prénom</th></tr>';
        while ($ligne = $idRequete->fetch(PDO::FETCH_ASSOC)) {
            echo '<tr>' . '<td><em>' . $ligne['nom'] . '</em></td>' . '<td>' . $ligne['prenom'] . '</td>' . '</tr>';
        }
        echo '</table>';
        ?>

        <a href="formAjout.php">Ajouter un auteur à la liste</a>
        <style>
           

        </style>
    </body>
</html>
