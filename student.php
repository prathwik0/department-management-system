<?php

include('dbCon.php');

if (isset($_POST['submit'])) {
    $usn = $_POST['usn'];
    $first_name = $_POST['first_name'];
    $m_name = $_POST['m_name'];
    $last_name = $_POST['last_name'];
    $dob = $_POST['dob'];
    $year = $_POST['year'];
    $sem = $_POST['sem'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $address = $_POST['address'];

    $sqlInsertIntoDB = "INSERT INTO `student`(`USN`, `First_Name`, `Middle_Name`, `Last_Name`, `D.O.B.`, `Year_of_Admission`, `Phone`, `Email`, `Address`) VALUES ('$usn','$first_name','$m_name','$last_name','$dob','$year','$phone','$email','$address')";
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
    <title>Student</title>
</head>

<body>
    <h3>Insert Student Details:</h3>
    <form action="" method="post" enctype="multipart/form-data">
        USN:<br>
        <input type="text" name="usn" maxlength="11">
        <br>
        First Name:<br>
        <input type="text" name="first_name">
        <br>
        Middle Name:<br>
        <input type="text" name="m_name">
        <br>
        Last Name:<br>
        <input type="text" name="last_name">
        <br>
        DOB:<br>
        <input type="date" name="dob">
        <br>
        Year of Admission:<br>
        <input type="number" name="year" min="2020">
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