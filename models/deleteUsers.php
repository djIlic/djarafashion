<?php

header("Content-type: application/json");

if(isset($_POST['send'])){
    require "../config/connection.php";

    $id=$_POST['id'];
    
    $upit="DELETE FROM korisnik WHERE korisnikId = :id";
    $rez=$conn->prepare($upit);
    $rez->bindParam(":id", $id);
    try{
    $rez->execute();
        if($rez){
            $statusCode=204;
        }
        else {
            $statusCode=500;
        }
    }
    catch(PDOException $e){
        $statusCode=500;
    }
    http_response_code($statusCode);
}