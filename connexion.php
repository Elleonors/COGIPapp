<?php
session_start();
if(isset($_POST['connexion'])) { 
    if(empty($_POST['pseudo'])) {
        echo "Le champ Pseudo est vide.";
    } else {
        if(empty($_POST['mdp'])) {
            echo "Le champ Mot de passe est vide.";
        } else {
            $Pseudo = htmlentities($_POST['pseudo'], ENT_QUOTES, "ISO-8859-1");
            $MotDePasse = htmlentities($_POST['mdp'], ENT_QUOTES, "ISO-8859-1");
            $mysqli = mysqli_connect("localhost", "elleonors", "BEcode2019", "connexion");
            if(!$mysqli){
                echo "Erreur de connexion à la base de données.";
            } else {
                $Requete = mysqli_query($mysqli,"SELECT * FROM connexion WHERE username = '".$Pseudo."' AND pass = '".$MotDePasse."'");
                if(mysqli_num_rows($Requete) == 0) {
                    echo "Le pseudo ou le mot de passe est incorrect, le compte n'a pas été trouvé.";
                } else {
                    $_SESSION['pseudo'] = $Pseudo;
                    header("pages/main.php");;
                }
            }
        }
    }
}
?>