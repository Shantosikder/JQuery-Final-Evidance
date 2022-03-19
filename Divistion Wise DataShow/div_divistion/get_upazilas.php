<?php 

$db = new mysqli('localhost','root','','ajax_select_show_data');

$id = $_GET['dist_id'];

$data = $db->query("SELECT * FROM upazilas WHERE distId='$id'");
echo '<option disabled selected>Select Upzilas</option>';
while($row = $data->fetch_object()){  ?>

	<option value="<?php echo $row->id; ?>">
		<?php echo $row->upzName; ?>
	</option>

<?php } ?>
