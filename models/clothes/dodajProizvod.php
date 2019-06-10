<?php

if(isset($_POST["btnProizvod"])){
    
    require "../../config/connection.php";

    $naziv=$_POST["modelNaziv"];
    $kategorija=$_POST['ddlKategorija'];
    $cena=$_POST["cena"];
    $opis=$_POST["modelOpis"];
    
    // var_dump($naziv, $cena, $opis, $kategorija);
    $errors=[];

    if(empty($naziv)){
        array_push($errors,"Polje mora biti popunjeno");
    }
    if(empty($cena)){
        array_push($errors,"Polje mora biti popunjeno");
    }
    if(empty($opis)){
        array_push($errors,"Polje mora biti popunjeno");
    }
    if($kategorija=="0"){
        array_push($errors,"Polje mora biti Izabrano");
    }

    if(count($errors)==0){
        $nazivUpper=strtoupper($naziv);
        $upit="INSERT INTO artikl VALUES ( NULL, :naziv, :kategorija, :cena, :opis)";
        $rez=$conn->prepare($upit);
        $rez->bindParam(":naziv", $nazivUpper);
        $rez->bindParam(":kategorija", $kategorija);
        $rez->bindParam(":cena", $cena);
        $rez->bindParam(":opis", $opis);

        $rez->execute();

        if($rez){
            $status=201;
            header("Location: ../../index.php?page=admin");
        }
        else {
            $status=500;
        }
    }
    else {
        echo"ima greske";
    }
}