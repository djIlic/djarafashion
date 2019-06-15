<?php

session_start();

if(isset($_SESSION['korisnik'])){

if(isset($_POST['btnKomentar'])){
    require "../config/connection.php";
    $komentar = $_POST['komentar'];
    $id = $_SESSION['korisnikId'];
    $date = date("d/m/y");
    $model = $_POST["model"];
    
    if(!empty($komentar)){
        $upit="INSERT INTO komentar VALUES (null, :komentar, :datum, :korisnik, :model)";
        $rez=$conn->prepare($upit);
        $rez->bindParam(":komentar", $komentar);
        $rez->bindParam(":datum", $date);
        $rez->bindParam(":korisnik", $id);
        $rez->bindParam(":model", $model);
        $rez->execute();

        if($rez){
            $status=201;
            header("Location: ../index.php?page=proizvod&id=$model");
        }
        else {
            $status=500;
        }
}
}}