<?php


 $db = new mysqli("localhost", "root", "", "ajax");
 
 extract($_POST);
 $sql = "INSERT INTO student VALUES(NULL,'$name','$email','$phone','$gender','$round_id')";
$db->query($sql);

       if($db->affected_rows>0){
        echo "Successfully saved.";
   }
   ?>
