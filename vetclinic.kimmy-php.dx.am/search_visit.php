<?php
    include_once 'dbconnect.php';
    include_once 'visits.php';

    $database = new DBController();
    $db = $database->getConnection();
?>

<HTML>
  <HEAD>
    <link href="css\navstyle.css" type="text/css" rel="stylesheet" />
    <TITLE>Vet Clinic Visitor Tracking</TITLE>
    	<link href="css\style.css" type="text/css" rel="stylesheet" />
		<link href="css\table.css" type="text/css" rel="stylesheet" />
		<link href="css\log_reg.css" type="text/css" rel="stylesheet" />
  </HEAD>

<BODY>

  <ul>
    <li><a href="index.php">Login</a></li>
    <li><a href="view_visits.php">Visits</a></li>
    <li><a  href="owner_details.php">Owner Details</a></li>
    <li><a class="active" href="pet_details.php">Pet Details</a></li>
    <li style="float:right"><a  href="logout.php">Logout</a></li>
	 <div class="search-container">
    <form action="search_visit.php">
      <input type="text" placeholder="Search.." method="post" name="pet_id">
      <button type="submit"><i class="fa fa-search"></i></button>
    </form>
  </div> 
  </ul>

  <div id="product-grid" style= "float: left;">
    <div class="txt-heading">Visit Details</div>
    <table style="width:100%">
    <tr>
    <th>Visit ID</th>
    <th>Pet ID</th> 
    <th>Visit Date</th>
    <th>Visit Type</th>
    <th>Follow Up Date</th>
  </tr>
  <?php
    /*header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");*/
    
    $item = new Visit($db);

    $item->pet_id = isset($_GET['pet_id']) ? $_GET['pet_id'] : die();
  
    $item->searchVisit();
    
    if($item->pet_id != null){
        // create array
        $emp_arr = array(
            "visit_id" =>  $item->visit_id,
            "pet_id" => $item->pet_id,
            "visit_date" => $item->visit_date,
            "visit_type" => $item->visit_type,
            "follow_up_date" => $item->follow_up_date
        );
      
        http_response_code(200);
        //echo json_encode($emp_arr);
       
       //echo $item->account_id;
       
      
      ?>
      
        <tr>
    <th><?php echo $item->visit_id; ?></th> 
    <th><?php echo $item->pet_id;?></th>
    <th><?php echo $item->visit_date;?></th>
    <th><?php echo $item->visit_type; ?></th>
    <th><?php echo $item->follow_up_date; ?></th>
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
