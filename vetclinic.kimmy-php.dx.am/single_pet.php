<?php
 //connect to db and call pet function for pet.php    
    include_once 'dbconnect.php';
    include_once 'pet.php';

    $database = new DBController();
    $db = $database->getConnection();
?>

<HTML>
  <HEAD>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <TITLE>Vet Clinic Visitor Tracking</TITLE>
    	<link href="css\style.css" type="text/css" rel="stylesheet" />
		<link href="css\table.css" type="text/css" rel="stylesheet" />
		<link href="css\log_reg.css" type="text/css" rel="stylesheet" />
		<link href="css\navstyle.css" type="text/css" rel="stylesheet" />
  </HEAD>

<BODY>

<div class="topnav">
    <a href="index.php">Login</a>
    <a href="view_visits.php">Visits</a>
    <a href="owner_details.php">Owner Details</a>
    <a  class="active" href="pet_details.php">Pet Details</a>
    <li style="float:right"><a  href="logout.php">Logout</a>
  </div>
<!--start table for Pet-->
    <div class="txt-heading">Pet Details</div>
    <table style="width:100%">
    <tr>
    <th>Owner</th>
    <th>Name</th> 
    <th>Animal Type</th>
    <th>Breed</th>
    <th>Birthdate</th>
  </tr>
  <?php

    $item = new Pet($db);

    $item->pet_id = isset($_GET['pet_id']) ? $_GET['pet_id'] : die();
  
    $item->getSinglePet();
    //getting single row return result
    if($item->pet_name != null){
        // create array
        $emp_arr = array(
            "pet_id" =>  $item->pet_id,
            "account_id" => $item->account_id,
            "pet_name" => $item->pet_name,
            "animal_type" => $item->animal_type,
            "breed" => $item->breed,
            "birthdate" => $item->birthdate
        );
      
        http_response_code(200);
        //echo json_encode($emp_arr);
       
       //echo $item->account_id;
       
      
      ?>
      
        <tr>
          <th><?php echo $item->account_id; ?></th> 
          <th><?php echo $item->pet_name;?></th>
          <th><?php echo $item->animal_type;?></th>
          <th><?php echo $item->breed; ?></th>
          <th><?php echo $item->birthdate; ?></th>
        </tr>
  
      <?php
      }
    else{
        http_response_code(404);
        echo json_encode("Owner not found.");
    }
    ?>

      </table>
  </div>
<!--start table for Pet-->
    <div class="txt-heading">Owner Details</div>
    <table style="width:100%">
    <tr>
    <th>Account ID</th>
    <th>Firstname</th> 
    <th>Lastname</th>
    <th>Contact Number</th>
    <th>Email Address</th>
    <th>Postal Address</th>
    <th>ID Number</th>
  </tr>  
  <?php
    $stmt = $item->getPetsOwner();
    $itemCount = $stmt->rowCount();  
	
  if($itemCount > 0){
        
        $ownerArr = array();
        $ownerArr["body"] = array();
        $ownerArr["itemCount"] = $itemCount;
        //loop through array to fill table
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
        // create pet array
        $pet_arr = array(
            "account_id" =>  $account_id,
            "firstname" => $firstname,
            "lastname" => $lastname,
            "contact_number" => $contact_number,
            "email_address" => $email_address,
            "postal_address" => $postal_address,
            "id_number" => $id_number
        );
        array_push($ownerArr["body"], $emp_arr);
        //http_response_code(200);
        //echo json_encode($emp_arr);
       
       //echo $item->account_id;
       
      ?>
      
        <tr>
          <th><?php echo $account_id; ?></th>
          <th><?php echo $firstname; ?></th> 
          <th><?php echo $lastname;?></th>
          <th><?php echo $contact_number; ?></th>
          <th><?php echo $email_address; ?></th> 
          <th><?php echo $postal_address;?></th>
          <th><?php echo $id_number; ?></th>
        </tr>
  
      <?php
      }
    }
    else{
        http_response_code(404);
        //echo json_encode("Owner not found.");
    }
?>

      </table>

    </div>

<!--start table for Visits-->
    <div class="txt-heading">Visit Details</div>
    <table style="width:100%">
    <tr>
    <th>Visit ID</th>
    <th>Pet ID</th> 
    <th>Visit Date</th>
    <th>Reason</th>
    <th>Follow Up</th>
  </tr>  
  <?php
    $stmt = $item->getVisits();
    $itemCount = $stmt->rowCount();  
    if($itemCount > 0){
        
        $ownerArr = array();
        $ownerArr["body"] = array();
        $ownerArr["itemCount"] = $itemCount;

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $e = array(
                "visit_id" => $visit_id,
                "pet_id" => $pet_id,
                "visit_date" => $visit_date,
                "visit_type" => $visit_type,
                "follow_up_date" => $follow_up_date
            );

            array_push($ownerArr["body"], $e);
      ?>
      
        <tr>
          <th><?php echo $visit_id; ?></th>
          <th><?php echo $pet_id; ?></th> 
          <th><?php echo $visit_date;?></th>
          <th><?php echo $visit_type; ?></th>
          <th><?php echo $follow_up_date; ?></th> 
        </tr>
  
    <?php
        }
    }

    else{
        http_response_code(404);
    }
    ?>
      </table>
  </div> 
	
<!--starting add visit for pet-->  
 <?php
      $ReasonErr = $VDateErr ="" ;
      $Reason = $FollowUp = $VDate ="";
      
        if (empty($_POST["reason"])) {
          $ReasonErr = "reason is required";
        } else {
          $Reason = $_POST["reason"];
      	trim($Reason);
      	stripslashes($Reason);
        }
		
		if (empty($_POST["visitdate"])) {
          $VDateErr = "date is required";
        } else {
          $VDate = $_POST["visitdate"];
      	trim($VDate);
      	stripslashes($VDate);
        }
        
        $FollowUp = $_POST["followup"] ?? null;
      	trim($FollowUp);
      	stripslashes($FollowUp);
        
      //checks for blanks as well as checks if it meets special requirements
	   //$pet_id = $_GET['pet_id'];
      ?>
    <br><br>
    <br><br>
    <form  method="post" action="single_pet.php?pet_id=<?php echo $_GET['pet_id']; ?>">
      <fieldset>
        <legend >Add New Visit</legend>
        <br><br>
        Pet ID: <input type="text" name="account" value = "<?php echo $_GET['pet_id'];?>" readonly>
        <br><br>
		Visit Date: <input type="date" name="visitdate"><span class="error">* <?php echo $VDateErr;?></span>
        <br><br>
        Reason: <input type="text" name="reason"><span class="error">* <?php echo $ReasonErr;?></span>
        <br><br>
        Follow Up:<input type="date" name="followup">
        <br><br>
        <p><input type="submit" value = "Add Visit"/></p>
      </fieldset>
    </form>
    <!-- input fields to add item-->
    <?php
      if(empty($ReasonErr) and empty($VDateErr) and !(empty($Reason) and empty($VDate)))
        {
          $line = array
          (
          "$Reason,$VDate,$FollowUp"
          );
         include_once 'visits.php';

    $database = new DBController();
    $db = $database->getConnection();
      
          $item = new Visit($db);
      
          $data = json_decode(file_get_contents("php://input"));
      
          $item->pet_id = $_GET['pet_id'];
          $item->visit_date = $VDate;
          $item->visit_type = $Reason;
          $item->follow_up_date = $FollowUp;
		  
          if($item->createVisit()){
              echo 'Visit created successfully.';
          } else{
              echo 'Visit could not be created.';
          }
             
          } //checks if there are any errors before proceeding with the insert
      else{
      	    //do nothing
           }
      ?>  	
	
</BODY>
</HTML>
<!--
Modified By: Kimone Kuppasamy
Modified Date: 01-05-2021
Version: 1
Description: display specific pet and related owner details on record
Reason: Original
-->