<!DOCTYPE HTML>
<html>  

<head>

<link href="css\log_reg.css" type="text/css" rel="stylesheet" />
<link href="css\sidebar.css" type="text/css" rel="stylesheet" />
<!-- stylesheets for appearance-->
</head>
<body>

<ul>
  <li><a href="index.php">Shop</a></li>
  <li><a href="admin.php">Admin</a></li>
  <li><a class="active"  href="addItem.php">Add New Item</a></li>
  <li><a href="adminEdit.php">Edit Item</a></li>
  <li><a href="Login.php">Login</a></li>
  <li><a href="Register.php">Register</a></li>
  <li><a  href="about.php">About Us</a></li>
  <li style="float:right"><a  href="logout.php">Logout</a></li>
  <li style="float:right"><a href="aShopCart.php">View Cart</a></li>
</ul>
<!-- navigation bar at the top of the screen -->

<?php

$FNameErr = $BTermErr = $QtyErr = $PErr = $INameErr ="" ;
$FName = $bTerm = $Qty = $Price = $IName= "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $FNameErr = "Name of Flower is required";
  } else {
    $FName = $_POST["name"];
	trim($FName);
	stripslashes($FName);
	
  }
  
  if (empty($_POST["term"])) {
    $BTermErr = "Botanical Term is required";
  } else {
    $bTerm = $_POST["term"];
	trim($bTerm);
	stripslashes($bTerm);
  }
  
  if (empty($_POST["qty"])) {
    $QtyErr = "Quantity is required";
  } else {
    $Qty = $_POST["qty"];
	trim($Qty);
	stripslashes($Qty);
  }
  
  if (empty($_POST["price"])) {
    $PErr = "Price is required";
	
  } else {
    $Price = $_POST["price"];
	trim($Price);
	stripslashes($Price);
  }
  if (empty($_POST["img_name"])) {
    $INameErr = "Image Name is required";
	
  } else {
    $IName = $_POST["img_name"];
	trim($IName);
	stripslashes($IName);
  }
  
  
    
	if (!preg_match("/^[a-zA-Z ]*$/",$FName)) 
		{
			$FNameErr = "Only letters and white space allowed"; 
		}
		
	if (!preg_match("/^[a-zA-Z ]*$/",$bTerm)) 
		{
			$BTermErr = "Only letters and white space allowed"; 
		}

			
}//checks for blanks as well as checks if it meets special requirements
?>
<br><br>
<br><br>
<form  method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<fieldset>
    <legend >Add New Item</legend>
	<br><br>
Name Of Flower: <input type="text" name="name"><span class="error">* <?php echo $FNameErr;?></span>
<br><br>
Botanical Term: <input type="text" name="term"><span class="error">* <?php echo $BTermErr;?></span>
<br><br>
Quantity: <input type="number" name="qty"><span class="error">* <?php echo $QtyErr;?></span>
<br><br>
Price: <input type="number" step="0.01" name="price"><span class="error">* <?php echo $PErr;?></span>
<br><br>
Image Name: <input type="text" name="img_name"><span class="error">* <?php echo $INameErr;?></span>
<br><br>
<p><input type="submit" value = "Add Item"/></p>
</fieldset>
</form>
<!-- input fields to add item-->
<?php

if(empty($FNameErr) and empty($BTermErr) and empty($QtyErr) and empty($PErr) and empty($INameErr) and !(empty($FName) and empty($bTerm) and empty($Qty) and empty($Price) and empty($IName)))
  {
 
 $line = array
 (
 "$FName,$bTerm,$Qty,$Price,$IName"
 );
         require_once('dbconnect.php');
                   
     
                       //$sql = "INSERT INTO tbl_Item(item_name,item_bo_name,item_qty,item_price,item_image) 
                        //       VALUES ('".$FName."', '".$bTerm."', ".$Qty.", ".$Price.",'prod_images/".$IName."')";
                       
					   $sql = "INSERT INTO tbl_Item(item_name,item_bo_name,item_qty,item_price,item_image)
							VALUES('".$FName."','".$bTerm."',".$Qty.",".$Price.",'prod_images/".$IName."')";

						if (@mysqli_query($conn, $sql)) {
						  echo "<p>Item Added Successfully!<p>";
						} else {
						   //echo "<p>Error: " . $sql . "<br>" . @mysqli_error($conn)."<p>";
													echo "<p>Item Could Not Be Added</p>";
						}
						
       
    } //checks if there are any errors before proceeding with the insert
else{
	//do nothing
     }
     


?>  

</body>
</html>


<!-- 15006529 - Kimone Kuppasamy - DISD3 - WEDE6011 - 02-05-2017

This file allows the user(admin) to add an item to the shop (tbl_item)

 -->