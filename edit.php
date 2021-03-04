<?php
$title = 'Edit';
require_once 'includes/header.php';
require_once 'db/conn.php';
$results = $crud->getSpecialties();

if(!isset($_GET['id'])){
    include 'includes/errorMessage.php';
    header('Location: viewattendee.php');

} else {
    $id = $_GET['id'];
    $attendee = $crud->getDetails($id);

?>
    <h1 class="text-center">Edit Data</h1>

    <form method="post" action="editpost.php">
    <input type="hidden" name ="id" value="<?php echo $attendee['attendance_id'] ?>"/>
    <div class="mb-3">
            <label for="firstname" class="form-label">Firts Name</label>
            <input type="text" class="form-control" value="<?php echo $attendee['firstname'] ?>" id="firstname" name="firstname">
        </div>
        <div class="mb-3">
            <label for="lastname" class="form-label">Last Name</label>
            <input type="text" class="form-control" value="<?php echo $attendee['lastname'] ?>" id="lastname" name="lastname">
        </div>
        <div class="mb-3">
            <label for="birthdate" class="form-label">Date of Birth</label>
            <input type="text" class="form-control" value="<?php echo $attendee['dateofbirth'] ?>" id="birthdate" name="birthdate">
        </div>
        <div class="mb-3">
            <label for="specialty" class="form-label">Area of Expertise</label>
            <select class="form-select" id="specialty" name="specialty">
                <?php while($r = $results->fetch(PDO::FETCH_ASSOC)){?>
                <option value="<?php echo $r['specialty_id']?>" <?php if($r['specialty_id'] == $attendee['specialty_id']) echo 'selected'?>>
                    <?php echo $r['name'];?>
                </option>
                <?php } ?>                
            </select>
        </div>
        
        <div class="mb-3">
            <label for="email" class="form-label">Email Address</label>
            <input type="email" class="form-control" value="<?php echo $attendee['email'] ?>" id="email" name="email" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <!-- <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1">
        </div> -->
        <div class="mb-3">
            <label for="phone" class="form-label">Contact Number</label>
            <input type="text" class="form-control" value="<?php echo $attendee['contactnumber'] ?>" id="phone" name="phone" aria-describedby="phonelHelp">
            <div id="phonelHelp" class="form-text">We'll never share your phone number with anyone else.</div>
        </div>
        <!-- <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div> -->
        <div class="d-grid gap-2">
            <button type="submit" name='submit' class="btn btn-success">Save Change</button>
        </div>
    </form>

    <?php } ?>
    <br>
    <br>

<?php
require_once 'includes/footer.php';
?>

    