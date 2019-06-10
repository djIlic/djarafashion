<?php

//header("Content-Type: application/json");

if(isset($_POST["send"])){
    require "../config/connection.php";
    
    $ime=$_POST['ime'];
    $prezime=$_POST['prezime'];
    $email=$_POST['email'];
    $username=$_POST['username'];
    $password=$_POST['password'];

    $errors=[];

    $reIme="/^[A-ZĐŠŽĆČ][a-zđšžćč]{2,14}(\s[A-ZĐŠŽĆČ][a-zđšžćč]{2,14})?$/";
    $rePrezime="/^[A-ZĐŠŽĆČ][a-zđšžćč]{2,14}(\s[A-ZĐŠŽĆČ][a-zđšžćč]{2,14})?$/";
    $reUsername="/^[A-z0-9]+$/";
    $rePassword="/^[A-z0-9]{8,}$/";

    if(!preg_match($reIme, $ime)){
        array_push($errors,"Име није унето у добром формату");
    }
    if(!preg_match($rePrezime,$prezime)){
        array_push($errors,"Презиме није унето у добром формату");
    }
    if(!preg_match($reUsername,$username)){
        array_push($errors,"Корисничко име мора садршати велика, мала слова и бројеве");
    }
    if(!preg_match($rePassword,$password)){
        array_push($errors,"Шифра мора имати минимално 8 карактера, велика, мала слова и бројеве");
    }
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        array_push($errors, "Е-пошта није није унета у добром формату");
    }
//var_dump($errors);
    if(count($errors)==0){
        $upit="INSERT INTO korisnik VALUES (NULL, :ime, :prezime, :username, :pass, :email, 2)";
        $rez=$conn->prepare($upit);
        $md5password=md5($password);
        $rez->bindParam(":ime", $ime);
        $rez->bindParam(":prezime", $prezime);
        $rez->bindParam(":email", $email);
        $rez->bindParam(":username", $username);
        $rez->bindParam(":pass", $md5password);

        $rez->execute();

        if($rez){
            $status=204;
            //header("Location: index.php?page=prijava");
        }
        else {
            $status=500;
        }
    }
}

