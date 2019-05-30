<?php
  
include "views/fixed/head.php";
include "views/fixed/header.php";
include "views/fixed/nav.php";
if(isset($_GET['page'])){
    switch($_GET['page']){
        case 'pocetna':
        include "views/pages/pocetna.php";
        break;
        case 'autor':
        include "views/pages/o-autoru.php";
        break;
        case 'prijava':
        include "views/pages/login.php";
        break;
        case 'registracija':
        include "views/pages/registracija.php";
        break;
        case 'kontakt':
        include "views/pages/kontakt.php";
        break;
        case 'proizvod':
        include "views/pages/proizvod.php";
        break;
        default:
        include "views/pages/404.php";
        break;
    }
}
else {
    include "views/pages/pocetna.php";
}
include "views/fixed/footer.php";