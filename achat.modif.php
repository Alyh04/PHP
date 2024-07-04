<?php

require "fifandraisana.php";

if(isset($_POST['numAchat'])&&isset($_POST['date'])&&isset($_POST['nom'])&&isset($_POST['contact'])&&isset($_POST['design'])&&isset($_POST['qte'])&&isset($_POST['prix'])&&isset($_POST['total']))
{
           $date = $_POST['date'];
            $nom = $_POST['nom'];
            $contact = $_POST['contact'];
            $design = $_POST['design'];
            $qte = $_POST['qte'];
            $prix = $_POST['prix'];
            $total = $_POST['total'];
   
   $query = "UPDATE achat SET date = '$date' nom ='$nom', contact = '$contact',design = '$design', qte = '$qte', prix = '$prix', total = '$total'  WHERE numAchat = '$numAchat'  ";
   $result = mysqli_query($conn, $query);
   if( $conn){
       //echo "modifier avec succes";
       header ('location:facture.php');
   }
   else {
     echo"erreur".mysqli_connect_error($result);
     die(mysqli_connect_error($result));
   }        
}
?> 

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
    <link rel="stylesheet" href="bootstrap.min.css">
    <style>
    ul {
    position: absolute;
    top: 40%;
    left: 50%;
    transform: translate(-50%,-50%);
}
</style>
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
       <h1 class="rounded border border-dark p-2 m-2 text-center text-white bg-secondary">Modification d'un achat </h1>
        </div>
    <link rel="stylesheet" href="bootstrap.min.css">
    <div>
        <div class="card-header">
                    <h3>
                    <a href="factures.php" class="btn btn-info float-end">Retourner</a>
                    </h3>
                    </div>
        <form action="" method="POST">
  <fieldset>
    <div class="form-group row">
        
    </div>
    <div class="form-group">
      <label for="text" class="form-label mt-4">Préciser le numéro de la facture à modifier :</label>
      <input type="text" class="form-control" id="text" aria-describedby="Veuillez préciser le numéro de la facture" placeholder="Veuillez préciser ici le numéro de la facture" name="text">
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
      <input type="submit" class="btn btn-success"  value="Modifier" name="button">
        </form>
    </div>
</body>
</html>
