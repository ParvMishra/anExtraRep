<?php 
    require('db_config.php');

    if (isset($_POST['healthReport'])) {

        $formData = filteration($_POST);

        $q = "INSERT INTO `userdetails`(`name`, `age`, `weight`, `email`,`health_report`) VALUES (?,?,?,?,?)";

        $tempName = $_FILES['report']['tmp_name'];
        $fileName = $_FILES['report']['name'];
        $folder = "HealthReports/".$fileName;
        
        move_uploaded_file($tempName,$folder);
        
        $value = [$formData["name"],$formData["age"],$formData["weight"],$formData["email"], $fileName];

        $res = insert($q, $value,'siiss');
        if ($res == 1) {
            echo '<script> alert("success","Message Sent!"); </script>';
        } else {
            echo '<script> alert("error","Server Down!"); </script>';
        }
    }
?>


<!DOCTYPE html>
<html>
    <head>
    <title>Simple Form</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        .a {
            padding: 12px 23px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            font-family: Arial, sans-serif;
            text-decoration: none;

        }

        .a:hover {
            background-color: #45a049;
        }

    </style>
    </head>
    <body>
        <div class="container">
            <h1>User Details Form</h1>
            <form id="userForm" enctype="multipart/form-data" method="POST">
                <input type="text" name="name" placeholder="Name" required>
                <input type="number" name="age" placeholder="Age" required>
                <input type="number" name="weight" placeholder="Weight" required>
                <input type="email" name="email" placeholder="Email " required>
                <input type="file" name="report" accept=".pdf" required>
                <button type="submit" name="healthReport">Upload Report</button>
                <a href="healthReport.php" class="a">Check Report</a>
            </form>
        </div>
    </body>
</html>

