
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Ajouter</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
    ul {
    position: absolute;
    top: 40%;
    left: 50%;
    transform: translate(-50%,-50%);
}
</style>
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
       <h1 class="rounded border border-dark p-2 m-2 text-center text-white bg-secondary">Effectue un Achat</h1>
        </div>
        <div class="card-header">
                    <h3>
                    <a href="voiture.php" class="btn btn-info float-end">Retourner</a>
                    </h3>
                    </div>

        <?php
        if(isset($_POST['button'])){
            //mettre les input dans des variables 
            $date = $_POST['date'];
            $nom = $_POST['nom'];
            $contact = $_POST['contact'];
            $design = $_POST['design'];
            $qte = $_POST['qte'];
            $prix = $_POST['prix'];
            $total = $_POST['total'];

            if (!empty($date) && !empty($nom) && !empty($contact) && !empty($design)&& !empty($qte)&& !empty($prix)&& !empty($total)){
                   //l'insertion de labase de données là 
                    require "connecte.php"; 
                    //insertion dans la base de données

                    $insert_into = $bd->prepare("INSERT INTO achat (date,nom,contact,design,qte,prix,total) VALUE (?,?,?,?,?,?,?)");
                    $insert_into->execute(array($date,$nom,$contact,$design,$qte,$prix,$total));

                    if ($insert_into){
                        //faire une redirection quand l'insertion est ien fait
                        header("location:facture.php");
                    } else {
                        //autrement en affiche un message d'erreur
                        $_SESSION = "achat non effectué";
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
      <label for="date" class="form-label mt-4">Date de l'achat :</label>
      <input type="date" class="form-control" id="date" aria-describedby="saisir votre nom et prenom" placeholder="Appuyer ici pour saisir votre date" name="date">
    </div>
    <div class="form-group">
      <label for="nom" class="form-label mt-4">Nom du client :</label>
      <input type="text" class="form-control" id="nom" aria-describedby="saisir votre numéro mobile" placeholder="Appuyer ici pour saisir votre numéro" name="nom">
    </div>
    <div class="form-group">
      <label for="contact" class="form-label mt-4">Contact :</label>
      <input type="text" class="form-control" id="contact" placeholder="Apuyer ici pour saisir votre voiture de contact" autocomplete="off" name="contact">
    </div>
    <div class="form-group">
      <label for="design" class="form-label mt-4">Designation :</label>
      <input type="text" class="form-control" id="design" placeholder="Apuyer ici pour saisir votre voiture de design" autocomplete="off" name="design">
    </div>
    <div class="form-group">
      <label for="qte" class="form-label mt-4">Quantité :</label>
      <input type="text" class="form-control" id="qte" placeholder="Apuyer ici pour saisir votre voiture de qte" autocomplete="off" name="qte">
    </div>
    <div class="form-group">
      <label for="prix" class="form-label mt-4">Prix :</label>
      <input type="text" class="form-control" id="prix" placeholder="Apuyer ici pour saisir votre voiture de prix" autocomplete="off" name="prix">
    </div>
    <div class="form-group">
      <label for="total" class="form-label mt-4">Total :</label>
      <input type="text" class="form-control" id="total" placeholder="Apuyer ici pour saisir votre voiture de total" autocomplete="off" name="total">
    </div>
      <br>
      <input type="submit" class="btn btn-success"  value="Ajouter" name="button">
        </form>
    </div>
</body>
</html>
