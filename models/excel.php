<?php

require "../config/connection.php";
include "clothes/functions.php";

if(isset($_POST['btnExcel'])){
$korisnici=getUsers();

$excel = new COM("Excel.Application");

$excel->DisplayAlerts = 1;
$workbook = $excel->Workbooks->Add();
$sheet = $workbook->Worksheets('Sheet1');
$sheet->activate;

$br = 1;
foreach($korisnici as $korisnik){
    
    $polje = $sheet->Range("A{$br}");
    $polje->activate;
    $polje->value = $korisnik->korisnikId;

    
    $polje = $sheet->Range("B{$br}");
    $polje->activate;
    $polje->value = $korisnik->ime;

    
    $polje = $sheet->Range("C{$br}");
    $polje->activate;
    $polje->value = $korisnik->prezime;

    
    $polje = $sheet->Range("D{$br}");
    $polje->activate;
    $polje->value = $korisnik->naziv;

    $br++;
}

$polje = $sheet->Range("E{$br}");
$polje->activate;
$polje->value = count($korisnici);

$workbook->_SaveAs("http://localhost/phpProject/models/Korisnici.xlsx", -4143);
$workbook->Save();
}
