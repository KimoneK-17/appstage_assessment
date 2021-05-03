<?php
  session_start(); // start session
  $_SESSION["user_name"] = "";
  require_once("dbconnect.php");
  $db_handle = new DBController();
  //get db script to CONNECT
?>
<HTML>
  <HEAD>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <TITLE>Vet Clinic Visitor Tracking</TITLE>
    	<link href="css\style.css" type="text/css" rel="stylesheet" />
		<link href="css\table.css" type="text/css" rel="stylesheet" />
		<link href="css\log_reg.css" type="text/css" rel="stylesheet" />
		<link href="css\navstyle.css" type="text/css" rel="stylesheet" />
		<script type = "text/javascript" src="filters.js"></script>  
  </HEAD>
<BODY>

<div class="topnav">
    <a href="index.php">Login</a>
    <a href="view_visits.php">Visits</a>
    <a  href="owner_details.php">Owner Details</a>
    <a  class="active" href="pet_details.php">Pet Details</a>
	<a   href="add_pet.php">Add Pet</a>
	<a  href="javascript:sortTable();">sort</a>
	<a style="float:right"><a  href="logout.php">Logout</a>
	<input style="float:right" type="text" id="myInput" onkeyup="myFunction();" placeholder="Search for account id.." title="Type in a name">
  </div>
<!--starting table to display pet details-->  
  <div id="owner-grid" style= "float: left;">
    <div class="txt-heading">Pet Details</div>
    <table id="myTable" style="width:100%">
    <tr>
    <th>Account ID</th>
	<th>Owner Name</th> 
    <th>Pet Name</th> 
	<th>Animal Type</th>
	<th>Breed</th>
    <th>Birthdate</th>
    <th></th>
    <th></th>
	<th></th>
  </tr>
  <?php
     //connect to db and call pet function for pet.php    
    include_once 'dbconnect.php';
    include_once 'pet.php';

    $database = new DBController();
    $db = $database->getConnection();

    $items = new Pet($db);

    $stmt = $items->getPet();
    $itemCount = $stmt->rowCount();

    if($itemCount > 0){
        
        $ownerArr = array();
        $ownerArr["body"] = array();
        $ownerArr["itemCount"] = $itemCount;

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $petdetails = array(
                "pet_id" => $pet_id,
                "account_id" => $account_id,
				"ownername" => $ownername,
                "pet_name" => $pet_name,
                "animal_type" => $animal_type,
                "breed" => $breed,
                "birthdate" => $birthdate
            );

            array_push($ownerArr["body"], $petdetails);
    ?>
              <tr>
                <td><?php echo $account_id ?></td>
	            <td><a style = "color: white;" href="single_owner.php?account_id=<?php echo $account_id; ?>"><?php echo $ownername ?></a></td>
                <td><?php echo $pet_name ?></td> 
	            <td><?php echo $animal_type ?></td>
	            <td><?php echo $breed ?></td> 
                <td><?php echo $birthdate ?></td>
	            
                <td> <form method="post" action="single_pet.php?pet_id=<?php echo $pet_id; ?> " >
                     <button class="viewbtn">view</button></form></td>
                
                 <td> <form method="post" action="update_pet.php?pet_id=<?php echo $pet_id; ?>&account_id=<?php echo $account_id; ?>" >
                     <button class="editbtn">edit</button></form></td> 
                     
                <td> <form method="post" action="delete_pet.php?pet_id=<?php echo $pet_id; ?>" >
                     <button class="deletebtn">delete</button></form></td>   
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

</BODY>
</HTML>
<!--
Modified By: Kimone Kuppasamy
Modified Date: 01-05-2021
Version: 1
Description: display list of pets on record
Reason: Original
-->