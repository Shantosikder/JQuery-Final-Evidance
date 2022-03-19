<?php

 $id = $_GET['id'];

 $db = new mysqli("localhost", "root", "", "ajax");
 
 $sql = "SELECT * FROM student where round_id ='$id'";
   $data = $db->query($sql);

 while($row =$data->fetch_object()){
    echo "<tr>
    <td>".$row->name."</td>
    <td>".$row->email."</td>
    <td>".$row->phone."</td>
    <td>".$row->gender."</td>
    </tr>";
 }

?>