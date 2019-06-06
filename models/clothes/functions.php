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
// function zabeleziPristup(){
//     $file = fopen(BASE_URL . "data/log.txt", "a");

//     $string = basename($_SERVER['REQUEST_URI']) . "\t" . date("d.m.Y H:i:s") . "\t" . $_SERVER['REMOTE_ADDR'] . "\n";

//     fwrite($file, $string);
//     fclose($file);
// }