<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    
    include_once 'dbconnect.php';
    include_once 'pet.php';

    $database = new DBController();
    $db = $database->getConnection();

    $items = new Pet($db);

    $stmt = $items->getPet();
    $itemCount = $stmt->rowCount();


    echo json_encode($itemCount);

    if($itemCount > 0){
        
        $ownerArr = array();
        $ownerArr["body"] = array();
        $ownerArr["itemCount"] = $itemCount;

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $e = array(
                "pet_id" => $pet_id,
                "account_id" => $account_id,
                "pet_name" => $pet_name,
                "animal_type" => $animal_type,
                "breed" => $breed,
                "birthdate" => $birthdate
            );

            array_push($ownerArr["body"], $e);
        }
        echo json_encode($ownerArr);
    }

    else{
        http_response_code(404);
        echo json_encode(
            array("message" => "No record found.")
        );
    }
?>