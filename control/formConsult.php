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
        <link href="https://fonts.googleapis.com/css?family=Rock+Salt" rel="stylesheet"> 
        <title>Consultation</title>
    </head>
    <body>
        <div class="conteneur">
            <header>
                <div id='banner'><h1>LISTE D'AUTEURS</h1></div>
                <br>
            </header>
            <?php
            require_once '../include/executeRequete.php';
            require_once '../include/connexion.php';
            require_once '../include/infoConnexion.php';

            if (isset($_POST['bConsult'])) {
                $id_auteur = $_POST['id'];

                $logIn = connexion(SERVEUR, UTILISATEUR, MOTDEPASSE, BASEDEDONNEES);
                $sql = 'SELECT * FROM auteur WHERE id_auteur=' . $id_auteur;
                $idRequete = executeR($logIn, $sql);
                $ligne = $idRequete->fetch(PDO::FETCH_ASSOC);

                echo '<table><tr><th>Identifiant</th><th>Nom</th><th>Prénom</th><th>Année de naissance</th></tr>';
                echo '<tr><td>' . $ligne['id_auteur'] . '</td><td><em>' . $ligne['nom'] . '</em></td>' . '<td>' . $ligne['prenom'] . '</td>' . '<td>' . $ligne['date_naissance'] . '</td></tr></table>';
            }
            ?>
            <a class='lienAcc' href="../listeAuteur.php">Accueil</a>
        </div>
    </body>
</html>
