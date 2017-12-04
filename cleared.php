<?php
global $connection;
session_start();
/*$matric = $_POST['matric'];
$fname = $_POST['fname'];*/

//function signin() {
    $matric = isset($_POST['matric']);
    $fname = isset($_POST['fname']);
    global $connection;
    global $error;
    if(isset($_POST['signin'])){
    	if(empty($_POST['matric']) || empty($_POST['fname'])){
    		$error = "Username error";
    	}
    //if(!empty($_POST['matric'])) {
        $sql = "SELECT * FROM studentclearance WHERE matric = '$_POST[matric]' AND fname = '$_POST[fname]'";
        $query = mysqli_query($connection, $sql);
        $row = mysqli_num_rows($query);
        //$row = mysqli_fetch_array($query);
        /*if (!empty($row['matric']) AND !empty($row['fname'])) {
            $_SESSION['matric'] = $row['fname'];
        */
        if ($row == 1) {
        $_SESSION['login_user'] = $fname;
        header("location: profilePage.php");
            //echo "Success!";
        } else {
        	echo $error;
            //echo "no success";
        }

mysqli_close($connection);
    }
//}
/*if(isset($_POST['sigin'])){
    signin();
}
*/
include("footer.php");