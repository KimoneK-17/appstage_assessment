<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    include_once 'database.php';
    include_once 'owner.php';

    $database = new Database();
    $db = $database->getConnection();

    $item = new Owner($db);

    $data = json_decode(file_get_contents("php://input"));

    $item->firstname = $data->firstname;
    $item->lastname = $data->lastname;
    $item->contact_number = $data->contact_number;
    $item->email_address = $data->email_address;
    $item->postal_address = $data->postal_address;
    $item->id_number = $data->id_number;
    
    if($item->createOwner()){
        echo 'Owner created successfully.';
    } else{
        echo 'Owner could not be created.';
    }
?>