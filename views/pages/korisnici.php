<?php

if(isset($_SESSION['korisnik'])){
        if($_SESSION['korisnik']->ulogaId != 1){
            header("Location: index.php");
        }
    }
        else {
            $_SESSION['greska'] ="Niste ulogovani!";
            header("Location: index.php?page=404");
        }
?>

