<?php
    
    include('dbCon.php');
    
    if (isset($_POST['submit'])) {
        if ((!file_exists($_FILES['report']['tmp_name']) || !is_uploaded_file($_FILES['report']['tmp_name'])) || (!file_exists($_FILES['cert']['tmp_name']) || !is_uploaded_file($_FILES['cert']['tmp_name']))) {
            echo "<br />Please Select A File.";
        } else {
            
            $usn=$_POST['usn'];
            $title=$_POST['title'];
            $company_name=$_POST['company_name'];
            $position=$_POST['position'];
            $advisor_name=$_POST['advisor_name'];
            $stipend=$_POST['stipend'];
            $started=$_POST['started'];
            $ended=$_POST['ended'];
            
            
            $cert = explode('.', $_FILES['cert']['name']);
            $cert_ext = end($cert);
            $rep = explode('.', $_FILES['report']['name']);
            $rep_ext = end($rep);
            
            move_uploaded_file($_FILES['report']['tmp_name'],"internship/reports/".$usn.".".$rep_ext);
            move_uploaded_file($_FILES['cert']['tmp_name'],"internship/certificates/".$usn.".".$cert_ext);
            
            $sqlInsertIntoDB = "INSERT INTO `internships`(`USN`, `Title`, `Company Name`, `Position`, `Advisor Name`, `Stipend`, `Started`, `Ended`) VALUES ('$usn','$title','$company_name','$position','$advisor_name','$stipend','$started','$ended')";
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
<title>Internship</title>
</head>
<body>
<h3>Insert Internship Details:</h3>
<form action="" method="post" enctype="multipart/form-data">
USN:<br>
<input type="text" name="usn" maxlength="11">
<br>
Type:<br>
<input type="text" name="type">
<br>
Title:<br>
<input type="text" name="title">
<br>
Company Name:<br>
<input type="text" name="company_name">
<br>
Position:<br>
<input type="text" name="position">
<br>
Advisor Name:<br>
<input type="text" name="advisor_name">
<br>
Duration:<br>
<input type="number" name="duration">
<br>
Stipend:<br>
<input type="text" name="stipend">
<br>
Started:<br>
<input type="date" name="started">
<br>
Ended:<br>
<input type="date" name="ended">
<br>
<br>
Report:<br>
<input type="file" name="report">
<br>
Certificate:<br>
<input type="file" name="certificate">
<br />
<input type="submit" name="submit" value="Upload">

</form>
</body>
</html>