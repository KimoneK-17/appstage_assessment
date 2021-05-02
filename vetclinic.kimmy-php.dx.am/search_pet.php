<?php
    include_once 'dbconnect.php';
    include_once 'pet.php';

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
    
  </ul>

  <div id="product-grid" style= "float: left;">
    <div class="txt-heading">Pet Details</div>
    <table style="width:100%">
    <tr>
    <th>Owner</th>
    <th>Name</th> 
    <th>Animal Type</th>
    <th>Breed</th>
    <th>Birthdate</th>
  </tr>
  <?php
    /*header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");*/
    
    $item = new Pet($db);

    $item->pet_name = isset($_GET['pet_name']) ? $_GET['pet_name'] : die();
  
    $stmt = $item->searchPet();
    $itemCount = $stmt->rowCount();  
  if($itemCount > 0){
        
        $ownerArr = array();
        $ownerArr["body"] = array();
        $ownerArr["itemCount"] = $itemCount;

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $e = array(
                "pet_id" => $pet_id,
                "account_id" => $account_id,
                "pet_name" => $pet_name,
                "animal_type" => $animal_type,
                "breed" => $breed,
                "birthdate" => $birthdate
            );

            array_push($ownerArr["body"], $e);
        //echo json_encode($emp_arr);
       
       //echo $item->account_id;
       
      
      ?>
      
        <tr>
    <th><?php echo $account_id; ?></th> 
    <th><?php echo $pet_name;?></th>
    <th><?php echo $animal_type;?></th>
    <th><?php echo $breed; ?></th>
    <th><?php echo $birthdate; ?></th>
   <td> <form method="post" action="single_pet.php?pet_id=<?php echo $pet_id; ?> " >
        <button class="viewbtn">view</button></form></td>

    <td> <form method="post" action="update_pet.php?pet_id=<?php echo $pet_id; ?>" >
        <button class="editbtn">edit</button></form></td> 
        
            <td> <form method="post" action="delete_pet.php?pet_id=<?php echo $pet_id; ?>" >
        <button class="deletebtn">delete</button></form></td>   
  </tr>
  
      <?php
		}
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
