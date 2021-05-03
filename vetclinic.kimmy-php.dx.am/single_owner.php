<?php
 //connect to db and call Owner function for owner.php    
  include_once 'dbconnect.php';
  include_once 'owner.php';
  $database = new DBController();
  $db = $database->getConnection();
  
  $item = new Owner($db);

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
    <a class="active" href="owner_details.php">Owner Details</a>
    <a  href="pet_details.php">Pet Details</a>
    <li style="float:right"><a  href="logout.php">Logout</a>
  </div>

<!--display owner details-->
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

    $item->account_id = isset($_GET['account_id']) ? $_GET['account_id'] : die();
  
    $item->getSingleOwner();
    
    if($item->account_id != null){
        // create array
        $owner_arr = array(
            "account_id" =>  $item->account_id,
            "firstname" => $item->firstname,
            "lastname" => $item->lastname,
            "contact_number" => $item->contact_number,
            "email_address" => $item->email_address,
            "postal_address" => $item->postal_address,
            "id_number" => $item->id_number
        );
      
        http_response_code(200);
      ?>
      
        <tr>
    <th><?php echo $item->account_id; ?></th>
    <th><?php echo $item->firstname; ?></th> 
    <th><?php echo $item->lastname;?></th>
    <th><?php echo $item->contact_number; ?></th>
    <th><?php echo $item->email_address; ?></th> 
    <th><?php echo $item->postal_address;?></th>
    <th><?php echo $item->id_number; ?></th>
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
<!--displaying pets related to owner-->
    <div class="txt-heading">Pet Details</div>
    <table style="width:100%">
    <tr>
    <th>Pet ID</th>
    <th>Account ID</th>
    <th>Name</th> 
    <th>Animal Type</th>
    <th>Breed</th>
    <th>Birthdate</th>
  </tr>
  <?php

    $stmt = $item->getOwnerPets();
    $itemCount = $stmt->rowCount();  
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
      ?>
      
        <tr>
          <th><?php echo $pet_id; ?></th>
          <th><?php echo $account_id; ?></th> 
          <th><?php echo $pet_name;?></th>
          <th><?php echo $animal_type; ?></th>
          <th><?php echo $breed; ?></th> 
          <th><?php echo $birthdate;?></th>
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
<!--starting add pets for owner-->  
 <?php
      $AccountErr = $NameErr = $TypeErr = $BreedErr = $BirthErr = "" ;
      $Account = $Name = $Type = $Breed = $Birthdate = "";
      
      
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["account"])) {
          $AccountErr = "Acocount is required";
        } else {
          $Account = $_POST["account"];
      	trim($Account);
      	stripslashes($Account);
      	
        }
        
        if (empty($_POST["name"])) {
          $Name = "name is required";
        } else {
          $Name = $_POST["name"];
      	trim($Name);
      	stripslashes($Name);
        }
        
        if (empty($_POST["type"])) {
          $TypeErr = "type is required";
        } else {
          $Type = $_POST["type"];
      	trim($Type);
      	stripslashes($Type);
        }
        
        if (empty($_POST["breed"])) {
          $BreedErr = "breed is required";
      	
        } else {
          $Breed = $_POST["breed"];
      	trim($Breed);
      	stripslashes($Breed);
        }
        
          if (empty($_POST["birthdate"])) {
          $BirthErr = "birthdate is required";
      	
        } else {
          $Birthdate = $_POST["birthdate"];
      	trim($Birthdate);
      	stripslashes($Birthdate);
        }
      		
      	if (!preg_match("/^[a-zA-Z ]*$/",$Name)) 
      		{
      			$NameErr = "Only letters and white space allowed"; 
      		}
      
      			
      }//checks for blanks as well as checks if it meets special requirements
	   $variable = $_GET['account_id'];
      ?>
    <br><br>
    <br><br>
    <form  method="post" action="single_owner.php?account_id=<?php echo $variable; ?>">
      <fieldset>
        <legend >Add New Pet</legend>
        <br><br>
        Account ID: <input type="text" name="account" value = "<?php echo $_GET['account_id'];?>" readonly><span class="error">* <?php echo $AccountErr;?></span>
        <br><br>
        Name: <input type="text" name="name"><span class="error">* <?php echo $NameErr;?></span>
        <br><br>
		Type of Animal: <input type="text" list="types" name="type" >
  <datalist id="types" name="type" >
    <option value="Dog">
    <option value="Cat">
    <option value="Rabbit">
    <option value="Hamster">
  </datalist><span class="error">* <?php echo $TypeErr;?></span>
  <br><br>
  Breed: <input type="text" list="breed" name="breed">
  <datalist id="breed" name="breed">
    <option value="Pug">
    <option value="Jack Russel">
    <option value="German Sheperd">
    <option value="Bulldog">
	<option value="Poodle">
	<option value=" ">
  </datalist><span class="error">* <?php echo $BreedErr;?></span>
        <br><br>
        Birthdate:<input type="date" name="birthdate"><span class="error">* <?php echo $BirthErr;?></span>
        <br><br>
        <p><input type="submit" value = "Add Pet"/></p>
      </fieldset>
    </form>
    <!-- input fields to add item-->
    <?php
      if(empty($AccountErr) and empty($NameErr) and empty($TypeErr) and empty($BreedErr) and empty($BirthErr) and !(empty($Account) and empty($Name) and empty($Type) and empty($Birthdate)))
        {
          $line = array
          (
          "$Account,$Name,$Type,$Breed,$Birthdate"
          );
               
          include_once 'dbconnect.php';
          include_once 'pet.php';
      
          $database = new DBController();
          $db = $database->getConnection();
      
          $item = new Pet($db);
      
          $data = json_decode(file_get_contents("php://input"));
      
          $item->account_id = $Account;
          $item->pet_name = $Name;
          $item->animal_type = $Type;
          $item->breed = $Breed;
          $item->birthdate = $Birthdate;
          
          if($item->createPet()){
              echo 'Pet created successfully.';
			  $variable = $_GET['account_id'];
          } else{
              echo 'Pet could not be created.';
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
Description: display specific owner and related pets on record
Reason: Original
-->