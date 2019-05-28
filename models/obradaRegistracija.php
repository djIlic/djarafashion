<?php
include ("konekcija.php");
if(isset($_POST["btnReg"])){
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
        array_push($errors,"Ime nije uneto u dobrom formatu");
    }
    if(!preg_match($rePrezime,$prezime)){
        array_push($errors,"Prezime nije uneto u dobrom formatu");
    }
    if(!preg_match($reUsername,$username)){
        array_push($errors,"Korisnicko ime nije uneto u dobrom formatu");
    }
    if(!preg_match($rePassword,$password)){
        array_push($errors,"Sifra nije uneta u dobrom formatu");
    }
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        array_push($errors, "Email nije unet u dobrom formatu");
    }

    if(count($errors)!=0){
        var_dump($errors);
        //stilizuj da nesto nije dobro uneto
    }
    else {
        $upit="INSERT INTO korisnik VALUES('', :ime, :prezime, :username, :password, :email, 2)";
        $rez=$konekcija->prepare($upit);
        $md5password=md5($password);
        $rez->bindParam(":ime", $ime);
        $rez->bindParam(":prezime", $prezime);
        $rez->bindParam(":email", $email);
        $rez->bindParam(":username", $username);
        $rez->bindParam(":password", $md5password);

        $rez->execute();

        if($rez){
            $status=204;
        }
        else {
            $status=500;
        }
    }
}