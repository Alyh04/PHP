
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Ajouter</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
    <link rel="stylesheet" href="bootstrap.min.css">
<nav class="navbar navbar-expand-lg navbar-green bg-primary">
                  <a class="navbar-brand" href="#"> <img src="bmw.jfif" alt="logo" width="120" height="60"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>


        <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="accueil.php">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="voiture.php">Voitures</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="client.php">Clients</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="factures.php">Factures</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
       <h1 class="rounded border border-dark p-2 m-2 text-center text-white bg-secondary">Ajout d'une voiture</h1>
        </div>
    <div>
        <div class="card-header">
                    <h3>
                    <a href="voiture.php" class="btn btn-info float-end">Retourner</a>
                    </h3>
                    </div>

        <?php
        if(isset($_POST['button'])){
            //mettre les input dans des variables 
            $Designations = $_POST['Designations'];
            $Descriptions = $_POST['Descriptions'];
            $Prix = $_POST['Prix'];
            $Nombres = $_POST['Nombres'];

            if (!empty($Designations) && !empty($Descriptions) && !empty($Prix) && !empty($Nombres)){
                   //l'insertion de labase de données là 
                    require "conn.php"; 
                    //insertion dans la base de données

                    $insert_into = $bd->prepare("INSERT INTO voitures (Designations,Descriptions,Prix,Nombres) VALUE (?,?,?,?)");
                    $insert_into->execute(array($Designations,$Descriptions,$Prix,$Nombres));

                    if ($insert_into){
                        //faire une redirection quand l'insertion est ien fait
                        header("location: voiture.php");
                    } else {
                        //autrement en affiche un message d'erreur
                        $_SESSION = "Client non ajouté";
                    }
            } else {
                //message d'erreur si les champs sont vide
                $_SESSION = "Veillez remplir tous les champs";
            }
        }
        ?> 
              <?php if(isset($_SESSION)): ?> 
        <p class="erreur_message"></p>
        <?=$_SESSION ?>
        <?php endif ?> 

        <form action="" method="POST">
  <fieldset>
    <div class="form-group row">
    </div>
    <div class="form-group">
      <label for="Designations" class="form-label mt-4">Designations :</label>
      <input type="text" class="form-control" id="Designations" aria-describedby="saisir votre nom et prenom" placeholder="Appuyer ici pour saisir votre Designations" name="Designations">
    </div>
    <div class="form-group">
      <label for="Descriptions" class="form-label mt-4">Descriptions :</label>
      <input type="text" class="form-control" id="Descriptions" aria-describedby="Appuyer ici pour mettre la descripition de la voiture" placeholder="Appuyer ici pour mettre la descripition de la voiture" name="Descriptions">
    </div>
    <div class="form-group">
      <label for="Prix" class="form-label mt-4">Prix :</label>
      <input type="text" class="form-control" id="Prix" placeholder="Apuyer ici pour saisir le Prix de la voiture" autocomplete="off" name="Prix">
    </div>
    <div class="form-group">
      <label for="Nombres" class="form-label mt-4">Nombres disponibles :</label>
      <input type="Number" class="form-control" id="Nombres"  autocomplete="off" name="Nombres">
      <br>
      <input type="submit" class="btn btn-success"  value="Ajouter" name="button">
        </form>
    </div>
</body>
</html>
  