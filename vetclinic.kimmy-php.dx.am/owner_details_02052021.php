<?php
  session_start(); // start session
  $_SESSION["user_name"] = "";
  
      include_once 'dbconnect.php';
    include_once 'owner.php';

    $database = new DBController();
    $db = $database->getConnection();

    $items = new Owner($db);

    $stmt = $items->getOwner();
  
  //get db script to CONNECT
?>
<HTML>
  <HEAD>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <link href="css\navstyle.css" type="text/css" rel="stylesheet" />
    <TITLE>Vet Clinic Visitor Tracking</TITLE>
    	<link href="css\style.css" type="text/css" rel="stylesheet" />
  </HEAD>
<BODY>

 <ul>
    <li><a href="index.php">Login</a></li>
    <li><a href="view_visits.php">Visits</a></li>
    <li><a class="active" href="owner_details.php">Owner Details</a></li>
    <li><a  href="pet_details.php">Pet Details</a></li>
		<li style="float:right"><a  href="add_owner.php">Add Owner</a></li>
    <li style="float:right"><a  href="logout.php">Logout</a></li>
     <div class="search-container">
    <form action="search_owner.php">
      <input type="text" placeholder="Search.." method="post" name="firstname">
      <button type="submit"><i class="fa fa-search"></i></button>
    </form>
  </div>
  </ul>

  <div id="product-grid" style= "float: left;">
    <div class="txt-heading">Pet Details</div>
    <table style="width:100%">
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
    

   foreach($result as $data) { 
            ?>
              <tr>
    <td><?php echo $data['account_id']; ?></td>
    <td><?php echo $data['firstname']; ?></td> 
    <td><?php echo $data['lastname']; ?></td>
    <td><?php echo $data['contact_number']; ?></td>
    <td><?php echo $data['email_address']; ?></td> 
    <td><?php echo $data['postal_address']; ?></td>
    <td><?php echo $data['id_number'];?></td>
   <th> <form method="post" action="single_owner.php?account_id=<?php echo $account_id; ?> " >
        <button class="viewbtn">view</button></form></th>

    <th> <form method="post" action="update_owner.php?account_id=<?php echo $account_id; ?>" >
        <button class="editbtn">edit</button></form></th> 
        
            <th> <form method="post" action="delete_owner.php?account_id=<?php echo $account_id; ?>" >
        <button class="deletebtn">delete</button></form></th>   
  </tr>
            <?php
   }
      
?>
  
      </table>
  </div>
  <center>
            <ul class="pagination">
            <?php
                if($page_counter == 0){
                    echo "<li><a href=?start='0' class='active'>0</a></li>";
                    for($j=1; $j < $paginations; $j++) { 
                      echo "<li><a href=?start=$j>".$j."</a></li>";
                   }
                }else{
                    echo "<li><a href=?start=$previous>Previous</a></li>"; 
                    for($j=0; $j < $paginations; $j++) {
                     if($j == $page_counter) {
                        echo "<li><a href=?start=$j class='active'>".$j."</a></li>";
                     }else{
                        echo "<li><a href=?start=$j>".$j."</a></li>";
                     } 
                  }if($j != $page_counter+1)
                    echo "<li><a href=?start=$next>Next</a></li>"; 
                } 
            ?>
            </ul>
            </center>
  
</BODY>
</HTML>