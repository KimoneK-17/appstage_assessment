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
    <a class="active" href="view_visits.php">Visits</a>
    <a  href="owner_details.php">Owner Details</a>
    <a  href="pet_details.php">Pet Details</a>
    <a style="float:left" href="javascript:sortTable();">sort</a>
    <input style="float:right" type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for visit id.." title="Type in a name">
    <li style="float:right"><a  href="logout.php">Logout</a>
  </div>
  <!--start table for visits-->
  <div style= "float: left;">
    <div class="txt-heading">Pet Details</div>
    <table id="myTable" style="width:100%">
    <tr>
    <th>Visit ID</th>
    <th>Pet ID</th> 
    <th>Visit Date</th>
    <th>Visit Type</th>
    <th>Follow Up Date</th>
  </tr>
  <?php
    //connect to db and call Visits function for visits.php
    include_once 'dbconnect.php';
    include_once 'visits.php';

    $database = new DBController();
    $db = $database->getConnection();

    $items = new Visit($db);

    $stmt = $items->getVisits();
    $itemCount = $stmt->rowCount();

      if($itemCount > 0){
        
        $ownerArr = array();
        $ownerArr["body"] = array();
        $ownerArr["itemCount"] = $itemCount;
        //loop through array to fill table
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $e = array(
                "visit_id" => $visit_id,
                "pet_id" => $pet_id,
                "visit_date" => $visit_date,
                "visit_type" => $visit_type,
                "follow_up_date" => $follow_up_date
            );

            array_push($ownerArr["body"], $e);
            ?>
              <tr>
              <td><?php echo $visit_id ?></th>
              <td><?php echo $pet_id ?></td> 
              <td><?php echo $visit_date ?></td>
              <td><?php echo $visit_type ?></td>
              <td><?php echo $follow_up_date ?></td> 
              </tr>
     <?php
        }
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
</BODY>
</HTML>
<!--
Modified By: Kimone Kuppasamy
Modified Date: 01-05-2021
Version: 1
Description: display list of visits on record
Reason: Original
-->