<?php

include('dbCon.php');

if (isset($_POST['submit'])) {
    if ((!file_exists($_FILES['cert']['tmp_name']) || !is_uploaded_file($_FILES['cert']['tmp_name']))) {
        print '<script>alert("Please Select A File!");</script>';
    } else {

        $usn = $_POST['usn'];
        $subject = $_POST['subject'];
        $cname = $_POST['cname'];

        $cert = explode('.', $_FILES['cert']['name']);
        $cert_ext = end($cert);

        move_uploaded_file($_FILES['cert']['tmp_name'], "mooc/certificates/" . $usn . "." . $cert_ext);

        $sqlInsertIntoDB = "INSERT INTO `mooc_course`(`USN`, `subject`, `course_name`) VALUES ('$usn','$subject','$course_name')";
        if (mysqli_query($conn, $sqlInsertIntoDB)) {
            print '<script>alert("Details uploaded successfully.");</script>';
            print '<script>window.location.assign("index.php");</script>';
        } else {
            echo "<br />Failed to upload.<br />";
        }
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
    <title>MOOC</title>
</head>

<body>
    <h3>Insert MOOC Course Details:</h3>
    <form action="" method="post" enctype="multipart/form-data">
        USN:<br>
        <input type="text" name="usn" maxlength="11">
        <br>
        Subject:<br>
        <input type="text" name="subject">
        <br>
        Course Name:<br>
        <input type="text" name="cname">
        <br>
        Certificate:<br>
        <input type="file" name="cert">
        <br>
        <br />
        <input type="submit" name="submit" value="Upload">

    </form>
</body>

</html>