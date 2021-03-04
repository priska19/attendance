<?php
$title = 'Attendees';
require_once 'includes/header.php';
require_once 'db/conn.php';
//get all attendees
$results = $crud->getAttendees();
?>

<table class="table">
    <tr>
        <th>#</th>
        <th>First Name</th>
        <th>Last Name</th>        
        <th>Specialty</th>
        <th>Action</th>

    </tr>
    <?php while($r = $results->fetch(PDO::FETCH_ASSOC)) {?>
    <tr>
        <td><?php echo $r['attendance_id']?></td>
        <td><?php echo $r['firstname']?></td>
        <td><?php echo $r['lastname']?></td>
        <td><?php echo $r['name']?></td>
        <td>
            <a href="view.php?id=<?php echo $r['attendance_id']?>" class= "btn btn-primary" >View</a>
            <a href="edit.php?id=<?php echo $r['attendance_id']?>" class= "btn btn-warning" >Edit</a>
            <a onclick="return confirm('Are yaou sure wantto delete this record?');" 
            href="delete.php?id=<?php echo $r['attendance_id']?>" class= "btn btn-danger" >Delete</a>
        </td>
        

    </tr>
    <?php } ?>
</table>
<br>
<br>

<?php
require_once 'includes/footer.php';
?>