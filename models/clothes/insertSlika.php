<?php

if(isset($_POST['btnSlika'])){
    
    require_once "../../config/connection.php";
    require_once "functions.php";

    $artiklId=$_POST['ddlArtikl'];

    // FAJL

    // $fajl = $_FILES['slika'];
    // var_dump($fajl);

    $fajl_naziv = $_FILES['slika']['name'];
    $fajl_tmpLokacija = $_FILES['slika']['tmp_name'];
    $fajl_tip = $_FILES['slika']['type'];
    $fajl_velicina = $_FILES['slika']['size'];

    // VALIDACIJA

    // 3 000 000 ~ 3MB
    $greske = [];

    $dozvoljeni_tipovi = ['image/jpg', 'image/jpeg', 'image/png'];

    if(!in_array($fajl_tip, $dozvoljeni_tipovi)){
        array_push($greske, "Pogresan tip fajla.");
    }
    if($fajl_velicina > 3000000){
        array_push($greske, "Maksimalna velicina fajla je 3MB.");
    }

    
    if(count($greske) == 0){
        // var_dump(getimagesize($fajl_tmpLokacija));

        // $dimenzije = getimagesize($fajl_tmpLokacija);
        // $sirina = $dimenzije[0];
        // $visina = $dimenzije[1];

        list($sirina, $visina) = getimagesize($fajl_tmpLokacija);

        // KREIRANJE PRAZNE SLIKE
        
        // $slika = imagecreatetruecolor(50, 50);
        // imagejpeg($slika, '../../assets/images/users/prazna_slika.jpg');
        
        // KREIRANJE SLIKE OD FAJLA
        
        $postojecaSlika = null;
        switch($fajl_tip){
            case 'image/jpeg':
                $postojecaSlika = imagecreatefromjpeg($fajl_tmpLokacija);
                break;
            case 'image/png':
                $postojecaSlika = imagecreatefrompng($fajl_tmpLokacija);
                break;
        }

        // PRIMER 1 - definisanje nove velicine slike
        // $novaSirina = 200;
        // $novaVisina = 200;

        // PRIMER 2 - procentualno smanjenje - za 50% manje sirina i visina
        // $novaSirina = $sirina * 0.5;
        // $novaVisina = $visina * 0.5;
        
        // PRIMER 3 - srazmerno smanjenje - sirina: 200px, visina: ?
        $novaSirina = 245;
        $novaVisina = ($novaSirina/$sirina) * $visina; // novaVisina : visina = novaSirina : sirina

        // kreiranje prazne slike
        $novaSlika = imagecreatetruecolor($novaSirina, $novaVisina);
        
        // RESIZE

        // po referenci: u $novaSlika ce se nalaziti smanjena upload-ovana slika
        imagecopyresampled($novaSlika, $postojecaSlika, 0, 0, 0, 0, $novaSirina, $novaVisina, $sirina, $visina);


        // UPLOAD NOVE SLIKE
        $naziv = time().$fajl_naziv;
        $putanjaNovaSlika = 'assets/images/nova_'.$naziv;

        switch($fajl_tip){
            case 'image/jpeg':
                imagejpeg($novaSlika, '../../'.$putanjaNovaSlika);
                break;
            case 'image/png':
                imagepng($novaSlika, '../../'.$putanjaNovaSlika);
                break;
        }

        $putanjaOriginalnaSlika = 'assets/images/'.$naziv;

        if(move_uploaded_file($fajl_tmpLokacija, '../../'.$putanjaOriginalnaSlika)){
            echo "Slika je upload-ovana na server!";

            try {
                $isInserted = insert($putanjaOriginalnaSlika, $putanjaNovaSlika, $artiklId);

                if($isInserted){
                    echo "Putanja do slike je upisana u bazu!";
                    header("Location: ../../index.php?page=admin");
                }
                
            } catch(PDOException $ex){
                echo $ex->getMessage();
            }
        }

        // brisanje iz memorije
        imagedestroy($postojecaSlika);
        imagedestroy($novaSlika);

    } else {
        var_dump($greske);
    }

}