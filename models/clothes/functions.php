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

// function getProductsWithPhoto(){
//     return executeQuery("SELECT * FROM artikl a INNER JOIN slika s ON a.artiklId=s.artiklId");
// }

// function getProductsWithSize($id){
//     // global $conn;
//     // try{
//     return exwcuteQury("SELECT va.naziv FROM artikl a INNER JOIN velicinaartikl va ON a.artiklId=va.artiklId WHERE artiklId=$id");
//     // $select = $conn->prepare("SELECT * FROM actors a INNER JOIN movie_actors ma ON a.id = ma.actor_id WHERE ma.movie_id = ?");
//     //     $select->execute([$movie_id]);

//     //     return $select->fetchAll();
//     // }
//     // catch(PDOException $e){
//     //     return null;
//     // }
// }

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
    return executeQuery("SELECT * FROM slike");
}

function getOne($id){
    global $conn;
    $result = $conn->prepare("SELECT * FROM slika WHERE slikaId = ?");
    $result->execute([$id]);
    return $result->fetch();
}

function insert($putanjaOriginalnaSlika, $putanjaNovaSlika){
    global $conn;
    $insert = $conn->prepare("INSERT INTO slika VALUES('', ?, ?)");
    $isInserted = $insert->execute([$putanjaOriginalnaSlika, $putanjaNovaSlika]);
    return $isInserted;
}