<!DOCTYPE HTML>
<html>
  <head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <TITLE>Vet Clinic Visitor Tracking</TITLE>
    	<link href="css\style.css" type="text/css" rel="stylesheet" />
		<link href="css\table.css" type="text/css" rel="stylesheet" />
		<link href="css\log_reg.css" type="text/css" rel="stylesheet" />
		<link href="css\navstyle.css" type="text/css" rel="stylesheet" />
  </head>
  <body>
<div class="topnav">
    <a href="index.php">Login</a>
    <a href="view_visits.php">Visits</a>
    <a href="owner_details.php">Owner Details</a>
    <a  class="active" href="pet_details.php">Pet Details</a>
    <li style="float:right"><a  href="logout.php">Logout</a>
  </div>

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
      ?>
    <br><br>
    <br><br>
	<!--create form to get required values-->
    <form  method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      <fieldset>
        <legend >Add New Pet</legend>
        <br><br>
        Account Number: <input type="text" name="account"><span class="error">* <?php echo $AccountErr;?></span>
        <br><br>
        Name: <input type="text" name="name"><span class="error">* <?php echo $NameErr;?></span>
        <br><br>
        Type of Animal: <input type="text" name="type"><span class="error">* <?php echo $TypeErr;?></span>
        <br><br>
        Breed: <input type="text" name="breed"><span class="error">* <?php echo $BreedErr;?></span>
        <br><br>
        Birthdate: <input type="date" name="birthdate"><span class="error">* <?php echo $BirthErr;?></span>
        <br><br>
        <p><input type="submit" value = "Add Pet"/></p>
      </fieldset>
    </form>
    <!-- input fields to add item-->
    <?php
	//check if required fields are filled in
      if(empty($AccountErr) and empty($NameErr) and empty($TypeErr) and empty($BreedErr) and empty($BirthErr) and !(empty($Account) and empty($Name) and empty($Type) and empty($Breed) and empty($Birthdate)))
        {
         echo "<p>" . $Account . "</p>";
       
       $line = array
       (
       "$Account,$Name,$Type,$Breed,$Birthdate"
       );
           //connect to db and call pet function for pet.php       
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
      		header('Location: pet_details.php');
          } else{
              echo 'Pet could not be created.';
          }
             
          } //checks if there are any errors before proceeding with the insert
      else{
      	//do nothing
           }
      ?>  
  </body>
</html>
<!--
Modified By: Kimone Kuppasamy
Modified Date: 01-05-2021
Version: 1
Description: add new pet for specific account id
Reason: Original
-->