<?php 
    class client_crud {
//===============================================================================================================
        //Objects

        //private database object
        private $db;

        private $currentClientsFK = "3";
        private $pastClientsFK = "4";

        private $softDeletedClientsFK = "1";
        private $nonDeletedClientsFK = "2";

        private $softDeleteClientsFK = "1";
        private $restoreDeletedClientsFK = "2";
        

        //constructor to initialize private variable to the database connection
        function __construct($db_connect){
            $this->db = $db_connect;
        }

//===============================================================================================================
        //Inserting of Records (function)

        public function insertClients ($firstname, $lastname, $address_c, $imgpath, $gender, $dob, $adventures, $email, $contact_num){
            try {
                $result =$this->getClientbyEmail($email);
                if ($result['emailCount'] > 0){
                    return false;
                } else {
                //define sql statement to be executed 
                $sql = "INSERT INTO `clients_tbl`(`firstname`, `lastname`, `address`, `imgpath`, `gender_fk`, `dob`, `adventures_fk`, `email`, `contact_num`) 
                VALUES (:firstname, :lastname, :address_c, :imgpath, :gender, :dob, :adventures, :email, :contact_num)";
                
                //prepare the sql statement for execution
                $statement = $this->db->prepare($sql);
                
                //bind all placeholders to the actual values
                $statement->bindparam(':firstname',$firstname);
                $statement->bindparam(':lastname',$lastname);
                $statement->bindparam(':address_c',$address_c);
                $statement->bindparam(':imgpath',$imgpath);
                $statement->bindparam(':gender',$gender);
                $statement->bindparam(':dob',$dob);
                $statement->bindparam(':adventures',$adventures);
                $statement->bindparam(':email',$email);
                $statement->bindparam(':contact_num',$contact_num);

                //execute statement
                $statement->execute();
                return true;
            }
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

//===============================================================================================================
             //Editing of Records (function)

        public function editClients($client_id, $client_status, $firstname, $lastname, $address_c, $gender, $dob, $adventures, $contact_num){
            try {
                $sql = "UPDATE `clients_tbl` 
                SET `client_status_fk`=:client_status, `firstname`=:firstname,`lastname`=:lastname, `address`=:address_c, `gender_fk`=:gender, `adventures_fk`=:adventures,`dob`=:dob,`contact_num`=:contact_num 
                WHERE client_id = :client_id";

             //bind all placeholders to the actual values
                
                $statement = $this->db->prepare($sql);
                $statement->bindparam(':client_id',$client_id);
                $statement->bindparam(':client_status',$client_status);              
                $statement->bindparam(':firstname',$firstname);
                $statement->bindparam(':lastname',$lastname);
                $statement->bindparam(':address_c',$address_c);
                $statement->bindparam(':gender',$gender);
                $statement->bindparam(':dob',$dob);
                $statement->bindparam(':adventures',$adventures);
                $statement->bindparam(':contact_num',$contact_num);

             $statement->execute();
             return true;

            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

//===============================================================================================================
             //Retrieval of Records (functions)

        public function getAllCurrentClients (){
            try {
                $sql = "SELECT * FROM `clients_tbl` 
                inner join adventures_tbl on adventures_fk = adventures_id 
                inner join clients_status_tbl on client_status_fk = status_id
                inner join clients_isdeleted_tbl on client_isdeleted_fk = deleted_id
                where clients_status_tbl.status_id = $this->currentClientsFK
                AND clients_isdeleted_tbl.deleted_id = $this->nonDeletedClientsFK";

                $results =$this->db->query($sql);
                return $results;
                
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function getAllPastClients (){
            try {
                $sql = "SELECT * FROM `clients_tbl` 
                inner join adventures_tbl on adventures_fk = adventures_id 
                inner join clients_status_tbl on client_status_fk = status_id
                inner join clients_isdeleted_tbl on client_isdeleted_fk = deleted_id
                where clients_status_tbl.status_id = $this->pastClientsFK
                AND clients_isdeleted_tbl.deleted_id = $this->nonDeletedClientsFK";

                $results =$this->db->query($sql);
                return $results;
                
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function getClientDetails ($client_id){
            try {
                $sql = "SELECT * FROM `clients_tbl` 
                inner join adventures_tbl on adventures_fk = adventures_id 
                inner join clients_status_tbl on client_status_fk = status_id
                inner join gender_tbl on gender_fk = gender_id
                where client_id = :client_id";

                $statement = $this->db->prepare($sql);
                $statement->bindparam(':client_id', $client_id);        
                $statement->execute();
                $result = $statement->fetch();
                return $result;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

//===============================================================================================================
             //Delete Related (functions)

        public function getAllDeletedClients (){
            try {
                $sql = "SELECT * FROM `clients_tbl` 
                inner join adventures_tbl on adventures_fk = adventures_id 
                inner join clients_status_tbl on client_status_fk = status_id
                inner join gender_tbl on gender_fk = gender_id
                inner join clients_isdeleted_tbl on client_isdeleted_fk = deleted_id
                where clients_isdeleted_tbl.deleted_num = $this->softDeletedClientsFK";

                $results =$this->db->query($sql);
                return $results;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function deleteSoftClients($client_id){
            try {
                $sql = "UPDATE `clients_tbl` 
                SET `client_isdeleted_fk`= $this->softDeleteClientsFK
                WHERE client_id = :client_id";

                //bind all placeholders to the actual values
                   
                   $statement = $this->db->prepare($sql);
                   $statement->bindparam(':client_id',$client_id);              
                      
                $statement->execute();
                return true;

            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function restoreDeletedClients($client_id){
            try {
                $sql = "UPDATE `clients_tbl` 
                SET `client_isdeleted_fk`= $this->restoreDeletedClientsFK
                WHERE client_id = :client_id";

                //bind all placeholders to the actual values
                   
                   $statement = $this->db->prepare($sql);
                   $statement->bindparam(':client_id',$client_id);              
                      
                $statement->execute();
                return true;

            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

//===============================================================================================================
             // (functions)

        public function getClientbyEmail ($email){
            try {
                $sql = "SELECT COUNT(email) AS emailCount FROM clients_tbl WHERE `email` = :email";
    
                $statement = $this->db->prepare($sql);
                $statement->bindparam(':email', $email);   
                $statement->execute();
                $email_result = $statement->fetch();
                return $email_result;
                } catch (PDOException $e) {
                    echo $e->getMessage();
                    return false;
                }
             }

//===============================================================================================================
             //Dropdown Options (functions)

             public function getAdventures (){
                try {
                    $sql = "SELECT * FROM `adventures_tbl`";
                    $results =$this->db->query($sql);
                    return $results;
                } catch(PDOException $e) {
                    echo $e->getMessage();
                    return false;
                }
            }
    
            public function getGender (){
                try {
                    $sql = "SELECT * FROM `gender_tbl`";
                    $gender_results =$this->db->query($sql);
                    return $gender_results;
                } catch(PDOException $e) {
                    echo $e->getMessage();
                    return false;
                }
            }

        public function getStatus (){
            try {
                $sql = "SELECT * FROM `clients_status_tbl`";
                $status_results =$this->db->query($sql);
                return $status_results;
            } catch(PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }
    }
        
?>