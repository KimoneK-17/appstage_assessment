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
    <?php
      $AccountErr = $NameErr = $TypeErr = $BreedErr = $BirthErr = $PetIDErr = "" ;
      $Account = $Name = $Type = $Breed = $Birthdate = $PetID = "";
      
      
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if (empty($_POST["pet_id"])) {
          $PetIDErr = "Pet ID is required";
        } else {
          $PetID = $_POST["pet_id"];
      	trim($PetID);
      	stripslashes($PetID);
      	
        }
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
      $pet = $_GET['pet_id'] ?? "";
	  $acc = $_GET['account_id'] ?? "";
      ?>
    <br><br>
    <br><br>
	<!--create form to get required values-->
    <form  method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      <fieldset>
        <legend >Update Pet Details</legend>
        <br><br>
		 Pet ID: <input type="text" name="pet_id" value = "<?php echo $pet;?>" readonly>
        <br><br>
       Account ID: <input type="text" name="account" value = "<?php echo $acc;?>" readonly>
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
        Birthdate: <input type="date" name="birthdate"><span class="error">* <?php echo $BirthErr;?></span>
        <br><br>
        <p><input type="submit" value = "Update Pet"/></p>
      </fieldset>
    </form>
    <!-- input fields to add item-->  
    <?php
	  //check if required fields are filled in
      if(empty($AccountErr) and empty($NameErr) and empty($TypeErr) and empty($BreedErr) and empty($BirthErr) 
        and !(empty($Account) and empty($Name) and empty($Type) and empty($Breed) and empty($Birthdate)))
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
          $item->pet_id = $PetID;
		  
          // pet values
          $item->account_id = $Account;
          $item->pet_name = $Name;
          $item->animal_type = $Type;
          $item->breed = $Breed;
          $item->birthdate = $Birthdate;
          
          if($item->updatePet()){
              echo json_encode("Pet data updated.");
      		header('Location: pet_details.php');
          } else{
              echo json_encode("Data could not be updated");
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
Description: update pet based on pet_id and account_id
Reason: Original
-->