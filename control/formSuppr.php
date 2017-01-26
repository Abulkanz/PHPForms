<html>
    <head>
        <meta charset="UTF-8">
        <title>Formulaire Modification</title>
        <link href="../css/template.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <?php
        require_once '../include/executeRequete.php';
        require_once '../include/connexion.php';
        require_once '../include/infoConnexion.php';
        $logIn = connexion(SERVEUR, UTILISATEUR, MOTDEPASSE, BASEDEDONNEES);

        if (isset($_POST['bSuppr'])) {
            $id_auteur = $_POST['id'];
            $sql = 'SELECT * FROM auteur WHERE id_auteur=' . $id_auteur;
            $idRequete = executeR($logIn, $sql);
            $ligne = $idRequete->fetch(PDO::FETCH_ASSOC);

            echo '<table><tr><th>Identifiant</th><th>Nom</th><th>Prénom</th><th>Année de naissance</th></tr>';
            echo '<tr><td>' . $ligne['id_auteur'] . '</td><td><em>' . $ligne['nom'] . '</em></td>' . '<td>' . $ligne['prenom'] . '</td>' . '<td>' . $ligne['date_naissance'] . '</td></tr></table>';
            echo '<h2 class="alerte">Etes-vous certain de vouloir supprimer cet enregistrement ?</h2>
                   <form method="post">
                      <input name="ID" type="hidden" value="' . $ligne['id_auteur'] . '"> 
                      <button type="submit" name="vSuppr">Supprimer</button>
                      <button type="submit" name="aSuppr">Annuler</button>
                   </form>';
        }

        if (isset($_POST['vSuppr'])) {
            $bidul = $_POST['ID'];
            $sql = "DELETE FROM auteur WHERE id_auteur=?";
            $idRequete = executeR($logIn, $sql, array($bidul));

            Header('Location: ../listeAuteur.php');
        } elseif (isset($_POST['aSuppr'])) {
            Header('Location: ../listeAuteur.php');
        }
        ?>
        <a class='lienAcc' href="../listeAuteur.php">Accueil</a>
    </body>
</html>


