<?php

if(isset($_POST['sort'])){
    $sort = $_POST['sort'];

    include "../../config/connection.php";
    include "functions.php";
    
    $upit = getQuery();

    switch($sort){
        case 1:
            $upit .= " ORDER BY p.name ASC";
            break;
        case 2:
            $upit .= " ORDER BY p.name DESC";
            break;
        case 3:
            $upit .= " ORDER BY created_at ASC";
            break;
        case 4:
            $upit .= " ORDER BY created_at DESC";
            break;
    }

    $rezultat = executeQuery($upit);
    echo json_encode($rezultat);
} else {
    http_response_code(400); // Bad request
    echo json_encode(["greska"=> "Niste poslali sort"]);
}