<?php
    
    include('dbCon.php');
    
    if (isset($_POST['submit'])) {
        $name=$_POST['name'];
        $dep_id=$_POST['dep_id'];
        $hod=$_POST['hod'];
        
        $sqlInsertIntoDB = "INSERT INTO `department`(`Name`, `Department_ID`, `H.O.D.`) VALUES ('$name','$dep_id','$hod')";
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
Department Name:<br>
<input type="text" name="name">
<br>
Department ID:<br>
<input type="text" name="dep_id" maxlength="30">
<br>
HOD:<br>
<input type="text" name="hod">
<br>
<br />
<input type="submit" name="submit" value="Upload">

</form>
</body>
</html>