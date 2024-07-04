<?php
require "fpdf186/fpdf.php";

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lorniot";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Erreur de connexion : ". $conn->connect_error);
}


$sql = "SELECT * FROM facture ";
$result = $conn->query($sql);

if($result->num_rows > 0) {
    $pdf = new FPDF();
    $pdf->AddPage();

    while ($row = $result->fetch_assoc()) {
        $pdf->SetFont("Arial","B",12);
        $pdf->Cell(0,10,"Facture numero : ".$row['numAchat'],0,1,'C');
        $pdf->Ln();
    
        $pdf->SetFont("Arial","",10);
        $pdf->Cell(0,5,"Date d achat : ".$row['date'],0,1);
        $pdf->Cell(0,5,"Nom du client : ".$row['nom'],0,1);
        $pdf->Cell(0,5,"Contact : ".$row['contact'],0,1);
        $pdf->Ln();
        

        $pdf->SetFont("Arial","B",10);
        $pdf->Cell(60,7,"Designation",1);
        $pdf->Cell(30,7,"Quantite",1);
        $pdf->Cell(40,7,"Prix Unitaire",1);
        $pdf->Cell(40,7,"Total",1);
        $pdf->Ln();

        $pdf->Cell(60,7,$row['design'],1);
        $pdf->Cell(30,7,$row['qte'],1);
        $pdf->Cell(40,7,$row['prix'],1);
        $pdf->Cell(40,7,$row['total'],1);
        $pdf->Ln();
    }

    $pdf->Output();
}else {
    echo "0 resultats";
}
$conn->close();

?>

