<?php
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
    /*header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");*/



    $item = new Pet($db);

    $item->pet_id = isset($_GET['pet_id']) ? $_GET['pet_id'] : die();
  
    $item->getSinglePet();
    
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
    /*header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");*/
  $stmt = $item->getPetsOwner();
    $itemCount = $stmt->rowCount();  
	
  if($itemCount > 0){
        
        $ownerArr = array();
        $ownerArr["body"] = array();
        $ownerArr["itemCount"] = $itemCount;

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
        // create array
        $emp_arr = array(
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
</BODY>
</HTML>
