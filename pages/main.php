<?php
try {
	// On se connecte à MySQL
	$bd = new PDO('mysql:host=localhost;dbname=COGIP;charset=utf8', 'becode', 'becodepass');
}
catch(Exception $e) {
	// En cas d'erreur, on affiche un message et on arrête tout
    die('Erreur : '.$e->getMessage());
}
// On récupère le contenu de la table societaires
$resultat = $bd->query('SELECT * FROM societaires
ORDER BY idsocietaires DESC
LIMIT 5');
while ($donnees = $resultat->fetchAll()){
    $societaires = $donnees;
}

// On récupère le contenu de la table societe
$resultat = $bd->query('SELECT * FROM societe
ORDER BY idsociete DESC
LIMIT 5');
while ($donnees = $resultat->fetchAll()){
    $societe = $donnees;
}

// On récupère le contenu de la table facture
$resultat = $bd->query('SELECT * FROM facture
ORDER BY idfacture DESC
LIMIT 5');
while ($donnees = $resultat->fetchAll()){
    $facture = $donnees;
}
$resultat->closeCursor();
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="icon" type="image/png" href="assets/img/cogip.ico" />
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
            } /*#container {
                height: 40vh;
                background-color: rgba(37, 146, 120, 0.5);
            }*/ .container {
                padding-top: 2vh;
                margin-top: 2vh;
                background-color: rgba(158, 204, 137, 0.6);
                border-radius: 15px;
            } input {
                margin-top: 3vh;
                margin-bottom: 3vh;
            }
        </style>
        <title>COGIP APP</title>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="offset-4 col-md-4 text-center">
                    <img src="../assets/img/cogip.png">
                </div>
            </div>
            <div class="row">
                <div class="offset-3 col-md-6">
                    <h1>BONJOUR, JEAN-CHRISTIAN</h1>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-4">
                    <div class="row">
                        <div class="offset-1 col-md-10 text-center">
                        <a href="annuaire.php" target="_blank" class="text-center"><input type="button" value="ANNUAIRE"></a>
                        </div>
                        <?php
                        foreach ($societaires as $value) { ?>
                            <div class="offset-1 col-md-10 text-center" id="container">
                                <?php echo $value ['nom'] ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="offset-1 col-md-10 text-center">
                        <a href="societe.php" target="_blank" class="text-center"><input type="button" value="SOCIETES"></a>
                        </div>
                        <?php
                        foreach ($societe as $value) { ?>
                            <div class="offset-1 col-md-10 text-center" id="container">
                                <?php echo $value ['nom'] ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="offset-1 col-md-10 text-center">
                        <a href="facture.php" target="_blank" class="text-center"><input type="button" value="FACTURES"></a>
                        </div>
                        <?php
                        foreach ($facture as $value) { ?>
                            <div class="offset-1 col-md-10 text-center" id="container">
                                <?php echo $value ['numero'] ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="offset-4 col-md-4 text-center">
                    <a href="client.php" target="_blank" class="text-center"><input type="button" value="Client"></a>
                    <a href="fournisseur.php" target="_blank" class="text-center"><input type="button" value="Fournisseur"></a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 text-center">
                    <a href="newcontact.php" target="_blank" class="text-center"><input type="button" value="+ Contact"></a>
                </div>
                <div class="col-md-4 text-center">
                    <a href="newsociete.php" target="_blank" class="text-center"><input type="button" value="+ Société"></a>
                </div>
                <div class="col-md-4 text-center">
                    <a href="newfacture.php" target="_blank" class="text-center"><input type="button" value="+ Facture"></a>
                </div>
            </div>
        </div>
    </body>
</html>