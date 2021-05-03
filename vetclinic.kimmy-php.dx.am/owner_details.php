<?php
  session_start(); // start session
  $_SESSION["user_name"] = "";
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
    <a class="active" href="owner_details.php">Owner Details</a>
    <a  href="pet_details.php">Pet Details</a>
	<a   href="add_owner.php">Add Owner</a>
	<a  href="javascript:sortTable();">sort</a>
	<a style="float:right"><a  href="logout.php">Logout</a>
	<input style="float:right" type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for owner firstname.." title="Type in a name">
  </div>
<!--start table for owner details-->
  <div id="owner-grid" style= "float: left;">
    <div class="txt-heading">Pet Details</div>
    <table id="myTable" style="width:100%">
    <tr>
    <th>Account ID</th>
    <th>firstname</th> 
    <th>lastname</th>
    <th>Contact number</th>
    <th>Email Address</th>
    <th>Postal Address</th> 
    <th>ID Number</th>
    <th></th>
    <th></th>
    <th></th>
  </tr>
  <?php
     //connect to db and call Owner function for owner.php    
    include_once 'dbconnect.php';
    include_once 'owner.php';

    $database = new DBController();
    $db = $database->getConnection();

    $items = new Owner($db);

    $stmt = $items->getOwner();
    $itemCount = $stmt->rowCount();
	
    if($itemCount > 0){
        
        $ownerArr = array();
        $ownerArr["body"] = array();
        $ownerArr["itemCount"] = $itemCount;

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $ownerDetails = array(
                "account_id" => $account_id,
                "firstname" => $firstname,
                "lastname" => $lastname,
                "contact_number" => $contact_number,
                "email_address" => $email_address,
                "postal_address" => $postal_address,
                "id_number" => $id_number
            );

            array_push($ownerArr["body"], $ownerDetails);
            ?>
              <tr>
                <td><?php echo $account_id ?></td>
                <td><?php echo $firstname ?></td> 
                <td><?php echo $lastname ?></td>
                <td><?php echo $contact_number ?></td>
                <td><?php echo $email_address ?></td> 
                <td><?php echo $postal_address ?></td>
                <td><?php echo $id_number ?></td>
                <td> <form method="post" action="single_owner.php?account_id=<?php echo $account_id; ?> " >
                    <button class="viewbtn">view</button></form></td>
	            
                <td> <form method="post" action="update_owner.php?account_id=<?php echo $account_id; ?>" >
                    <button class="editbtn">edit</button></form></td> 
                    
                <td> <form method="post" action="delete_owner.php?account_id=<?php echo $account_id; ?>" >
                    <button class="deletebtn">delete</button></form></td>   
               </tr>
    <?php
        }
        //echo json_encode($ownerArr);
    }

    else{
        http_response_code(404);
        echo json_encode(
            array("message" => "No record found.")
        );
    }
	
?>
  
      </table>
  </div>
<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>  
  
</BODY>
</HTML>
<!--
Modified By: Kimone Kuppasamy
Modified Date: 01-05-2021
Version: 1
Description: display list of owners on record
Reason: Original
-->