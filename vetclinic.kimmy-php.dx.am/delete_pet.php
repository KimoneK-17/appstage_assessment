<?php    
  include_once 'dbconnect.php';
  include_once 'pet.php';
  
  $database = new DBController();
  $db = $database->getConnection();
  
  $item = new Pet($db);
  
  $data = json_decode(file_get_contents("php://input"));
  $item->pet_id = isset($_GET['pet_id']) ? $_GET['pet_id'] : die();
  //$item->pet_id = $data->pet_id;
  
  if($item->deletePet()){
      //echo json_encode("Pet deleted.");
      include 'pet_details.php';
      //exec('pet_details.php');
  } else{
      //echo json_encode("Data could not be deleted");
      //null;
  }
  ?>