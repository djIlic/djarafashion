<?php

header("Content-type: application/json");

if(isset($_POST['id'])){
    require "../../config/connection.php";
    $id = $_POST['id'];
    $upit = "SELECT * FROM kategorija k INNER JOIN artikl a 
                                        ON k.kategorijaId=a.kategorijaId INNER JOIN slika s 
                                        ON a.artiklId=s.artiklId
                                        WHERE k.kategorijaId = :id";
    $rezultat = $conn->prepare($upit);
    $rezultat->bindParam(":id", $id);
    $rezultat->execute();

    $proizvodi = $rezultat->fetchAll();
    echo json_encode($proizvodi);
}