<?php
session_start();

if(isset($_POST["send"])){
    require "../config/connection.php";

    $email=$_POST["email"];
    $password=$_POST["password"];

    $errors=[];

    $rePassword="/^[A-z0-9]{8,}$/";
    if(!preg_match($rePassword,$password)){
        array_push($errors,"Uneti parametri ne postoje");
    }
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        array_push($errors,"Uneti parametri ne postoje");
    }
    if(count($errors) !=0){
        echo"ima greska";
    }
    else {
        $upit="SELECT * FROM korisnik WHERE email=:email AND pass=:pass";
        $rez=$conn->prepare($upit);
        $md5password=md5($password);
        $rez->bindParam(":email", $email);
        $rez->bindParam(":pass", $md5password);
        if($rez->execute()){
            if($rez->rowCount()==1){
                $korisnik=$rez->fetch();
                $_SESSION["korisnikId"]=$korisnik->korisnikId;
                $idd=$korisnik->korisnikId;
                $_SESSION["korisnik"]=$korisnik;
                http_response_code(201);
                // if($_SESSION['korisnik']->ulogaId==1){
                //    // header("Location: ../dodajKamion.php");
                // }
                // else {
                //    // header("Location: index.php");
                // }
            }
            else {
                http_response_code(400);
                echo "Ne postoji ulogovani korisnik sa ovim parametrima";
            }
        }
        else {
            http_response_code(400);
            echo "Upit nije ok";
        }
    }
}