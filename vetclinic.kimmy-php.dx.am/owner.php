<?php
    class Owner{

        // Connection
        private $conn;

        // Table
        private $db_table = "owner";

        // Columns
        public $account_id;
        public $firstname;
        public $lastname;
        public $contact_number;
        public $email_address;
        public $postal_address;
                public $id_number;

        // Db connection
        public function __construct($db){
            $this->conn = $db;
        }

        // GET ALL
        public function getOwner(){
			
						    $start = 0;  $per_page = 10;
    $page_counter = 0;
    $next = $page_counter + 1;
    $previous = $page_counter - 1;
    
    if(isset($_GET['start'])){
     $start = $_GET['start'];
     $page_counter =  $_GET['start'];
     $start = $start *  $per_page;
     $next = $page_counter + 1;
     $previous = $page_counter - 1;
    }
    // query to get messages from messages table
    $q = "SELECT * FROM pet LIMIT $start, $per_page";
    $query = $this->conn->prepare($q);
    $query->execute();
			  if($query->rowCount() > 0){
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
			  }
            $sqlQuery = "SELECT account_id, firstname,lastname, contact_number, email_address, postal_address, id_number FROM " . $this->db_table . "";
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->execute();
			$count = $query->rowCount();
    // calculate the pagination number by dividing total number of rows with per page.
    $paginations = ceil($count / $per_page);
            return $stmt;
        }

        // CREATE
        public function createOwner(){
            $sqlQuery = "INSERT INTO
                        ". $this->db_table ."
                    SET
                        firstname = :firstname, 
                        lastname = :lastname, 
                        contact_number = :contact_number, 
                        email_address = :email_address, 
                        postal_address = :postal_address,
                        id_number = :id_number";
        
            $stmt = $this->conn->prepare($sqlQuery);
        
            // sanitize
            $this->firstname=htmlspecialchars(strip_tags($this->firstname));
            $this->lastname=htmlspecialchars(strip_tags($this->lastname));
            $this->contact_number=htmlspecialchars(strip_tags($this->contact_number));
            $this->email_address=htmlspecialchars(strip_tags($this->email_address));
            $this->postal_address=htmlspecialchars(strip_tags($this->postal_address));
            $this->id_number=htmlspecialchars(strip_tags($this->id_number));
        
            // bind data
            $stmt->bindParam(":firstname", $this->firstname);
            $stmt->bindParam(":lastname", $this->lastname);
            $stmt->bindParam(":contact_number", $this->contact_number);
            $stmt->bindParam(":email_address", $this->email_address);
            $stmt->bindParam(":postal_address", $this->postal_address);
            $stmt->bindParam(":id_number", $this->id_number);
        
            if($stmt->execute()){
               return true;
            }
            return false;
        }

        // READ single
        public function getSingleOwner(){
            $sqlQuery = "SELECT
                        account_id, 
                        firstname, 
                        lastname, 
                        contact_number, 
                        email_address, 
                        postal_address,
                        id_number
                      FROM
                        ". $this->db_table ."
                    WHERE 
                       account_id = ?";

            $stmt = $this->conn->prepare($sqlQuery);

            $stmt->bindParam(1, $this->account_id);

            $stmt->execute();

            $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);
            
            $this->firstname = $dataRow['firstname'];
            $this->lastname = $dataRow['lastname'];
            $this->contact_number = $dataRow['contact_number'];
            $this->email_address = $dataRow['email_address'];
            $this->postal_address = $dataRow['postal_address'];
            $this->id_number = $dataRow['id_number'];
        }        

        // UPDATE
        public function updateOwner(){
            $sqlQuery = "UPDATE
                        ". $this->db_table ."
                    SET
                        firstname = :firstname, 
                        lastname = :lastname, 
                        contact_number = :contact_number, 
                        email_address = :email_address, 
                        postal_address = :postal_address,
                        id_number = :id_number
                    WHERE 
                        account_id = :account_id";
        
            $stmt = $this->conn->prepare($sqlQuery);
        
            $this->firstname=htmlspecialchars(strip_tags($this->firstname));
            $this->lastname=htmlspecialchars(strip_tags($this->lastname));
            $this->contact_number=htmlspecialchars(strip_tags($this->contact_number));
            $this->email_address=htmlspecialchars(strip_tags($this->email_address));
            $this->postal_address=htmlspecialchars(strip_tags($this->postal_address));
            $this->id_number=htmlspecialchars(strip_tags($this->id_number));
            $this->account_id=htmlspecialchars(strip_tags($this->account_id));
        
            // bind data
            $stmt->bindParam(":firstname", $this->firstname);
            $stmt->bindParam(":lastname", $this->lastname);
            $stmt->bindParam(":contact_number", $this->contact_number);
            $stmt->bindParam(":email_address", $this->email_address);
            $stmt->bindParam(":postal_address", $this->postal_address);
            $stmt->bindParam(":id_number", $this->id_number);
            $stmt->bindParam(":account_id", $this->account_id);
        
            if($stmt->execute()){
               return true;
            }
            return false;
        }

        // DELETE
        function deleteOwner(){
            $sqlQuery = "DELETE FROM " . $this->db_table . " WHERE account_id = ?";
            $stmt = $this->conn->prepare($sqlQuery);
        
            $this->account_id=htmlspecialchars(strip_tags($this->account_id));
        
            $stmt->bindParam(1, $this->account_id);
        
            if($stmt->execute()){
                return true;
            }
            return false;
        }
        
        function searchOwner(){
          
		 $sqlQuery = "SELECT
                        account_id, 
                        firstname, 
                        lastname, 
                        contact_number, 
                        email_address, 
                        postal_address,
                        id_number
                      FROM
                        ". $this->db_table ."
                    WHERE 
                       firstname like ?";

            $stmt = $this->conn->prepare($sqlQuery);
			$stmt->bindParam("s", $this->firstname);
            $stmt->execute();
            return $stmt;
	}
        
        function getOwnerPets(){
            $sqlQuery = "SELECT pet_id,account_id, pet_name,animal_type, breed, birthdate FROM pet WHERE account_id = ? ";
            $stmt = $this->conn->prepare($sqlQuery);
			$stmt->bindParam(1, $this->account_id);
            $stmt->execute();
            return $stmt;
        } 
       
}

 
?>