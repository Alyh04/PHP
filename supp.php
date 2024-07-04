<?php
include 'fifandraisana.php';


$query= "DELETE FROM liste WHERE id_cli='$_GET[rn]' ";
$result = mysqli_query($conn,$query) ;

    if($result) {
        $_SESSION['message'] = "Suppression réussi";
        header('Location: client.php');
       
    }
    else {
        $_SESSION['message'] = "Suppression échouée  ";
        header('Location: client.php');
    }

     if(isset($_SESSION['message'])) : ?>
        <h5 class="alert alert-success"><?=$_SESSION['message']; ?></h5>
  <?php 
      unset($_SESSION['message']);
      endif; 
 
// }else{
//     die(mysql_eroor($result));
// }

?>
