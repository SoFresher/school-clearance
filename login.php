<?php 
include("header.php");
include ("result.php");
global $connection;
if (isset($_SESSION['login_user'])) {
    # code...
    header("location: profilePage.php");
}
session_start();
$matric = isset($_POST['matric']);
$fname = isset($_POST['fname']);
global $connection;
global $error;
if(isset($_POST['signin'])){
    if(empty($_POST['matric']) || empty($_POST['fname'])){
        $error = "Username error";
    }
    $sql = "SELECT * FROM studentclearance WHERE matric = '$_POST[matric]' AND fname = '$_POST[fname]'";
    $query = mysqli_query($connection, $sql);
    $row = mysqli_num_rows($query);
    if ($row == 1) {
        $_SESSION['login_user'] = $fname;
        header("location: profilePage.php");
    } else {
        echo $error;
    }

    mysqli_close($connection);
}
?>
<div class="well">
    <form class="form-signin" method="post" action="">
        <h2 class="form-signin-heading">Please Log in</h2>
        <label for="inputMatric" class="sr-only">Matriculation number</label>
        <input type="text" id="inputMatric" name="matric" class="form-control" placeholder="Matriculation number:" required autofocus>
        <label for="inputName" class="sr-only">Firstname</label>
        <input type="text" id="inputName" name="fname" class="form-control" placeholder="Firstname" required>
        <div class="checkbox">
            <label>
                <input type="checkbox" value="remember-me"> Remember me
            </label>
        </div> <br>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="signin">Sign in</button>
    </form>
</div>
<?php 
include("footer.php"); ?>