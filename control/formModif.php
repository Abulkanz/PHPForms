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
        if (isset($_POST['bModif'])) {

            $id_auteur = $_POST['id'];

            $logIn = connexion(SERVEUR, UTILISATEUR, MOTDEPASSE, BASEDEDONNEES);
            $sql = 'SELECT * FROM auteur WHERE id_auteur=?';
            $idRequete = executeR($logIn, $sql, array($id_auteur));
            $ligne = $idRequete->fetch(PDO::FETCH_ASSOC);

            echo "<form method='post' action='formModif.php'>" .
            "<input type='hidden' name='id' value='" . $ligne['id_auteur'] . "'><br>" .    
            "<input type='text' name='Nom' value='" . $ligne['nom'] . "'><br>" .
            "<input type='text' name='Prenom' value='" . $ligne['prenom'] . "'><br>" .
            "<input type='text' name='aN' value='" . $ligne['date_naissance'] . "'><br>" .
            "<input type='submit' name='vModif' value='Modifier'>" .
            "<input type='submit' name='aModif' value='Annuler'>" .
            "</form>";
        
        }
        
        if (isset($_POST['vModif'])) {
            $nom = $_POST['Nom'];
            $prenom = $_POST['Prenom'];
            $Dob = $_POST['aN'];
            $id = $_POST['id'];
            $logIn = connexion(SERVEUR, UTILISATEUR, MOTDEPASSE, BASEDEDONNEES);
            $sql = 'UPDATE auteur SET nom=?, prenom=?, date_naissance=? WHERE id_auteur=?';
            $idRequete = executeR($logIn, $sql, array($nom, $prenom, $Dob, $id));
        
            Header('Location: ../listeAuteur.php');
        }elseif (isset($_POST['aModif'])) {
            Header('Location: ../listeAuteur.php');
        }
        
        ?>
        <a href="../listeAuteur.php">Accueil</a>
    </body>
</html>

