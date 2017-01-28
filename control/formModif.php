<html>
    <head>
        <meta charset="UTF-8">
        <title>Formulaire Modification</title>
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

            if (isset($_POST['bModif'])) {

                $id_auteur = $_POST['id'];

                $sql = 'SELECT * FROM auteur WHERE id_auteur=?';
                $idRequete = executeR($logIn, $sql, array($id_auteur));
                $ligne = $idRequete->fetch(PDO::FETCH_ASSOC);

                echo "<form id='fModif' method='post' action='formModif.php'>
                     <input type='hidden' name='id' value='" . $ligne['id_auteur'] . "'>   
                     <input type='text' name='Nom' value='" . $ligne['nom'] . "'>
                     <input type='text' name='Prenom' value='" . $ligne['prenom'] . "'>
                     <input type='text' name='aN' value='" . $ligne['date_naissance'] . "'>
                     <br><br>
                     <input type='submit' name='vModif' value='Modifier'>
                     <input type='submit' name='aModif' value='Annuler'>
                   </form>";
            }

            if (isset($_POST['vModif'])) {
                $nom = $_POST['Nom'];
                $prenom = $_POST['Prenom'];
                $Dob = $_POST['aN'];
                $id = $_POST['id'];
                $logIn = connexion(SERVEUR, UTILISATEUR, MOTDEPASSE, BASEDEDONNEES);
                $sql = 'UPDATE auteur SET nom=?, prenom=?, date_naissance=? WHERE id_auteur=?';
                $idRequete = executeR($logIn, $sql, array($nom, $prenom, $Dob, $id));

                Header('Location: ../index.php');
            } elseif (isset($_POST['aModif'])) {
                Header('Location: ../index.php');
            }
            ?>
            <a class='lienAcc' href="../index.php">Accueil</a>
        </div>
    </body>
</html>

