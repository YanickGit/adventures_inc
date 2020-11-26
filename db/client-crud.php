<?php 
    class client_crud {
        //private database object
        private $db;

        private $active = "1";
        private $softDelete = "0";
        private $softDeleteFK = "4";
        private $activateFK = "3";
        

        //constructor to initialize private variable to the database connection
        function __construct($db_connect){
            $this->db = $db_connect;
        }

        //function to insert a new record
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

        public function editAttendee($client_id, $firstname, $lastname, $dob, $specialization, $email, $contact_num, $status1){
            try {
                $sql = "UPDATE `attendee_tbl` 
                SET `firstname`=:firstname,`lastname`=:lastname, `specialization_fk`=:specialization,`dob`=:dob,`email`=:email,`contact_num`=:contact_num, `status_fk`=:status1 
                WHERE attendee_id = :id";

             //bind all placeholders to the actual values
                
                $statement = $this->db->prepare($sql);
                $statement->bindparam(':client_id',$client_id);              
                $statement->bindparam(':firstname',$firstname);
                $statement->bindparam(':lastname',$lastname);
                $statement->bindparam(':dob',$dob);
                $statement->bindparam(':specialization',$specialization);
                $statement->bindparam(':email',$email);
                $statement->bindparam(':contact_num',$contact_num);
                $statement->bindparam(':status1',$status1);

             $statement->execute();
             return true;

            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function getAllClients (){
            try {
                $sql = "SELECT * FROM `clients_tbl` 
                inner join adventures_tbl on adventures_fk = adventures_id 
                inner join clients_status_tbl on client_status_fk = status_id
                where clients_status_tbl.status_num = $this->active";

                $results =$this->db->query($sql);
                return $results;
                
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function getDeletedAttendees (){
            try {
                $sql = "SELECT * FROM `attendee_tbl` 
                inner join specialization_tbl on specialization_fk = specialization_id 
                inner join status_tbl on status_fk = status_id
                where status_tbl.status_num = $this->softDelete";

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

        public function deleteAttendee($id){
            try {
                $sql = "DELETE FROM `attendee_tbl` 
                WHERE attendee_id = :id";

                $statement = $this->db->prepare($sql);
                $statement->bindparam(':id', $id);        
                $statement->execute();
                return true;    
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function deleteSoftAttendee($id){
            try {
                $sql = "UPDATE `attendee_tbl` 
                SET `status_fk`= $this->softDeleteFK
                WHERE attendee_id = :id";

                //bind all placeholders to the actual values
                   
                   $statement = $this->db->prepare($sql);
                   $statement->bindparam(':id',$id);              
                      
                $statement->execute();
                return true;

            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function activateAttendee($id){
            try {
                $sql = "UPDATE `attendee_tbl` 
                SET `status_fk`= $this->activateFK
                WHERE attendee_id = :id";

                //bind all placeholders to the actual values
                   
                   $statement = $this->db->prepare($sql);
                   $statement->bindparam(':id',$id);              
                      
                $statement->execute();
                return true;

            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

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
                $results =$this->db->query($sql);
                return $results;
            } catch(PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function getSpecializationId ($id){
            try {
                $sql = "SELECT * FROM `specialization_tbl`
                WHERE specialization_id = :id";
                $statement = $this->db->prepare($sql);
                $statement->bindparam(':id',$id);              
                $statement->execute();
                return true;
                
            } catch(PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function getClientbyEmail ($email){
            try {
                $sql = "SELECT COUNT(email) AS emailCount FROM clients_tbl WHERE `email` = :email";
    
                $statement = $this->db->prepare($sql);
                $statement->bindparam(':email', $email);   
                $statement->execute();
                $result = $statement->fetch();
                return $result;
                } catch (PDOException $e) {
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