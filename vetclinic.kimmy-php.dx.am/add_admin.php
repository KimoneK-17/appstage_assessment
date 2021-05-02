<!DOCTYPE HTML>
<html>
  <head>
    
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <TITLE>Vet Clinic Visitor Tracking</TITLE>
    	<link href="css\style.css" type="text/css" rel="stylesheet" />
		<link href="css\table.css" type="text/css" rel="stylesheet" />
		<link href="css\log_reg.css" type="text/css" rel="stylesheet" />
		<link href="css\navstyle.css" type="text/css" rel="stylesheet" />
    <!-- stylesheets for appearance-->
  </head>
  <body>
<div class="topnav">
    <a href="index.php">Login</a>
    <a class="active" href="view_visits.php">Visits</a>
    <a class="active" href="owner_details.php">Owner Details</a>
    <a  href="pet_details.php">Pet Details</a>
    <li style="float:right"><a  href="logout.php">Logout</a>
  </div>
    <!-- navigation bar at the top of the screen -->
    <?php
      $FNameErr = $LNameErr = $EmailErr = $ContErr = $PasswordErr = "" ;
      $FName = $LName = $Email = $Cont = $Password = "";
      
      
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["fname"])) {
          $FName = "Firstname is required";
        } else {
          $FName = $_POST["fname"];
      	trim($FName);
      	stripslashes($FName);
      	
        }
        
        if (empty($_POST["lname"])) {
          $LNameErr = "Lastname is required";
        } else {
          $LName = $_POST["lname"];
      	trim($LName);
      	stripslashes($LName);
        }
        
        if (empty($_POST["email"])) {
          $EmailErr = "email is required";
        } else {
          $Email = $_POST["email"];
      	trim($Email);
      	stripslashes($Email);
        }
        
        if (empty($_POST["contact"])) {
          $ContErr = "contact is required";
      	
        } else {
          $Cont = $_POST["contact"];
      	trim($Cont);
      	stripslashes($Cont);
        }
        
          if (empty($_POST["password"])) {
          $PasswordErr = "password is required";
      	
        } else {
          $Password = $_POST["password"];
      	trim($Password);
      	stripslashes($Password);
        }
      		
      	if (!preg_match("/^[a-zA-Z ]*$/",$LName)) 
      		{
      			$LNameErr = "Only letters and white space allowed"; 
      		}
      
      	      	if (!preg_match("/^[a-zA-Z ]*$/",$FName)) 
      		{
      			$FNameErr = "Only letters and white space allowed"; 
      		}		
      }//checks for blanks as well as checks if it meets special requirements
      ?>
    <br><br>
    <br><br>
    <form  method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      <fieldset>
        <legend >Add New Admin</legend>
        <br><br>
        Firstname: <input type="text" name="fname"><span class="error">* <?php echo $FName;?></span>
        <br><br>
        Lastname: <input type="text" name="lname"><span class="error">* <?php echo $LNameErr;?></span>
        <br><br>
        Email: <input type="text" name="email"><span class="error">* <?php echo $EmailErr;?></span>
        <br><br>
        Cont: <input type="text" name="contact"><span class="error">* <?php echo $ContErr;?></span>
        <br><br>
        Password: <input type="text" name="password"><span class="error">* <?php echo $PasswordErr;?></span>
        <br><br>
        <p><input type="submit" value = "Add Admin"/></p>
      </fieldset>
    </form>
    <!-- input fields to add item-->
    <?php
      if(empty($FNameErr) and empty($LNameErr) and empty($EmailErr) and empty($ContErr) and empty($PasswordErr) and !(empty($FName) and empty($LName) and empty($Email) and empty($Cont) and empty($Password)))
        {
         echo "<p>" . $FName . "</p>";
       
       $line = array
       (
       "$FName,$LName,$Email,$Cont,$Password"
       );
               
      include_once 'dbconnect.php';
          include_once 'admin.php';
      
          $database = new DBController();
          $db = $database->getConnection();
      
          $item = new Admin($db);
      
          $data = json_decode(file_get_contents("php://input"));
      
          $item->admin_fname = $FName;
          $item->admin_sname = $LName;
          $item->admin_email = $Email;
          $item->admin_con_num = $Cont;
          $item->admin_password = $Password;
          
		  
          if($item->createAdmin()){
              echo 'Admin created successfully.';
      		header('Location: index.php');
          } else{
              echo 'Admin could not be created.';
          }
             
          } //checks if there are any errors before proceeding with the insert
      else{
      	//do nothing
             // echo "<p>something wrong here</p>";
           }
      ?>  
  </body>
</html>