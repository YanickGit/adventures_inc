<?php

    class user_crud{
        //private database object
        private $db;

        //constructor to initialize private variable to the database connection
        function __construct($db_connect){
            $this->db = $db_connect;
        }

//===============================================================================================================
    //Inserting of Records (functions)

    public function insertUser($username, $password){
        try {
            $result =$this->getUserbyUsername($username);
                if ($result['userCount'] > 0){
                    return false;
                } else {
                    $new_password = md5($password.$username); //Encrypt Password
                    
                    //define sql statement to be executed 
                    $sql = "INSERT INTO `users_tbl` (`username`, `password`) 
                    VALUES (:username, :password)";
                    
                    //prepare the sql statement for execution
                    $statement = $this->db->prepare($sql);
                    
                    //bind all placeholders to the actual values
                    $statement->bindparam(':username',$username);
                    $statement->bindparam(':password',$new_password);
                    //$statement->bindparam(':email',$email);

                    //execute statement
                    $statement->execute();
                    return true;
                    }
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function insertContactUs ($name, $email, $subject, $message){
            try {
                //define sql statement to be executed 
                $sql = "INSERT INTO `contactus_tbl` (`name`, `email`, `subject`, `message`) 
                VALUES (:name, :email, :subject, :message)";
                
                //prepare the sql statement for execution
                $statement = $this->db->prepare($sql);
                
                //bind all placeholders to the actual values
                $statement->bindparam(':name',$name);
                $statement->bindparam(':email',$email);
                $statement->bindparam(':subject',$subject);
                $statement->bindparam(':message',$message);

                //execute statement
                $statement->execute();
                return true;

            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

//===============================================================================================================
    //Retrieval of Records (functions)

    public function getUser($username, $password){
        try {
            $sql = "SELECT * FROM `users_tbl` 
            WHERE `username` = :username AND `password` = :password";

            $statement = $this->db->prepare($sql);
            $statement->bindparam(':username', $username);
            $statement->bindparam(':password', $password);   
            $statement->execute();

            //$result =$this->db->query($sql);
            $result = $statement->fetch();
            return $result;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function getAllContactUs (){
            try {
                $sql = "SELECT * FROM `contactus_tbl`";

                $results =$this->db->query($sql);
                return $results;
                
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function verifyUserEmail($username, $email){
            try {
                $sql = "SELECT COUNT(username) AS emailCount FROM users_tbl 
                WHERE `username` = :username AND `email` = :email";
    
                $statement = $this->db->prepare($sql);
                $statement->bindparam(':username', $username);
                $statement->bindparam(':email', $email);   
                $statement->execute();
    
                //$result =$this->db->query($sql);
                $result = $statement->fetch();
                return $result;
                } catch (PDOException $e) {
                    echo $e->getMessage();
                    return false;
                }
            }

    public function getUserbyUsername ($username){
        try {
            $sql = "SELECT COUNT(username) AS userCount FROM users_tbl WHERE `username` = :username";

            $statement = $this->db->prepare($sql);
            $statement->bindparam(':username', $username);   
            $statement->execute();
            $result = $statement->fetch();
            return $result;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
         }

//===============================================================================================================
    //Deletion of Records (functions)

         public function deleteEntryContactUs($contact_id){
            try {
                $sql = "DELETE FROM `contactus_tbl` 
                WHERE $contact_id = :contact_id";

                $statement = $this->db->prepare($sql);
                $statement->bindparam(':contact_id', $contact_id);        
                $statement->execute();
                return true;    
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

//===============================================================================================================
    //Updating of Records (functions)

         public function forgetPassword($username, $password){
            try {
                $result =$this->getUserbyUsername($username);
                if (!$result['userCount'] = 1){
                    return false;
                } else {
                    $sql = "UPDATE `users_tbl` 
                    SET `password`=:password 
                    WHERE `username` = :username";

                    //bind all placeholders to the actual values
                
                    $statement = $this->db->prepare($sql);
                    $statement->bindparam(':username', $username);
                    $statement->bindparam(':password', $password);  

                    $statement->execute();
                    return true;
                }
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

    }
?>