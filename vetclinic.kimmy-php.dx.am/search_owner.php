<?php
  include_once 'dbconnect.php';
    include_once 'owner.php';
$database = new DBController();
    $db = $database->getConnection();

    $item = new Owner($db);

   
?>

<HTML>
  <HEAD>
    <link href="css\navstyle.css" type="text/css" rel="stylesheet" />
    <TITLE>Vet Clinic Visitor Tracking</TITLE>
    	<link href="css\style.css" type="text/css" rel="stylesheet" />
		<link href="css\table.css" type="text/css" rel="stylesheet" />
		<link href="css\log_reg.css" type="text/css" rel="stylesheet" />
  </HEAD>
  
  <style>
  table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
  </style>
<BODY>

  <ul>
    <li><a href="index.php">Login</a></li>
    <li><a href="view_visits.php">Visits</a></li>
    <li><a class="active" href="owner_details.php">Owner Details</a></li>
    <li><a  href="pet_details.php">Pet Details</a></li>
    <li style="float:right"><a  href="logout.php">Logout</a></li>
    
  </ul>

  <div id="product-grid" style= "float: left;">
    <div class="txt-heading">Owner Details</div>
    <table style="width:100%">
    <tr>
    <th>Account ID</th>
    <th>Firstname</th> 
    <th>Lastname</th>
    <th>Contact Number</th>
    <th>Email Address</th>
    <th>Postal Address</th>
    <th>ID Number</th>
  </tr>
  <?php
    /*header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");*/

    $item->firstname = isset($_GET['firstname']) ? $_GET['firstname'] : die();
  
    $item->searchOwner();
    
    if($item->firstname != null){
        // create array
        $emp_arr = array(
            "account_id" =>  $item->account_id,
            "firstname" => $item->firstname,
            "lastname" => $item->lastname,
            "contact_number" => $item->contact_number,
            "email_address" => $item->email_address,
            "postal_address" => $item->postal_address,
            "id_number" => $item->id_number
        );
      
        http_response_code(200);
        //echo json_encode($emp_arr);
       
       //echo $item->account_id;
       
      
      ?>
      
        <tr>
    <th><?php echo $item->account_id; ?></th>
    <th><?php echo $item->firstname; ?></th> 
    <th><?php echo $item->lastname;?></th>
    <th><?php echo $item->contact_number; ?></th>
    <th><?php echo $item->email_address; ?></th> 
    <th><?php echo $item->postal_address;?></th>
    <th><?php echo $item->id_number; ?></th>
  </tr>
  
      <?php
      }
    else{
        http_response_code(404);
        echo json_encode("Owner not found.");
    }
?>

      </table>
  </div>
</BODY>
</HTML>
