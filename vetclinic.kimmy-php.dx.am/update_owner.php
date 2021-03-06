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
    <a class="active" href="owner_details.php">Owner Details</a>
    <a  href="pet_details.php">Pet Details</a>
    <li style="float:right"><a  href="logout.php">Logout</a>
  </div>
    <!-- navigation bar at the top of the screen -->
    <?php
      $AccountErr = $FNameErr = $LNameErr = $ContErr = $EmailErr = $PostAdErr = $IDErr = "" ;
      $Account = $FName = $LName = $Cont = $Email = $PostAd= $ID = "";
      
      
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
      	 if (empty($_POST["account"])) {
          $AccountErr = "Acocount is required";
        } else {
          $Account = $_POST["account"];
      	trim($Account);
      	stripslashes($Account);
      	
        }
        if (empty($_POST["firstname"])) {
          $FNameErr = "Firstname is required";
        } else {
          $FName = $_POST["firstname"];
      	trim($FName);
      	stripslashes($FName);
      	
        }
        
        if (empty($_POST["lastname"])) {
          $LNameErr = "lastname is required";
        } else {
          $LName = $_POST["lastname"];
      	trim($LName);
      	stripslashes($LName);
        }
        
        if (empty($_POST["cont"])) {
          $ContErr = "cont is required";
        } else {
          $Cont = $_POST["cont"];
      	trim($Cont);
      	stripslashes($Cont);
        }
        
        if (empty($_POST["email"])) {
          $EmailErr = "email is required";
      	
        } else {
          $Email = $_POST["email"];
      	trim($Email);
      	stripslashes($Email);
        }
        
          if (empty($_POST["postad"])) {
          $PostAdErr = "postad is required";
      	
        } else {
          $PostAd = $_POST["postad"];
      	trim($PostAd);
      	stripslashes($PostAd);
        }
        
        if (empty($_POST["id"])) {
          $IDErr = "id is required";
      	
        } else {
          $ID = $_POST["id"];
      	trim($ID);
      	stripslashes($ID);
        }
        
        
          
      	if (!preg_match("/^[a-zA-Z ]*$/",$FName)) 
      		{
      			$FNameErr = "Only letters and white space allowed"; 
      		}
      		
      	if (!preg_match("/^[a-zA-Z ]*$/",$LName)) 
      		{
      			$LNameErr = "Only letters and white space allowed"; 
      		}
      
      			
      }//checks for blanks as well as checks if it meets special requirements
      
      $variable = $_GET['account_id'];
      ?>
    <br><br>
    <br><br>
	<!--create form to get required values-->
    <form  method="post" action="update_owner.php?account_id=<?php echo $variable; ?>">
      <fieldset>
        <legend >Update Owner</legend>
        <br><br>
		Account ID: <input type="text" name="account" value = "<?php echo $_GET['account_id'];?>" readonly><span class="error">* <?php echo $AccountErr;?></span>
        <br><br>
        Firstname: <input type="text" name="firstname"><span class="error">* <?php echo $FNameErr;?></span>
        <br><br>
        Lastname: <input type="text" name="lastname"><span class="error">* <?php echo $LNameErr;?></span>
        <br><br>
        Contact Number: <input type="number" name="cont"><span class="error">* <?php echo $ContErr;?></span>
        <br><br>
        Email Address: <input type="text" name="email"><span class="error">* <?php echo $EmailErr;?></span>
        <br><br>
        Postal Address: <input type="text" name="postad"><span class="error">* <?php echo $PostAdErr;?></span>
        <br><br>
        ID Number: <input type="number" name="id"><span class="error">* <?php echo $IDErr;?></span>
        <br><br>
        <p><input type="submit" value = "Add Owner"/></p>
      </fieldset>
    </form>
    <!-- input fields to add item-->
    <?php
      //check if required fields are filled in
      if(empty($AccountErr) and empty($FNameErr) and empty($LNameErr) and empty($ContErr) and empty($EmailErr) and empty($PostAdErr)and empty($IDErr) and !(empty($Account) and empty($FName) and empty($LName) and empty($Cont) and empty($Email) and empty($PostAd) and empty($ID)))
        {
       $line = array
       (
       "$Account,$FName,$LName,$Cont,$Email,$PostAd,$ID"
       );
          //connect to db and call Owner function for owner.php     
          include_once 'dbconnect.php';
          include_once 'owner.php';
          
          $database = new DBController();
          $db = $database->getConnection();
          
          $item = new Owner($db);
          
          $data = json_decode(file_get_contents("php://input"));
      	  $item->account_id = isset($_GET['account_id']) ? $_GET['account_id'] : die();

          // owner values
          $item->firstname = $FName;
          $item->lastname = $LName;
          $item->contact_number = $Cont;
          $item->email_address = $Email;
          $item->postal_address = $PostAd;
          $item->id_number = $ID;
          
          if($item->updateOwner()){
              echo json_encode("Owner data updated.");
      		header('Location: owner_details.php');
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
Description: update owner based on account_id
Reason: Original
-->