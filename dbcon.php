<?php

    $server = "localhost";
    $user = "root";
    $password = "";
    $db = "mail";

 $dbcon = mysqli_connect($server,$user,$password,$db);

 if($dbcon){
  
   //  <script>alert("Connection Successful")</script> 
 
 }else{
    ?>
    <script>alert("No Connection")</script>
    <?php
 }

?>