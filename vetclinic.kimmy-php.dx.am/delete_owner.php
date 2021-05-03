<?php    
 //connect to db and call Owner function for owner.php    
  include_once 'dbconnect.php';
  include_once 'owner.php';
  
  $database = new DBController();
  $db = $database->getConnection();
  
  $item = new Owner($db);
  
  $data = json_decode(file_get_contents("php://input"));
  $item->account_id = isset($_GET['account_id']) ? $_GET['account_id'] : die();
  
  if($item->deleteOwner()){
      include 'owner_details.php';
  } else{

      //null;
  }
  ?>
  
 <!--
Modified By: Kimone Kuppasamy
Modified Date: 01-05-2021
Version: 1
Description: call deleteOwner function in Owner class
Reason: Original
-->