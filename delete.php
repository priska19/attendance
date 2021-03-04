<?php
require_once 'db/conn.php';

if(!isset($_GET['id'])){
    include 'includes/errorMessage.php';
    header("Location: viewattendee.php");
} else {
    $id = $_GET['id'];
    $result = $crud->deleteAttendee($id);

     if ($result) {
        header("Location: viewattendee.php");
    
    } else {
        include 'includes/errorMessage.php';
    }
}
?>