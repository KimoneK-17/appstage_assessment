<?php
// Start the session
	session_start();
	$_SESSION["check"] = "false";
	require ("dbcon.php");
?>

<!DOCTYPE html>

<html>
  <HEAD>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <TITLE>Vet Clinic Visitor Tracking</TITLE>
    	<link href="css\style.css" type="text/css" rel="stylesheet" />
		<link href="css\table.css" type="text/css" rel="stylesheet" />
		<link href="css\log_reg.css" type="text/css" rel="stylesheet" />
		<link href="css\navstyle.css" type="text/css" rel="stylesheet" />
  </HEAD>
<body>

 <ul>
    <li><a class="active" href="index.php">Login</a></li>
  </ul>

	<?php 
		
		echo '<h1> Vet Clinic Visitor Tracking</h1>';
		echo '<h2> ADMIN LOGIN</h2>';
		$FNameErr = $SNameErr = $EmailAddErr = $PWordErr = $CPWordErr="" ;
		$FName = $SName = $EmailAdd = $PWord =$CPWord = "";


		if ($_SERVER["REQUEST_METHOD"] == "POST") {

		  
			  if (empty($_POST["email"])) 
			  {
				$EmailAddErr = "Email is required";
			  } else 
			  {
				$EmailAdd = $_POST["email"];
				trim($EmailAdd);
				stripslashes($EmailAdd);
			  }
			  
			  if (empty($_POST["pword"])) 
			  {
				$PWordErr = "Password is required";
				
			  } else 
			  {
				$PWord = $_POST["pword"];
				trim($PWord);
				stripslashes($PWord);
			  }
		  
			if (!filter_var($EmailAdd, FILTER_VALIDATE_EMAIL)) 
				{
						$EmailAddErr = "Invalid email format"; 
				}
					
				
		}//checks for blanks as well as checks if it meets special requirements
		?>

		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class = "show">  
		<fieldset>
			<legend>Login</legend>
		 
		 Email: <input type="text" name="email" >  <span class="error">*<?php echo $EmailAddErr;?></span>
		 <br><br>
		 Password: <input type="password" name="pword" > <span class="error">*<?php echo $PWordErr;?></span>
		 <br><br>
		 
		 <input type="submit" value = "Login"/>
		 <input type = "submit" name = "Register" value = "Register" onClick="add_admin.php"/> <!--Open Register Tab-->
		  </fieldset>
		</form>
<!--Input Fields-->
		<?php

		if(empty($EmailAddErr) and empty($PWordErr) and !(empty($EmailAdd) and empty($PWord)))
		{
		 //$hash = sha1($PWord);// encryting password
		 
		 $selectSql = "SELECT * FROM Admin WHERE admin_email='".$EmailAdd."' and unhex(admin_password) ='".$PWord."'";
		 
		 $result = @mysqli_query($conn, $selectSql ); // executing query
echo $selectSql;
			if ($result->num_rows) 
			{
				$_SESSION["user_name"] = $EmailAdd;
				echo "<p>Welcome Admin</p>";
				echo"<script>window.open('view_visits.php', '_self')</script>"; 
				
		    } //if login success go to admin shop

		   else
			{
				echo "<p>Invalid User, Register Account<p>";
			}
		}
		else
		{
			//echo 'Please fix errors and try again';
		}

	?>  

</body>
</html>
