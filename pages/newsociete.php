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
    $req = $bd->prepare('INSERT INTO societe (nom, tva, pays) VALUES (?, ?, ?)');
    $req->execute(array($_GET['nom'], $_GET['tva'], $_GET['pays']));
}
// On récupère le contenu de la table societe
//$req = $bd->prepare('INSERT INTO SELECT MAX(id) FROM societe');
//while ($donnees = $resultat->fetchAll()){
  //  $societe = $donnees;
// }
// Insertion d'un message avec une requête
if(isset($_GET['add'])) {
    $req = $bd->prepare('INSERT INTO societe_has_type (societe_idsociete, type_idtype) VALUES (?, ?)');
    $req->execute('SELECT MAX(idsociete) FROM societe', array($_GET['type']), $societe);
    header('Location: newsociete.php');
}
// On récupère le contenu de la table type
$resultat = $bd->query('SELECT * FROM `type`');
while ($donnees = $resultat->fetchAll()){
    $type = $donnees;
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
        <title>Nouvelle société</title>
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
                    <h1>Nouvelle société:</h1>
                </div>
            </div>
            <div class="row">
                <div class="offset-4 col-md-4 text-center">
                    <form method="get">
                        <p>Société: <input type="text" name="nom"/></p>
                        <p>TVA: <input type="text" name="tva"/></p>
                        <p>Pays: <input type="text" name="pays"/></p>
                        <p>Type: <select name="type">
                        <?php
                        foreach ($type as $value) { ?>
                        <option value="<?php echo $value ['idtype'] ?>"><?php echo $value ['nom'] ?></option>
                        <?php } ?>
                        </select></p>
                        <p><input type="submit" name="add" value="Valider"/></p>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>