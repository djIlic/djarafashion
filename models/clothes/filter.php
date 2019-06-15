<?php 
//header("Content-type: application/json");

if(isset($_POST['naziv'])){
    include "../../config/connection.php";
    include "functions.php";

    $naziv = "%".strtoupper($_POST['naziv'])."%";
    $upit = getProducts();

    $upit .= " WHERE naziv LIKE :naziv";

    $rezultat = $conn->prepare($upit);
    $rezultat->bindParam(":naziv", $naziv);
    // debugDumpParams($rezultat);
    $rezultat->execute();

   

    $proizvodi = $rezultat->fetchAll();
    echo json_encode($proizvodi);

} else {
    http_response_code(400);
}