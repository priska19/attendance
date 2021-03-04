<?php
$title = 'Index';
require_once 'includes/header.php';
require_once 'db/conn.php';
$results = $crud->getSpecialties();

?>
    <h1 class="text-center">Registration for IT Conference</h1>

    <form method="post" action="success.php">
    <div class="mb-3">
            <label for="firstname" class="form-label">Firts Name</label>
            <input required type="text" class="form-control" id="firstname" name="firstname">
        </div>
        <div class="mb-3">
            <label for="lastname" class="form-label">Last Name</label>
            <input required type="text" class="form-control" id="lastname" name="lastname">
        </div>
        <div class="mb-3">
            <label for="birthdate" class="form-label">Date of Birth</label>
            <input type="text" class="form-control" id="birthdate" name="birthdate">
        </div>
        <div class="mb-3">
            <label for="specialty" class="form-label">Area of Expertise</label>
            <select class="form-select" id="specialty" name="specialty">
                <option selected>Open this select menu</option>
                <?php while($r = $results->fetch(PDO::FETCH_ASSOC)){ ?>
                <option value="<?php echo $r['specialty_id']?>"><?php echo $r['name'];?></option>
                <?php } ?>                
            </select>
        </div>
        
        <div class="mb-3">
            <label for="email" class="form-label">Email Address</label>
            <input required type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <!-- <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1">
        </div> -->
        <div class="mb-3">
            <label for="phone" class="form-label">Contact Number</label>
            <input type="text" class="form-control" id="phone" name="phone" aria-describedby="phonelHelp">
            <div id="phonelHelp" class="form-text">We'll never share your phone number with anyone else.</div>
        </div>
        <!-- <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div> -->
        <div class="d-grid gap-2">
            <button type="submit" name='submit' class="btn btn-primary">Submit</button>
        </div>
    </form>
    <br>
    <br>

<?php
require_once 'includes/footer.php';
?>

    