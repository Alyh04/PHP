<?php 

include('connecte.php');

?>
<style>
    ul {
    position: absolute;
    top: 40%;
    left: 50%;
    transform: translate(-50%,-50%);
}
</style>
<link rel="stylesheet" href="styl.css">
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
       <h1 class="rounded border border-dark p-2 m-2 text-center text-white bg-secondary">Les achats éfféctuées</h1>
        </div>
       

        <div class="row">
            <div class="col-md-12 mt-4">
                
            <?php   if(isset($_SESSION['message'])) : ?>
                  <h5 class="alert alert-success"><?=$_SESSION['message']; ?></h5>
            <?php 
                unset($_SESSION['message']);
                endif; 
            ?>


                <div class="card">
            <div class="card-body">
                    <table class="table table-bordered table-striped" >
                        <div class="card-body">
                        
                        </div>
                        <thead>
                            <tr>
                                <th>Details</th>
                                <th>Designations</th>
                                <th>Qantité</th>
                                <th>Prix</th>
                                <th>Total</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php  
                            $query = "SELECT * FROM facture";
                            $statement = $bd->prepare($query);
                            $statement->execute();

                            $statement->setFetchMode(PDO::FETCH_OBJ);
                            $result = $statement->fetchAll();
                            if ($result) {
                                
                                foreach($result as $row){
                                    ?>
                                    <div class="container">
                                    </div>
                                    <tr>
                                        <td><h2>Facture numéro <?= $row->numAchat;?></h2>
                                    <p>Date : <?= $row->date;?></p>
                                    <p>Nom du client : <?= $row->nom;?></p>
                                    <p>Contact : <?= $row->contact;?></p></td>
                                        <td><?= $row->design;?></td>
                                        <td><?= $row->qte;?></td>
                                        <td><?= $row->prix;?></td>
                                        <td><?= $row->total;?></td>
                                        <td>
                                            <a href="achat.modif.php" class="btn btn-primary" name="modifier" value="<?= $row->numAchat;?>">Modifier</a>
                                            <form  method="POST"><br>
                                                <button type="submit" name="delete" value="<?= $row->numAchat;?>" class="btn btn-danger">Supprimer</button>

 <?php 
//la partie suppression de mon table
if (isset($_POST['delete'])) {
    $x = $_POST['delete'];

    try {
        $query = "DELETE FROM facture WHERE numAchat=:x";
        $statement = $bd->prepare($query);
        $data = [':x' =>$x];
        $query_execute = $statement->execute($data);

        if($query_execute) {
            $_SESSION['message'] = "Suppression réussi";
            header('Location: facture');
           
        }
        else {
            $_SESSION['message'] = "Suppression échouée  ";
            header('Location: facture');
            
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    
}

?>
                                            </form>
                                            <form method="post">
                                            <br>
                                            <a href="genere.php" class="btn btn-info" >Genere en pdf</a>
                                            <br>
                                            </form>
                                        </td>

                                    </tr>



                                    <?php
                                }
                            }
                            else {
                                ?>
                                <tr>
                                    <td colspan="7">Aucun achat n'est effectuer</td>
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
                    <!--fin la partie javaScript-->
    
</body>