<?php
try {
    // Se connecter à MySQL
    $bd = new PDO('mysql:host=localhost;dbname=COGIP;charset=utf8', 'becode', 'becodepass');
}
catch(Exception $e) {
    // En cas d'erreur, on affiche un message et on arrête tout
    die('Erreur : '.$e->getMessage());
}
// Insertion d'un message avec une requête
if(isset($_GET['add'])) {
    $req = $bd->prepare('INSERT INTO facture (numero, `date`, prestation, societe_idsociete, societaires_idsocietaires) VALUES (?, ?, ?, ?, ?)');
    $req->execute(array($_GET['numero'], $_GET['date'], $_GET['presta'], $_GET['societe'], $_GET['societaires']));
    header('Location: newfacture.php');
}
// On récupère le contenu de la table societe
$resultat = $bd->query('SELECT * FROM societe');
while ($donnees = $resultat->fetchAll()){
    $societe = $donnees;
}
// On récupère le contenu de la table societaire
$resultat = $bd->query('SELECT * FROM societaires');
while ($donnees = $resultat->fetchAll()){
    $societaires = $donnees;
}
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="icon" type="image/png" href="../assets/img/favicon.ico" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <style>
            h1 {
                text-align: center;
                margin-top: 3vh;
                margin-bottom: 5vh;
            } body {
                background-image: url("../assets/img/landing-page.jpg");
                background-repeat: no-repeat;
                background-size: cover;
            } img {
                height: 15vh;
            } #container {
                height: 40vh;
                background-color: rgba(37, 146, 120, 0.5);
            } .container {
                padding-top: 2vh;
                margin-top: 2vh;
                background-color: rgba(158, 204, 137, 0.6);
                border-radius: 15px;
            } input {
                margin-top: 3vh;
                margin-bottom: 3vh;
            }
        </style>
        <title>Nouvelle facture</title>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="offset-4 col-md-4 text-center">
                    <a href="main.php"><img src="../assets/img/cogip.png" alt="cogip icon"></a>
                </div>
            </div>
            <div class="row">
                <div class="offset-3 col-md-6">
                    <h1>Nouvelle facture:</h1>
                </div>
            </div>
            <div class="row">
                <div class="offset-4 col-md-4 text-center">
                    <form method="get">
                        <p>Numéro de facture: <input type="text" name="numero"/></p>
                        <p>Date d'emmission: <input type="date" name="date"/></p>
                        <p>Date de prestation: <input type="date" name="presta"/></p>
                        <p>Société: <select name="societe">
                        <?php
                        foreach ($societe as $value) { ?>
                        <option value="<?php echo $value ['idsociete'] ?>"><?php echo $value ['nom'] ?></option>
                        <?php } ?>
                        </select></p>
                        <p>Sociétaire: <select name="societaires">
                        <?php
                        foreach ($societaires as $value) { ?>
                        <option value="<?php echo $value ['idsocietaires'] ?>"><?php echo $value ['nom'] . ", " . $value ['prenom'] ?></option>
                        <?php } ?>
                        </select></p>
                        <p><input type="submit" name="add" value="Valider"/></p>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>