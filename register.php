<?php include("header.php");
include("result.php");
global $connection;
?>
    <div id="allInput">
        <p class="danger">Kindly take your time to fill out the following registration box. <br>
                    Every boxes required the slip number printed on the receipt issued after purchase.</p></div>
<?php 
if (isset($_POST['submit'])) {
    $fname = trim(htmlspecialchars(mysqli_real_escape_string($connection, $_POST['fname'])));
    $sname = trim(htmlspecialchars(mysqli_real_escape_string($connection, $_POST['sname'])));
    $matric = trim(htmlspecialchars(mysqli_real_escape_string($connection,$_POST['matric'])));
    $exam = trim(htmlspecialchars(mysqli_real_escape_string($connection,$_POST['exam'])));
    $schoolFee = trim(htmlspecialchars(mysqli_real_escape_string($connection,$_POST['schoolFee'])));
    $mis = trim(htmlspecialchars(mysqli_real_escape_string($connection,$_POST['mis'])));
    $faculty = trim(htmlspecialchars(mysqli_real_escape_string($connection,$_POST['faculty'])));
    $bursary = trim(htmlspecialchars(mysqli_real_escape_string($connection,$_POST['bursary'])));
    $otherCharges = trim(htmlspecialchars(mysqli_real_escape_string($connection,$_POST['otherCharges'])));
    $dept = trim(htmlspecialchars(mysqli_real_escape_string($connection,$_POST['dept'])));
    $alumni = trim(htmlspecialchars(mysqli_real_escape_string($connection,$_POST['alumni'])));
    $result = "INSERT INTO `studentclearance` (`fname`, `sname`, `matric`, `exam`, `schFee`, `mis`, `faculty`, `bursary`, `otherCharges`, `dept`, `alumni`) 
VALUES ('$fname', '$sname', '$matric', '$exam', '$schoolFee', '$mis', '$faculty', '$bursary', '$otherCharges', '$dept', '$alumni')";
    if ($connection->query($result) === TRUE) {
        echo "<b class='approved'>User created successfully!</b>";
        echo " Proceed to <a href='login.php' title='Login'> Login </a>";
    } else {
        echo "User creation not successful";
    }
}
mysqli_close($connection);
?>
    <form class="form-horizontal" action="" method="post">
        <div class="form-group">
            <label for="firstname">Firstname <span class="danger">*</span></label>
            <input type="text" class="form-control" id="firstname" placeholder="Enter your First name" name="fname" required>
        </div>
        <div class="form-group">
            <label for="surname">Surname <span class="danger">*</span></label>
            <input type="text" class="form-control" id="surname" placeholder="Enter your Surname" name="sname" required>
        </div>
        <div class="form-group">
            <label for="matric">Matric no:<span class="danger">*</span></label>
            <input type="text" class="form-control" id="matric" placeholder="Matric Num" name="matric" required>
        </div>
        <div class="form-group">
            <label for="faculty">Faculty <abbr title="Slip Number">SN:</abbr><span class="danger">*</span></label>
            <input type="text" class="form-control" id="faculty" placeholder="Faculty Slip Number" name="faculty" required>
        </div>
        <div class="form-group">
            <label for="bursary">Bursary <abbr title="Slip Number"> SN </abbr>:<span class="danger">*</span></label>
            <input type="text" class="form-control" id="bursary" placeholder="Bursary Slip Number" name="bursary" required>
        </div>
        <div class="form-group">
            <label for="exam">Exam and records:<span class="danger">*</span></label>
            <input type="text" class="form-control" id="exam" placeholder="Exam and records slip number" name="exam" required>
        </div>
        <div class="form-group">
            <label for="schoolFee">School Fee:<span class="danger">*</span></label>
            <input type="text" class="form-control" id="schoolFee" placeholder="School Fee Sip number" name="schoolFee" required>
        </div>
        <div class="form-group">
            <label for="otherCharges">Other charges:<span class="danger">*</span></label>
            <input type="text" class="form-control" id="otherCharges" placeholder="Other charges" name="otherCharges" required>
        </div>
        <div class="form-group">
            <label for="deptDue">Departmental Due:<span class="danger">*</span></label>
            <input type="text" class="form-control" id="deptDue" placeholder="Departmental Due" name="dept"  required>
        </div>
        <div class="form-group">
            <label for="alumni">Alumni Clearance:<span class="danger">*</span></label>
            <input type="text" class="form-control" id="alumni" placeholder="Alumni Clearance" name="alumni" required>
        </div>
        <div class="form-group">
            <label for="mis">MIS Office:<span class="danger">*</span></label>
            <input type="text" class="form-control" id="mis" placeholder="MIS Office Clearance" name="mis" required>
        </div>
       <input type="submit" value="Submit" class="btn btn-success" name="submit">
    </form>
    
<?php include("footer.php"); ?>