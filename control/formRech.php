<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Liste auteurs</title>
        <link href="../css/template.css" rel="stylesheet" type="text/css"/>
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
            $logIn = connexion(SERVEUR, UTILISATEUR, MOTDEPASSE, BASEDEDONNEES);

            if (isset($_POST['goRech'])) {
                $objetRech = "%" . $_POST['objRech'] . "%";
                $choix = $_POST['selection'];
                //Execute une fois la requête et affiche un message si celle-ci est retournée vide
                $sql = 'SELECT * FROM auteur WHERE nom LIKE "' . $objetRech . '" OR prenom LIKE "' . $objetRech . '" ORDER BY ' . $choix . '';
                $idRequete = executeR($logIn, $sql, array($objetRech, $objetRech, $choix));
                $ligne = $idRequete->fetch(PDO::FETCH_ASSOC);
                if ($ligne == NULL) {
                    echo 'Aucun resultat trouvé';
                } else {

                    switch ($_POST['selection']) {
                        case "nom":
                            $objetRech = "%" . $_POST['objRech'] . "%";
                            $choix = $_POST['selection'];
                            $sql = 'SELECT * FROM auteur WHERE nom LIKE "' . $objetRech . '" OR prenom LIKE "' . $objetRech . '" ORDER BY ' . $choix . '';

                            echo '<table><tr><th>Identifiant</th><th>Nom</th><th>Prénom</th><th>Année de naissance</th></tr>';
                            while ($ligne = $idRequete->fetch(PDO::FETCH_ASSOC)) {
                                echo '<tr><td>' . $ligne['id_auteur'] . '</td><td><em>' . $ligne['nom'] . '</em></td>' . '<td>' . $ligne['prenom'] . '</td>' . '<td>' . $ligne['date_naissance'] . '</td></tr>';
                            }
                        echo '</table>';
                        break;

                        case "prenom":
                            $objetRech = "%" . $_POST['objRech'] . "%";
                            $choix = $_POST['selection'];
                            $sql = 'SELECT * FROM auteur WHERE nom LIKE "' . $objetRech . '" OR prenom LIKE "' . $objetRech . '" ORDER BY ' . $choix . '';

                            echo '<table><tr><th>Identifiant</th><th>Nom</th><th>Prénom</th><th>Année de naissance</th></tr>';
                            while ($ligne = $idRequete->fetch(PDO::FETCH_ASSOC)) {
                                echo '<tr><td>' . $ligne['id_auteur'] . '</td><td><em>' . $ligne['nom'] . '</em></td>' . '<td>' . $ligne['prenom'] . '</td>' . '<td>' . $ligne['date_naissance'] . '</td></tr>';
                            }

                        echo '</table>';
                        break;
                        case "date_naissance":
                            $objetRech = "%" . $_POST['objRech'] . "%";
                            $choix = $_POST['selection'];
                            $sql = 'SELECT * FROM auteur WHERE nom LIKE "' . $objetRech . '" OR prenom LIKE "' . $objetRech . '" ORDER BY ' . $choix . '';

                            echo '<table><tr><th>Identifiant</th><th>Nom</th><th>Prénom</th><th>Année de naissance</th></tr>';
                            while ($ligne = $idRequete->fetch(PDO::FETCH_ASSOC)) {
                                echo '<tr><td>' . $ligne['id_auteur'] . '</td><td><em>' . $ligne['nom'] . '</em></td>' . '<td>' . $ligne['prenom'] . '</td>' . '<td>' . $ligne['date_naissance'] . '</td></tr>';
                            }
                        echo '</table>';
                        break;
                    }
                }
            }
            ?>
            <a class='lienAcc' href="../index.php">Accueil</a>
        </div>
    </body>
</html>

