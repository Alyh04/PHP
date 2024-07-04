
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
    <div>
    <div class="container">
       <h1 class="rounded border border-dark p-2 m-2 text-center text-white bg-secondary">Ajouter un client</h1>
        </div>
        <div class="card-header">
                    <h3>
                    <a href="client.php" class="btn btn-info float-end">Retourner</a>
                    </h3>
                    </div>

        <?php
        if(isset($_POST['button'])){
            //mettre les input dans des variables 
            $noms = $_POST['noms'];
            $contacts = $_POST['contacts'];
            $date = $_POST['date'];

            if (!empty($noms) && !empty($contacts) && !empty($date)){
                   //l'insertion de labase de données là 
                    require "connecte.php"; 
                    //insertion dans la base de données

                    $insert_into = $bd->prepare("INSERT INTO liste (noms,contacts,date) VALUE (?,?,?)");
                    $insert_into->execute(array($noms,$contacts,$date));

                    if ($insert_into){
                        //faire une redirection quand l'insertion est ien fait
                        header("location:client.php");
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
        <p class="erreur_message" ></p>
        <?=$_SESSION ?>
        <?php endif ?> 

        <form action="" method="POST">
  <fieldset>
    <div class="form-group row">
    </div>
    <div class="form-group">
      <label for="noms" class="form-label mt-4">Noms :</label>
      <input type="text" class="form-control" id="noms" aria-describedby="saisir votre nom et prenom" placeholder="Appuyer ici pour saisir votre noms" name="noms">
    </div>
    <div class="form-group">
      <label for="contacts" class="form-label mt-4">Contacts :</label>
      <input type="text" class="form-control" id="contacts" aria-describedby="saisir votre numéro mobile" placeholder="Appuyer ici pour saisir votre numéro" name="contacts">
    </div>
    <div class="form-group">
      <label for="date" class="form-label mt-4">Date :</label>
      <input type="date" class="form-control" id="date"  autocomplete="off" name="date">
      <br>
      <input type="submit" class="btn btn-success"  value="Ajouter" name="button">
        </form>
    </div>
      <!--voici la partie javaScript-->
   <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
                    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
                     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">

                     </script>
                    <!--fin la partie javaScript-->
</body>
</html>
