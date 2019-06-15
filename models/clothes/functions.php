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

function getProductsWithPhoto($id){
    executeQuery("SELECT * FROM artikl a INNER JOIN slika s ON a.artiklId=s.artiklId WHERE a.artiklId=$id");
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

function getUsers(){
    return executeQuery("SELECT * FROM korisnik k INNER JOIN uloga u ON k.ulogaId=u.ulogaId");
}