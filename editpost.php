<?php
require_once 'db/conn.php';

//get values from $_POST operation
if(isset($_POST['submit'])){
    //call the crud function insert()
    //extract values from the $_POST array
    $id = $_POST['id'];
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $bdate = $_POST['birthdate'];
    $email = $_POST['email'];
    $contact = $_POST['phone'];
    $specialty = $_POST['specialty'];

    //call crud function
    $result = $crud->editAttendee($id, $fname, $lname, $bdate, $email, $contact, $specialty);
    //reirect to index.php
    if($result){
        header("location: viewattendee.php");
    } else {
        include 'includes/errorMessage.php';
    }
} else {
    include 'includes/errorMessage.php';
}
?>