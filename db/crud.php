<?php
class crud{
    //private database object
    //karena di private jadi gk bisa berinterakasi dengan $db, baru bisa dipake lewat fungsi lain
    private $db;

    //constructor to initialize private variable to the database connection
    function __construct($conn){
        //$this beri semua akses ke private atau public attribute yg ada di class ini
        //$db get the value from $conn
        $this->db = $conn;
    }

    //function to insert a new record into the attendance database
    //karena public jadi bisa berinterkasi sama isinya
    //parameter yang didefinisikan akan menerima values yang dikirim dgn $_POST

    //insert($actualValue,)
    public function insertAttendees($fname, $lname, $bdate, $email, $contact, $specialty){
        try {
            //define sql statement to be executed
            //VALUES(:placeholder,)
            $sql = "INSERT INTO attendance (firstname,lastname,dateofbirth,email,contactnumber,specialty_id) VALUES (:fname,:lname,:bdate,:email,:contact,:specialty)";
            //prepare the sql statements to execution
            //untuk ngeakses $db. dalam $db ada function prepare
            //parameternya ngambil dari statement yg ada di $sql 
            $stmt = $this->db->prepare($sql);
            //bind all placeholder to the actual values
            $stmt->bindparam(':fname',$fname);
            $stmt->bindparam(':lname',$lname);
            $stmt->bindparam(':bdate',$bdate);
            $stmt->bindparam(':email',$email);
            $stmt->bindparam(':contact',$contact);
            $stmt->bindparam(':specialty',$specialty);

            //execute statement
            $stmt->execute();
            //jika ini return true artinya statementnya berhasil dijalankan
            return true;

        } catch (PDOException $error) {
            //$error objek dari PDOPException dan getMessage fungsinya
            echo $error->getMessage();
                return false;
        }
    }

    public function getAttendees(){
        try {
            $sql = "SELECT * FROM `attendance` a inner join specialties s on a.specialty_id=s.specialty_id";
            $return = $this->db->query($sql);
            return $return;
        } catch (PDOException $error) {
            //$error objek dari PDOPException dan getMessage fungsinya
            echo $error->getMessage();
                return false;
        }
    }

    public function getDetails($id){
        try {
            $sql = "SELECT * FROM `attendance` a inner join specialties s on a.specialty_id=s.specialty_id WHERE attendance_id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':id',$id);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;
        } catch (PDOException $error) {
            //$error objek dari PDOPException dan getMessage fungsinya
            echo $error->getMessage();
                return false;
        }        
    }

    public function editAttendee($id, $fname, $lname, $bdate, $email, $contact, $specialty){
        try {
            $sql = "UPDATE `attendance` SET `firstname`= :fname,`lastname`= :lname,`dateofbirth`= :bdate,`email`= :email,`contactnumber`= :contact,`specialty_id`= :specialty WHERE attendance_id = :id";
            $stmt = $this->db->prepare($sql);
            //bind all placeholder to the actual values
            $stmt->bindparam(':id',$id);
            $stmt->bindparam(':fname',$fname);
            $stmt->bindparam(':lname',$lname);
            $stmt->bindparam(':bdate',$bdate);
            $stmt->bindparam(':email',$email);
            $stmt->bindparam(':contact',$contact);
            $stmt->bindparam(':specialty',$specialty);
            //execute statement
            $stmt->execute();
            return true; 

        } catch (PDOException $error) {
            //$error objek dari PDOPException dan getMessage fungsinya
            echo $error->getMessage();
                return false;
        }       
    }

    public function deleteAttendee($id){
        try {
            $sql = "delete from attendance where attendance_id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':id',$id);
            $stmt->execute();
            return true;

        } catch (PDOException $error) {
            //$error objek dari PDOPException dan getMessage fungsinya
            echo $error->getMessage();
                return false;
        }
    }
    public function getSpecialties(){
        try {
            $sql = "SELECT * FROM `specialties`";
            $return = $this->db->query($sql);
            return $return;

        } catch (PDOException $error) {
            //$error objek dari PDOPException dan getMessage fungsinya
            echo $error->getMessage();
                return false;
        }    
    }
}
?>