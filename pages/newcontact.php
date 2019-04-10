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
        <title>COGIP APP</title>
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
                    <h1>Nouveau contact:</h1>
                </div>
            </div>
            <div class="row">
                <div class="offset-4 col-md-4 text-center">
                    <form method="get">
                        <p>Nom: <input type="text" name="nom"/></p>
                        <p>Prénom: <input type="text" name="prenom"/></p>
                        <p>Email: <input type="text" name="email"/></p>
                        <p>Téléphone: <input type="text" name="téléphone"/></p>
                        <p><input type="submit" name="add" value="Valider"/></p>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>