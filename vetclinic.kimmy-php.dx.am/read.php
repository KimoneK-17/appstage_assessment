<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    
    include_once 'database.php';
    include_once 'owner.php';

    $database = new Database();
    $db = $database->getConnection();

    $items = new Owner($db);

    $stmt = $items->getOwner();
    $itemCount = $stmt->rowCount();


    echo json_encode($itemCount);

    if($itemCount > 0){
        
        $ownerArr = array();
        $ownerArr["body"] = array();
        $ownerArr["itemCount"] = $itemCount;

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $e = array(
                "account_id" => $account_id,
                "firstname" => $firstname,
                "lastname" => $lastname,
                "contact_number" => $contact_number,
                "email_address" => $email_address,
                "postal_address" => $postal_address,
                "id_number" => $id_number
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