<?php

include('dbCon.php');

if (isset($_POST['submit'])) {
    $dep_id = $_POST['dep_id'];
    $emp_id = $_POST['emp_id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $qualifications = $_POST['qualifications'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $address = $_POST['address'];

    $sqlInsertIntoDB = "INSERT INTO `faculty`(`Department_ID`, `Employee_ID`, `First_Name`, `Last_Name`, `Qualifications`, `Phone`, `Email`) VALUES ('$dep_id','$emp_id','$fname','$lname','$qualifications','$phone','$email','$address')";

    if (mysqli_query($conn, $sqlInsertIntoDB)) {
        print '<script>alert("Details uploaded successfully.");</script>';
        print '<script>window.location.assign("index.php");</script>';
    } else {
        echo "<br />Failed to upload.<br />";
    }
} else {
}

//Close the connection
if (mysqli_close($conn)) {
    //echo "<br />Connection Closed.";
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Faculty</title>
</head>

<body>
    <h3>Insert Faculty Details:</h3>
    <form action="" method="post" enctype="multipart/form-data">
        Department ID:<br>
        <input type="text" name="dep_id">
        <br>
        Employee ID:<br>
        <input type="text" name="emp_id">
        <br>
        First Name:<br>
        <input type="text" name="fname">
        <br>
        Last Name:<br>
        <input type="text" name="lname">
        <br>
        Qualifications:<br>
        <input type="text" name="qualifications">
        <br>
        Phone Number:<br>
        <input type="text" name="phone" maxlength="11">
        <br>
        Email ID:<br>
        <input type="email" name="email">
        <br>
        Address:<br>
        <input type="text" name="address">
        <br>
        <br />
        <input type="submit" name="submit" value="Upload">

    </form>
</body>

</html>