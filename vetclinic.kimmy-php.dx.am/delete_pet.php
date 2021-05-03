<?php 
 //connect to db and call pet function for pet.php       
  include_once 'dbconnect.php';
  include_once 'pet.php';
  
  $database = new DBController();
  $db = $database->getConnection();
  
  $item = new Pet($db);
  
  $data = json_decode(file_get_contents("php://input"));
  $item->pet_id = isset($_GET['pet_id']) ? $_GET['pet_id'] : die();
  //$item->pet_id = $data->pet_id;
  
  if($item->deletePet()){
      include 'pet_details.php';
  } else{
      //null;
  }
  ?>
<!--
Modified By: Kimone Kuppasamy
Modified Date: 01-05-2021
Version: 1
Description: call deletePet function in Pet class
Reason: Original
-->