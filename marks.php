<?php

include('dbCon.php');

if (isset($_POST['submit'])) {
    $usn = $_POST['usn'];
    $course_code = $_POST['course_code'];
    $see = $_POST['see'];
    $cgpa = $_POST['cgpa'];
    $sem = $_POST['sem'];

    $sqlInsertIntoDB = "INSERT INTO `marks`(`USN`, `Course_Code`, `SEE`, `SGPA`, `Semester`) VALUES ('$usn','$course_code','$see','$cgpa','$sem')";
    if (mysqli_query($conn, $sqlInsertIntoDB)) {
        print '<script>alert("Details uploaded successfully.");</script>';
        print '<script>window.location.assign("index.php");</script>';
    } else {
        echo "<br />Failed to upload.<br />";
    }
} else {
    # code…
}

//Close the connection
if (mysqli_close($conn)) {
    //echo "<br />Connection Closed.";
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Marks</title>
</head>

<body>
    <h3>Insert Marks Details:</h3>
    <form action="" method="post" enctype="multipart/form-data">
        USN:<br>
        <input type="text" name="usn" maxlength="11">
        <br>
        Course Code:<br>
        <input type="text" name="course_code" maxlength="10">
        <br>
        SEE:<br>
        <input type="number" name="see" min="0" max="100">
        <br>
        CGPA:<br>
        <input type="number" name="cgpa" min="2" step="any">
        <br>
        Semester:<br>
        <input type="number" name="sem" min="1" max="8">
        <br>
        <br />
        <input type="submit" name="submit" value="Upload">

    </form>
</body>

</html>