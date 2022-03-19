<?php 

$db = new mysqli('localhost','root','','ajax_select_show_data');

$id = $_GET['divid'];

$data = $db->query("SELECT * FROM districts WHERE divId='$id'");
echo '<option disabled selected>Select Division</option>';
while($row = $data->fetch_object()){  ?>

	<option value="<?php echo $row->id; ?>">
		<?php echo $row->distName; ?>
	</option>

<?php } ?>



