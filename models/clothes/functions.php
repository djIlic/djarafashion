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

function getProductsWithPhoto($id){
    return executeQuery("SELECT * FROM artikl a INNER JOIN slika s ON a.artiklId=s.artiklId WHERE a.artiklId=$id");
}

// function getProductsWithComment($id){
//     return exwcuteQury("SELECT komentar, datum, korisnikId FROM komentar k INNER JOIN artikl a ON k.artiklId=a.artiklId WHERE a.artiklId=$id");
// }

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