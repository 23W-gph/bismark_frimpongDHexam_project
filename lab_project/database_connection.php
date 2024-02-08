<?php
 $dbserver="localhost";
 $dbusername="root";
 $dbpassword="";
 $dbname="lab_project";

 $conn=mysqli_connect($dbserver, $dbusername, $dbpassword, $dbname);
  if (!$conn) {
	    
         die('Connection Error');
    }

?>