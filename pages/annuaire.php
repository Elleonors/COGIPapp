<?php
try {
	// On se connecte à MySQL
	$bd = new PDO('mysql:host=localhost;dbname=COGIP;charset=utf8', 'root', 'root');
}
catch(Exception $e) {
	// En cas d'erreur, on affiche un message et on arrête tout
    die('Erreur : '.$e->getMessage());
}

$resultat = $bd->query('SELECT * FROM societaires');
$societaire = $resultat->fetchAll();
$resultat = $bd->query('SELECT * FROM societe');
$societe = $resultat->fetchAll();
$resultat->closeCursor();
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
        h2 {
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
        } h2{
            margin-top : 5vh;
        }
    </style>
    <title>Annuaire</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="offset-md-3 text-center col-md-6">
                        <a href="main.php"><img src="../assets/img/cogip.png" alt="cogip icon"></a>
                    </div>
                    <div class="col-md-2 border border-dark rounded">
                        <p class="text-center">Connecté !</p>
                        <p class="text-center">jean-christian RANU</p>
                    </div>
                </div>
                <div class="row">
                    <div class="offset-md-5 col-md-2 text-center">
                        <h2>ANNUAIRES</h2>
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-2">
                                <h3>NOM</h3>
                                <?php
                                    foreach ($societaire as $value) { ?>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <p> <?=$value['nom']?> </p>
                                            </div>
                                        </div>
                                <?php } ?>
                            </div>
                            <div class="col-md-2">
                                <h3>PRÉNOM</h3>
                                <?php
                                    foreach ($societaire as $value) { ?>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <p> <?=$value['prenom']?> </p>
                                            </div>
                                        </div>
                                <?php } ?>
                            </div>
                            <div class="col-md-3">
                                <h3>EMAIL</h3>
                                <?php
                                    foreach ($societaire as $value) { ?>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <p> <?=$value['email']?> </p>
                                            </div>
                                        </div>
                                <?php } ?>
                            </div>
                            <div class="col-md-2">
                                <h3>TÉLÉPHONE</h3>
                                <?php
                                    foreach ($societaire as $value) { ?>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <p> <?=$value['telephone']?> </p>
                                            </div>
                                        </div>
                                <?php } ?>
                            </div>
                            <div class="col-md-3">
                                <h3>NOM-DE-SOCIETE</h3>
                                <?php
                                    foreach ($societe as $value) { ?>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <p> <a href="detailsociete.php/<?=$value['nom']?>"><?=$value['nom']?></a> </p>        
                                            </div>
                                        </div>
                                <?php } ?>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>