<?php 

if(isset($_POST['search'])){
    include "../../config/connection.php";
    include "functions.php";

    $naziv = "%".strtoupper($_POST['naziv'])."%";
    $upit = getQuery();

    $upit .= " WHERE LOWER(p.name) LIKE :naziv";

    // '%"PERA"%'
    // "%PERA%"

    $rezultat = $conn->prepare($upit);
    $rezultat->bindParam(":naziv", $naziv);
    // debugDumpParams($rezultat);
    $rezultat->execute();

   

    $proizvodi = $rezultat->fetchAll();
    echo json_encode($proizvodi);

} else {
    http_response_code(400);
}