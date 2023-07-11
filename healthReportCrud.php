<?php 
        require('db_config.php');

        if(isset($_GET['email'])){

            $q = "SELECT `health_report` FROM `userdetails` WHERE email = ?";
            $value = [$_GET["email"]];

            $res = select($q,$value,'s');
            $data = mysqli_fetch_assoc($res);
            $path = "HealthReports//".$data["health_report"];
            echo $path; 
            header('Content-type: application/pdf'); 
            header('Content-Disposition: inline; filename="' .$path. '"'); 
            header('Content-Transfer-Encoding: binary'); 
            header('Accept-Ranges: bytes'); 
            @readfile($path); 
        }

        
    ?>