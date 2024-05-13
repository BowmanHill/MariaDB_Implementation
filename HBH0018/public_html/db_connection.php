<?php
function OpenCon()
 {
 $servername = "sysmysql8.auburn.edu";
 $username = "hbh0018";
 $password = "3Peat2436";
 $dbname = "hbh0018db";
 $conn = new mysqli($servername, $username, $password, $dbname);
 // Check connection
 if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
 }
 return $conn;
 }
 
function CloseCon($conn)
 {
 $conn -> close();
 }

?>