<?php

//15006529 - Kimone Kuppasamy - DISD3 - WEDE6011 - 30-03-2017

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "vet_db";
//$tablename = "tbl_users";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
} 

//15006529 - Kimone Kuppasamy - DISD3 - WEDE6011 - 02-05-2017
//connect to database	
?>