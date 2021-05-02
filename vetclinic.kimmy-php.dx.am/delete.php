<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    
    include_once 'database.php';
    include_once 'owner.php';
    
    $database = new Database();
    $db = $database->runQuery();
    
    $item = new Owner($db);
    
    $data = json_decode(file_get_contents("php://input"));
    
    $item->account_id = $data->account_id;
    
    if($item->deleteOwner()){
        echo json_encode("Owner deleted.");
    } else{
        echo json_encode("Data could not be deleted");
    }
?>