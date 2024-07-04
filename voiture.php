<?php 
include('conn.php');
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
       <h1 class="rounded border border-dark p-2 m-2 text-center text-white bg-secondary">Voici la liste des Voitures disponibles</h1>
        </div>

    <link rel="stylesheet" href="bootstrap.min.css">
       
        <div class="row">
            <div class="col-md-12 mt-4">
                
            <?php   if(isset($_SESSION['message'])) : ?>
                  <h5 class="alert alert-success"><?=$_SESSION['message']; ?></h5>
            <?php 
                unset($_SESSION['message']);
                endif; 
            ?>

            <!-- la partie php du Recherche -->

            <?php 
                include('conn.php');

                if (isset($_GET['search'])){
                    $term = $_GET['search'];

                    $sql = "SELECT * FROM voitures WHERE id_voit LIKE '%$term%' OR Designations LIKE '%$term%' OR Descriptions LIKE '%$term%' OR Prix LIKE '%$term%' OR Nombres LIKE '%$term%'";
                    $resultat = $con->query($sql);

                    if($resultat->num_rows > 0){
                        echo "<h2>Resulatat de la recherche:</h2>";
                        while($row = $resultat->fetch_assoc()){
                            echo "id_voit".$row["id_voit"]."Designations".$row["Designations"]."Descriptions".$row["Descriptions"]."Prix".$row["Prix"]."Nombres".$row["Nombres"]."<br>";
                        }
                } else {
                    echo "Aucun resulat trouvé pour la recherche :'$term'";
                }
            }
            ?>
            <!-- la fin du Recherche -->





<div class="card">
<a href="ajout_voi.php" class="btn btn-info">Ajouter une voiture</a><br>
    <div class="card-header">
    <form class="d-flex float-end" >
          <input  type="search"  name="Recherche" placeholder="Recherche"  autocomplete ="on" class="form_control">
          <button type="submit" name="search" class="btn btn-secondary">Chercher</button>
        </form>
        <a href="voiture.php" class="btn btn-secondary">Retour</a>
    </div>

                
                <div class="card-body">
                <div class="card-body">
                    <table class="table table-bordered table-striped" >
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Designation</th>
                                <th>Descriptions de la voiture</th>
                                <th>Prix</th>
                                <th>Quantité Disponible</th>
                                <th>Action1</th>
                                <th>Action2</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php  
                            $query = "SELECT * FROM voitures";
                            $statement = $con->prepare($query);
                            $statement->execute();

                            $statement->setFetchMode(PDO::FETCH_OBJ);
                            $result = $statement->fetchAll();
                            if ($result) {
                                
                                foreach($result as $row){
                                    ?>
                                    <tr >
                                        <td><?= $row->id_voit;?></td>
                                        <td><?= $row->Designations;?></td>
                                        <td><?= $row->Descriptions;?></td>
                                        <td><?= $row->Prix;?></td>
                                        <td><?= $row->Nombres;?></td>
                                        <td>
                                            <a href="achat.ajout.php" class="btn btn-success">Acheter</a>
                                        </td>
                                        <td>
                                            <form  method="POST">
                                                <button type="submit" name="delete_id_voit" value="<?= $row->id_voit;?>" class="btn btn-danger">Supprimer</button>

                                                <?php 
//la partie suppression de mon table
if (isset($_POST['delete_id_voit'])) {
    $x = $_POST['delete_id_voit'];

    try {
        $query = "DELETE FROM Voitures WHERE id_voit=:x";
        $statement = $bd->prepare($query);
        $data = [':x' =>$x];
        $query_execute = $statement->execute($data);

        if($query_execute) {
            $_SESSION['message'] = "Suppression réussi";
            header('Location: voiture.php');
           
        }
        else {
            $_SESSION['message'] = "Suppression échouée  ";
            header('Location: voiture.php');
            
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
?>

                                            </form>
                                        </td>

                                    </tr>



                                    <?php
                                }
                            }
                            else {
                                ?>
                                <tr>
                                    <td colspan="7">Aucune voiture n'est ajouter</td>
                                </tr>
                                <?php 
                            }
                            ?>
                            
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
     <!--voici la partie javaScript-->
     <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
                    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
                     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">

                     </script>
                    fin la partie javaScript
