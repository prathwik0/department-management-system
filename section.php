<?php

include('dbCon.php');

if (isset($_POST['submit'])) {
    $ssid = $_POST['ssid'];
    $sem = $_POST['sem'];
    $sec = $_POST['see'];
    $year = $_POST['year'];

    $sqlInsertIntoDB = "INSERT INTO `section`(`ssid`, `sem`, `section`, `year`) VALUES ('$ssid','$sem','$sec','$year')";
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
    <title>Section</title>
</head>

<body>
    <h3>Insert Section Details:</h3>
    <form action="" method="post" enctype="multipart/form-data">
        Semester-Section ID:<br>
        <input type="text" name="ssid" maxlength="10">
        <br>
        Semester:<br>
        <input type="number" name="sem" min="1" max="8">
        <br>
        Section:<br>
        <input type="text" name="sec" maxlength="1">
        <br>
        Academic Year:<br>
        <input type="number" name="year" min="2020">
        <br>
        <br />
        <input type="submit" name="submit" value="Upload">

    </form>
</body>

</html>