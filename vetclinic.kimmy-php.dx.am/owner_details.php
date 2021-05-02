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
	<a style="float:right"  href="add_owner.php">Add Owner</a>
    <li style="float:right"><a  href="logout.php">Logout</a>
    <input style="float:right" type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for owner firstname.." title="Type in a name">
	<a  href="javascript:sortTable();">sort</a>
  </div>

  <div id="product-grid" style= "float: left;">
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
    
    include_once 'dbconnect.php';
    include_once 'owner.php';

    $database = new DBController();
    $db = $database->getConnection();

    $items = new Owner($db);

    $stmt = $items->getOwner();
    $itemCount = $stmt->rowCount();


    //echo json_encode($itemCount);

    if($itemCount > 0){
        
        $ownerArr = array();
        $ownerArr["body"] = array();
        $ownerArr["itemCount"] = $itemCount;

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $e = array(
                "account_id" => $account_id,
                "firstname" => $firstname,
                "lastname" => $lastname,
                "contact_number" => $contact_number,
                "email_address" => $email_address,
                "postal_address" => $postal_address,
                "id_number" => $id_number
            );

            array_push($ownerArr["body"], $e);
            ?>
              <tr>
    <td><?php echo $account_id ?></td>
    <td><?php echo $firstname ?></td> 
    <td><?php echo $lastname ?></td>
    <td><?php echo $contact_number ?></td>
    <td><?php echo $email_address ?></td> 
    <td><?php echo $postal_address ?></td>
    <td><?php echo $id_number ?></td>
   <th> <form method="post" action="single_owner.php?account_id=<?php echo $account_id; ?> " >
        <button class="viewbtn">view</button></form></th>

    <th> <form method="post" action="update_owner.php?account_id=<?php echo $account_id; ?>" >
        <button class="editbtn">edit</button></form></th> 
        
            <th> <form method="post" action="delete_owner.php?account_id=<?php echo $account_id; ?>" >
        <button class="deletebtn">delete</button></form></th>   
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
function sortTable() {
  var table, rows, switching, i, x, y, shouldSwitch;
  table = document.getElementById("myTable");
  switching = true;
  /*Make a loop that will continue until
  no switching has been done:*/
  while (switching) {
    //start by saying: no switching is done:
    switching = false;
    rows = table.rows;
    /*Loop through all table rows (except the
    first, which contains table headers):*/
    for (i = 1; i < (rows.length - 1); i++) {
      //start by saying there should be no switching:
      shouldSwitch = false;
      /*Get the two elements you want to compare,
      one from current row and one from the next:*/
      x = rows[i].getElementsByTagName("TD")[1];
      y = rows[i + 1].getElementsByTagName("TD")[1];
      //check if the two rows should switch place:
      if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
        //if so, mark as a switch and break the loop:
        shouldSwitch = true;
        break;
      }
    }
    if (shouldSwitch) {
      /*If a switch has been marked, make the switch
      and mark that a switch has been done:*/
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
    }
  }
}

</script>
</BODY>
</HTML>