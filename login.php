<?php
$title = 'user Login';
require_once 'includes/header.php';
require_once 'db/conn.php';

//if data was submitted via a form POST request, then...
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username = strtolower(trim($_POST['username']));
    $password = $_POST['password'];
    $new_password = md5($password.$username);

    $result = $user->getUser($username, $new_password);
    if (!$result) {
        echo '<div class="alert alert-danger">Username or Password is incorrect. Please try again.</div>';
    } else {
        $_SESSION['username'] = $username;
        $_SESSION['user_id'] = $result['id'];
        header("Location: viewattendee.php");
    }
}
?>

<h1 class="text-center"><?php echo $title ?></h1>
<!-- PHP_SELF artinyan geload di halaman itu sendiri -->
<form method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
    <table class="table table-sm">
        <tr>
            <td><label for="username" class="form-label">Username: *</label></td>
            <!-- request method artinya jika page ini dapet request berupa post maka tampilkan echo-->
            <td><input  type="text" class="form-control" id="username" name="username" value="<?php if($_SERVER['REQUEST_METHOD'] == 'POST') echo $_POST['username']; ?>"></td>        
        </tr>
        <tr>
            <td><label for="password" class="form-label">Password: *</label></td>
            <td><input  type="password" class="form-control" id="password" name="password"></td>
        </tr>
    </table><br><br>
    <div class="d-grid gap-2">
        <button type="submit" name='submit' class="btn btn-primary">Submit</button>
    </div><br>
    <a href="">Forgot Password</a>
</form>
<br><br><br>
<?php include_once 'includes/footer.php'; ?>