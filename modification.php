<?php

require "fifandraisana.php";

if(isset($_POST['id_cli'])&&isset($_POST['noms'])&&isset($_POST['contacts'])&&isset($_POST['date']))
{
   $id_cli = $_POST['id_cli'];
   $noms = $_POST['noms'];
   $contacts = $_POST['contacts']; 
   $date = $_POST['date']; 
   
   $query = "UPDATE liste SET  noms ='$noms', contacts = '$contacts', date = '$date' WHERE id_cli = '$id_cli'  ";
   $result = mysqli_query($conn, $query);
   if( $conn){
       //echo "modifier avec succes";
       header ('location:client.php');
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
       <h1 class="rounded border border-dark p-2 m-2 text-center text-white bg-secondary">Modification  </h1>
        </div>
    <link rel="stylesheet" href="bootstrap.min.css">
<a href="client.php" class="btn btn-secondary float-end">Retour</a>

      <form action="" method="POST">
  <fieldset>
    <div class="form-group row">
    </div>
    <div class="form-group">
      <label for="id_cli" class="form-label mt-4"># :</label>
      <input type="text" class="form-control" id="id_cli" aria-describedby="saisir votre nom et prenom" placeholder="Appuyer ici pour saisir preciser l'id du client..." name="id_cli">
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
      <input type="submit" class="btn btn-success"  value="Modifier" name="button">
        </form>
  <!--voici la partie javaScript-->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
                    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
                     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">

                     </script>
                    <!--fin la partie javaScript-->

    
</body>
</html>