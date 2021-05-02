<?php
    class Admin{

        // Connection
        private $conn;

        // Table
        private $db_table = "admin";

        // Columns
        public $admin_id;
        public $admin_fname;
        public $admin_sname;
        public $admin_email;
        public $admin_con_num;
		public $admin_password;

        // Db connection
        public function __construct($db){
            $this->conn = $db;
        }

        // GET ALL
        public function getAdmins(){
            $sqlQuery = "SELECT admin_id, admin_fname,admin_sname,admin_email,admin_con_num,admin_password FROM " . $this->db_table . "";
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->execute();
            return $stmt;
        }

        // CREATE
        public function createAdmin(){
            $sqlQuery = "INSERT INTO
                        ". $this->db_table ."
                    SET
                        admin_fname = :admin_fname, 
						admin_sname = :admin_sname, 
                        admin_email = :admin_email, 
                        admin_con_num = :admin_con_num,
						admin_password = hex(:admin_password)";
        
            $stmt = $this->conn->prepare($sqlQuery);
        
            // sanitize
            $this->admin_fname=htmlspecialchars(strip_tags($this->admin_fname));
            $this->admin_sname=htmlspecialchars(strip_tags($this->admin_sname));
			$this->admin_email=htmlspecialchars(strip_tags($this->admin_email));
            $this->admin_con_num=htmlspecialchars(strip_tags($this->admin_con_num));
			$this->admin_password=htmlspecialchars(strip_tags($this->admin_password));
        
            // bind data
            $stmt->bindParam(":admin_fname", $this->admin_fname);
            $stmt->bindParam(":admin_sname", $this->admin_sname);
			$stmt->bindParam(":admin_email", $this->admin_email);
            $stmt->bindParam(":admin_con_num", $this->admin_con_num);
            $stmt->bindParam(":admin_password", $this->admin_password);
			
            if($stmt->execute()){
               return true;
            }
            return false;
        }

        // READ single
        public function getSingleAdmin(){
            $sqlQuery = "SELECT
                        admin_email,
                        admin_password
                      FROM
                        ". $this->db_table ."
                    WHERE 
                       admin_email = ?";

          $stmt = $this->conn->prepare($sqlQuery);
          $stmt->bindParam(1, $this->admin_email);
          $stmt->execute();
          return $stmt;

        }        

        // UPDATE
        public function updateAdmin(){
            $sqlQuery = "UPDATE
                        ". $this->db_table ."
                    SET
                        admin_fname = :admin_fname, 
                        admin_sname = :admin_sname, 
			            admin_email = :admin_email, 
                        admin_con_num = :admin_con_num
                    WHERE 
                        admin_id = :admin_id";
        
            $stmt = $this->conn->prepare($sqlQuery);
        
            $this->admin_fname=htmlspecialchars(strip_tags($this->admin_fname));
            $this->admin_sname=htmlspecialchars(strip_tags($this->admin_sname));
            $this->admin_email=htmlspecialchars(strip_tags($this->admin_email));
            $this->admin_con_num=htmlspecialchars(strip_tags($this->admin_con_num));
            $this->admin_id=htmlspecialchars(strip_tags($this->admin_id));
        
            // bind data
            $stmt->bindParam(":admin_fname", $this->admin_fname);
            $stmt->bindParam(":admin_sname", $this->admin_sname);
            $stmt->bindParam(":admin_email", $this->admin_email);
            $stmt->bindParam(":admin_con_num", $this->admin_con_num);
            $stmt->bindParam(":admin_id", $this->admin_id);
        
            if($stmt->execute()){
               return true;
            }
            return false;
        }

        // DELETE
        function deleteAdmin(){
            $sqlQuery = "DELETE FROM " . $this->db_table . " WHERE admin_id = ?";
            $stmt = $this->conn->prepare($sqlQuery);
        
            $this->admin_id=htmlspecialchars(strip_tags($this->admin_id));
        
            $stmt->bindParam(1, $this->admin_id);
        
            if($stmt->execute()){
                return true;
            }
            return false;
        }

    }
?>