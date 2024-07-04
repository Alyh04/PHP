<?php 
require ('fifandraisana.php');
?>
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
       <h1 class="rounded border border-dark p-2 m-2 text-center text-white bg-secondary">Voici la liste des clients </h1>
        </div>
    <link rel="stylesheet" href="bootstrap.min.css">
    <?php
require "fifandraisana.php";
?>
<head>
</head>

<div class="card">
<a href="ajout.php" class="btn btn-info">Ajouter un Client</a><br>
    <div class="card-header">
            <div class="col-md-12 mt-4">
                
            <?php   if(isset($_SESSION['message'])) : ?>
                  <h5 class="alert alert-success"><?=$_SESSION['message']; ?></h5>
            <?php 
                unset($_SESSION['message']);
                endif; 
            ?>

                <div>
               

                <form class="d-flex float-end" >
          <input  type="search"  name="Recherche" placeholder="Recherche"  autocomplete ="on" class="form_control">
          <button type="submit" name="search" class="btn btn-secondary">Chercher</button>
        </form>
        <a href="client.php" class="btn btn-secondary">Retour</a>

                <div class="card-body">
                    
                <div class="card-body">
                    <table class="table table-bordered table-striped" >
                        <br>
<tr >
   <td >#</td>
   <td >NOMS</td>
   <td >CONTACTS</td>
   <td >DATE</td>
   <td>MODIFICATION</td>
   <td>SUPPRESSION</td>
</tr>
   <?php
        
        if(isset($_GET['search'])){
         if (isset($_GET["Recherche"]) && !empty($_GET["Recherche"]) ) {
           $recherche = htmlspecialchars($_GET["Recherche"]);
           $client = "SELECT * FROM liste WHERE id_cli LIKE '%$recherche%' OR noms LIKE '%$recherche%'
                     OR contacts LIKE '%$recherche%' OR date LIKE '%$recherche%' ORDER BY id_cli ";
           $resultat = mysqli_query($conn,$client);
           while($row = mysqli_fetch_assoc($resultat)){
            $id_cli = $row['id_cli'];
            $noms = $row['noms'];
            $contacts = $row['contacts'];
            $date = $row['date'];
            echo "
              <tr class='table table-striped'>
           <td>".$id_cli."</td>  
             <td>".$noms."</td>
            <td>".$contacts."</td>
            <td>".$date."</td>
            <td>
             <a class='btn btn-primary' href='modification.php?id='.$id_cli.''>Modifier</a>
             </td>
             <td>
             <a class='btn btn-danger'  href='supp.php?rn=$id_cli'> Supprimer</a>
           </td>
             </tr>  ";}
           }
        }
        if(!isset($_GET['search'])){
         $querry ="SELECT * FROM liste";
         $result = mysqli_query ($conn,$querry);
         while( $row = mysqli_fetch_assoc($result)) {
            $id_cli = $row['id_cli'];
            $noms = $row['noms'];
            $contacts = $row['contacts'];
            $date = $row['date'];
             echo "
              <tr class='table table-striped'>
              <td>".$id_cli."</td>  
              <td>".$noms."</td>
             <td>".$contacts."</td>
             <td>".$date."</td>
             <td>
             <a class='btn btn-primary' href='modification.php?id='.$id_cli.''>Modifier</a>
             </td>
             <td>
             <a class='btn btn-danger'  href='supp.php?rn=$id_cli'> Supprimer</a>
           </td>
             </tr>  ";
            }
          }  
          
          ?>
          
</table>

 <!--voici la partie javaScript-->
 <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
                    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
                     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">

                     </script>
                    <!--fin la partie javaScript-->