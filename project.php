<?php
    
    include('dbCon.php');
    
    if (isset($_POST['submit'])) {
        if ((!file_exists($_FILES['report']['tmp_name']) || !is_uploaded_file($_FILES['report']['tmp_name'])) || (!file_exists($_FILES['code']['tmp_name']) || !is_uploaded_file($_FILES['code']['tmp_name'])) || (!file_exists($_FILES['cert']['tmp_name']) || !is_uploaded_file($_FILES['cert']['tmp_name']))) {
            Print '<script>alert("Please Select A File!");</script>';
        } else {
            
            $proj_no=$_POST['proj_no'];
            $usn=$_POST['usn'];
            $course_code=$_POST['course_code'];
            $title=$_POST['title'];
            $cert = explode('.', $_FILES['cert']['name']);
            $cert_ext = end($cert);
            $rep = explode('.', $_FILES['report']['name']);
            $rep_ext = end($rep);
            $code = explode('.', $_FILES['code']['name']);
            $code_ext = end($code);
            
            
            move_uploaded_file($_FILES['report']['tmp_name'],"project/report/".$usn.".".$rep_ext);
            move_uploaded_file($_FILES['cert']['tmp_name'],"project/certificate/".$usn.".".$cert_ext);
            move_uploaded_file($_FILES['code']['tmp_name'],"project/code/".$usn.".".$code_ext);
            
            
            $sqlInsertIntoDB = "INSERT INTO `projects`(`Project_No`, `USN`, `Course_Code`, `Title`, `Certificate`, `Report`, `Code`) VALUES ('$proj_no','$usn','$course_code','$title','null','null','null')";
            if (mysqli_query($conn, $sqlInsertIntoDB)) {
                Print '<script>alert("Details uploaded successfully.");</script>';
                Print '<script>window.location.assign("index.php");</script>';
            } else {
                echo "<br />Failed to upload.<br />";
            }
        }
        
    }
    else {
    }
    //Close the connection
    if (mysqli_close($conn)) {
        //echo "<br />Connection Closed.";
    }
    ?>

<!DOCTYPE html>
<html>
<head>
<title>Project</title>
</head>
<body>
<h3>Insert Project Details:</h3>
<form action="" method="post" enctype="multipart/form-data">

Project Number:<br>
<input type="text" name="proj_no" maxlength="11">
<br>
USN:<br>
<input type="text" name="usn" maxlength="11">
<br>
Course Code:<br>
<input type="text" name="course_code" maxlength="10">
<br>
Title:<br>
<input type="text" name="title">
<br>
Code:<br>
<input type="file" name="code">
<br>
Certificate:<br>
<input type="file" name="cert">
<br>
Report:<br>
<input type="file" name="report">
<br>
<br />
<input type="submit" name="submit" value="Upload">

</form>
</body>
</html>