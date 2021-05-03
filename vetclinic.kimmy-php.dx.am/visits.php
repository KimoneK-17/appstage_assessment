<?php
    class Visit{

        // Connection
        private $conn;

        // Table
        private $db_table = "visits";

        // Columns
        public $visit_id;
        public $pet_id;
        public $visit_date;
        public $visit_type;
        public $follow_up_date;

        // Db connection
        public function __construct($db){
            $this->conn = $db;
        }

        // GET ALL
        public function getVisits(){
            $sqlQuery = "SELECT visit_id, pet_id,visit_date,visit_type,follow_up_date FROM " . $this->db_table . "";
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->execute();
            return $stmt;
        }

        // CREATE
        public function createVisit(){
            $sqlQuery = "INSERT INTO
                        ". $this->db_table ."
                    SET
                        pet_id = :pet_id, 
						visit_date = :visit_date, 
                        visit_type = :visit_type, 
                        follow_up_date = :follow_up_date";
        
            $stmt = $this->conn->prepare($sqlQuery);
        
            // sanitize
            $this->pet_id=htmlspecialchars(strip_tags($this->pet_id));
            $this->visit_date=htmlspecialchars(strip_tags($this->visit_date));
			$this->visit_type=htmlspecialchars(strip_tags($this->visit_type));
            $this->follow_up_date=htmlspecialchars(strip_tags($this->follow_up_date));
        
            // bind data
            $stmt->bindParam(":pet_id", $this->pet_id);
            $stmt->bindParam(":visit_date", $this->visit_date);
			$stmt->bindParam(":visit_type", $this->visit_type);
            $stmt->bindParam(":follow_up_date", $this->follow_up_date);
        
            if($stmt->execute()){
               return true;
            }
            return false;
        }

        // READ single
        public function getSingleVisit(){
            $sqlQuery = "SELECT
                        visit_id, 
                        pet_id, 
                        visit_date, 
			            visit_type,
                        follow_up_date
                      FROM
                        ". $this->db_table ."
                    WHERE 
                       visit_id = ?";

            $stmt = $this->conn->prepare($sqlQuery);

            $stmt->bindParam(1, $this->visit_id);

            $stmt->execute();

            $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);
            
            $this->visit_id = $dataRow['visit_id'];
            $this->pet_id = $dataRow['pet_id'];
            $this->visit_date = $dataRow['visit_date'];
	    $this->visit_type = $dataRow['visit_type'];
            $this->follow_up_date = $dataRow['follow_up_date'];

        }        

        // UPDATE
        public function updateVisit(){
            $sqlQuery = "UPDATE
                        ". $this->db_table ."
                    SET
                        pet_id = :pet_id, 
                        visit_date = :visit_date, 
			            visit_type = :visit_type, 
                        follow_up_date = :follow_up_date, 
                        birthdate = :birthdate
                    WHERE 
                        visit_id = :visit_id";
        
            $stmt = $this->conn->prepare($sqlQuery);
        
            $this->pet_id=htmlspecialchars(strip_tags($this->pet_id));
            $this->visit_date=htmlspecialchars(strip_tags($this->visit_date));
$this->visit_type=htmlspecialchars(strip_tags($this->visit_type));
            $this->follow_up_date=htmlspecialchars(strip_tags($this->follow_up_date));
            $this->birthdate=htmlspecialchars(strip_tags($this->birthdate));
            $this->visit_id=htmlspecialchars(strip_tags($this->visit_id));
        
            // bind data
            $stmt->bindParam(":pet_id", $this->pet_id);
            $stmt->bindParam(":visit_date", $this->visit_date);
            $stmt->bindParam(":visit_type", $this->visit_type);
            $stmt->bindParam(":follow_up_date", $this->follow_up_date);
            $stmt->bindParam(":birthdate", $this->birthdate);
            $stmt->bindParam(":visit_id", $this->visit_id);
        
            if($stmt->execute()){
               return true;
            }
            return false;
        }

        // DELETE
        function deleteVisit(){
            $sqlQuery = "DELETE FROM " . $this->db_table . " WHERE visit_id = ?";
            $stmt = $this->conn->prepare($sqlQuery);
        
            $this->visit_id=htmlspecialchars(strip_tags($this->visit_id));
        
            $stmt->bindParam(1, $this->visit_id);
        
            if($stmt->execute()){
                return true;
            }
            return false;
        }
       

	function searchVisit(){
          
		 $sqlQuery = "SELECT
                        visit_id, 
                        pet_id, 
                        visit_date, 
			            visit_type,
                        follow_up_date
                      FROM
                        ". $this->db_table ."
                    WHERE 
                       pet_id = ?";

            $stmt = $this->conn->prepare($sqlQuery);

            $stmt->bindParam(1, $this->pet_id);

            $stmt->execute();

            $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);
            
            $this->visit_id = $dataRow['visit_id'];
            $this->pet_id = $dataRow['pet_id'];
            $this->visit_date = $dataRow['visit_date'];
	    $this->visit_type = $dataRow['visit_type'];
            $this->follow_up_date = $dataRow['follow_up_date'];
	}
	

    }
?>
 <!--
Modified By: Kimone Kuppasamy
Modified Date: 01-05-2021
Version: 1
Description: hold functions for visits
Reason: Original
-->