<?php
$title = 'Success';
require_once 'includes/header.php';
require_once 'db/conn.php';

//checking if $_POST['sumbit'] exists or not
if(isset($_POST['submit'])){
  //call the crud function insert()
  //extract values from the $_POST array
  $fname = $_POST['firstname'];
  $lname = $_POST['lastname'];
  $bdate = $_POST['birthdate'];
  $email = $_POST['email'];
  $contact = $_POST['phone'];
  $specialty = $_POST['specialty'];
  //call function to insert and track if success or not
  //untuk ngeakses isi dari conn.php maka yg dipanggil $crud
  //jika berhasil maka kirim value sesuai parameter ke fungsi insert() dan hasilnya disimpan di $isSuccess
  $isSuccess = $crud->insertAttendees($fname,$lname,$bdate,$email,$contact,$specialty);

  if($isSuccess){
    include 'includes/successMessage.php' ;
  } else {
    include 'includes/errorMessage.php';
  }
}
?>


<div class="card" style="width: 18rem;">
  <div class="card-body">
  <!--POST: value yanng dikrim gk muncul di url. lebih aman  -->
    <h5 class="card-title"><?php echo $_POST['firstname'] . ' ' . $_POST['lastname'];?></h5>
    <h6 class="card-subtitle mb-2 text-muted"><?php echo $_POST['specialty']?></h6>
    <p class="card-text">Date of Birth : <?php echo $_POST['birthdate']; ?></p>
    <p class="card-text">Email : <?php echo $_POST['email']; ?></p>
    <p class="card-text">Phone Number : <?php echo $_POST['phone']; ?></p>
  </div>
</div>

<!-- GET: value yang dikirim muncul di url
  error soale methodnya beda sama form -->
<?php
// echo $_GET['firstname'];
// echo $_GET['lastname'];
// echo $_GET['birthdate'];
// echo $_GET['specialty'];
// echo $_GET['email'];
// echo $_GET['phone'];

?>
<br>
<br>

<?php
require_once 'includes/footer.php';
?>
