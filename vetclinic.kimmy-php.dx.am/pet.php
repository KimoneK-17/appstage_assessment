<?php
  class Pet{
  
    // Connection
    private $conn;
    
    // Table
    private $db_table = "pet";
    
    // Columns
    public $account_id;
    public $animal_type;
    public $pet_name;
    public $breed;
    public $birthdate;
    public $pet_id;
    
    // Db connection
    public function __construct($db){
        $this->conn = $db;
    }
    
    // GET ALL
    public function getPet(){
        $sqlQuery = "SELECT pet_id,p.account_id,CONCAT(o.firstname,' ',o.lastname) ownername, pet_name,animal_type, breed, birthdate FROM pet p, owner o where p.account_id = o.account_id";
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute();
        return $stmt;
    }
  
      // CREATE
    public function createPet(){
        $sqlQuery = "INSERT INTO
                    ". $this->db_table ."
                SET
                    account_id = :account_id, 
  	                animal_type = :animal_type, 
                    pet_name = :pet_name, 
                    breed = :breed, 
                    birthdate = :birthdate";
    
        $stmt = $this->conn->prepare($sqlQuery);
    
        // sanitize
        $this->account_id=htmlspecialchars(strip_tags($this->account_id));
        $this->pet_name=htmlspecialchars(strip_tags($this->pet_name));
        $this->animal_type=htmlspecialchars(strip_tags($this->animal_type));
        $this->breed=htmlspecialchars(strip_tags($this->breed));
        $this->birthdate=htmlspecialchars(strip_tags($this->birthdate));
    
        // bind data
        $stmt->bindParam(":account_id", $this->account_id);
        $stmt->bindParam(":pet_name", $this->pet_name);
        $stmt->bindParam(":animal_type", $this->animal_type);
        $stmt->bindParam(":breed", $this->breed);
        $stmt->bindParam(":birthdate", $this->birthdate);
    
        if($stmt->execute()){
           return true;
        }
        return false;
    }
  
      // READ single
    public function getSinglePet(){
        $sqlQuery = "SELECT
                    pet_id, 
                    account_id, 
                    pet_name, 
                    animal_type,
                    breed, 
                    birthdate
                  FROM
                    ". $this->db_table ."
                WHERE 
                   pet_id = ?";
  
        $stmt = $this->conn->prepare($sqlQuery);
  
        $stmt->bindParam(1, $this->pet_id);
  
        $stmt->execute();
  
        $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);
        
        $this->pet_id = $dataRow['pet_id'];
        $this->account_id = $dataRow['account_id'];
        $this->pet_name = $dataRow['pet_name'];
        $this->animal_type = $dataRow['animal_type'];
        $this->breed = $dataRow['breed'];
        $this->birthdate = $dataRow['birthdate'];
  
    }        
  
    // UPDATE
    public function updatePet(){
        $sqlQuery = "UPDATE
                    ". $this->db_table ."
                SET
                    account_id = :account_id, 
                    pet_name = :pet_name, 
                    animal_type = :animal_type, 
                    breed = :breed, 
                    birthdate = :birthdate
                WHERE 
                    pet_id = :pet_id";
    
        $stmt = $this->conn->prepare($sqlQuery);
    
        $this->account_id=htmlspecialchars(strip_tags($this->account_id));
        $this->pet_name=htmlspecialchars(strip_tags($this->pet_name));
        $this->animal_type=htmlspecialchars(strip_tags($this->animal_type));
        $this->breed=htmlspecialchars(strip_tags($this->breed));
        $this->birthdate=htmlspecialchars(strip_tags($this->birthdate));
        $this->pet_id=htmlspecialchars(strip_tags($this->pet_id));
    
        // bind data
        $stmt->bindParam(":account_id", $this->account_id);
        $stmt->bindParam(":pet_name", $this->pet_name);
        $stmt->bindParam(":animal_type", $this->animal_type);
        $stmt->bindParam(":breed", $this->breed);
        $stmt->bindParam(":birthdate", $this->birthdate);
        $stmt->bindParam(":pet_id", $this->pet_id);
    
        if($stmt->execute()){
           return true;
        }
        return false;
    }
  
    // DELETE
    function deletePet(){
        $sqlQuery = "DELETE FROM " . $this->db_table . " WHERE pet_id = ?";
        $stmt = $this->conn->prepare($sqlQuery);
    
        $this->pet_id=htmlspecialchars(strip_tags($this->pet_id));
    
        $stmt->bindParam(1, $this->pet_id);
    
        if($stmt->execute()){
            return true;
        }
        return false;
    }
     
  
    function searchPet(){
          
           $sqlQuery = "SELECT
                        pet_id, 
                        account_id, 
                        pet_name, 
                        animal_type,
                        breed, 
                        birthdate
                      FROM
                        ". $this->db_table ."
                    WHERE 
                       pet_name like ?";
    
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->bindParam(1, $this->pet_name);
            $stmt->execute();
            return $stmt;
    }
  
    function getPetsOwner(){
          $sqlQuery = "SELECT account_id, firstname,lastname, contact_number, email_address, postal_address, id_number FROM owner WHERE account_id in (select account_id from pet where pet_id = ?)";
          $stmt = $this->conn->prepare($sqlQuery);
          $stmt->bindParam(1, $this->pet_id);
          $stmt->execute();
          return $stmt;
      }  
	  
      function getVisits(){
          $sqlQuery = "SELECT
                        visit_id, 
                        pet_id, 
                        visit_date, 
			            visit_type,
                        follow_up_date FROM visits WHERE pet_id = ?";
          $stmt = $this->conn->prepare($sqlQuery);
          $stmt->bindParam(1, $this->pet_id);
          $stmt->execute();
          return $stmt;
      }    
  }
  ?>
 <!--
Modified By: Kimone Kuppasamy
Modified Date: 01-05-2021
Version: 1
Description: hold functions for pet duties
Reason: Original
-->