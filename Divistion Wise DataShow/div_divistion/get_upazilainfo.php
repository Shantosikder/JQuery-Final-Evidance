<?php 

$db = new mysqli('localhost','root','','ajax_select_show_data');

$id = $_GET['upz_id'];

$data = $db->query("SELECT * FROM upazilainfo
 WHERE upzId='$id'");
 // '<option disabled selected>Select Upzilas</option>';
while($row = $data->fetch_object()){  

	 echo $row->description; 

 } 

 ?>
