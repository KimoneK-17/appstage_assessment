<?php    
  include_once 'dbconnect.php';
  include_once 'owner.php';
  
  $database = new DBController();
  $db = $database->getConnection();
  
  $item = new Owner($db);
  
  $data = json_decode(file_get_contents("php://input"));
  $item->account_id = isset($_GET['account_id']) ? $_GET['account_id'] : die();
  //$item->pet_id = $data->pet_id;
  
  if($item->deleteOwner()){
      //echo json_encode("Pet deleted.");
      include 'owner_details.php';
      //exec('pet_details.php');
  } else{
      //echo json_encode("Data could not be deleted");
      //null;
  }
  ?>