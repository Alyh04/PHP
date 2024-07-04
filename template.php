<!DOCTYPE html>
<html lang="en">
    <head>
        <title>mon projet Php</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="views/bootstrap.min.css">
    </head>
    <body>

                <!--voici la partie de la barre en haut-->
                <nav class="navbar navbar-expand-lg navbar-green bg-primary">
                  <a class="navbar-brand" href="#"> <img src="public/images/MITSU.jfif" alt="logo" width="120" height="60"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>


        <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="accueil">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="voiture">Voitures</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="client">Clients</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="facture">Factures</a>
                </li>
            </ul>
        </div>
    </nav>
                <!--fin la partie de la barre en haut-->
        <div class="container">
       <h1 class="rounded border border-dark p-2 m-2 text-center text-white bg-secondary"><?= $title ?></h1>
       <?= $content ?>
        </div>
        <!--mampitambatsy pages reo iaby-->

                    <!--voici la partie javaScript-->
                    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
                    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
                     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">

                     </script>
                    <!--fin la partie javaScript-->
    
    </body>
</html>