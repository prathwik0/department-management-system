<?php
    
    include('dbCon.php');
    
    if (isset($_POST['submit'])) {
        $emp_id=$_POST['emp_id'];
        $title=$_POST['title'];
        $type=$_POST['type'];
        $started=$_POST['started'];
        $ended=$_POST['ended'];
    
        $sqlInsertIntoDB = "INSERT INTO `teacher_activities`(`Employee_ID`, `Type`, `Title`, `Started`, `Ended`) VALUES ('$emp_id','$type','$title','$started','$ended')";
        if (mysqli_query($conn, $sqlInsertIntoDB)) {
            Print '<script>alert("Details uploaded successfully.");</script>';
            Print '<script>window.location.assign("index.php");</script>';
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
<title>Internship</title>
</head>
<body>
<h3>Insert Internship Details:</h3>
<form action="" method="post" enctype="multipart/form-data">
Employee_ID:<br>
<input type="text" name="emp_id" maxlength="10">
<br>
Type:<br>
<input type="text" name="type">
<br>
Title:<br>
<input type="text" name="title">
<br>
Started:<br>
<input type="date" name="started">
<br>
Ended:<br>
<input type="date" name="ended">
<br>
<br />
<input type="submit" name="submit" value="Upload">

</form>
</body>
</html>