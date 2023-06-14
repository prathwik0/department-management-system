<?php
    
    include('dbCon.php');
    
    if (isset($_POST['submit'])) {
            $course_code=$_POST['course_code'];
            $course_title=$_POST['course_title'];
            $faculty_name=$_POST['faculty_name'];
            $credits=$_POST['credits'];
            $hours=$_POST['hours'];
        
            $sqlInsertIntoDB = "INSERT INTO `course`(`Course_Code`, `Course_Title`, `Faculty_name`, `Credits`, `Hours`) VALUES ('$course_code','$course_title','$faculty_name','$credits','$hours')";
        
        if (mysqli_query($conn, $sqlInsertIntoDB)) {
            Print '<script>alert("Details uploaded successfully.");</script>';
            Print '<script>window.location.assign("index.php");</script>';
        }
        else {
            Print '<script>alert("Failed to upload.");</script>';
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
Course Code:<br>
<input type="text" name="course_code" maxlength="10">
<br>
Course Title:<br>
<input type="text" name="course_title">
<br>
Faculty Name:<br>
<input type="text" name="faculty_name">
<br>
Credits:<br>
<input type="number" id="credits" name="credits" min="1" max="4">
<br>
Hours:<br>
<input type="number" id="hours" name="hours" min="1">
<br>
<br />
<input type="submit" name="submit" value="Upload">

</form>
</body>
</html>