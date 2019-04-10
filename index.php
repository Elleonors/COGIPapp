<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="assets/img/cogip.ico" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        body {
            background-image: url("assets/img/landing-page.jpg");
            background-repeat: no-repeat;
            background-size: cover;
        } #container {
            margin-top: 30vh;
            height: 40vh;
            margin-bottom: 30vh;
            background-color: rgba(37, 146, 120, 0.5);
        } p, input {
            height: 20%;
            margin-bottom: 1px;
        }
    </style>
    <title>COGIP APP</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12" id="container">
                        <form action="connexion.php" method="post">
                            Pseudo: <input type="text" name="pseudo" value="" />
                            
                            Mot de passe: <input type="password" name="mdp" value="" />
                            
                            <input type="submit" name="connexion" value="Connexion" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<!-- background par<a href="https://pixabay.com/fr/users/freephotocc-2275370/?utm_source=link-attribution&amp;utm_medium=referral&amp;utm_campaign=image&amp;utm_content=1280538">Andrian Valeanu</a> de <a href="https://pixabay.com/fr/?utm_source=link-attribution&amp;utm_medium=referral&amp;utm_campaign=image&amp;utm_content=1280538">Pixabay</a> -->