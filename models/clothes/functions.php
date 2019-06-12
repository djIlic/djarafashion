<?php

function executeQuery($upit){
    global $conn;
    return $conn->query($upit)->fetchAll();
}

function getMenuItems(){
    return executeQuery("SELECT * FROM menu WHERE status=1 ORDER BY redosled");
}

function getCategories(){
    return executeQuery("SELECT * FROM kategorija");
}

function getProducts(){
    return executeQuery("SELECT * FROM artikl");
}

function getProductsWithCategory(){
    return executeQuery("SELECT a.artiklId, a.naziv AS artiklNaziv, k.naziv AS kategorijaNaziv FROM artikl a INNER JOIN kategorija k ON a.kategorijaId=k.kategorijaId");
}

function getProductsWithPhoto(){
    return executeQuery("SELECT * FROM artikl a INNER JOIN slika s ON a.artiklId=s.artiklId WHERE a.artiklId=:id");
}

function getProductsWithComment($id){
    global $conn;

    try{
        $comm=$conn->prepare("SELECT * FROM komentar k INNER JOIN artikl a ON k.artiklId=a.artiklId INNER JOIN korisnik ko ON k.korisnikId=ko.korisnikId WHERE k.artiklId=?");
        $comm->execute([$id]);

        return $comm->fetchAll();
    }
    catch(PDOException $e){
        return null;
    }
    }

function getAllofProfuct(){
    $products=getProductsWithPhoto();

    foreach($products as $product){
        $comment=getProductsWithComment($product->artiklId);
        $product->komentar=$comment;
    }

    return $product;
}

function getOneProduct($id){
    global $conn;

    try{
        $dohvatiProizvod= $conn->prepare("SELECT * FROM artikl a INNER JOIN slika s ON a.artiklId=s.artiklId WHERE a.artiklId=?");
        $dohvatiProizvod->execute([$id]);

        $proizvod=$dohvatiProizvod->fetch();
        $proizvod->komentar=getProductsWithComment($proizvod->artiklId);
    }
    catch(PDOException $e){
        return null;
    }
}
// function dohvati($id){
//     return executeQuery("SELECT * FROM kategorija k INNER JOIN artikl a 
//     ON k.kategorijaId=a.kategorijaId INNER JOIN slika s 
//     ON a.artiklId=s.artiklId
//     WHERE k.kategorijaId = :id");
// }
// 

// function zabeleziPristup(){
//     $file = fopen(BASE_URL . "data/log.txt", "a");

//     $string = basename($_SERVER['REQUEST_URI']) . "\t" . date("d.m.Y H:i:s") . "\t" . $_SERVER['REMOTE_ADDR'] . "\n";

//     fwrite($file, $string);
//     fclose($file);
// }

function getAll(){
    return executeQuery("SELECT * FROM slika");
}

function getOne($id){
    global $conn;
    $result = $conn->prepare("SELECT * FROM slika WHERE slikaId = ?");
    $result->execute([$id]);
    return $result->fetch();
}

function insert($putanjaOriginalnaSlika, $putanjaNovaSlika, $artiklId){
    global $conn;
    $insert = $conn->prepare("INSERT INTO slika VALUES('', ?, ?, ?)");
    $isInserted = $insert->execute([$putanjaOriginalnaSlika, $putanjaNovaSlika, $artiklId]);
    return $isInserted;
}