<?php
class user{
    //private database object
    //karena di private jadi gk bisa berinterakasi dengan $db, baru bisa dipake lewat fungsi lain
    private $db;

    //constructor to initialize private variable to the database connection
    function __construct($conn){
        //$this beri semua akses ke private atau public attribute yg ada di class ini
        //$db get the value from $conn
        $this->db = $conn;
    }

    public function insertUser($username, $password){
        try {
            $result = $this->getUserByUsername($username);
            if($result['num'] > 0){
                return false;
            } else {
                $new_password = md5($password.$username);
                //define sql statement to be executed
                //VALUES(:placeholder,)
                $sql = "INSERT INTO user (username, password) VALUES (:username,:password)";
                //prepare the sql statements to execution
                //untuk ngeakses $db. dalam $db ada function prepare
                //parameternya ngambil dari statement yg ada di $sql 
                $stmt = $this->db->prepare($sql);
                //bind all placeholder to the actual values
                $stmt->bindparam(':username',$username);
                $stmt->bindparam(':password',$new_password);
            
                //execute statement
                $stmt->execute();
                //jika ini return true artinya statementnya berhasil dijalankan
                return true;
            }

        } catch (PDOException $error) {
            //$error objek dari PDOPException dan getMessage fungsinya
            echo $error->getMessage();
                return false;
        }
    }

    public function getUser($username, $password){
        try {
            $sql = "SELECT * FROM `user` WHERE username = :username AND password = :password";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':username',$username);
            $stmt->bindparam(':password',$password);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;
        } catch (PDOException $error) {
            //$error objek dari PDOPException dan getMessage fungsinya
            echo $error->getMessage();
                return false;
        }        
    }

    public function getUserByUsername($username){
        try {
            $sql = "SELECT count(*) as num from `user` WHERE username = :username";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':username',$username);
            
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;
        } catch (PDOException $error) {
            //$error objek dari PDOPException dan getMessage fungsinya
            echo $error->getMessage();
                return false;
        }        
    }
}
?>